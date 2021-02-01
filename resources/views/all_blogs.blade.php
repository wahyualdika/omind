@extends('master')

@section('css')
@endsection

@section('script')
@endsection

@section('meta')
@endsection

@section('content')
<div class="container">
  <table class="table">
  <thead>
    <tr>
      <th scope="col">Judul</th>
      <th scope="col">Deskripsi</th>
      <th scope="col">Tanggal Dibuat</th>
      <th scope="col">Pembuat</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    @foreach($blogs as $blog)
    <tr>
      <td>{{$blog->title}}</td>
      <td>{{$blog->content}}</td>
      <td>{{$blog->created_at}}</td>
      <td>{{$blog->user->name}}</td>
      <td>
        <form class="" action='{{route('delete_blog',['id' => $blog->id])}}' method="post">
        <div class='btn-group' role='group'>

            {{ csrf_field() }}
              <button type="submit" class="btn btn-danger" data-value="" value="submit">Hapus</button>

          <a href='{{route('edit_form_blog',['id' => $blog->id])}}' class='btn btn-primary' role="button">Edit</a>
        </div>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
{{ $blogs->links('vendor.pagination.bootstrap-4') }}
</div>
@endsection
