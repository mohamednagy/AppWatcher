<div class="col-md-12">
    <div class="alert alert-{{$type}} alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h4><i class="icon fa fa-check"></i> {{ucwords($type)}}!</h4>
      @if(isset($errors))
          <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
         </ul>
      @endif

      {{$slot}}
    </div>
</div>
