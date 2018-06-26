@extends('layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection


@section('content')
	<div class="content">
		<div class="container-fluid">
			<!-- Content Header (Page header) -->
			<div class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h1 class="m-0 text-dark">Bienvenido</h1>
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.container-fluid -->
			</div>
			<!-- /.content-header -->

			<div class="row">
				<div class="col-lg-12">
					<div class="card card-widget widget-user">
						<!-- Add the bg color to the header using any of the bg-* classes -->
						<div class="widget-user-header text-white" style="background: url('../dist/img/photo1.png') center center;">
							<h3 class="widget-user-username">{{Auth::user()->name}}</h3>
							{{--<h5 class="widget-user-desc">Web Designer</h5>--}}
						</div>
						<div class="widget-user-image">
							<img class="img-circle" src="{{Auth::user()->imagen()}}" alt="User Avatar">
						</div>
						<div class="card-footer">
							<div class="row">
								<div class="col-sm-4 border-right">
									<div class="description-block">
										<h5 class="description-header">3,200</h5>
										<span class="description-text">SALES</span>
									</div>
									<!-- /.description-block -->
								</div>
								<!-- /.col -->
								<div class="col-sm-4 border-right">
									<div class="description-block">
										<h5 class="description-header">13,000</h5>
										<span class="description-text">FOLLOWERS</span>
									</div>
									<!-- /.description-block -->
								</div>
								<!-- /.col -->
								<div class="col-sm-4">
									<div class="description-block">
										<h5 class="description-header">35</h5>
										<span class="description-text">PRODUCTS</span>
									</div>
									<!-- /.description-block -->
								</div>
								<!-- /.col -->
							</div>
							<!-- /.row -->
						</div>
					</div>
				</div>
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container-fluid -->
	</div>
@endsection
