@extends("layouts.app")

@push('css')
<style>
	.sortable li {
		list-style-type: none;
	}
</style>
@endpush
@include('layouts.plugins.jquery-ui')

@section("content")

	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Administración de opciones del menu</h1>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<div class="content">
		<div class="container-fluid">
			@include('flash::message')
			<div class="row">
				<div class="col-lg-12">
					<div class="card card-warning">
						<!-- /.card-header -->
						<div class="card-body">
							<!--Contenido-->
							{!! $menu !!}

							<ul>
								<li>
									<a href="{{route('option.create',0)}}"
									   class='text-success text-sm' data-toggle="tooltip" title="Nueva opcion">
										<span class="fa fa-plus"></span>
									</a>
								</li>
							</ul>

							<!--Fin Contenido-->
						</div>
						<!-- /.card-body -->
					</div>
				</div>
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container-fluid -->
	</div>



	<div class="modal fade" id="modal-delete">
		<form action="" method="post" role="form" id="form-delete" >
			{{ csrf_field() }}
			{{method_field('DELETE')}}
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Eliminar opcion</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						Seguro que desea eliminar?
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">No</button>
						<button type="submit" class="btn btn-primary">Si</button>
					</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</form>
	</div><!-- /.modal -->

@stop
@push("scripts")
    <script src="{{asset("js/axios.min.js")}}"></script>
	<script>
		$(function(){

            $.widget.bridge('uibutton', $.ui.button);

			$(".btn-delete").click(function () {
				$("#form-delete").attr("action",$(this).data("action"))
			});

			$( ".sortable" ).sortable({
				update: function( event, ui ) {

					var  opciones=[];
					$(this).find('li').each(function (index,elemet) {
						opciones.push($(this).attr('id'));
					});

					var url = "{{route("option.order.store")}}";
					var params= { params: {opciones: opciones} };

					consolaJs(opciones,url);

					axios.get(url,params).then(response => {
						consolaJs(response.data);
						toastr.success(response.data.message);
					})
					.catch(error => {
						consolaJs(error);
					    toastr.error(error.response.message);
					});

				}
			}).disableSelection();
		});
	</script>
@endpush
