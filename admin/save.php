<?php
    session_start();
    require_once('settings/settings.php');

    if (isset($_POST['Save']) && isset($_SESSION['Admin'])) {

        $templateDir = array_diff(scandir('../template'), array('..', '.', 'header.php', 'footer.php'));

        //var_dump($templateDir);

        $templateKeys = array();

        foreach ($templateDir as $value) {
            $filename = pathinfo($value)['filename'];
            $templateKeys[$filename] = array('dir' => 'template/'.$value, 'active' => isset($_POST[$filename.'-active']) ? $_POST[$filename.'-active'] : '0', 'order' => isset($_POST[$filename.'-order']) ? $_POST[$filename.'-order'] : '1');
        }

        uasort($templateKeys, function($a, $b){
            return $a['order'] <=> $b['order'];
        });

        $settings = array('General' => 
        array('PageTitle' => isset($_POST['PageTitle']) ? $_POST['PageTitle'] : 'landing-template', 
              'FacebookMetric' => isset($_POST['FacebookMetric']) ? $_POST['FacebookMetric'] : ''),
        'Template' => $templateKeys
        );

        Settings::save('settings/', $settings);

        $_SESSION['Message'] = '<div class="alert alert-success mt-1" role="alert">Изменения успешно сохранены!</div>';
        header('Location: /admin');
    }
    else {
        header('Location: /admin');
    }
?>