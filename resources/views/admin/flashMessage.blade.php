@if(session('error_message'))
<div id="error_message">
    <div class="alert alert-danger alert-dismissible fade in" role="alert">
        <button aria-label="Close" class="close" data-dismiss="alert" type="button">
            <span aria-hidden="true">
                ×
            </span>
        </button>
        <p>
            {{ Session::get('error_message') }}
        </p>
    </div>
</div>
@endif

@if(session('success_message'))
<div id="success_message">
    <div class="alert alert-success alert-dismissible fade in" role="alert">
        <button aria-label="Close" class="close" data-dismiss="alert" type="button">
            <span aria-hidden="true">
                ×
            </span>
        </button>
        <p>
            {{ Session::get('success_message') }}
        </p>
    </div>
</div>
@endif

@if ($message = Session::get('error'))
<div class="alert alert-danger alert-block">
    <?php //echo "<pre>"; print_r($message);exit; ?>
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <h4>Error</h4>
    @if(is_array($message))
        @foreach ($message as $m)
            {!! $m->message !!}
        @endforeach
    @else 
        {!! $message !!}
    @endif
</div>
@endif
