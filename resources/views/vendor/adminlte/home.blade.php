@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection


@section('content')
	<div class="content">
		{{--@include('flash::message')--}}
		<div class="row">
			<div class="col-md-12">

				<!-- Default box -->
				<div class="box box-primary ">
					<div class="box-body">
						<h3 class="box-title">
							Bienvenido
							<b class="text-primary">{{Auth::user()->name}}</b>
							@usernoops
							<small>No tiene ninguna opción asignada, pida a un administrador que le asigne</small>
							@endusernoops
						</h3>
					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->
			</div>
		</div>
	</div>
@endsection
