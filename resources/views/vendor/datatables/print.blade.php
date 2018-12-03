<!DOCTYPE html>
<html lang="en">
    <head>
        <title> @yield('htmlheader_title', config('app.name')) </title>
        <meta charset="UTF-8">
        <meta name=description content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap CSS -->
        <link href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    </head>
    <body onload="window.print()">

        <h1>{{$titulo or "Reporte"}} <small>{{$subTitulo or \Carbon\Carbon::now()}}</small></h1>
        <br>
        <table class="table table-bordered table-condensed table-striped">
            @foreach($data as $row)
                @if ($row == reset($data)) 
                    <tr>
                        @foreach($row as $key => $value)
                            <th>{!! $key !!}</th>
                        @endforeach
                    </tr>
                @endif
                <tr>
                    @foreach($row as $key => $value)
                        @if(is_string($value) || is_numeric($value))
                            <td>{!! $value !!}</td>
                        @else
                            <td></td>
                        @endif
                    @endforeach
                </tr>
            @endforeach
        </table>
    </body>
</html>
