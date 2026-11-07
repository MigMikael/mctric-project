@extends('app')

@section('title', 'Sort Management')

@section('content')
    <header class="sub-title">
        <div class="sub-title-overlay"></div>
        <div class="container h-100">
            <div class="d-flex h-100 text-center align-items-center">
                <div class="w-100 text-white" style="z-index: 3">
                    <h1 class="text-ellipsis text-center">
                        Sort Management
                    </h1>
                </div>
            </div>
        </div>
    </header>
    <section class="bg-white">
        <div class="container">
            <div class="back-btn-custom">
                <button type="button" class="btn btn-primary"
                    onclick="location.href='{{ url('dashboard/managements/') }}'">Back</button>
            </div>
            <div>
                @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        @foreach ($errors->all() as $message)
                            <div>{{ $message }}</div>
                        @endforeach
                    </div>
                @endif
                <form id="management-sort-form" method="POST" action="{{ url('/managements/sort') }}">
                    @csrf
                    <div id="sortable">
                        @forelse ($managements as $management)
                            <div class="card mb-3" data-id="{{ $management->id }}">
                                <div class="card-body d-flex align-items-center">
                                    <span aria-hidden="true">
                                        <i class="fas fa-grip-vertical mr-3"></i>
                                    </span>

                                    <span class="badge badge-primary mr-3 sort-position">
                                        {{ $loop->iteration }}
                                    </span>

                                    @if ($management->image_id)
                                        <img src="{{ url('image/show/' . $management->image_id) }}" width="60"
                                            height="60" loading="lazy" alt="" class="rounded mr-3"
                                            style="object-fit: cover;">
                                    @endif

                                    <div class="mr-auto">
                                        <strong>{{ $management->first_name }} {{ $management->last_name }}</strong>
                                        <div>{{ $management->job_title }}</div>
                                        <small>{{ $management->display ? 'Show' : 'Hide' }}</small>
                                    </div>

                                    <button type="button" class="btn btn-sm btn-outline-primary sort-up"
                                        aria-label="เลื่อนขึ้น">↑</button>
                                    <button type="button" class="btn btn-sm btn-outline-primary sort-down ml-1"
                                        aria-label="เลื่อนลง">↓</button>
                                </div>
                            </div>
                        @empty
                            <p>ยังไม่มีรายชื่อคณะกรรมการให้จัดลำดับ</p>
                        @endforelse
                    </div>

                    <div id="management-sort-inputs"></div>

                    @if ($managements->count() > 1)
                        <div class="text-center mt-5">
                            <button type="submit" class="btn btn-primary" style="width: 500px; max-width: 90%">
                                {{ __('messages.dashboard.saveButton') }}
                            </button>
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        $(function() {
            var $list = $('#sortable');

            function updatePositions() {
                $list.children('[data-id]').each(function(index) {
                    $(this).find('.sort-position').text(index + 1);
                });
            }

            $list.sortable({
                items: '> [data-id]',
                cancel: 'button',
                update: updatePositions
            });

            $list.on('click', '.sort-up, .sort-down', function() {
                var $card = $(this).closest('[data-id]');
                var moveUp = $(this).hasClass('sort-up');
                var $neighbor = moveUp ?
                    $card.prev('[data-id]') :
                    $card.next('[data-id]');

                if (!$neighbor.length) {
                    return;
                }

                if (moveUp) {
                    $card.insertBefore($neighbor);
                } else {
                    $card.insertAfter($neighbor);
                }

                updatePositions();
            });

            $('#management-sort-form').on('submit', function() {
                var $inputs = $('#management-sort-inputs').empty();

                $list.children('[data-id]').each(function() {
                    $('<input>', {
                        type: 'hidden',
                        name: 'order[]',
                        value: $(this).attr('data-id')
                    }).appendTo($inputs);
                });
            });
        });
    </script>
@endsection
