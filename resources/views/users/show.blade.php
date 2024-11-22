@extends('layouts.app')

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('main') }}">Главная</a></li>
        <li class="breadcrumb-item"><a href="{{ route('user.index') }}">Студенты</a></li>
        <li class="breadcrumb-item active" aria-current="page">Просмотр</li>
    </ol>
</nav>

<section class="student-info">
    <h1 class="mb-3">Информация о студенте</h1>
    <div class="row">
        <!-- Информация о студенте -->
        <div class="col-lg-7 col-md-6">
            <dl>
                <dt>Фамилия:</dt>
                <dd>{{$student->family}}</dd>
                <dt>Имя:</dt>
                <dd>{{$student->name}}</dd>
                <dt>Отчество:</dt>
                <dd>{{$student->parentname}}</dd>
                <dt>Дата рождения:</dt>
                <dd>{{$student->dr}}</dd>
            </dl>
        </div>
        <!-- Фото студента -->
        <div class="col-lg-5 col-md-6">
            <p><strong>Фото:</strong></p>
            <div style="max-width: 200px; height: 300px; border: 1px solid #797979; background-color: #c5c5c5; border-radius: 5px;">
                @if($student->image)
                <img src="{{asset('storage/'.$student->image)}}" class="img-fluid" alt="{{$student->family}}">
                @endif

            </div>
        </div>
    </div>
    <p><a href="{{ route('user.index') }}">Сведения о студентах</a></p>
</section>
@endsection