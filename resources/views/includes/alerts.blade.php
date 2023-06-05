<div id="notifications">
    @if(session('success'))
        <div class="alert alert-success">
            <strong>Successo</strong> {{ session('success') }} <i class="fa fa-check"></i>
        </div>
    @endif
</div>
<div id="error_notif">
    @if(session('error'))
        <div class="alert alert-danger">
            <strong>Erro</strong> {{ session('error') }}
        </div>
    @endif
</div>

<!--
@if($errors->any())
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        @foreach($errors->all() as $error)
             <p><strong>Erro!</strong> {{ $error}} </p>
    	@endforeach
    </div>
@endif
-->