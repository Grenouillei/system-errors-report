
    $(document).ready(function (){
        $('.js-reports-form').trigger('input');
    });

    $(document).on('click','.js-model-delete',function (event){
        event.preventDefault();
        remove($(this).data('route'));
    });

    function remove(route){
        $.ajax({
            url:  route,
            method: 'delete',
            dataType: 'json',
            contentType: 'application/json; charset=utf-8',
            headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
        }).done( function (response){
            if (response.status)
                window.history.back();
        }).error(function (){
            //do something
        });
    }

    $(document).on('input','.js-reports-form',function (e){
        e.preventDefault();
        $.ajax({
            url:  $(this).data('action'),
            method: 'get',
            dataType: 'json',
            data: $(this).serialize(),
            contentType: 'application/json; charset=utf-8',
            headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
        }).done( function (response){
            setContent(response);
        });
    });

    $(document).on('click','.js-exactly-content',function (){
        var exactly = $(this);
        $.ajax({
            url:  $(this).data('action'),
            method: 'get',
            dataType: 'json',
            data: {id: $(this).data('id')},
            contentType: 'application/json; charset=utf-8',
            headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
        }).done( function (response){
            if (exactly.data('open') == false){
                exactly.closest('tr').after(response.content);
                exactly.html('<b>-</b>');
                exactly.data('open',true);
            }
            else {
                var trs = exactly.closest('tr').nextAll('tr');
                    $.each(trs,function(index,value){
                        if (!$(value).hasClass('js-main')){
                            $(value).remove();
                        }else{
                            return false;
                        }

                    });
                exactly.html('<b>+</b>');
                exactly.data('open',false);
            }
        });
    });

    $(document).on('click','.js-reports-clear',function (e){
        e.preventDefault();
        $.ajax({
            url:  $('.js-reports-form').data('action'),
            method: 'get',
            dataType: 'json',
            contentType: 'application/json; charset=utf-8',
            headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
        }).done( function (response){
            setContent(response);
        });
    });


    function setContent(response){
        data.labels = [];
        data.datasets[0].data = [];
        data.datasets[0].backgroundColor = [];
        Object.keys(response.charts)
            .forEach(function eachKey(key) {
                data.labels.push(key);
                data.datasets.forEach(element =>  element.data.push(response.charts[key].count));
                data.datasets.forEach(element =>  element.backgroundColor.push(response.charts[key].color));
            });
        if (response.content)
            $('.reports-table').html(response.content);
        else
            $('.reports-table').html('');
        myChart.update();
    }
