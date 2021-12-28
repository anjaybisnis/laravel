
<div class="notification">

    @if(session('success'))
        <div class="alert alert-info" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <i class="icon icon-close ml-10"></i>
            </button>
          <strong>Success!</strong> {{session('success')}}
        </div>
    @endif

    @if(session('info'))
        <div class="alert alert-info" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <i class="icon icon-close ml-10"></i>
            </button>
          <strong>Info!</strong> {{session('info')}}
        </div>
    @endif

    @if(session('warning'))
        <div class="alert alert-warning" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <i class="icon icon-close ml-10"></i>
            </button>
          <strong>Warning!</strong> {{session('warning')}}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <i class="icon icon-close ml-10"></i>
            </button>
          <strong>Oh snap!</strong> {{session('error')}}
        </div>
    @endif

    <div class="ajaxNoti alert alert-info" role="alert" style="display:none;">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <i class="icon icon-close ml-10"></i>
        </button>
      <strong>Success!</strong> <span class="content"></span>
    </div>

    <div class="ajaxNoti alert alert-danger " role="alert" style="display:none;">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <i class="icon icon-close ml-10"></i>
        </button>
      <strong>Success!</strong> <span class="content"></span>
    </div>

</div>
