@extends('adminlte::layouts.app')

@section('htmlheader_title')
	User
@endsection

@section('content')
    <section class="content-header">
        <h1>
            User
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" >
                    <div class="col-sm-3">
                        @if($user->uimages->count()>0)
                            @foreach($user->uimages as $key => $image)
                                <img src="{{srcImgBynary($image)}}" alt="{{$image->name}}" class="img-responsive">
                            @endforeach
                        @else
                            <img src="{{asset('img/avatar_none.png')}}" alt="" class="img-responsive" width="100%" height="100%">
                        @endif
                    </div>
                    <div class="col-sm-9">

                        @include('users.show_fields')
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <a href="{!! route('users.index') !!}" class="btn btn-default">Back</a>
            </div>
        </div>
    </div>
@endsection
