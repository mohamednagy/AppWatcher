@extends('adminlte::page')
@section('title', 'Apps')
@section('content_header')
<h1>
    Dashboard
    <a href="{{url(Request::route('app_name').'/settings')}}" class="btn btn-primary pull-right"><i class="fa fa-cog"></i></a>
</h1>
@stop

@section('content')

<div class="col-12">
    <h3>LOGS</h3>

    <div class="col-lg-4 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-red">
        <div class="inner">
          <h3>250</h3>

          <p>ERRORS</p>
        </div>
        <div class="icon">
          <i class="fa fa-info"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>

    <div class="col-lg-4 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-yellow">
        <div class="inner">
          <h3>150</h3>

          <p>Warnings</p>
        </div>
        <div class="icon">
          <i class="fa fa-warning"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>

    <div class="col-lg-4 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-aqua">
        <div class="inner">
          <h3>250</h3>

          <p>Info</p>
        </div>
        <div class="icon">
          <i class="fa fa-exclamation-circle"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
</div>


<div class="col-12">
    <div class="col-md-8">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"><i class="fa fa-bars"></i> LATEST LOGS</h3>

          <div class="box-tools">
            <ul class="pagination pagination-sm no-margin pull-right">
              <li><a href="#">&laquo;</a></li>
              <li><a href="#">1</a></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">&raquo;</a></li>
            </ul>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body no-padding">
          <table class="table">
            <tr>
              <th>Log</th>
              <th style="width: 150px">Time</th>
              <th style="width: 40px">Type</th>
            </tr>
            <tbody>
                <tr>
                  <td>a logged text from your first app</td>
                  <td>
                    2017-10-29 10:15:11
                  </td>
                  <td><span class="badge bg-red">Error</span></td>
                </tr>
                <tr>
                  <td>a logged text from your first app</td>
                  <td>
                    2017-10-29 10:15:11
                  </td>
                  <td><span class="badge bg-yellow">Warning</span></td>
                </tr>
                <tr>
                  <td>a logged text from your first app</td>
                  <td>
                    2017-10-29 10:15:11
                  </td>
                  <td><span class="badge bg-aqua">Info</span></td>
                </tr>
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>


    <div class="col-md-4">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title"><i class="fa fa-tags"></i> TAGS</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <a class="badge bg-aqua">
                <span class="badge bg-white">100</span> Tag1
            </a>

            <a class="badge bg-aqua">
                <span class="badge bg-white">100</span> Tag1
            </a>

            <a class="badge bg-aqua">
                <span class="badge bg-white">100</span> Tag1
            </a>

            <a class="badge bg-aqua">
                <span class="badge bg-white">100</span> Tag1
            </a>
          </div>
          <!-- /.box-body -->
        </div>
    </div>
</div>



@stop
