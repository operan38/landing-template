<?php
    if (isset($_SESSION['admin'])) {

        $generalKeys = array('page-title' => isset($_POST['page-title']) ? $_POST['page-title'] : 'landing-template', 
        'facebook-metric' => isset($_POST['facebook-metric']) ? $_POST['facebook-metric'] : '');

        $templateDir = array_diff(scandir('./template'), array('..', '.', 'header.php', 'footer.php', '.htaccess'));
        $templateKeys = array();

        foreach ($templateDir as $value) {
            $filename = pathinfo($value)['filename'];

            $module = '';
            $moduleArray = '';

            if (isset($_POST[$filename.'-module'])) {
                $module = $_POST[$filename.'-module'];

                foreach ($module as $moduleKey => $moduleValue) {
                    $newKey = substr(strstr($moduleKey, '-'), 1); // убираем нименование модуля (оставляем свойство)
                    $module[$newKey] = $module[$moduleKey];
                    unset($module[$moduleKey]);
                }
            }

            if (isset($_POST[$filename.'-module-array'])) {
                $moduleArray = $_POST[$filename.'-module-array'];

                foreach ($moduleArray as $moduleArrayKey => &$moduleArrayValue) { // ссылка на массив &
                    foreach ($moduleArrayValue as $moduleKey => $moduleValue){
                        $newKey = substr(strstr($moduleKey, '-'), 1); // убираем нименование модуля (оставляем свойство)
                        $moduleArrayValue[$newKey] = $moduleArrayValue[$moduleKey];
                        unset($moduleArrayValue[$moduleKey]);
                    }
                }
            }

            $templateKeys[$filename] = array('dir' => 'template/'.$value, 'active' => isset($_POST[$filename.'-active']) ? $_POST[$filename.'-active'] : '0', 
            'order' => isset($_POST[$filename.'-order']) ? $_POST[$filename.'-order'] : '99', 
            'dir-admin-module' => file_exists('pages/admin/module/'.$value) ? 'pages/admin/module/'.$value : '', 'module' => $module,
            'module-array' => $moduleArray);
        }

        uasort($templateKeys, function($a, $b){ // Сортировка по полю order
            return $a['order'] <=> $b['order'];
        });

        $sendKeys = array('email' => isset($_POST['email']) ? $_POST['email'] : 'test@test.ru',
        'send-page-title' => isset($_POST['send-page-title']) ? $_POST['send-page-title'] : 'Ваш заказ принят!',
        'from' => isset($_POST['from']) ? $_POST['from'] : 'sbrpc.ru',
        'subject' => isset($_POST['subject']) ? $_POST['subject'] : 'Тестовый заказ',
        'is-visible-gift' => isset($_POST['is-visible-gift']) ? $_POST['is-visible-gift'] : '0',
        'subject-gift' => isset($_POST['subject-gift']) ? $_POST['subject-gift'] : 'Тестовый заказ (e-mail подарок)');

        $settings = array('general' => $generalKeys,
        'template' => $templateKeys,
        'send' => $sendKeys
        );

        var_dump($settings);

        $_SESSION['data-storage'] = $settings;
        //header('Location: /admin');

        echo true;
    }
    else {
        header('Location: /admin');
    }
?>