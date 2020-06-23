@extends('layout/admin')

@section('isi')

<div class="col-12 mt-5">
	<div class="card">

	    <div class="card-body">

	        <h1 class="header-title">Hi, {{Auth::user()->name}}</h1>
	    </div>
	</div>
</div>
@endsection