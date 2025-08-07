<?php

namespace App\Http\Controllers;

use App\Rules\ReCaptcha;
use App\Mail\TalkToCeoMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class TalkToCeoEmailController extends Controller
{
    public function send(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'reporter_description' => 'required',
            'g-recaptcha-response' => ['required', new ReCaptcha],
        ], [
            'reporter_description.required' => 'กรุณาระบุ รายละเอียดข้อมูล',
            'g-recaptcha-response.required' => 'กรุณาคลิก reCAPTCHA เพื่อยืนยัน',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'พบข้อผิดพลาด',
                'errors' => $validator->errors()
            ], 400);
        }

        $mailData = [
            'title' => 'Talk to CEO',
            'reporter_name' => $request->reporter_name,
            'reporter_description' => $request->reporter_description,
        ];

        // ตรวจสอบว่า 'reporter_name' มีค่าส่งมาหรือไม่
        if ($request->has('reporter_name') && $request->reporter_name) {
            $mailData['reporter_name'] = $request->reporter_name;
        }
        else {
            $mailData['reporter_name'] = "-";
        }

        // ตรวจสอบว่า 'reporter_phone' มีค่าส่งมาหรือไม่
        if ($request->has('reporter_phone') && $request->reporter_phone) {
            $mailData['reporter_phone'] = $request->reporter_phone;
        }
        else {
            $mailData['reporter_phone'] = "-";
        }

        // ตรวจสอบว่า 'reporter_email' มีค่าส่งมาหรือไม่
        if ($request->has('reporter_email') && $request->reporter_email) {
            $mailData['reporter_email'] = $request->reporter_email;
        }
        else {
            $mailData['reporter_email'] = "-";
        }

        try {
            $mailTo = config('services.talk_to_ceo.mail_to');
            Mail::to($mailTo)->send(new TalkToCeoMail($mailData));

            return response()->json([
                'success' => true,
                'message' => 'คุณส่งข้อมูลสำเร็จแล้ว',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'เกิดข้อผิดพลาดในการบันทึกข้อมูล: ' . $e->getMessage(),
            ], 500);
        }
    }
}
