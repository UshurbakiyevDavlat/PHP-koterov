$(function(){
    // Обработчик нажатия на сабмит
    $('input[type=submit]').on('click',function(e){
        
        //Предотвращаем обычное поведение элемента
        e.preventDefault();

        //Формируем Джейсон  из полей формы
        var json = {
            name:$('input[name=name]').val(),
            family: $('input[name=family]').val()
        }

        //Отправляем асинхронный Пост-запрос по адресу 
        //указанному в атрибуте экш формы

        $.ajax({
            url:$('form').prop('action'),
            method: 'POST',
            data: 'json=' + JSON.stringify(json)
        })
        //
        .done(function(msg){
            $('#js-hello').html(msg);
        });
    });
});