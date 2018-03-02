<head>
    <meta charset="UTF-8">
    <title> @yield('htmlheader_title', config('app.name')) </title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


<!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('bower/font-awesome/css/font-awesome.min.css') }}">
{{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">--}}
<!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('bower/Ionicons/css/ionicons.min.css') }}">
{{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">--}}
<!-- jvectormap -->
    <link rel="stylesheet" href="{{ asset('bower/jvectormap/jquery-jvectormap.css') }}">
{{--<link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">--}}
<!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('bower/AdminLTE/dist/css/AdminLTE.min.css') }}">
{{--<link rel="stylesheet" href="dist/css/AdminLTE.min.css">--}}
<!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('bower/AdminLTE/dist/css/skins/_all-skins.min.css') }}">
{{--<link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">--}}
<!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('bower/iCheck/skins/square/_all.css') }}">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="{{ asset('bower/bootstrap/dist/css/bootstrap.min.css') }}">
{{--<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">--}}

    <!-- bootstrap-toggle -->
    <link rel="stylesheet" href="{{ asset('bower/bootstrap-toggle/css/bootstrap-toggle.min.css') }}">
    {{--<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">--}}

    <link rel="stylesheet" href="{{asset("/bower/toastr/toastr.min.css")}}">

    <!--App css -->
    <style>
        .select2-container--default .select2-selection--multiple .select2-selection__choice{
            color: #0A0A0A;
        }
        .alert {
            margin-bottom: 10px;
        }
        #toast-container > div {
            opacity:1;
        }
        .toggle.ios, .toggle-on.ios, .toggle-off.ios { border-radius: 20px; }
        .toggle.ios .toggle-handle { border-radius: 20px; }
    </style>

    <!--App css-->
    @yield('css')
    @stack('css')
    {{ $css or ''}}


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script>
        //See https://laracasts.com/discuss/channels/vue/use-trans-in-vuejs
        window.trans = @php
            // copy all translations from /resources/lang/CURRENT_LOCALE/* to global JS variable
            $lang_files = File::files(resource_path() . '/lang/' . App::getLocale());
            $trans = [];
            foreach ($lang_files as $f) {
                $filename = pathinfo($f)['filename'];
                $trans[$filename] = trans($filename);
            }
            $trans['adminlte_lang_message'] = trans('adminlte_lang::message');
            echo json_encode($trans);
        @endphp
    </script>
</head>
