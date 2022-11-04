@extends('layout')


@section('body')
<section>
<h1 style="text-shadow: 5px 0px 5px black;">Aplicación MVC</h1> <br> 
<h3>Blog de usuario</h3> <br>
<button name="newPost" type="button" class="btn btn-success" onclick="window.location='{{ route("modal-index") }}'"><i class="bi bi-plus-circle-fill" ></i> CREAR POST</button>
<br>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Usuario</th>
      <th scope="col">Email</th>
      <th scope="col">Updated_at</th>
      <th scope="col">Posts</th>
      <th scope="col">Comments</th>
    </tr>
  </thead>
  @foreach($datos as $dato)

  <tbody>
    <tr>
      <th scope="row">{{$dato->user_id}}</th>
      <td>{{$dato->name}}</td>
      <td>{{$dato->email}}</td>
      <td>{{$dato->updated_at}}</td>
      <td>{{$dato->posts_count}}</td>
      <td>{{$dato->comments_count</td>
      
    </tr>
    @endforeach
  </tbody>
</table>


</section>
@endsection

