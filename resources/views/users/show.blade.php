@extends('layouts.app')

@section('htmlheader_title')
	User
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0 text-dark">User</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="card" >
                                        <img class="card-img-top" src="{{Auth::user()->imagen()}}" alt="Card image cap" id="img-user">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    @include('users.show_fields')
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="form-group col-sm-12">
                <a href="{!! route('users.index') !!}" class="btn btn-default">Regresar</a>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
