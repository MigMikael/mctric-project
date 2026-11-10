@extends('app')

@section('title', $newsItem->title)

@section('content')
    <header class="sub-title">
        <div class="sub-title-overlay"></div>

        <div class="container h-100">
            <div class="d-flex h-100 align-items-center justify-content-center">
                <h1 class="text-white text-center" style="z-index: 3;">
                   {{ __('messages.home.newsHeading') }}
                </h1>
            </div>
        </div>
    </header>

    <section class="bg-white py-5">
        <div class="container-narrow">
            <article class="mx-auto" style="max-width: 900px;">
                <h2>{{ $newsItem->title }}</h2>
                <div class="d-block small text-muted mb-4" style="font-size: 15px;">
                    McTRIC Public Company Limited •
                    {{ $newsItem->created_at->copy()->timezone('Asia/Bangkok')->format('d/m/Y') }} น.
                </div>

                @if ($newsItem->cover_image_id)
                    <img src="{{ url('image/show/' . $newsItem->cover_image_id) }}" class="d-block w-100 rounded mb-4"
                        width="1280" height="720" style="height: auto;" alt="{{ $newsItem->title }}">
                @endif

                <div class="news-content">
                    {!! $newsItem->content !!}
                </div>
            </article>
        </div>
    </section>

    <style>
        .news-content {
            line-height: 1.75;
            overflow-wrap: anywhere;
        }

        /* ควบคุมรูปภาพทั้งหมดภายในเนื้อหาบทความ */
        .news-content img {
            display: block;
            /* เปลี่ยนเป็น block เพื่อให้ margin auto ทำงานได้ */
            max-width: 100%;
            /* ป้องกันภาพล้นขอบจอ รองรับ Responsive ทุกหน้าจอ */
            height: auto;
            /* รักษาสัดส่วน Aspect Ratio เดิม ไม่ให้ภาพยืดหดเบี้ยว */
            margin-left: auto;
            /* จัดกึ่งกลางแนวนอน */
            margin-right: auto;
            /* จัดกึ่งกลางแนวนอน */
            margin-top: 1.5rem;
            /* เว้นระยะห่างด้านบน */
            margin-bottom: 1.5rem;
            /* เว้นระยะห่างด้านล่าง */
            border-radius: .25rem !important;
            /* ขอบรูปภาพ */
        }

        /* รองรับกรณี TinyMCE ครอบรูปภาพด้วยแท็ก <figure> */
        .news-content figure {
            margin-left: auto;
            margin-right: auto;
            max-width: 100%;
            text-align: center;
        }

        .news-content figure img {
            margin-top: 0;
            margin-bottom: 0.5rem;
        }

        /* ปรับแต่งคำบรรยายภาพ (Figcaption) ถ้ามี */
        .news-content figcaption {
            font-size: 0.875rem;
            color: #64748b;
            text-align: center;
            margin-bottom: 1.5rem;
        }

        /* สร้าง Custom Container สำหรับหน้าบทความ */
        .container-narrow {
            width: 100%;
            padding-right: 15px;
            padding-left: 15px;
            margin-right: auto;
            margin-left: auto;
        }

        /* ปรับ max-width เมื่ออยู่บนจอ Desktop */
        @media (min-width: 992px) {
            .container-narrow {
                max-width: 860px;
                /* ระยะที่อ่านบทความสบายตา ไม่กว้างเกินไป */
            }
        }

        @media (min-width: 1200px) {
            .container-narrow {
                max-width: 860px;
                /* หรือตั้งไว้ที่ 800px - 900px ตามชอบ */
            }
        }
    </style>
@endsection
