@extends('layouts/layout')

@section ('pageTitle','Posts')

@section('content')

<h1 class="text-left">{{ $post->title }}</h1>

<h4 class="text-left">{{ $post->subtitle }}</h4>

@if (! $post->categories->isEmpty())
Categories :
@foreach ($post->categories as $cat)
<u class="mx-2">{{ $cat->title }}</u>
@endforeach
@endif

<p class="mt-5">{{ $post->content }}</p>

@if ( ! ($post->file == 'NULL'))
<img class="rounded" src="/uploads/{{ $post->file }}">
@endif

<br>

<div class="row mt-3">

    <div class="col-auto">
        <small>Created at : {{ $post->created_at->toDateString() }}</small>
    </div>

    <div class="col-auto">
        <small>Updated at : {{ $post->updated_at->toDateString() }}</small>
    </div>

    <div class="col-auto">
        <small>Published at : {{ $post->publish_at->toDateString() }}</small>
    </div>

</div>


@endsection