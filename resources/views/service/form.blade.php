@extends('admin_template')
@section('style')
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{ asset("/bower_components/AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css") }}">
@endsection
@section('header')
    <h1>
        Formulario do Serviço
        <small>Aqui você pode criar os serviços do sistema</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-globe"></i> Serviço</a></li>
        <li class="active">Formulario</li>
    </ol>
@endsection
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('service.create') }}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-gear"></i></span>
                            <input name="nome" type="text" class="form-control" placeholder="Nome do Serviço" value="{{ old('nome') }}">
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-file-image-o"></i></span>
                            <input name="icone" type="text" class="form-control" placeholder="Icone do Serviço" value="{{ old('icone') }}">
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="input-group">
                            <textarea name="descricao" class="textarea" placeholder="Descrição do serviço" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ old('descricao') }}</textarea>
                        </div>
                    </div>
                </div>
            </div><!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                <a id="btn-whois" class="btn btn-primary pull-right">Consultar Whois</a>
            </div>
        </div><!-- /.box -->
    </form>
@endsection
@section('script')
    <!-- FastClick -->
    <script src="{{ asset ('/bower_components/AdminLTE/plugins/fastclick/fastclick.js') }}"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{ asset ('/bower_components/AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
    <script>
        $(function () {
            //bootstrap WYSIHTML5 - text editor
            $(".textarea").wysihtml5();
        });
    </script>
@endsection