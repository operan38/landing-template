<?php
    session_start();
    require_once('settings/settings.php');

    if (isset($_POST['Save']) && isset($_SESSION['Admin'])) {

        $templateDir = array_diff(scandir('../template'), array('..', '.', 'header.php', 'footer.php'));

        //var_dump($templateDir);

        $templateKeys = array();

        foreach ($templateDir as $value) {
            $filename = pathinfo($value)['filename'];
            $templateKeys[$filename] = array('dir' => 'template/'.$value, 'active' => isset($_POST[$filename.'-active']) ? $_POST[$filename.'-active'] : '0', 'order' => isset($_POST[$filename.'-order']) ? $_POST[$filename.'-order'] : '99');
        }

        uasort($templateKeys, function($a, $b){
            return $a['order'] <=> $b['order'];
        });

        $sendKeys = array('Email' => isset($_POST['Email']) ? $_POST['Email'] : '',
        'SendPageTitle' => isset($_POST['SendPageTitle']) ? $_POST['SendPageTitle'] : 'Ваш заказ принят!',
        'From' => isset($_POST['From']) ? $_POST['From'] : 'sbrpc.ru',
        'Subject' => isset($_POST['Subject']) ? $_POST['Subject'] : 'Тестовый заказ',
        'isVisibleGift' => isset($_POST['isVisibleGift']) ? $_POST['isVisibleGift'] : '0',
        'SubjectGift' => isset($_POST['SubjectGift']) ? $_POST['SubjectGift'] : 'Тестовый заказ (e-mail подарок)');

        $settings = array('General' => 
        array('PageTitle' => isset($_POST['PageTitle']) ? $_POST['PageTitle'] : 'landing-template', 
              'FacebookMetric' => isset($_POST['FacebookMetric']) ? $_POST['FacebookMetric'] : ''),
        'Template' => $templateKeys,
        'Send' => $sendKeys
        );

        //var_dump($settings);

        Settings::save('settings/', $settings);

        $_SESSION['Message'] = '<div class="alert alert-success mt-1" role="alert">Изменения успешно сохранены!</div>';
        header('Location: /admin');
    }
    else {
        header('Location: /admin');
    }
?>