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
		<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 card-space">
			<a href="" class="card">
				<div class="card-colored-side bg-red"></div>
				<div class="card-divider"></div>
				<div class="card-title">
					<h3 class="card-title-type">Curso</h3>
					<h1 class="card-title-name font-red">PHP Básico</h1>
				</div>
				<div class="card-stats card-category">
					<h4>Categoría</h4>
					<p>PHP</p>
				</div>
				<div class="card-stats card-stage">
					<h4>Etapas</h4>
					<p>5</p>
				</div>
				<div class="card-stats card-difficulty">
					<h4>Dificultad</h4>
					<p>Principiante</p>
				</div>
			</a>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 card-space">
			<a href="" class="card">
				<div class="card-colored-side bg-green-meadow"></div>
				<div class="card-divider"></div>
				<div class="card-title">
					<h3 class="card-title-type">Curso</h3>
					<h1 class="card-title-name font-green-meadow">Cómo crear tu propia empresa</h1>
				</div>
				<div class="card-stats card-category">
					<h4>Categoría</h4>
					<p>Negocios</p>
				</div>
				<div class="card-stats card-stage">
					<h4>Etapas</h4>
					<p>3</p>
				</div>
				<div class="card-stats card-difficulty">
					<h4>Dificultad</h4>
					<p>Avanzado</p>
				</div>
			</a>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 card-space">
			<a href="" class="card">
				<div class="card-colored-side bg-yellow-saffron"></div>
				<div class="card-divider"></div>
				<div class="card-title">
					<h3 class="card-title-type">Curso</h3>
					<h1 class="card-title-name font-yellow-saffron">Collecciones Java</h1>
				</div>
				<div class="card-stats card-category">
					<h4>Categoría</h4>
					<p>Java</p>
				</div>
				<div class="card-stats card-stage">
					<h4>Etapas</h4>
					<p>17</p>
				</div>
				<div class="card-stats card-difficulty">
					<h4>Dificultad</h4>
					<p>Intermedio</p>
				</div>
			</a>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 card-space">
			<a href="" class="card">
				<div class="card-colored-side bg-purple"></div>
				<div class="card-divider"></div>
				<div class="card-title">
					<h3 class="card-title-type">Curso</h3>
					<h1 class="card-title-name font-purple">Publicidad: Básico</h1>
				</div>
				<div class="card-stats card-category">
					<h4>Categoría</h4>
					<p>Marketing</p>
				</div>
				<div class="card-stats card-stage">
					<h4>Etapas</h4>
					<p>3</p>
				</div>
				<div class="card-stats card-difficulty">
					<h4>Dificultad</h4>
					<p>Principiante</p>
				</div>
			</a>
		</div>
	</div>
	
@stop