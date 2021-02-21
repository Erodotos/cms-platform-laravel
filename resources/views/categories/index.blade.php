@extends('layouts/layout')

@section ('pageTitle','Categories')

@section('content')

<div class="d-flex justify-content-center">
    <form method="GET" action="/categories/create" class="mx-2">
        {{ csrf_field() }}
        <div class="">
            <button type="submit" class="btn btn-primary">New Category</button>
        </div>
    </form>

    <span class="mx-2">{{ $categories->links() }}</span>
</div>

@if (!$categories->isEmpty())
<div class="d-flex">
    <table class="table table-borderless mt-4">

        <thead>
            <tr class="text-center">
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Created At</th>
                <th scope="col">Updated At</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach($categories as $cat)

            <tr class="text-center">
                <th class="align-middle" scope="row">{{ $cat->id }}</th>
                <td class="align-middle">{{ $cat->title }}</td>
                <td class="align-middle">{{ $cat->created_at->toDateString() }}</td>
                <td class="align-middle">{{ $cat->updated_at->toDateString() }}</td>
                <td>
                    <form method="GET" action="/categories/{{ $cat->id }}/edit" style="display: inline-block">
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-warning">Edit</button>
                    </form>
                    <form method=" GET" action="/categories/{{ $cat->id }}" style="display: inline-block">
                        {{ csrf_field() }}
                        <button type="button" id="view" class="btn btn-success" data-toggle="modal" data-target="#cat_{{ $cat->id }}_modal">View</button>

                        <!-- Modal -->
                        <div class="modal fade" id="cat_{{ $cat->id }}_modal" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title">Category Information</h3>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body text-left">
                                        <div>
                                            <h5 style="display: inline-block;">ID:</h5>
                                            <h6 style="display: inline-block;">{{ $cat->id }}</h6>
                                        </div>
                                        <div>
                                            <h5 style="display: inline-block;">Title:</h5>
                                            <h6 style="display: inline-block;">{{ $cat->title }}</h6>
                                        </div>
                                        <div>
                                            <h5 style="display: inline-block;">Slug:</h5>
                                            <h6 style="display: inline-block;">{{ $cat->slug }}</h6>
                                        </div>
                                        <div>
                                            <h5 style="display: inline-block;">Created At:</h5>
                                            <h6 style="display: inline-block;">{{ $cat->created_at }}</h6>
                                        </div>
                                        <div>
                                            <h5 style="display: inline-block;">Updated At:</h5>
                                            <h6 style="display: inline-block;">{{ $cat->updated_at }}</h6>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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