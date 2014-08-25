@extends('layouts.default')

@section('content')
<h1>Add New Author</h1>
@include('common.author_errors')

{{ Form::open(array('action' => 'create_author', 'method' => 'POST' )) }}
<p>
    {{ Form::label('name', 'Name:')}}<br/>
    {{ Form::text('name')}}
</p>
<p>
    {{ Form::label('bio', 'Biography:')}}<br/>
    {{ Form::textarea('bio')}}
</p>
<p>
    {{Form::submit('Add Author')}}
</p>
{{Form::close()}}
@stop

