@extends('adminlte::page')
@section('title', 'Apps')
@section('content_header')
<h1>Apps
    <a href="" class="btn btn-primary pull-right" data-toggle="modal" data-target="#create-new-app">Create New App</a>
</h1> @stop @section('content')
<div class="row">
    @if($errors->any())
        @component('core::inc.alert', ['type' => 'danger', 'errors' => $errors])
        @endcomponent
    @endif
    @if(Session::has('success'))
        @component('core::inc.alert', ['type' => 'success'])
            {{Session::get('success')}}
        @endcomponent
    @endif
    @forelse (Auth::user()->apps as $app)
        <div class="col-md-6">
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">{{$app->name}}</h3>

              <div class="box-tools pull-right">
                <a href="{{url('apps/'.$app->app_key.'/settings')}}" class="btn btn-box-tool" title="Settings"><i class="fa fa-cog"></i></a>
                <a href="{{url('apps/'.$app->app_key.'/dashboard')}}" class="btn btn-box-tool" title="Dashboard"><i class="fa fa-home"></i></a>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong>App ID</strong>

              <p class="text-muted">
                {{$app->app_key}}
              </p>

              <hr>

              <strong>App Secret</strong>

              <p class="text-muted">
                <span class="hidder">{{$app->app_secret}}</span>
              </p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
    @empty
        @component('core::inc.alert', ['type' => 'info'])
            You don't have any apps yet, start create your Apps <a href="" data-toggle="modal" data-target="#create-new-app">Create New App</a>
        @endcomponent
    @endforelse

</div>




<div class="modal fade" id="create-new-app">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" id="create-new-app-form" action="{{url('apps')}}" method="post">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Create New App</h4>
        </div>
        <div class="modal-body">
          <input type="hidden" name="_token" value="{{csrf_token()}}">
          <div class="box-body">
            <div class="form-group">
              <label for="exampleInputEmail1">App Title <i class="required">*</i></label>
              <input type="text" name="name" class="form-control" id="exampleInputEmail1" required>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">App Description</label>
              <textarea name="description" rows="4" class="form-control"></textarea>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Create App</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

@stop @section('js')
<script src="{{mix('js/App-module.js')}}"></script>
@stop
