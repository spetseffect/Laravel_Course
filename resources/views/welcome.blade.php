@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-12">
        @if($isAdmin)
            <a href="{{ route('main.create') }}" class="btn btn-primary">Добавить новый тест</a>
        @endif
        @if(!\Illuminate\Support\Facades\Auth::user())
            <p>Проходить тесты могут только авторизированные пользователи</p>
        @endif
    </div>
    <div class="col-12">
        <table class="table">
            <thead>
                <tr>
                    <th>Название</th>
                    <th>Кол-во вопросов</th>
                    <th>Обновлён</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            @foreach($tests as $test)
                <tr>
                    <td>{{ $test->name }}</td>
                    <td>{{ $test->count_questions }}</td>
                    <td>{{ $test->updated_at }}</td>
                    <td>
                        <a href="#" class="btn btn-primary">Пройти</a>
                        <a href="#" class="btn btn-warning">Редактировать</a>
                        <a href="#" class="btn btn-danger">Удалить</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
