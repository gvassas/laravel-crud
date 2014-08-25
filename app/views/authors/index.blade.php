@extends('layouts.default')

@section('content')
<h1>Authors Home Page</h1>
<ul>
    @foreach($authors as $author)
    <li>{{ HTML::linkRoute("author",
        $author->name,
        array($author->id)) }}
        {{ HTML::linkRoute("edit_author",
        "Update",
        array($author->id)) }}


        {{ Form::open(array('action' => 'delete_author', 'method' => 'DELETE' , 'style'=>'display:inline'))
        }}
        {{ Form::hidden('id', $author->id) }}
        {{ Form::submit('delete') }}
        {{ Form::close() }}
    </li>
    @endforeach
</ul>
<p>
    {{ HTML::linkRoute("new_author",
    "Create New Author") }}

</p>

@stop
