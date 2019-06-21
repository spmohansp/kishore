@if(Session::has('success'))
    <div class="c-alert c-alert--success alert u-mb-medium">
                    <span class="c-alert__icon">
                      <i class="feather icon-info"></i>
                    </span>
        <div class="c-alert__content">
            <h4 class="c-alert__title">
                {{ Session::get('success') }}
            </h4>
        </div>
        <button class="c-close" data-dismiss="alert" type="button">×</button>
    </div>
@endif


@if(Session::has('danger'))
    <div class="c-alert c-alert--danger alert u-mb-medium">
                    <span class="c-alert__icon">
                      <i class="feather icon-info"></i>
                    </span>
        <div class="c-alert__content">
            <h4 class="c-alert__title">
                {{ Session::get('danger') }}
            </h4>
        </div>
        <button class="c-close" data-dismiss="alert" type="button">×</button>
    </div>
@endif
@if(Session::has('update'))
    <div class="c-alert c-alert--success alert u-mb-medium">
                    <span class="c-alert__icon">
                      <i class="feather icon-info"></i>
                    </span>
        <div class="c-alert__content">
            <h4 class="c-alert__title">
                {{ Session::get('update') }}
            </h4>
        </div>
        <button class="c-close" data-dismiss="alert" type="button">×</button>
    </div>
@endif
