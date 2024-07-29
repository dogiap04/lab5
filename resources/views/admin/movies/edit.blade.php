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
    <h1>Cập nhập</h1>
    @if(session('message'))
        <div class="alert alert-success">
            {{session('message')}}
        </div>
    @endif
    <a href="{{ route('movie.index') }}" class="btn btn-primary">List</a>
    <form action="{{ route('movie.update', $movie) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="" class="form-label">Title</label>
            <input type="text" class="form-control" name="title" value="{{$movie->title}}">
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Poster</label>
            <input class="form-control" type="file" name="poster" id="fileImage">
            <br>
            <img id="img" src="{{asset('/storage/'.$movie->poster)}}" width="70">
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Intro</label>
            <textarea class="form-control" name="intro" rows="3" >{{$movie->intro}}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Release_date</label>
            <input type="date" name="release_date" class="form-control" value="{{$movie->release_date}}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Genre</label>
            <select name="genre_id" class="form-select" id="">
                @foreach ($genres as $cate)
                    <option value="{{ $cate->id }}"
                            @if ($cate->id==$movie->genre_id)
                                selected
                        @endif
                    >
                        {{ $cate->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>

    </form>
</div>
<script>
    var fileImage=document.querySelector("#fileImage");
    var img=document.querySelector("#img");
    //Thay đổi ảnh
    fileImage.addEventListener('change', function(e){
        e.preventDefault();
        img.src=URL.createObjectURL(this.files[0]);
    });
</script>
</body>
</html>


