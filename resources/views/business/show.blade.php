@extends('app')

@section('title', 'Business')

@section('content')
<div class="full-screen" style="background-image: url({{ url('image/show/'.$business->image) }});">
</div>
@endsection
