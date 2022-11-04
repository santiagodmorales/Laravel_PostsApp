@extends('layout')


@section('body')


<section style=" padding: 20px 300px 20px 300px;">

<form action="{{route('images.store')}}" method="post" enctype="multipart/form-data" class="container" style="border:solid 0.5px; padding: 10px"  >
@csrf
<div class="mb-3">
  <label for="formFile" class="form-label">NUEVA IMAGEN</label>
  <input class="form-control" type="file" name='image' id="formFile">
</div>
<button id='' type="submit" class="btn btn-success"><i class="bi bi-check-lg"></i> ACEPTAR</button>
<button type="button" class="btn btn-primary" onclick="window.location='{{ route("posts.index") }}'"><i class="bi bi-x"></i> Cerrar</button>
    <input type="hidden" id="comment_id" name="comment_id" value="{{$comment_id}}">
    </div> 
    </div>
    <img src="{{Route('images.show','dCtOhLBaMaDI0rowQTyy08FvMKZIRdfR9H6hgg7F.jpg')}}" alt="">
</form> 

@foreach($images as $image)
<div>
<img src="{{asset(route('images.index',$image -> path))}}">
<img src = "{{ asset('app/storage/public/R.jpg') }}" alt="image">
<?php
echo asset('storage/R.jpg');
?>
</div>
@endforeach
</section>





@endsection