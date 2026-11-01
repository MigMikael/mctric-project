@extends('app')

@section('title', __('messages.home.webTitle'))

@section('content')
    <header class="sub-title">
        <div class="sub-title-overlay"></div>
        <div class="container h-100">
            <div class="d-flex h-100 text-center align-items-center">
                <div class="w-100 text-white" style="z-index: 3">
                    <h1 class="text-ellipsis text-center">
                        {{ __('messages.client.clientHeading') }}
                    </h1>
                </div>
            </div>
        </div>
    </header>
    <section class="bg-white">
        <div class="container">
            <div class="row" id="client-list">
                @include('client._load-more', ['clients' => $clients])
            </div>
            <div class="text-center mt-4">
                <button type="button" class="btn btn-primary" id="load-more-clients"
                    data-next-url="{{ $clients->nextPageUrl() }}" @if (!$clients->hasMorePages()) hidden @endif>
                    Load more
                </button>

                <p id="client-load-error" class="text-danger mt-2" role="alert" hidden>
                    โหลดข้อมูลไม่สำเร็จ กรุณากด Load more เพื่อลองอีกครั้ง
                </p>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const button = document.getElementById('load-more-clients');
            const list = document.getElementById('client-list');
            const error = document.getElementById('client-load-error');

            let loading = false;

            button.addEventListener('click', async function () {
                const nextUrl = button.dataset.nextUrl;

                if (loading || !nextUrl) {
                    return;
                }

                loading = true;
                button.disabled = true;
                button.textContent = 'Loading...';
                error.hidden = true;

                try {
                    const response = await fetch(nextUrl, {
                        headers: {
                            'Accept': 'application/json'
                        }
                    });

                    if (!response.ok) {
                        throw new Error('Unable to load clients');
                    }

                    const data = await response.json();

                    if (
                        typeof data.html !== 'string' ||
                        !(
                            data.next_page_url === null ||
                            typeof data.next_page_url === 'string'
                        )
                    ) {
                        throw new Error('Invalid response');
                    }

                    list.insertAdjacentHTML('beforeend', data.html);

                    button.dataset.nextUrl = data.next_page_url || '';
                    button.hidden = !data.next_page_url;
                } catch (e) {
                    error.hidden = false;
                } finally {
                    loading = false;
                    button.disabled = false;
                    button.textContent = 'Load more';
                }
            });
        });
    </script>
@endsection
