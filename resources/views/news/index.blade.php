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
                            <article class="card h-100 shadow-sm">
                                @if ($newsItem->cover_image_id)
                                    <img src="{{ url('image/show/' . $newsItem->cover_image_id) }}" alt=""
                                        width="1280" height="720" class="w-100"
                                        style="height: auto; aspect-ratio: 16 / 9; object-fit: cover;"
                                        @if ($loop->index >= 3) loading="lazy" @endif>
                                @endif

                                <div class="card-body d-flex flex-column">
                                    <time class="small text-muted mb-2"
                                        datetime="{{ $newsItem->created_at->toIso8601String() }}">
                                        {{ $newsItem->created_at->copy()->timezone('Asia/Bangkok')->format('d/m/Y H:i') }}
                                        น.
                                    </time>

                                    <h2 class="h5 mb-3">
                                        {{ $newsItem->title }}
                                    </h2>

                                    <a href="{{ url('news/' . $newsItem->slug) }}"
                                        class="btn btn-outline-primary align-self-start mt-auto"
                                        aria-label="อ่านข่าว: {{ $newsItem->title }}">
                                        อ่านเพิ่มเติม
                                    </a>
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
@endsection
