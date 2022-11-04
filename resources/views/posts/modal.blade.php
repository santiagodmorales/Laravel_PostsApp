@extends('layout')


@section('body')


<section style=" padding: 20px 300px 20px 300px;">

<form action="{{route('store.index')}}" method="post" class="container" style="border:solid 0.5px; padding: 10px" >
@csrf

<div class="mb-3 ">
  <label for="" class="form-label"><h1>CREAR POST</h1></label> <br>
  <label for="" class="form-label"><h3>TEXTO / CONTENIDO DEL POST</h3></label>

  <textarea class="form-control form-control-lg" type="text" name="text" rows="3" placeholder="TEXTO / CONTENIDO DEL POST" required></textarea>
</div>
<button  type="submit" class="btn btn-success"><i class="bi bi-check-lg"></i> ACEPTAR</button>
<button type="button" class="btn btn-primary" onclick="window.location='{{ route("posts.index") }}'"><i class="bi bi-x"></i> Cerrar</button>
</form> 


</section>
@endsection