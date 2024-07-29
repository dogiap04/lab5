<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container m-4">
    <h1>Thêm mới phim</h1>
    <a href="{{ route('movie.index') }}" class="btn btn-primary">List</a>
    <form action="{{ route('movie.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Title</label>
            <input type="text" class="form-control" name="title">
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Poster</label>
            <input class="form-control" type="file" name="poster">
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Intro</label>
            <textarea class="form-control" name="intro" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Release_date</label>
            <input type="date" name="release_date" class="form-control" id="">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Genre</label>
            <select name="genre_id" id="" class="form-select">
                @foreach($genres as $cate)
                    <option value="{{$cate->id}}">
                        {{$cate->name}}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>

    </form>
</div>
</body>
</html>






