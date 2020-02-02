<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    session_start();

    require_once('settings/settings.php');
    $G_SETTINGS = Settings::load('settings/');
    $PAGE_TITLE = isset($G_SETTINGS['General']['PageTitle']) ? $G_SETTINGS['General']['PageTitle'] . ' - admin' : '';

    require_once('../template/header.php'); // Подключение header
?>

<section class="admin">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <?php if (isset($_SESSION['Message'])) { echo $_SESSION['Message']; unset($_SESSION['Message']); } ?>
            </div>
        </div>
    </div>
    <?php if (isset($_SESSION['Admin']) && (!isset($G_SETTINGS) || $G_SETTINGS === NULL)) { ?>

    <form action="save.php" method="POST">
        <button class="btn btn-success ml-1" name="Save" type="submit"><i class="fa fa-floppy-o mr-2" aria-hidden="true"></i>Создать data.json</button>
    </form>

    <?php } else if (isset($_SESSION['Admin'])) { ?>
        <div class="container-fluid section-container">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex flex-column justify-content-center mt-2 mb-2">
                        <form action="save.php" method="POST">
                            <div class="border p-4">
                                <ul class="nav nav-tabs" id="mySettings" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="general-tab" data-toggle="tab" href="#general" role="tab" aria-controls="general" aria-selected="true"><i class="fa fa-cog mr-2" aria-hidden="true"></i>Основные</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="template-tab" data-toggle="tab" href="#template" role="tab" aria-controls="template" aria-selected="false"><i class="fa fa-bars mr-2" aria-hidden="true"></i>Шаблоны</a>
                                    </li>
                                </ul>
                                <div class="tab-content mt-2" id="mySettingsContent">
                                    <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">
                                        <div class="form-group">
                                            <label>Title страницы<span style="color: #ff0000">*</span></label>
                                            <input type="text" class="form-control" name="PageTitle" value="<?php echo $G_SETTINGS['General']['PageTitle'] ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Facebook метрика</label>
                                            <textarea class="form-control" name="FacebookMetric" rows="8"><?php echo $G_SETTINGS['General']['FacebookMetric'] ?></textarea>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="template" role="tabpanel" aria-labelledby="template-tab">
                                        <?php

                                            $template = $G_SETTINGS['Template'];

                                            foreach ($template as $key => $value) {

                                                echo '<div class="form-group">
                                                        <div class="form-row align-items-end">
                                                            <div class="col-4">
                                                                <h5>'.$key.'</h5>
                                                            </div>
                                                            <div class="col-4">
                                                                <label>Порядок</label>
                                                                <input type="text" name="'.$key.'-order" class="form-control" value="'.$value['order'].'">
                                                            </div>
                                                            <div class="col-4">
                                                                <label>Отображать</label>
                                                                <select name="'.$key.'-active" class="form-control">';

                                                if ($value['active'] == '1') {
                                                    echo '<option value="0">false</option>
                                                        <option value="1" selected>true</option>';
                                                }
                                                else {
                                                    echo '<option value="0" selected>false</option>
                                                    <option value="1">true</option>';
                                                }

                                                echo'</select></div></div></div>';
                                            }
                                        ?>
                                    </div>
                                </div>
                                <button class="btn btn-success" name="Save" type="submit"><i class="fa fa-floppy-o mr-2" aria-hidden="true"></i>Сохранить</button>
                            </div>
                        </form>

                        <div>
                            <a href="/" class="btn btn-primary mt-2"><i class="fa fa-angle-double-left mr-2" aria-hidden="true"></i>Вернуться на сайт</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } else { ?>
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-12">
                <div class="d-flex flex-column justify-content-center align-items-center">
                    <form action="auth.php" method="POST">
                        <div class="border p-5">
                            <div class="form-group">
                                <input type="text" placeholder="Логин" class="form-control" name="Login" id="authLogin" required>
                            </div>
                            <div class="form-group">
                                <input type="password" placeholder="Пароль" class="form-control" name="Password" id="authPassword" required>
                            </div>
                            <button type="submit" class="btn btn-success w-100" name="Auth">Войти</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
</section>

<?php require_once('../template/footer.php'); // Подключение footer ?>