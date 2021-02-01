@extends('master')

@section('css')
@endsection

@section('script')
@endsection

@section('meta')
@endsection

@section('content')

<div class="container">
  @if ($errors->any())
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
  @endif
  <form action="{{route('edit_blog',['id' => $blog->id])}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group">
      <label for="exampleFormControlInput1">Judul</label>
      <input type="text" class="form-control" id="title" placeholder="Judul Blog" name="title" value="{{$blog->title}}">
    </div>
    <div class="form-group">
      <label for="exampleFormControlTextarea1">Konten</label>
      <textarea class="form-control" id="exampleFormControlTextarea1" rows="10" name="content" value="{{$blog->content}}">{{$blog->content}}</textarea>
    </div>
    <button type="submit" class="btn btn-primary" value="submit">Submit</button>
  </form>
</div>

@endsection
