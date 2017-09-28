<div class="row">
    <div class="col-md-12">
        <div class="box {{ $boxType or "box-default" }}">
            <div class="box-header with-border">
                <h3 class="box-title">
                    <strong>
                        {{ $boxTitle }}
                    </strong>
                </h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>

                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

                        {{ $slot }}

            </div>
        </div><!-- /.row -->
    </div><!-- /.box-body -->
</div><!-- /.box -->
