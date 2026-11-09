@extends('app')

@section('title', $newsItem->title)

@section('content')
    <header class="sub-title">
        <div class="sub-title-overlay"></div>

        <div class="container h-100">
            <div class="d-flex h-100 align-items-center justify-content-center">
                <h1 class="text-white text-center" style="z-index: 3;">
                    {{ $newsItem->title }}
                </h1>
            </div>
        </div>
    </header>

    <section class="bg-white py-5">
        <div class="container">
            <article class="mx-auto" style="max-width: 900px;">
                <time class="d-block small text-muted mb-3"
                      datetime="{{ $newsItem->created_at->toIso8601String() }}">
                    {{ $newsItem->created_at->copy()->timezone('Asia/Bangkok')->format('d/m/Y H:i') }} น.
                </time>

                @if ($newsItem->cover_image_id)
                    <img src="{{ url('image/show/' . $newsItem->cover_image_id) }}"
                         class="d-block w-100 rounded mb-4"
                         width="1280"
                         height="720"
                         style="height: auto;"
                         alt="{{ $newsItem->title }}">
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

        .news-content img {
            max-width: 100%;
            height: auto;
        }
    </style>
@endsection
