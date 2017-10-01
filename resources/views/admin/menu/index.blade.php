@extends("adminlte::layouts.app")

@push('css')
<style>
	.sortable li {
		list-style-type: none;
	}
</style>
@endpush

@section("content")

	<div class="content">
		@include('flash::message')

		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title"><strong>Administración de opciones del menu</strong></h3>
				<div class="box-tools pull-right">
					<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>

					<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
				</div>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<div class="row">
					<div class="col-sm-6">
						<!--Contenido-->
						{!! $menu !!}

						<ul><li><a href="{{url("/admin/option/create/0")}}" class='text-green text-sm' data-toggle="tooltip" title="Nueva opcion"><span class="glyphicon glyphicon-plus"></span></a></li></ul>

						<!--Fin Contenido-->
					</div>
				</div>
			</div>
		</div><!-- /.row -->
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
@include('layouts.bootstrap_alert_float')
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
							if(res.success){
								bootstrap_alert(res.message,'success',3000);
							}

						},
						error: function (res) {
							console.log('respuesta ajax:',res.responseJSON);

							bootstrap_alert('<strong>Error! </strong>'+res.responseJSON.message,'danger',0);
						}
					})
				}
			});
			$( ".sortable" ).disableSelection();
		});
	</script>
@endpush
