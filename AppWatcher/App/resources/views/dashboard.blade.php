@extends('adminlte::page')
@section('title', 'Apps')
@section('content_header')
<h1>
    Dashboard
    <a href="{{url(Request::route('app_key').'/settings')}}" class="btn btn-primary pull-right"><i class="fa fa-cog"></i></a>
</h1>
@stop

@section('content')

<div class="col-12">
    <h3>LOGS</h3>

    <div class="col-lg-4 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-red">
        <div class="inner">
          <h3>{{isset($counts[0]) ? $counts[0]->count : 0}}</h3>

          <p>ERRORS</p>
        </div>
        <div class="icon">
          <i class="fa fa-info"></i>
        </div>
        <a href="{{url('logs?type=error')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>

    <div class="col-lg-4 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-yellow">
        <div class="inner">
          <h3>{{isset($counts[1]) ? $counts[1]->count : 0}}</h3>

          <p>Warnings</p>
        </div>
        <div class="icon">
          <i class="fa fa-warning"></i>
        </div>
        <a href="{{url('logs?type=warning')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>

    <div class="col-lg-4 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-aqua">
        <div class="inner">
          <h3>{{isset($counts[2]) ? $counts[2]->count : 0}}</h3>

          <p>Info</p>
        </div>
        <div class="icon">
          <i class="fa fa-exclamation-circle"></i>
        </div>
        <a href="{{url('logs?type=info')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
</div>


<div class="col-12">
    <div class="col-md-8">
      <logs></logs>
      <!-- /.box -->
    </div>


    <div class="col-md-4">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title"><i class="fa fa-tags"></i> TAGS</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body tag-container">
            @foreach ($tags as $tag)
                <a class="badge bg-aqua" v-on:click="Bus.$emit('log-tag-selected', '{{$tag->name}}')">
                    {{$tag->name}}
                </a>
            @endforeach
          </div>
          <!-- /.box-body -->
        </div>
    </div>
</div>



@stop

@push('js')
    <script src="{{mix('js/Logs-module.js')}}" charset="utf-8"></script>
@endpush
