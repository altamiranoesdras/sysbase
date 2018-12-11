<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
@include('layouts.partials.htmlheader')

<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to to the body tag
to get the desired effect
|---------------------------------------------------------|
|LAYOUT OPTIONS | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    @include('layouts.partials.mainheader')

    @include('layouts.partials.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @if(Gate::allows('access-option'))
            
            @section('content')
                @include('layouts.partials.demo_content')
            @show
        @else
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col">
                            <div class="alert alert-danger alert-important"
                                 role="alert">
                                <i class="fa fa-ban"></i> <strong>  No tiene acceso a esta opción!</strong> solicite el permiso a un administrador
                            </div>

                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">

                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        @endif
    </div>
    <!-- /.content-wrapper -->

    @include('layouts.partials.controlsidebar')

    @include('layouts.partials.footer')
</div>
<!-- ./wrapper -->

@include('layouts.partials.scripts')
</body>
</html>
