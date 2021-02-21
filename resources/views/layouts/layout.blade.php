<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <!-- Custom CSS  -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    
    <link rel="stylesheet" href="{{ asset('js/dropzone/dist/dropzone.css') }}">

    <script src="{{ asset('js/dropzone/dist/dropzone.js') }}"></script>

    <title>@yield('pageTitle')</title>

</head>

<body>


    <header class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
        <p class="h3 my-0 mr-md-auto font-weight-bolt">CMS Project</p>
        <nav class="my-2 my-md-0 mr-md-3 navigation-links">
            @guest
            <a class="p-2" href="/">Home</a>
            @else
            <a class="p-2" href="/">Home</a>
            <a class="p-2" href="/posts">Manage Posts</a>
            <a class="p-2" href="/categories">Manage Categories</a>
            @endguest

        </nav>

        @guest
        <a class="btn btn-outline-danger mx-2 my-1" href="/login">Login</a>
        <a class="btn btn-outline-primary mx-2 my-1" href="/register">Register</a>
        @else
        <a class="btn btn-outline-danger mx-2 my-1" href="/logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>

        <form id="logout-form" action="/logout" method="POST">
            @csrf
        </form>
        @endguest

        <button type="button" class="btn btn-outline-info mx-2 my-1" data-toggle="modal" data-target="#about_modal">About</button>

        <div class="modal fade" id="about_modal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title">About this project</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        <div>
                            Welcome to my mini CMS Project. This platform has been developed using PHP Laravel, HTML, CSS (Bootstrap) and Javascript.
                            <br>
                            <br>
                            © 2021 | Erodotos Demetriou

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container mt-5">
        @yield('content')
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- Custom Javascript -->
    <script src="{{ asset('js/app.js') }}"></script>


</body>



</html>