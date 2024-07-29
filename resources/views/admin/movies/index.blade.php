<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body>
<div class="container">
    @if(session('message'))
        <div class="alert alert-success">
            {{session('message')}}
        </div>
    @endif
    <form action="{{ route('movie.index') }}" method="get" style="width: 500px">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label" style="color: red" >Tìm kiếm</label>
            <input type="text" class="form-control" name="search" placeholder="Search....">
        </div>
        <div>
            <button class="btn btn-primary">Tìm kiếm</button>
            <a href="{{ route('movie.index') }}" class="btn btn-success">Danh sách</a>
        </div>
    </form>

    <h1 class="text-center" style="color: red">Danh sách phim</h1>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Title</th>
            <th scope="col">Poster</th>
            <th scope="col">Intro</th>
            <th scope="col">Release_date</th>
            <th scope="col">Genre</th>
            <th scope="col">
                <a href="{{ route('movie.create') }}" class="btn btn-success">Thêm mới</a>
            </th>
        </tr>
        </thead>
        <tbody>

        @foreach($movies as $movie)
            <tr>
                <th scope="row">{{$movie->id}}</th>
                <td>{{$movie->title}}</td>
                <td>
                    <img src="{{ asset('/storage/' .$movie->poster)}}" width="70" alt="">
                </td>
                <td>{{$movie->intro}}</td>
                <td>{{$movie->release_date}}</td>
                <td>{{$movie->genre->name}}</td>
                <td class="d-flex gap-2" >
                    <a href="{{ route('movie.edit',$movie) }}" class="btn btn-warning">Edit</a>

                    <form action="{{ route('movie.destroy', $movie) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Bạn có muốn xoá không?')" type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    <a href="{{ route('movie.detail',$movie) }}" class="btn btn-info">Detail</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{$movies->links()}}
</div>
</body>
</html>




