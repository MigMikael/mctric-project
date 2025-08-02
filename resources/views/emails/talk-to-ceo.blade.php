<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $mailData['title'] }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .email-container p {
            font-size: 16px;
        }
    </style>
</head>

<body>
    <div class="email-container">
        <p style="margin-top: 0px;">เรียน ประธานเจ้าหน้าที่บริหาร</p>
        <p>{{ $mailData['reporter_description'] }}</p>
        <p>ขอแสดงความนับถือ</p>
        <p>ชื่อผู้ติดต่อ: {{ $mailData['reporter_name'] }}</p>
        <p>เบอร์โทรผู้ติดต่อ: {{ $mailData['reporter_phone'] }}</p>
        <p>อีเมลผู้ติดต่อ: {{ $mailData['reporter_email'] }}</p>
    </div>
</body>

</html>
