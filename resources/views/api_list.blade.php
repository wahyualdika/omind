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
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Route</th>
      <th scope="col">Respone</th>
      <th scope="col">Method</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>server_name <:port>/login</td>
      <td>Autentikasi user</td>
      <td>post</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>server_name<:port>/blogs</td>
      <td>Tampilkan semua blog</td>
      <td>get</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>server_name<:port>/blog/create</td>
      <td>Simpan data blog baru</td>
      <td>post</td>
    </tr>
    <tr>
      <th scope="row">4</th>
      <td>server_name<:port>/blog/update/{id}</td>
      <td>Ubah data blog dengan id tertentu</td>
      <td>post</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>server_name<:port>/blog/delete/{id}</td>
      <td>Hapus data blog dengan id tertentu</td>
      <td>post</td>
    </tr>
  </tbody>
  </table>
</div>
@endsection
