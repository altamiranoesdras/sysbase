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

							<ul><li><a href="{{url("/admin/option/create/0")}}" class='text-green text-sm' data-toggle="tooltip" title="Nueva opcion"><span class="glyphicon glyphicon-plus"></span></a></li></ul>

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
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Eliminar opcion</h4>
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
	<script>
		$(function(){
			$(".btn-delete").click(function () {
				$("#form-delete").attr("action",$(this).data("action"))
			})
			$( ".sortable" ).sortable({
				update: function( event, ui ) {

					var  datos=[];
					$(this).find('li').each(function (index,elemet) {
						datos.push($(this).attr('id'));
					})


					$.ajax({
						method: 'POST',
						url: '{{url("admin/option/orden")}}',
						data: {datos:datos},
						dataType: 'json',
						success: function (res) {
							var det= res.data;
							console.log('respuesta ajax:',res)
							toastr.success(res.message);

						},
						error: function (res) {
							console.log('respuesta ajax:',res.responseJSON);

                            toastr.error(res.responseJSON.message);
						}
					})
				}
			});
			$( ".sortable" ).disableSelection();
		});
	</script>
@endpush
