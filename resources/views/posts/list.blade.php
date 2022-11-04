
@extends('layout')


@section('body')
<section>
  
@if (session('success'))
{{session('success')}}
@endif

<h1 style="text-shadow: 5px 0px 5px black;">Aplicación MVC</h1> <br> 
<h3>Blog de usuario</h3> <br>
<button name="newPost" type="button" class="btn btn-success" onclick="window.location='{{ route("modal-index") }}'"><i class="bi bi-plus-circle-fill" ></i> CREAR POST</button>
<br>
@foreach($datos as $dato)
<div style="text-align:center; padding: 20px 300px 20px 300px; ">
<div class="card text-center container"  >
  <div class="card text-white bg-dark mb-3">
    POST CREADO EL {{$dato->created_at}}
  </div>
  <div class="card-body">
    <h5 class="card-title">POST ID {{$dato->post_id}}</h5>
    <p class="card-text">{{$dato->text}}</p>
    <a href="#" class="btn btn-primary" id='{{$dato->post_id}}' onclick="window.location='{{ route("comments.index", $dato->post_id) }}'"><i class="bi bi-card-list" ></i> VER COMENTARIOS</a>
    
  </div>
  <div class="card-footer text-muted">
    Creado por usuario {{$dato->user_id}}
  </div>
</div>
</div>
@endforeach
</section>

@endsection


