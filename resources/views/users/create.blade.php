@extends('layouts.app')

@section('title', 'Создание')

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('main') }}">Главная</a></li>
        <li class="breadcrumb-item"><a href="{{ route('user.index') }}">Студенты</a></li>
        <li class="breadcrumb-item active" aria-current="page">Ввод сведений</li>
    </ol>
</nav>

<section class="form">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Форма для ввода сведений о студенте</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('user.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="col-12 mb-3">
                                <label for="family" class="form-label">Фамилия студента:</label>
                                <input type="text" name="family" class="form-control @error('family') is-invalid @enderror" placeholder="Введите фамилию" value="{{old('family')}}">
                                @error('family')
                                    <span class="error-message" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-12 mb-3">
                                <label for="name" class="form-label">Имя студента:</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Введите имя" value="{{old('name')}}">
                                @error('name')
                                    <span class="error-message" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-12 mb-3">
                                <label for="parentname" class="form-label">Отчество студента:</label>
                                <input type="text" name="parentname" class="form-control @error('parentname') is-invalid @enderror" placeholder="Введите отчество" value="{{old('parentname')}}">
                                @error('parentname')
                                <span class="error-message" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-12 mb-3">
                                <label for="dr" class="form-label">Дата рождения:</label>
                                <input type="date" name="dr" class="form-control">
                            </div>
                            <div class="col-12 mb-3">
                                <div class="input-group">
                                    <input type="file" name="image" class="form-control" accept="image/png, image/jpeg">
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary">Создать</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection