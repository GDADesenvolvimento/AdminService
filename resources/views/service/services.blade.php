@extends('admin_template')
@section('style')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset("/bower_components/AdminLTE/plugins/datatables/dataTables.bootstrap.css") }}">
@endsection
@section('header')
    <h1>
        Serviços
        <small>Lista com todos os serviços do sistema</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-globe"></i> Domínio</a></li>
        <li class="active">Lista</li>
    </ol>
@endsection
@section('content')

    @if ( session()->has('success') )
        <div class="alert alert-success">
            <ul>
                <li>{{ session()->get('success') }}</li>
            </ul>
        </div>
    @endif
    <div class="box">
        <div class="box-body">
            <table class="tabela table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Serviço</th>
                    <th>Criado em</th>
                    <th>Alterado em</th>
                </tr>
                </thead>
                <tbody>
                @foreach($services as $service)
                    <tr>
                        <td><a href="{{ route('service.edit', ['id' => $service->id]) }}">{{$service->nome}}</a></td>
                        <td>{{ dateFormat($domain->created_at) }}</td>
                        <td>{{ dateFormat($domain->updated_at) }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div><!-- /.box-body -->
        <div class="box-footer">
            <button class="btn btn-primary" onclick="location.href='{{route('service.form')}}'">Novo Serviço</button>
        </div><!-- /.box-footer -->
    </div><!-- /.box -->
@endsection
@section('script')
    <!-- DataTables -->
    <script src="{{ asset ('/bower_components/AdminLTE/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset ('/bower_components/AdminLTE/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset ('/js/dataTables.custom.js') }}"></script>
    <!-- SlimScroll -->
    <script src="{{ asset ('/bower_components/AdminLTE/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
@endsection