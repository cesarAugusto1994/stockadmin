@extends('adminlte::page')

@section('title', 'StockAdmin')

@section('content_header')
@stop

@section('content')

    @include('flash::message')

    <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Adicionar Chave</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="post" action="{{ route('save_app_code') }}">
              {{ csrf_field() }}
              <div class="box-body">
                <div class="form-group">
                  <label for="app_id" class="col-sm-2 control-label">APP ID</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" required name="app_id" id="app_id" placeholder="Informe a APP ID">
                  </div>
                </div>

                <div class="form-group">
                  <label for="app_id" class="col-sm-2 control-label">Secret Key</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" required name="secret_key" id="secret_key" placeholder="Informe uma Secret Key">
                  </div>
                </div>


              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-success">Salvar</button>
                <button type="submit" class="btn btn-default">Cancelar</button>

              </div>
              <!-- /.box-footer -->
            </form>
          </div>
@stop
