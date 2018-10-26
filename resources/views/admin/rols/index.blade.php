@component('adminlte::layouts.app')

<div class="content">
	@include('flash::message')

	@component('components.box')
		@slot('boxTitle')
			Roles de usuario <a href="{{ url("/admin/rols/create") }}" ><button class="btn btn-success btn-sm">Nuevo</button></a>
		@endslot

		@include('admin.rols.table')
	@endcomponent
</div>

@endcomponent