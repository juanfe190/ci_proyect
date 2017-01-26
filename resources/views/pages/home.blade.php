@extends('layouts.theme')

@section('page-level-plugins-css')
  <link rel="stylesheet" href="{{ elixir('css/cinnova.css') }}">
@stop

@section('page-content')
	<!--<video class="col-md-8" controls autoplay>
	  <source src="{{ $url }}" type="video/mp4">
	  Your browser does not support the video tag.
	</video>-->
	<div class="row postals-list">
		<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
			<a href="" class="postal bg-red">
				<div class="postal-difficulty">Intermedio</div>
				<h1 class="postal-title"></h1>
				<div class="row">
					<div class="postal-category col-xs-6"></div>
					<div class="postal-stages col-xs-6"></div>
				</div>
			</a>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
			<a href="" class="postal bg-blue">hola mundo</a>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
			<a href="" class="postal bg-green-sharp">hola mundo</a>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
			<a href="" class="postal bg-yellow">hola mundo</a>
		</div>
	</div>
@stop