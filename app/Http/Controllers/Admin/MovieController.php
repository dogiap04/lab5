<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    //hiển thị  danh sách
    public function index(Request $request){
        if ($request->search){
            $movies = Movie::OrderByDesc('id')->where('title','LIKE','%'.$request->search.'%')->paginate(10);
            var_dump($movies);die();
        }else{
            $movies = Movie::OrderByDesc('id')->paginate(10);
            
        }
        // paginate(10) số lượng mục mỗi trang
        //OrderByDesc('id') sắp xếp ID theo mới nhất
        return view('admin.movies.index',compact('movies'));

    }

    public function create(){
        $genres = Genre::all();
        return view('admin.movies.create',compact('genres'));
    }
    public function store(Request $request){

        $data = $request->except('poster');   // except: loại bỏ
        $data['poster'] = "";
        // kiểm tra file
        if($request->hasFile('poster')){
            $path_image = $request->file('poster')->store('images');
            $data['poster'] = $path_image;
        }
        // lưu data vào database
        Movie::query()->create($data);
        return redirect()->route('movie.index')->with('message','Thêm dữ liệu thành công');

    }

    //xoá bài viết
    public function destroy(Movie $movie){
        $movie->delete();
        return redirect()->route('movie.index')->with('message','Xoa dữ liêu thành công');
    }
    // hiển thị form edit
    public function edit(Movie $movie){
        $genres = Genre::all();
        return view('admin.movies.edit',compact('genres','movie'));
    }

    // cập nhật dữ liệu
    public function update(Request $request, Movie $movie){
        $data = $request->except('image');
        // xử lí hình ảnh
        $old_image = $movie->poster;
        // nguowif dùng k upload ảnh mới
        $data['poster'] = $old_image;
        // người dun upload ảnh mới
        if($request->hasFile('poster')){
            $path_image = $request->file('poster')->store('images');
            // cập nhật lại data = hình ảnh mới
            $data['poster'] = $path_image;
        }
        //update data
        $movie->update($data);

        // xoá ảnh
        if($request->hasFile('poster')){
            if (file_exists('storage/'.$old_image)){
                unlink('storage/'.$old_image);
            }
        }
        return redirect()->back()->with('message','Cập nhật dữ liệu thành công');
    }
    public function detail(Movie $movie) {
        $genres = Genre::all();
        return view('admin.movies.detail',compact('genres','movie'));
    }

}
