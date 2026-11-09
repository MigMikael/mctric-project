@extends('app')

@section('title', __('messages.home.webTitle'))

@section('content')
    <header class="sub-title">
        <div class="sub-title-overlay"></div>
        <div class="container h-100">
            <div class="d-flex h-100 text-center align-items-center">
                <div class="w-100 text-white" style="z-index: 3">
                    <h1 class="text-ellipsis text-center">
                        News
                    </h1>
                </div>
            </div>
        </div>
    </header>
    <section class="services bg-white custom-static-section">
        <div class="container">
            <div class="row">
                @if ($news->isEmpty())
                    <div class="col-12">
                        <p class="text-center text-muted">ยังไม่มีข่าวสาร</p>
                    </div>
                @else
                    @foreach ($news as $newsItem)
                        <div class="col-12 col-sm-6 col-lg-4 mb-4">
                            <article class="corporate-card">
                                <div class="card-thumb">
                                    <img src="{{ url('image/show/' . $newsItem->cover_image_id) }}" alt="News Image"
                                        loading="lazy">
                                </div>
                                <div class="card-body">
                                    <span class="card-date">
                                        {{ $newsItem->created_at->copy()->timezone('Asia/Bangkok')->format('d/m/Y') }}</span>
                                    <h3 class="card-title"> {{ $newsItem->title }}</h3>
                                    <div class="card-footer">
                                        <span class="card-btn">
                                            <a href="{{ url('news/' . $newsItem->slug) }}">
                                                อ่านเพิ่มเติม
                                            </a>
                                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                            </article>
                        </div>
                    @endforeach
                @endif
            </div>
            @if ($news->hasPages())
                <div class="d-flex justify-content-center mt-4">
                    {{ $news->links() }}
                </div>
            @endif
        </div>
    </section>

    <style>
        .card-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 2rem;
            align-items: stretch;
            /* ให้การ์ดทุกใบในแถวสูงเท่ากัน */
        }

        .corporate-card {
            height: 100%;
            /* ยืดเต็มช่อง Grid */
            display: flex;
            flex-direction: column;
            background: #ffffff;
            border-radius: 16px;
            overflow: hidden;
            border: 1px solid #edf2f7;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .corporate-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 15px 25px -5px rgba(0, 0, 0, 0.1);
        }

        .card-thumb {
            position: relative;
            width: 100%;
            aspect-ratio: 16 / 9;
            overflow: hidden;
            background-color: #f1f5f9;
        }

        .card-thumb img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .corporate-card:hover .card-thumb img {
            transform: scale(1.05);
        }

        .card-body {
            padding: 1.5rem;
            display: flex;
            flex-direction: column;
            flex: 1;
            /* ขยายกินพื้นที่ที่เหลือทั้งหมด */
        }

        .card-date {
            font-size: 0.875rem;
            color: #64748b;
            margin-bottom: 0.75rem;
        }

        .card-title {
            font-size: 1.125rem;
            /* 18px */
            line-height: 1.5;
            /* 27px ต่อ 1 บรรทัด */
            font-weight: 500;
            color: #0f172a;
            margin: 0 0 1rem 0;

            /* บังคับความสูงเท่ากับ 3 บรรทัดพอดี (27px * 3 = 81px หรือ 4.5rem) */
            min-height: calc(1.125rem * 1.5 * 3);

            /* ตัดคำหากเกิน 3 บรรทัด */
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .corporate-card:hover .card-title {
            color: #004b93;
            /* GULF Corporate Blue tone */
        }

        .card-footer {
            margin-top: auto;
            /* ดัน Footer ไปอยู่ด้านล่างสุดเสมอ */
            padding-top: 1rem;
            border-top: 1px solid #f8fafc;
        }

        .card-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.9rem;
            font-weight: 600;
            color: #004b93;
        }

        .card-btn svg {
            width: 16px;
            height: 16px;
            transition: transform 0.2s ease;
        }

        .corporate-card:hover .card-btn svg {
            transform: translateX(4px);
        }
    </style>
@endsection
