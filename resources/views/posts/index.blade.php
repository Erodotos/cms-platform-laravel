@extends('layouts/layout')

@section('pageTitle', 'Posts')

@section('content')

    <div class="d-flex justify-content-center">
        <form method="GET" action="/posts/create" class="mx-2">
            {{ csrf_field() }}
            <div class="">
            <button type=" submit" class="btn btn-primary">New Post</button>
            </div>
        </form>

        <span class="mx-2">{{ $posts->links() }}</span>
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
                    @foreach ($posts as $post)

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
                                    <button type="button" id="view" class="btn btn-success" data-toggle="modal"
                                        data-target="#post_{{ $post->id }}_modal">View</button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="post_{{ $post->id }}_modal" tabindex="-1"
                                        role="dialog">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h3 class="modal-title">{{ $post->title }}</h3>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body text-left">
                                                    <div>
                                                        <h5 style="display: inline-block;">{{ $post->subtitle }}</h5>
                                                    </div>
                                                    <div>
                                                        <img class="rounded img-fluid img-thumbnail" src="/uploads/{{ $post->file }}">
                                                    </div>
                                                    <div>
                                                        <h5 style="display: inline-block;">Categories:</h5>
                                                        @if (!$post->categories->isEmpty())
                                                            @foreach ($post->categories as $cat)
                                                                <strong class="btn btn-primary">{{ $cat->title }}</strong>
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                    <div>
                                                        <h5 style="display: inline-block;">Content:</h5>
                                                        <h6 style="display: inline-block;">{{ $post->content }}</h6>
                                                    </div>
                                                    <div>
                                                        <h5 style="display: inline-block;">Created At:</h5>
                                                        <h6 style="display: inline-block;">{{ $post->created_at }}</h6>
                                                    </div>
                                                    <div>
                                                        <h5 style="display: inline-block;">Updated At:</h5>
                                                        <h6 style="display: inline-block;">{{ $post->updated_at }}</h6>
                                                    </div>
                                                    <div>
                                                        <h5 style="display: inline-block;">Published at :</h5>
                                                        <h6 style="display: inline-block;">{{ $post->publish_at }}</h6>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </td>
                        </tr>

                    @endforeach

                </tbody>

            </table>
        </div>
    @endif


@endsection
