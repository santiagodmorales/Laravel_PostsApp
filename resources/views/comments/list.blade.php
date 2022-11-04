@extends('layout')


@section('body')

<section>
<h1 style="text-shadow: 5px 0px 5px black;">Aplicación MVC</h1> <br> 
<h3>Blog de usuario</h3> <br>
@foreach($datos as $dato)
<button name="newPost" type="button"  class="btn btn-success" onclick="window.location='{{ route("Modal-index", $dato -> post_id) }}'"><i class="bi bi-plus-circle-fill" ></i> CREAR COMENTARIO</button>
<br>

<div style="text-align:center; padding: 20px 300px 20px 300px; ">
<div class="card text-center container"  >
  <div class="card text-white bg-dark mb-3">
   COMENTARIO CREADO EL {{$dato->created_at}}
  </div>
  <div class="card-body">
    <h5 class="card-title">COMENTARIO N°{{$dato->comment_id}}</h5>
    <p class="card-text">{{$dato->text}}</p>
    <div>
    <img src="{{route('images.show', "$dato->filename")}}" alt="{{$dato->path}}">
    </div>
    <img src="/storage/app/public/R.jpg" alt=""/>
  </div>
  <div>
  <a href="#" class="btn btn-primary"  onclick="window.location='{{ route("images.index", $dato -> comment_id) }}'"><i class="bi bi-card-list" ></i> Agregar imagen</a>
  </div>
  <form action="{{route('images.destroy', "$dato->filename")}}" method="POST">
    @csrf 
    @method('DELETE')
    <button class="btn btn-danger" type="submit">Eliminar imagen</button>
  </form>
  <br>
  <div class="card-footer text-muted">
    Creado por usuario {{$dato->user_id}}
  </div>
</div>
</div>

@endforeach

</section>

@endsection