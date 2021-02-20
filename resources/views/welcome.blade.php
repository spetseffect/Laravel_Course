@extends('layouts.app')

@section('content')
{{--            @if (Route::has('login'))--}}
{{--                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">--}}
{{--                    @auth--}}
{{--                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">Home</a>--}}
{{--                    @else--}}
{{--                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>--}}

{{--                        @if (Route::has('register'))--}}
{{--                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>--}}
{{--                        @endif--}}
{{--                    @endauth--}}
{{--                </div>--}}
{{--            @endif--}}

<div class="row">
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
                <tr>
                    <td>Test</td>
                    <td>25</td>
                    <td>2021-02-20 17:14</td>
                    <td>
                        <a href="#" class="btn btn-primary">Пройти</a>
                        <a href="#" class="btn btn-warning">Редактировать</a>
                        <a href="#" class="btn btn-danger">Удалить</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection
