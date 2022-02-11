@extends('layouts.app')
@section('title')
いいね欄
@endsection
@section('content')

@foreach($users as $user)
{{ $user -> name }}

@endforeach

@endsection