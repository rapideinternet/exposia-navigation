@extends('exposia::index')

@section('title')
    @lang('exposia-navigation::pages.create.title')
@stop

@section('content')
    {!! Form::open(['method' => 'post', 'route' => 'admin.pages.store', 'files' => true]) !!}
        @include('exposia-navigation::pages._form')
    {!! Form::close() !!}
@stop