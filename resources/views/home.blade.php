@extends('layout')

@section('content')
    <h1 class="cover-heading">Click start to continue.</h1>
    <p class="lead">
        <a href="{{ route('companies.index') }}" class="btn btn-lg btn-secondary">Start</a>
    </p>
@endsection
