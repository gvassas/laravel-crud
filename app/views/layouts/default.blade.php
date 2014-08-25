<!DOCTYPE html>
<html>
<head>
    <title>Authors and Books</title>
</head>
<body>
{{ HTML::linkRoute("author_list",
                           "Authors") }}|{{ HTML::linkRoute("publisher_list",
                                              "Publishers") }}

@yield('content')
@if(Session::has('message'))
<!-- flash message only available for one request -->
<p style="color:green;">{{ Session::get('message') }} </p>
@endif

</body>
</html>
