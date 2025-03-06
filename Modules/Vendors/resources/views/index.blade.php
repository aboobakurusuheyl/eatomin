@extends('vendors::layouts.master')

@section('content')
    <h1>Hello World</h1>

    <p>Module: {!! config('vendors.name') !!}</p>
@endsection
