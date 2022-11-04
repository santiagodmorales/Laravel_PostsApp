@extends('layouts.app')

@section('content')
<div class="container">
<div>
    <button name="btnposts" style="text-align:right important!" type="button" class="btn btn-success" onclick="window.location='{{ route("posts.index") }}'">POSTS</button>
        </div>  
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
