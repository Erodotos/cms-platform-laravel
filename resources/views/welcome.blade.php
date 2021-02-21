@extends('layouts/layout')

@section('pageTitle', 'Home')

@section('content')

<div class="d-flex justify-content-center">
    {{ $posts->links()}}
</div>


<ul class="m-0 p-0 " style="list-style-type:none;">
    @foreach ($posts as $post)
    <li class="mt-5">
        <a href="posts/{{ $post->id }}" target="_blank" class="h1">{{ $post->title }}</a>
        <h5>

            @if (! $post->categories->isEmpty())
            Categories :
            @foreach ($post->categories as $cat)
            <u class="mx-2">{{ $cat->title }}</u>
            @endforeach
            |
            @endif
            Updated at : {{ $post->updated_at->toDateString() }}

        </h5>

    </li>
    @endforeach
</ul>


@endsection