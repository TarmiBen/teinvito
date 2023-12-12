
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if(session()->has('message'))
    <div class="alert alert-success">
        {!! session()->get('message') !!}
    </div>
@endif
@if(session()->has('warning'))
<div class="alert alert-warning">
    {!! session()->get('warning') !!}
</div>
@endif
