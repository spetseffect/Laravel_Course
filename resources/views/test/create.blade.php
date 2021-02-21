@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-12">
        <h1>Добавляем новый тест</h1>
    </div>
    <div class="col-12">
        <form enctype="multipart/form-data" method="post" action="">
            @csrf
            <input type="hidden" name="questions">
            <div class="form-group">
                <label for="name">Название</label>
                <input type="text" name="name" class="form-control" maxlength="150" id="name" required>
            </div>
            <div class="form-group">
                <label for="about">Краткое описание</label>
                <textarea name="about" class="form-control" maxlength="250" id="about" required></textarea>
            </div>
            <div class="form-group">
                <label for="rules">Правила прохождения</label>
                <textarea name="rules" class="form-control" maxlength="1000" id="rules" required></textarea>
            </div>
            <div class="form-group">
                <label for="interpret">Интерпретация результата</label>
                <textarea name="interpret" class="form-control" id="interpret" required></textarea>
            </div>
        </form>
    </div>
    <div class="col-12">
        <h2>Вопросы</h2>
        <ol>
            <li>
                <div class="form-group">
                    <label>
                        Текст вопроса
                        <textarea class="form-control qlist" maxlength="500"></textarea>
                    </label>
                </div>
                <button class="btn btn-info add-img">Добавить картинку</button>
                <div class="form-check">
                    <label>
                        <input class="form-check-input" type="radio" name="qlist1" value="0" checked>
                        Одиночный выбор (можно выбирать только один вариант ответа)
                    </label>
                </div>
                <div class="form-check">
                    <label>
                        <input class="form-check-input" type="radio" name="qlist1" value="1">
                        Множественный выбор (можно выбирать несколько вариантов ответа)
                    </label>
                </div>
                <h3>Варианты ответов</h3>
                <ul>
                    <li>
                        <label>
                            Текст варианта ответа
                            <textarea class="form-control qlist" maxlength="500"></textarea>
                        </label>
                        <button class="btn btn-secondary add-img">Добавить картинку</button>
                    </li>
                </ul>
                <button class="btn btn-info add-answer">Добавить вариант ответа</button>
            </li>
        </ol>
        <button class="btn btn-primary" id="add-quest">Добавить вопрос</button>
    </div>
</div>

@endsection
