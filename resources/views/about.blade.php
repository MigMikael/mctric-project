@extends('app')

@section('title', 'About')

@section('content')
<header class="sub-title">
    <div class="sub-title-overlay"></div>
    <div class="container h-100">
        <div class="d-flex h-100 text-center align-items-center" style="padding-top: 60px;">
            <div class="w-100 text-white" style="z-index: 3">
                <h1 class="text-ellipsis text-center">
                    About
                </h1>
            </div>
        </div>
    </div>
</header>
    <section class="bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-6 v-center">
                    <div class="desc">
                       <h2 class="bottom15">McTRIC Public Company Limited</h1>
                        <p>McTRIC ประกอบกิจการก่อสร้างและบริการ MEP ได้แก่
                            คอนโดมิเนียม, โรงแรม, โรงพยาบาล, ห้างสรรพสินค้า, ห้างสรรพสินค้า, ไฮเปอร์มาร์เก็ต, โรงงาน, สายการผลิต,
                            ยูทิลิตี้นอกโรงงานและอื่นๆ
                        </p>
                        <p>
                            เราเชื่อมั่นในบริษัท
                            ของเราว่ามีความมั่นคง ประสิทธิภาพและเชื่อถือได้ เพื่อให้มั่นใจว่าบริการของเราจะให้ประโยชน์สูงสุดแก่ลูกค้า
                        </p>
                        <p>
                            เมื่อต้องการคุณภาพ McTric เป็นบริษัทในอุดมคติที่
                            มีความรู้ทักษะการจัดการที่โดดเด่นและไม่เหมือนใครและมีความมุ่งมั่นต่อความต้องการของลูกค้าด้วยใจบริการเต็มรูปแบบของเรา
                        <p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="iframe-container">
                        <iframe src="https://www.youtube.com/embed/NlIv4u7dtQU" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
            <div class="row" style="padding-top: 50px;">
                <div class="col-md-6">
                    <div class="image image-about">
                        <img src="https://images.pexels.com/photos/2036686/pexels-photo-2036686.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940">
                    </div>
                </div>
                <div class="col-md-6 v-center">
                    <div class="desc">
                        <h2 class="bottom15">วิสัยทัศน์</h2>
                        <p>บริษัทฯ มุ่งมั่นที่จะเป็นผู้เชี่ยวชาญในงานด้านวิศวกรรม
                            งานรับเหมาก่อสร้าง และการติดตั้งระบบในแขนงต่างๆ</p>
                    </div>
                </div>
            </div>
            <div class="row" style="padding-top: 50px;">
                <div class="col-md-6 v-center">
                    <div class="desc">
                        <h2 class="bottom15">พันธกิจ</h2>
                        <ol class="circle">
                            <li>ส่งมอบผลงานที่มีคุณภาพให้เป็นที่พึงพอใจแก่ลูกค้า</li>
                            <li>สร้างผลตอบแทนในระดับที่เหมาะสม และยั่งยืนให้กับนักลงทุน</li>
                            <li>พัฒนาและปรับปรุงประสิทธิภาพในการทำงาน เพิ่มศักยภาพในการแข่งขัน</li>
                            <li>ประกอบธุรกิจโดยคำนึกถึงผู้มีส่วนได้ส่วนเสีย และรับผิดชอบต่อสังคม</li>
                            <li>ลงทุนและพัฒนาบุคคลากรของบริษัทฯ อย่างต่อเนื่อง</li>
                        </ol>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="image image-about">
                        <img src="https://images.pexels.com/photos/310479/pexels-photo-310479.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940">
                    </div>
                </div>
            </div>
            <div class="row" style="padding-top: 50px;">
                <div class="col-md-6">
                    <div class="image image-about">
                        <img src="https://images.pexels.com/photos/1770801/pexels-photo-1770801.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940">
                    </div>
                </div>
                <div class="col-md-6 v-center">
                    <div class="desc">
                        <h2 class="bottom15">นโยบายคุณภาพ</h2>
                        <p>พัฒนาอย่างต่อเนื่อง เพื่อคุณภาพที่มั่นคง และความประทับใจของลูกค้า</p>
                    </div>
                </div>
            </div>
            <div class="row" style="padding-top: 50px;">
                <div class="col-md-6 v-center">
                    <div class="desc">
                        <h2 class="bottom15">วัตถุประสงค์</h2>
                        <ol class="circle">
                            <li>ขยายงานรับเหมาติดตั้งงานระบบให้เติบโตอย่างต่อเนื่อง</li>
                            <li>ผลงานได้คุณภาพ ภายใต้งาบประมาณและเสร็จตามกำหนดเวลาที่สัญญาไว้กับลูกค้า</li>
                            <li>ควบคุมระบบการปฎิบัติงานให้ได้ตามมาตรฐานและเกิดการพัฒนาอย่างต่อเนื่อง</li>
                            <li>บริหารจัดการระบบภายในบริษัท ให้มีประสิทธิภาพ</li>
                            <li>พัฒนาความรู้ความสามารถของบุคคลกรอย่างต่อเนื่อง</li>
                        </ol>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="image image-about">
                        <img src="https://images.pexels.com/photos/2138126/pexels-photo-2138126.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center section-title">{{ __('messages.home.clientHeading') }}</h1>
                </div>
            </div>
            <div class="client-wrapper">
                <div class="owl-general owl-carousel">
                    @foreach($clients as $client)
                        <div>
                            <img class="image-client" src="{{ url('image/show/'.$client->image_id) }}">
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="text-center align-items-center">
                        <button type="button" class="btn view-btn" onclick="location.href='{{ url('/clients') }}'">See All Client</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center section-title">{{ __('messages.home.awardHeading') }}</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="award-wrapper text-center">
                        <img src="{{url('/image/award.png')}}">
                        <p>เยลลี่ซิม มอคค่าแมชีนเวิร์กโบรกเกอร์การันตี พาวเวอร์ ราชบัณฑิตยสถาน แพ็คออร์เดอร์อีโรติกสเตชั่น ไลฟ์โฮมหลวงตาแทงกั๊ก สะกอมเจ็ตแจ๊ส แอปเปิ้ลไนน์เจ็ตนาฏยศาลา มายาคติคอนโทรลคำตอบ เซ็นเซอร์ พาสเจอร์ไรส์ทัวร์นาเมนท์นู้ดธุรกรรม 
                            ราสเบอร์รีวอร์รูมอาข่า เมี่ยงคำหมวยดั๊มพ์แอร์ ลาตินปาสเตอร์ แทงกั๊กซาร์ครัวซองฮีโร่ วอล์กแฟรี่คำสาปอีแต๋นสต๊อก</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="text-center align-items-center">
                        <button type="button" class="btn view-btn" onclick="location.href='{{ url('/awards') }}'">See All Award</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
