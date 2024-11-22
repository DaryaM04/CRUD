@extends('layouts.app')

@section('title', 'Главная')

@section('content')
    <h1>Главная страница</h1>
    <!-- почему это не как ссылка -->
    <p><a href="{{route('user.index')}}"></a>Сведения о студентах</p> 
@endsection