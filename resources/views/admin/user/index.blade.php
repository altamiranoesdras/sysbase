@extends('adminlte::layouts.app')

@section('content')
	<section class="content-header">
		<h1 class="pull-left">Usuarios</h1>
		<h1 class="pull-right">
			<a class="btn btn-success pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! url("/admin/user/create") !!}">Agregar Nuevo</a>
		</h1>
	</section>
	<div class="content">
		<div class="clearfix"></div>

		<div class="clearfix"></div>
		<div class="box box-primary">
			<div class="box-body">
				@include('admin.user.table')
			</div>
		</div>
	</div>
@endsection

