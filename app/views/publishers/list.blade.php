@extends('layouts.default')

@section('content')
<h1>{{$title}}</h1>
<ul>
    @foreach($publishers as $publisher)
    <li>{{
        $publisher->name}}
        {{ Form::open(array('action' => 'delete_publisher', 'method' => 'DELETE' , 'style'=>'display:inline'))
        }}
        {{ Form::hidden('name', $publisher->name) }}
        {{ Form::submit('delete') }}
        {{ Form::close() }}
    </li>
    @endforeach
</ul>
<p>
    {{ HTML::linkRoute("new_publisher",
    "Create New Publisher") }}

</p>

@stop