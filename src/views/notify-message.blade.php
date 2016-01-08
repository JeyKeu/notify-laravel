@if(Session::has('jeykeu_notify'))
    <div class="notification-wrapper col col-lg-6 col-lg-offset-3 sticky-top">
        @foreach (Session::get('jeykeu_notify') as $notification)
            @if (is_array($notification->getExcludePages()) && sizeof($notification->getExcludePages()) > 0 && in_array($notification->excludePages, \URL::getRequest()->path()))
                @continue
            @endif
            <div class="alert alert-{{$notification->getType()}} @if($notification->isDismissable()) alert-dismissable @endif">
                @if ($notification->isDismissable())
                    <button type="button" class="close fa" data-dismiss="alert" aria-hidden="true">&times;</button>
                @endif
                <p>{{$notification->getMessage()}}</p>
            </div>
        @endforeach
    </div>
@endif