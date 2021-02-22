@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Добавляем новый тест</h1>
        </div>
        <div class="col-12">
{{--            <form name="new-test-form" enctype="multipart/form-data" method="post" action="{{ route('main.store') }}">--}}
                <input type="hidden" name="questions" id="qlist-json">
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
                    <label>
                        Группы вопросов
                        <small class="form-text text-muted">
                            Бывают тесты, в которых вопросы распределены по смысловым группам (не обязательно)
                        </small>
                    </label>
                    <ol id="qgroups"></ol>
                    <button class="btn btn-secondary" id="add-group">Добавить группу</button>
                </div>
                <div class="form-group">
                    <label for="interpret">Интерпретация результата</label>
                    <textarea name="interpret" class="form-control" id="interpret" required></textarea>
                </div>
{{--            </form>--}}
        </div>
        <div class="col-12">
            <h2>Вопросы</h2>
            <ol id="qlist">
                <li class="qlist">
                    <div class="form-group">
                        <label>
                            Текст вопроса
                            <textarea class="form-control qlist task" maxlength="500"></textarea>
                        </label>
                    </div>
                    <div class="add-img-q-task">
                        <form name="add-img-q-task"
                              class="add-img-form"
                              enctype="multipart/form-data"
                              method="post"
                              action="{{ route('main.addImg') }}">
                            @csrf
                            <input type="hidden" name="MAX_FILE_SIZE" value="1048576">
                            <input type="file" name="file" class="add-img-f">
                            <button class="btn btn-secondary add-img-btn">Добавить картинку к вопросу</button>
                        </form>
                    </div>
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
                        <li class="answer">
                            <label>
                                Текст варианта ответа
                                <textarea class="form-control qlist" maxlength="500"></textarea>
                            </label>
                            <button class="btn btn-secondary add-img-a">Добавить картинку к ответу</button>
                        </li>
                    </ul>
                    <button class="btn btn-info add-answer">Добавить вариант ответа</button>
                </li>
            </ol>
            <button class="btn btn-primary" id="add-quest">Добавить вопрос</button>
        </div>
    </div>
@endsection

@section('scriptjs')
<script type="text/javascript">
    $(function (){
        //Добавить группу
        $('#add-group').click(function (){
            $('#qgroups').append('<li>' +
                '<input type="text" class="form-control" maxlength="150">' +
                '</li>'
            );
        });
        //Добавить картинку к вопросу
        $('#qlist').on('submit.addImgTask','.add-img-form',function (e){
            e.preventDefault();
            let form=$(this);
            let wrap=form.parent('.add-img-q-task');
            let input=form.find('input.add-img-f');
            input.trigger('click');
            input.on('change',function (){
                let file = $(this)[0].files[0];
                if(file.type!=='image/png' && file.type!=='image/jpeg' && file.type!=='image/gif'){
                    alert('Этот тип файлов не поддерживается.');
                    input.val('');
                }else{
                    if(file.size>1024*1024){// max 1MB
                        alert('Слишком большой файл.');
                        input.val('');}
                    else{
                        let FD = new FormData(form.get(0));
                        $.ajax({
                            url:form.attr('action'),
                            type:'POST',
                            data: FD,
                            processData:false,
                            contentType:false,
                            error: function(jqxhr,status,msg){
                                alert('Произошла непредвиденная ошибка. Повторите попытку.');
                                console.log(status+', '+msg);
                                input.val('');},
                            success: function(a){
                                a=JSON.parse(a);
                                wrap.html('<div class="added-img-q-task">' +
                                    '<img src="'+a.fileName+'" alt="">' +
                                    '<button>&times;</button>' +
                                    '<form method="post" action="{{ route('main.delImg') }}">' +
                                        '@csrf'+
                                        '<input type="hidden" name="src" value="'+a.fileName+'">' +
                                    '</form>' +
                                    '</div>');
                            }
                        });
                    }
                }
            });
        });
        $('#qlist').on('click.delAddedImgTask','.added-img-q-task button',function (){
            let button=$(this);
            let wrap=button.parent('.added-img-q-task');
            let form=wrap.find('form');
            $.ajax({
                url:form.attr('action'),
                type:'POST',
                data: new FormData(form.get(0)),
                processData:false,
                contentType:false,
                success:function (data){
                    console.log(data);
                }
            });
        });
    });
</script>
@endsection
