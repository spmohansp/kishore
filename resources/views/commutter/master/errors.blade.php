@if(Session::has('success'))
   <div class="alert alert-success alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <span class="c-alert__icon">
          <i class="feather icon-info"></i>
        </span>
  <strong>{{ Session::get('success') }}.</strong>
</div>
@endif


@if(Session::has('danger'))

  <div class="alert alert-danger alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <span class="c-alert__icon">
          <i class="feather icon-info"></i>
        </span>
  <strong>{{ Session::get('danger') }}.</strong>
</div>
@endif


@if(Session::has('update'))

 <div class="alert alert-success alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <span class="c-alert__icon">
          <i class="feather icon-info"></i>
        </span>
  <strong>{{ Session::get('update') }}.</strong>
</div>
@endif

@if ($errors->any())


  <div class="alert alert-danger alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <span class="c-alert__icon">
          <i class="feather icon-info"></i>
        </span>
         <h4 class="c-alert__title">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </h4>
    </div>
           
@endif
