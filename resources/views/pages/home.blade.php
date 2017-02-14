@extends('layouts.theme')

@section('page-level-plugins-css')
  <link rel="stylesheet" href="{{ elixir('css/cinnova.css') }}">
@stop

@section('page-content')
	<!--<video class="col-md-8" controls autoplay>
	  <source src="{{ $url }}" type="video/mp4">
	  Your browser does not support the video tag.
	</video>-->
	<div class="row">
		<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
			<a href="" class="card">
				<div class="card-colored-side bg-red"></div>
			</a>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
			<a href="" class="card">
				<div class="card-colored-side bg-green-meadow"></div>
			</a>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
			<a href="" class="card">
				<div class="card-colored-side bg-yellow-saffron"></div>
			</a>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
			<a href="" class="card">
				<div class="card-colored-side bg-purple"></div>
			</a>
		</div>
	</div>
	
@stop