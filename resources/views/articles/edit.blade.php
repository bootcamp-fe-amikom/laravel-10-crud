<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Edit</title>
</head>

<body>
    <!-- edit.blade.php -->
    <form action="{{ route('update-data', $article->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $article->title }}">
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea name="content" id="content" class="form-control">{{ $article->content }}</textarea>
        </div>
        <div class="form-group">
            <label for="author">Author</label>
            <input type="text" name="author" id="author" class="form-control" value="{{ $article->author }}">
        </div>
        <div class="form-group">
            <label for="img">Image</label>
            <input type="file" name="img" id="img" class="form-control">
            @if ($article->img)
            <p>Gambar saat ini:</p>
            <img src="{{ Storage::url($article->img) }}" alt="Current Image" style="max-width: 200px;">
            @else
            <p>Belum Ada Gambar</p>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>