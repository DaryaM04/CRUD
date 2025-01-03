@extends('layouts.app')

@section('title', 'Список')

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('main') }}">Главная</a></li>
        <li class="breadcrumb-item active" aria-current="page">Студенты</li>
    </ol>
</nav>
<h1>Список студентов</h1>
<section class="list">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">№</th>
                <th scope="col">Фамилия</th>
                <th scope="col">Имя</th>
                <th scope="col">Отчество</th>
                <th scope="col">Дата рождения</th>
                <th scope="col" colspan="3">Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student) 
        <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td>{{$student->family}}</td>
            <td>{{$student->name}}</td>
            <td>{{$student->parentname}}</td>
            <td>{{$student->dr}}</td>
            <td>
                <a class="btn btn-primary" href="{{ route('user.show', $student->id) }}" role="button">Просмотр</a>
            </td>
            <td>
                <a class="btn btn-primary" href="{{ route('user.edit', $student->id) }}" role="button">Изменить</a>
            </td>
            <td>
            <form action="{{ route('user.destroy', $student->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">Удалить</button>
            </form>
            </td>
        </tr>
        @endforeach 
    </tbody>
</table>
<div class="mt-3">
    <a class="btn btn-primary" href="{{ route('user.create') }}" role="button">Создать</a>
</div>
</section>
@endsection