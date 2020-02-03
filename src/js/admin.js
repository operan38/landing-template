$(document).ready(function(){

    $('.js-catalog-enter-count-btn').on('keydown', function(){
        console.log('1234')
    })

    $('.js-settings-save-btn').on('click', function(){
        var $settingsField = $('.js-settings-field');
        var $saveBtn = $(this);
        var $progressBar = $('.js-settings-progress-bar');
        var settingsFieldKeys = {};
        
        $settingsField.each(function(i,elem) {
            settingsFieldKeys[$(elem).attr('name')] = $(elem).val();
        });

        $progressBar.show();
        $saveBtn.attr('disabled', true);

        console.log(settingsFieldKeys);

        $.ajax({
            type: "POST",
            url: "/admin/save",
            data: $settingsField
        }).done(function(result)
        {
            $progressBar.hide();
            $saveBtn.attr('disabled', false);
            console.log(result);
        });
    })
});