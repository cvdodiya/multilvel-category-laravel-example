@if(Session::has('success'))
    <div class="alert alert-success">
        <button data-dismiss="alert" class="close">&times;</button>
        {!! Session::get('success') !!}
    </div>
@elseif(Session::has('info'))
    <div class="alert alert-info">
        <button data-dismiss="alert" class="close">&times;</button>
        {!! Session::get('info') !!}
    </div>
@elseif(Session::has('danger'))
    <div class="alert alert-danger">
        <button data-dismiss="alert" class="close">&times;</button>
        {!! Session::get('danger') !!}
    </div>
@elseif(Session::has('warning'))
    <div class="alert alert-warning">
        <button data-dismiss="alert" class="close">&times;</button>
        {!! Session::get('warning') !!}
    </div>
@endif


{{--@if (count($errors) > 0)--}}
    {{--<div class="alert alert-danger">--}}
        {{--<strong>Whoops!</strong> There were some problems with your input.<br><br>--}}
        {{--<ul>--}}
            {{--@foreach ($errors->all() as $error)--}}
                {{--<li>{{ $error }}</li>--}}
            {{--@endforeach--}}
        {{--</ul>--}}
    {{--</div>--}}
{{--@endif--}}

