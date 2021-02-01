@extends('master')

@section('css')
@endsection

@section('script')
@endsection

@section('meta')
@endsection

@section('content')

<div class="container">
  <form action="{{route('create_blog')}}" method="post" enctype="multipart/form-data">
    @if ($errors->any())
     <div class="alert alert-danger">
         {{ $errors->formBlog->first('title') }}
         {{ $errors->formBlog->first('title') }}
     </div>
     @endif
    {{ csrf_field() }}
    <div class="form-group">
      <label for="exampleFormControlInput1">Judul</label>
      <input type="text" class="form-control" id="title" placeholder="Judul Blog" name="title">
    </div>
    <div class="form-group">
      <label for="exampleFormControlTextarea1">Konten</label>
      <textarea class="form-control" id="exampleFormControlTextarea1" rows="10" name="content"></textarea>
    </div>
    <button type="submit" class="btn btn-primary" value="submit">Submit</button>
  </form>
</div>

@endsection
