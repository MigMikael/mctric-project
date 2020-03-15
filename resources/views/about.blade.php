@extends('app')

@section('title', 'About')

@section('content')
    <div class="sub-title">
        <div class="container">
            <h1 class="text-ellipsis text-center">
                ABOUT
            </h1>
        </div>
    </div>
    <section class="bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-6 order-lg-3 v-center">
                    <div class="image">
                        <img
                        src="https://images.pexels.com/photos/2036686/pexels-photo-2036686.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
                        style="height: 300px; width: 100%; object-fit: cover;">
                    </div>
                </div>
                <div class="col-md-1 order-lg-2"></div>
                <div class="col-md-5 order-lg-1 v-center">
                    <div class="desc">
                        <h2 style="padding-bottom: 10px;">วิสัยทัศน์ (Vision)</h2>
                        <p>บริษัทฯ มุ่งมั่นที่จะเป็นผู้เชี่ยวชาญในงานด้านวิศวกรรม
                            งานรับเหมาก่อสร้าง และการติดตั้งระบบในแขนงต่างๆ</p>
                    </div>
                </div>
            </div>
            <div class="row" style="padding-top: 20px">
                <div class="col-md-6 v-center">
                    <div class="image">
                        <img
                        src="https://images.pexels.com/photos/310479/pexels-photo-310479.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
                        style="height: 300px; width: 100%; object-fit: cover;">
                    </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-5 v-center">
                    <div class="desc">
                        <h2 style="padding-bottom: 10px;">พันธกิจ (Mission)</h2>
                        <ol class="circle">
                            <li>ส่งมอบผลงานที่มีคุณภาพให้เป็นที่พึงพอใจแก่ลูกค้า</li>
                            <li>สร้างผลตอบแทนในระดับที่เหมาะสม และยั่งยืนให้กับนักลงทุน</li>
                            <li>พัฒนา และปรับปรุงประสทอธิภาพในการทำงาน เพิ่มศักยภาพในการแข่งขัน</li>
                            <li>ประกอบธุรกิจโดยคำนึกถึงผู้มีส่วนได้ส่วนเสีย และรับผิดชอบต่อสังคม</li>
                            <li>ลงทุนและพัฒนาบุคคลากรของบริษัทฯ อย่างต่อเนื่อง</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-primary">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center text-white" style="padding-bottom: 50px;">รายชื่อผู้บริหาร</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="image">
                            <img class="card-img-top"
                             src="https://images.pexels.com/photos/842567/pexels-photo-842567.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
                             alt="Card image cap">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title text-center">ชื่อ - นามสกุล <br>ตำแหน่ง</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="image">
                            <img class="card-img-top"
                             src="https://images.pexels.com/photos/842567/pexels-photo-842567.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
                             alt="Card image cap">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title text-center">ชื่อ - นามสกุล <br>ตำแหน่ง</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="image">
                            <img class="card-img-top"
                            src="https://images.pexels.com/photos/842567/pexels-photo-842567.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
                            alt="Card image cap">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title text-center">ชื่อ - นามสกุล <br>ตำแหน่ง</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
