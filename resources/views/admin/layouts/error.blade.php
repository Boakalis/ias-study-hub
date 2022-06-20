@if(Session::has('message'))
    <div class="alert alert-{{ Session::get('message-type') }} alert-dismissable">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
        <i class="glyphicon glyphicon-{{ Session::get('message-type') == 'success' ? 'ok' : 'remove'}}"></i> {{ Session::get('message') }}
    </div>
@endif

@foreach (['danger', 'warning', 'success', 'info'] as $msg) @if(Session::has('alert-' . $msg))
<div class="alert alert-success alert-dismissible fade show alert-{{ $msg }}" role="alert">
    <strong></strong>{{ Session::get('alert-' . $msg) }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
</div>
@endif @endforeach @if (Session::has('error_message'))
<div class="alert alert-danger fade show" role="alert">
    {{Session::get('error_message')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
