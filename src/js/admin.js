$(document).ready(function(){

    $('.js-catalog-enter-count-btn').on('click', function(){
        
    })

    $('.js-settings-save-btn').on('click', function(){
        var $settingsField = $('.js-settings-field');
        
        var $saveBtn = $(this);
        var $progressBar = $('.js-settings-progress-bar');
        var settingsFieldKeys = {};
        var settingsFieldModule = {};

        var settingsFieldModuleArray = {};
        var settingsFieldModuleArrayKey = {};
        var settingsFieldModuleArrayNum = 0;
        
        $settingsField.each(function(i,elem) {
            if ($(elem).attr('data-type') == 'field') { // Обычные поля
                settingsFieldKeys[$(elem).attr('name')] = $(elem).val();
                settingsFieldModule = {};
                settingsFieldModuleArray = {};
                settingsFieldModuleArrayKey = {};
            }
            else if ($(elem).attr('data-type') == 'module') { // Модули
                settingsFieldModule[$(elem).attr('name')] = $(elem).val();
                settingsFieldKeys[$(elem).attr('data-name')+'-module'] = settingsFieldModule;
            }
            else if ($(elem).attr('data-type') == 'module-array') {
                /*settingsFieldModuleArrayKey[$(elem).attr('name')] = $(elem).val();


                settingsFieldModuleArray[$(elem).attr('data-num')] = settingsFieldModuleArrayKey;

                settingsFieldKeys[$(elem).attr('data-name')+'-module-array'] = settingsFieldModuleArray;*/
            }
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