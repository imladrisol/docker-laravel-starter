@extends('layouts.app')

@section('content')
    @if(Session::has('success'))
        <div class="alert alert-success">{{Session::get('success')}}</div>
    @endif

    <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading"><span class="glyphicon glyphicon-cog"></span><h1>{{$title}}</h1></div>

        @yield('table_view')

        <!--Pagination of results-->
        @yield('pagination')
    </div>

@endsection
