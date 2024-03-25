<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Articles</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <h1>Database Artikel</h1>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Tambahkan Artikel
    </button>

    @if(auth()->user())
    <a href="{{ route('logout') }}" class="btn btn-danger btn-sm">Logout</a>
    @else
    <a href="{{ route('show-login') }}" class="btn btn-success btn-sm">Login</a>
    @endif

    <!-- Alert -->

    <div class="mt-4">
        @session('success')
        <div class="alert alert-primary" role="alert">
            {{session('success')}}
        </div>
        @endsession
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Article</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{route('tambah-data')}}" enctype="multipart/form-data" method="post">
                        @csrf()
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="">Title</label>
                                <input type="text" class="form-control" name="title">
                            </div>
                            <div class="form-group">
                                <label for="">Author</label>
                                <input type="text" class="form-control" name="author">
                            </div>
                            <div class="form-group">
                                <label for="">Img</label>
                                <input type="file" class="form-control" name="img">
                            </div>
                            <div class="form-group">
                                <label for="">Content</label>
                                <textarea name="content" class="form-control" id="" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">

                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Read -->
        <div class="container">
            <div class="row">
                <div class="col-sm">
                    <table class="table table-striped">
                        <tr>
                            <td>No</td>
                            <td>Title</td>
                            <td>Content</td>
                            <td>Img</td>
                            <td>Author</td>
                            <td></td>
                        </tr>
                        @foreach($articles as $article)
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>{{$article->title}}</td>
                            <td>{{$article->content}}</td>
                            <td>
                                <img style="max-width: 100px;" src="{{Storage::url($article->img)}}" class="img-fluid" alt=""></img>
                            </td>
                            <td>{{$article->author}}</td>
                            <td>
                                @if(auth()->user())
                                <a href="{{route('edit-data', $article->id)}}" class="btn btn-sm btn-primary">Edit</a>
                                <a href="{{route('delete-data', $article->id)}}" class="btn btn-sm btn-danger">Hapus</a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>



        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>