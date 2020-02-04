$(document).ready(function(){

    $('.js-catalog-enter-count-btn').on('click', function(){
        var element = '';
        var count = $('.js-catalog-count').val();

        if (count != '') {
            for (var i = 0; i < count; i++) {
                element += '<div class="form-group border p-2 col-4">';
                element += '<label>Заголовок</label>'
                element += '<input type="text" name="catalog-title" data-num="'+i+'" class="form-control js-settings-field-array" data-name="catalog" data-type="module-array">'
                element += '<label>Описание</label>'
                element += '<input type="text" name="catalog-desc" data-num="'+i+'" class="form-control js-settings-field-array" data-name="catalog" data-type="module-array">'
                element += '</div>';
            }
        }

        $('.js-catalog-array').html();
        $('.js-catalog-array').html(element);
    })

    $('.js-settings-save-btn').on('click', function(){
        var $settingsField = $('.js-settings-field');

        var $settingsFieldArray = $('.js-settings-field-array');
        
        var $saveBtn = $(this);
        var $progressBar = $('.js-settings-progress-bar');
        var settingsFieldKeys = {};
        var settingsFieldModule = {};
        var settingsFieldModuleArray = {};
        var settingsFieldModuleArrayKey = {};
        
        $settingsField.each(function(i,elem) {
            if ($(elem).attr('data-type') == 'field') { // Обычные поля
                settingsFieldKeys[$(elem).attr('name')] = $(elem).val();
                settingsFieldModule = {};
            }
            else if ($(elem).attr('data-type') == 'module') { // Модули
                settingsFieldModule[$(elem).attr('name')] = $(elem).val();
                settingsFieldKeys[$(elem).attr('data-name')+'-module'] = settingsFieldModule;
            }
        });

        var saveNum = 0;
        var saveModule = '';

        $settingsFieldArray.each(function(i,elem) {
            var currentModule = $(this).attr('data-name');
            var currentNum = $(this).attr('data-num');

            if (saveModule == '') // Выбор текущего модуля
                saveModule = currentModule;

            if (currentModule != saveModule) { // Если цикл прошел по модулю
                settingsFieldKeys[saveModule+'-module-array'] = settingsFieldModuleArrayKey;
                settingsFieldModuleArray = {};
                settingsFieldModuleArrayKey = {};
                saveNum = 0;
                saveModule = '';
            }

            if (currentNum != saveNum) { // Если цикл прошел по одному элементу
                saveNum++;
                settingsFieldModuleArray = {};
            }

            settingsFieldModuleArray[$(elem).attr('name')] = $(this).val(); // Запись элемента
            settingsFieldModuleArrayKey[saveNum] = settingsFieldModuleArray; // Формирование объекта по несколько элементов

        }).promise().done(function()
        { 
            settingsFieldKeys[saveModule+'-module-array'] = settingsFieldModuleArrayKey; // Сохранение в массив
        });
        
        $progressBar.show();
        $saveBtn.attr('disabled', true);

        console.log(settingsFieldKeys);


        $.ajax({
            type: "POST",
            url: "/admin/save",
            data: settingsFieldKeys
        }).done(function(result)
        {
            $progressBar.hide();
            $saveBtn.attr('disabled', false);
            console.log(result);
        });
    })
});