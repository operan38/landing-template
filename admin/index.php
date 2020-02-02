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
                                    <li class="nav-item">
                                        <a class="nav-link" id="send-tab" data-toggle="tab" href="#send" role="tab" aria-controls="send" aria-selected="false"><i class="fa fa-paper-plane mr-2" aria-hidden="true"></i>Отправка письма</a>
                                    </li>
                                </ul>
                                <div class="tab-content mt-2" id="mySettingsContent">
                                    <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">
                                        <div class="form-group">
                                            <label>Title страницы</label>
                                            <input type="text" class="form-control" name="PageTitle" value="<?php echo $G_SETTINGS['General']['PageTitle'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Facebook метрика</label>
                                            <textarea class="form-control" name="FacebookMetric" rows="8"><?php echo $G_SETTINGS['General']['FacebookMetric'] ?></textarea>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="template" role="tabpanel" aria-labelledby="template-tab">
                                        <?php

                                            $template = $G_SETTINGS['Template'];

                                            $description = array('product-form-modal'=> 'Модальное окно заказа', 'center-form' => 'Центральная форма заказа', 'catalog-1col' => 'Каталог с одинм товаром',
                                            'opportunities-type-left-img-1' => 'Возможности (картинка слева, текст с кнопкой справа)', 'opportunities-type-right-img-1' => 'Возможности (картинка справа, текст слева)',
                                            'opportunities-type-left-img-2' => 'Возможности (картинка слева, текст с кнопкой справа)', 'opportunities-type-right-img-2' => 'Возможности (картинка справа, текст слева)',
                                            'catalog-6col' => 'Каталог с 6 товарами', 'catalog-3col' => 'Каталог с 3 товарами', 'gallery' => 'Галерея', 'characteristics-form' => 'Форма с характеристиками, таймером и кнопкой заказать',
                                            'why-us' => 'Почему мы?', 'certificates' => 'Сертификаты', 'video-review' => 'Видеобзор', 'how-to-order' => 'Как заказать?', 'simple-block-1' => 'Блок для вставки изображения 1',
                                            'simple-block-2' => 'Блок для вставки изображения 2', 'simple-block-3' => 'Блок для вставки изображения 3', 'reviews' => 'Отзывы', 'reviews-type-img-text' => 'Отзывы с картинками и текстом',
                                            'reviews-type-img' => 'Отзывы с картинками', 'opportunities' => 'Возможности', 'faq' => 'Часто задаваемые вопросы', 'callback-form' => 'Форма "Остались вопросы?"', 'contact-form' => 'Контакты'
                                            );

                                            foreach ($template as $key => $value) {

                                                if (!isset($description[$key]))
                                                    $description[$key] = '';

                                                echo '<div class="border">
                                                        <div class="form-row align-items-center p-2">
                                                            <div class="col-4">
                                                                <p style="font-size: 18px; font-weight: bold" class="mb-0">'.$key.'</p>
                                                                <span>'.$description[$key].'</span>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="row align-items-center">
                                                                    <div class="col-3">
                                                                        <label class="mb-0">Порядок</label>
                                                                    </div>
                                                                    <div class="col-9">
                                                                        <input type="number" name="'.$key.'-order" class="form-control" value="'.$value['order'].'">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="row align-items-center">
                                                                    <div class="col-4">
                                                                        <label class="mb-0">Отображать</label>
                                                                    </div>
                                                                    <div class="col-8">
                                                                        <select name="'.$key.'-active" class="form-control">';

                                                if ($value['active'] == '1') {
                                                    echo '<option value="0">false</option>
                                                        <option value="1" selected>true</option>';
                                                }
                                                else {
                                                    echo '<option value="0" selected>false</option>
                                                    <option value="1">true</option>';
                                                }

                                                echo'</select></div></div></div></div></div>';
                                            }
                                        ?>
                                    </div>
                                    <div class="tab-pane fade" id="send" role="tabpanel" aria-labelledby="send-tab">
                                        <div class="row">
                                            <div class="col-12">
                                                <h5>Основные настройки</h5>
                                            </div>
                                            <div class="form-group col-6">
                                                <label>E-mail</label>
                                                <input type="text" class="form-control" name="Email" value="<?php echo $G_SETTINGS['Send']['Email'] ?>">
                                            </div>
                                            <div class="form-group col-6">
                                                <label>Title cтраницы</label>
                                                <input type="text" class="form-control" name="SendPageTitle" value="<?php echo $G_SETTINGS['Send']['SendPageTitle'] ?>">
                                            </div>
                                            <div class="form-group col-6">
                                                <label>Сайт (from)</label>
                                                <input type="text" class="form-control" name="From" value="<?php echo $G_SETTINGS['Send']['From'] ?>">
                                            </div>
                                            <div class="form-group col-6">
                                                <label>Тема письма (subject)</label>
                                                <input type="text" class="form-control" name="Subject" value="<?php echo $G_SETTINGS['Send']['Subject'] ?>">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <h5>Форма с подарками</h5>
                                            </div>
                                            <div class="form-group col-6">
                                                <label>Отображение формы с подарками</label>
                                                <select name="isVisibleGift" class="form-control">
                                                    <?php
                                                        if ($G_SETTINGS['Send']['isVisibleGift'] == '1')
                                                            echo '<option value="0">false</option>
                                                            <option value="1" selected>true</option>';
                                                        else
                                                            echo '<option value="0" selected>false</option>
                                                            <option value="1">true</option>';
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-6">
                                                <label>Тема письма (subject)</label>
                                                <input type="text" class="form-control" name="SubjectGift" value="<?php echo $G_SETTINGS['Send']['SubjectGift'] ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-success mt-2" name="Save" type="submit"><i class="fa fa-floppy-o mr-2" aria-hidden="true"></i>Сохранить</button>
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