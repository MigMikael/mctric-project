@extends('app')

@section('title', 'Contact')

@section('content')
    <div class="sub-title">
        <div class="container">
            <h1 class="text-ellipsis text-center">
                Contact
            </h1>
        </div>
    </div>
    <section class="bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <iframe class="resp-iframe"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3875.192181848043!2d100.56834121477938!3d13.76728119033743!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e29e88a01f5421%3A0x50acb168a55704d1!2sMcTric%20Company%20Limited!5e0!3m2!1sth!2sth!4v1569432124464!5m2!1sth!2sth"
                            width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                </div>
                <div class="col-md-1" style="padding-bottom: 50px;"></div>
                <div class="col-md-5">
                    <h5>Address</h5>
                    <p>121/105 อาคารอาร์เอส ทาวเวอร์ ชั้น 39 <br> ถนนรัชดาภิเษก แขวงดินแดง เขตดินแดง กรุงเทพมหานคร 10400
                    </p>

                    <h5>Email Us At</h5>
                    <p>ADMIN@MCTRIC.COM</p>

                    <h5>Call Us</h5>
                    <p>Phone: +66 (0) 2641 2100 <br> Fax: +66 (0) 2641 2030</p>
                </div>
            </div>
        </div>
    </section>
@endsection
