@extends('master')
@section('css')
@endsection

@section('script')
@endsection

@section('meta')
@endsection

@section('content')
<div class="container">

  <div class="row">
    <div class="col">
      @if(Auth::check())
      <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Well done!</h4>
          <p>Selamat Datang {{Auth::user()->name}}</p>
          <hr>
          <p class="mb-0">Silahkan pilih "Blogs" untuk melihat semua blogmu.</p>
      </div>
      @else
      <div class="alert alert-warning" role="alert">
        <h4 class="alert-heading">Ooops!</h4>
          <p>Kamu belum login.</p>
          <hr>
          <p class="mb-0">Silahkan <a href="{{route('login')}}">Login</a>.</p>
      </div>
      @endif
    </div>
  </div>
</div>
@endsection
