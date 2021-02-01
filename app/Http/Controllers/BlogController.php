<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    public function __construct(){
      $this->middleware('auth');
    }

    public function apiAll(Request $request){
      return view('api_list');
    }

    public function showAllBlogs(Request $request){
      $blogs = Blog::paginate(10);
      return view('all_blogs')->withBlogs($blogs);
    }

    public function formBlog(Request $request){
      return view('form_create_blog');
    }

    public function createBlog(Request $request){
      $validator = Validator::make($request->all(), [
          'title' => 'required|string',
          'content' => 'required|string',
      ]);
      if ($validator->fails()) {
          return redirect('/blog/create')->withErrors($validator, 'formBlog');
      }

      $blog = new Blog();
      $blog->title = $request->title;
      $blog->content = $request->content;
      $blog->user_id = Auth::user()->id;

      if($blog->save()){
        return redirect('/blogs');
      }
    }

    public function editFormBlog(Request $request, $id){
      $blog = Blog::findOrFail($id);
      return view('form_edit_blog')->withBlog($blog);
    }

    public function editBlog(Request $request, $id){
      $validator = Validator::make($request->all(), [
          'title' => 'string',
          'content' => 'string',
      ]);
      if ($validator->fails()) {
          return back()->withErrors($validator, 'formBlog');
      }

      $blog = Blog::findOrFail($id);
      $blog->title = $request->title;
      $blog->content = $request->content;

      if($blog->save()){
        return redirect()->route('all_blogs');
      }
    }

    public function deleteBlog(Request $request,$id){
        if(Blog::destroy($id)){
          return redirect()->route('all_blogs');
        }
    }
}
