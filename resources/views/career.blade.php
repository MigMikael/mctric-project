@extends('app')

@section('title', 'Career')

@section('content')
    <div class="sub-title">
        <div class="container">
            <h1 class="text-ellipsis text-center">
                Careers
            </h1>
        </div>
    </div>
    <section class="bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-6 order-lg-3 v-center">
                    <img src="https://images.pexels.com/photos/2036686/pexels-photo-2036686.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
                         style="height: 300px; width: 100%; object-fit: cover;">
                </div>
                <div class="col-md-1 order-lg-2"></div>
                <div class="col-md-5 order-lg-1 v-center">
                    <div class="desc">
                        <h2 style="padding-bottom: 10px;">หัวข้อ1</h2>
                        <p>คำอธิบาย1</p>
                    </div>
                </div>
            </div>
            <div class="row" style="padding-top: 20px">
                <div class="col-md-6 v-center">
                    <img src="https://images.pexels.com/photos/310479/pexels-photo-310479.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
                         style="height: 300px; width: 100%; object-fit: cover;">
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-5 v-center">
                    <div class="desc">
                        <h2 style="padding-bottom: 10px;">หัวข้อ2</h2>
                        <p>คำอธิบาย2</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center" style="padding-bottom: 50px;">ตำแหน่งที่เปิดรับ</h1>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img class="card-img-top"
                             src="https://images.pexels.com/photos/2760243/pexels-photo-2760243.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
                             alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title text-center">ตำแหน่ง</h5>
                            <div class="text-center">
                                <button type="button" class="btn learn-more-btn" data-toggle="modal" data-target="#myModal">รายละเอียด</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img class="card-img-top"
                             src="https://images.pexels.com/photos/2760243/pexels-photo-2760243.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
                             alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title text-center">ตำแหน่ง</h5>
                            <div class="text-center">
                                <button type="button" class="btn learn-more-btn" data-toggle="modal" data-target="#myModal">รายละเอียด</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img class="card-img-top"
                             src="https://images.pexels.com/photos/2760243/pexels-photo-2760243.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
                             alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title text-center">ตำแหน่ง</h5>
                            <div class="text-center">
                                <button type="button" class="btn learn-more-btn" data-toggle="modal" data-target="#myModal">รายละเอียด</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img class="card-img-top"
                             src="https://images.pexels.com/photos/2760243/pexels-photo-2760243.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
                             alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title text-center">ตำแหน่ง</h5>
                            <div class="text-center">
                                <button type="button" class="btn learn-more-btn" data-toggle="modal" data-target="#myModal">รายละเอียด</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img class="card-img-top"
                             src="https://images.pexels.com/photos/2760243/pexels-photo-2760243.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
                             alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title text-center">ตำแหน่ง</h5>
                            <div class="text-center">
                                <button type="button" class="btn learn-more-btn" data-toggle="modal" data-target="#myModal">รายละเอียด</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img class="card-img-top"
                             src="https://images.pexels.com/photos/2760243/pexels-photo-2760243.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
                             alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title text-center">ตำแหน่ง</h5>
                            <div class="text-center">
                                <button type="button" class="btn learn-more-btn" data-toggle="modal" data-target="#myModal">รายละเอียด</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
