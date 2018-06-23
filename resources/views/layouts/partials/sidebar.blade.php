<!-- Main Sidebar Container -->
<aside class="main-sidebar elevation-4 sidebar-light-success">
    <!-- Brand Logo -->
    <a href="{{ url('/home') }}" class="brand-link bg-success">
        <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light"><b>{{config('app.name')}}</b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                @if($user->uimages->count()>0)
                    @foreach($user->uimages as $key => $image)
                        <img src="{{srcImgBynary($image)}}" alt="{{$image->name}}" class="img-circle elevation-2" alt="User Image">
                    @endforeach
                @else
                    <img src="{{ $user->email ? Gravatar::get($user->email) : asset('img/avatar_none.png') }}" class="img-circle elevation-2" alt="User Image" />
                @endif
            </div>
            <div class="info">
                <a href="{{ route('user.edit.profile',Auth::user()->id) }}" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview menu-open">
                    <a href="{{ url('dashboard') }}" class="nav-link active">
                        <i class="nav-icon fa fa-dashboard"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
            </ul>
            @super
                {!! Menu::render(OptionMenu::orderBy('orden')->get()) !!}
            @else
                {!! Menu::render(Auth::user()->opciones()->orderBy('orden')->get()) !!}
            @endsuper
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>