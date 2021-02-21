@extends('layouts/layout')

@section ('pageTitle','Posts')

@section('content')

<div class="d-flex justify-content-center">
    <form method="GET" action="/posts/create" class="mx-2">
        {{ csrf_field() }}
        <div class="">
            <button type="submit" class="btn btn-primary">New Post</button>
        </div>
    </form>

    <span class="mx-2">{{ $posts->links()}}</span>
</div>


@if (!$posts->isEmpty())
<div class="d-flex">
    <table class="table table-borderless mt-4">

        <thead>
            <tr class="text-center">
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Subtitle</th>
                <th scope="col">Created At</th>
                <th scope="col">Updated At</th>
                <th scope="col">Published At</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach($posts as $post)

            <tr class="text-center">
                <th class="align-middle" scope="row">{{ $post->id }}</th>
                <td class="align-middle">{{ $post->title }}</td>
                <td class="align-middle">{{ $post->subtitle }}</td>
                <td class="align-middle">{{ $post->created_at->toDateString() }}</td>
                <td class="align-middle">{{ $post->updated_at->toDateString() }}</td>
                <td class="align-middle">{{ $post->publish_at->toDateString() }}</td>
                <td>
                    <form method="GET" action="/posts/{{ $post->id }}/edit" style="display: inline-block">
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-warning">Edit</button>
                    </form>
                    <form method=" GET" action="/posts/{{ $post->id }}" style="display: inline-block">
                        {{ csrf_field() }}
                        <button type="submit" id="view" class="btn btn-success">View</button>
                    </form>
                </td>
            </tr>

            @endforeach

        </tbody>

    </table>
</div>
@endif


@endsection