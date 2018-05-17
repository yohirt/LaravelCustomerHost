@extends('layouts.app');

@section('title', $site->title);

@section('content') 

    <h1>
        {{$site->title}}
    </h1>
    <div>
        {{$site->description}}
    </div>
@endsection