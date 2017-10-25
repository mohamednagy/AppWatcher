@extends('adminlte::page')

@section('title', 'Apps')

@section('content_header')
    <h1>Apps
        <a href="" class="btn btn-primary pull-right" data-toggle="modal" data-target="#create-new-app">Create New App</a>
    </h1>
@stop

@section('content')
  <div class="row">
    <div class="col-md-6">
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">App Title</h3>

          <div class="box-tools pull-right">
            <a  href="" class="btn btn-box-tool" title="Settings"><i class="fa fa-cog"></i></a>
            <a  href="" class="btn btn-box-tool" title="Dashboard"><i class="fa fa-home"></i></a>
          </div>
          <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <strong>App ID</strong>

          <p class="text-muted">
            87as8d7as4das8da4d4a6sd4a8sdad44d54dasdasd
          </p>

          <hr>

          <strong>App Secret</strong>

          <p class="text-muted">
            <span class="hidder">4654ASD6S4AD654ASD65A4SD4AS6D4AS4DA5S4D</span>
          </p>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>

  </div>




  <div class="modal fade" id="create-new-app">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Create New App</h4>
        </div>
        <div class="modal-body">
            <form role="form" id="create-new-app-form">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">App Title <i class="fa fa-star text-danger"></i></label>
                  <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">App Description</label>
                  <textarea name="name" rows="4" class="form-control"></textarea>
                </div>
              </div>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>

@stop

@section('js')
    <script src="{{mix('js/App-module.js')}}"></script>
@stop
