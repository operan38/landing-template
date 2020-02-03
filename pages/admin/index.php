<?php
    //var_dump($_SESSION['DataStorage']);
?>
<section class="admin">

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <?php if (isset($_SESSION['Message'])) { echo $_SESSION['Message']; unset($_SESSION['Message']); } ?>
            </div>
        </div>
    </div>

    <form action="/admin/saveFile" method="POST">
        <button class="btn btn-success mt-2" type="submit"><i class="fa fa-floppy-o mr-2" aria-hidden="true"></i>Сохранить в файл</button>
    </form>
    <form action="/admin/loadFile" method="POST">
        <button class="btn btn-success mt-2" type="submit"><i class="fa fa-download mr-2" aria-hidden="true"></i>Загрузить из файла</button>
    </form>

    <?php if (!isset($_SESSION['DataStorage']) && isset($_SESSION['Admin'])) { ?>

    <form action="/admin/save" method="POST">
        <button class="btn btn-success mt-2" name="Save" type="submit"><i class="fa fa-floppy-o mr-2" aria-hidden="true"></i>Новая сессия</button>
    </form>

    <?php } else if (isset($_SESSION['Admin'])) { ?>

        <div class="container-fluid section-container">

            <div class="row">
                <div class="col-12">

                    <div class="d-flex mt-2 mb-2 align-items-center">
                        <form action="/admin/logout" method="POST">
                            <button class="btn btn-sm btn-danger mr-2" type="submit"><i class="fa fa-sign-out mr-1" aria-hidden="true"></i>Выйти</button>
                        </form>
                    </div>

                    <div class="d-flex flex-column justify-content-center mt-2 mb-2">
                        <!--<form action="/admin/save" method="POST">-->
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
                                            <input type="text" class="form-control js-settings-field" name="PageTitle" value="<?php echo $_SESSION['DataStorage']['General']['PageTitle'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Facebook метрика</label>
                                            <textarea class="form-control js-settings-field" name="FacebookMetric" rows="8"><?php echo $_SESSION['DataStorage']['General']['FacebookMetric'] ?></textarea>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="template" role="tabpanel" aria-labelledby="template-tab">
                                        <?php

                                            $template = $_SESSION['DataStorage']['Template'];

                                            $title = array('product-form-modal'=> 'Модальное окно заказа', 'center-form' => 'Центральная форма заказа', 'catalog-1col' => 'Каталог с одинм товаром',
                                            'opportunities-type-left-img-1' => 'Возможности (картинка слева, текст с кнопкой справа)', 'opportunities-type-right-img-1' => 'Возможности (картинка справа, текст слева)',
                                            'opportunities-type-left-img-2' => 'Возможности (картинка слева, текст с кнопкой справа)', 'opportunities-type-right-img-2' => 'Возможности (картинка справа, текст слева)',
                                            'catalog-6col' => 'Каталог с 6 товарами', 'catalog-3col' => 'Каталог с 3 товарами', 'gallery' => 'Галерея', 'characteristics-form' => 'Форма с характеристиками, таймером и кнопкой заказать',
                                            'why-us' => 'Почему мы?', 'certificates' => 'Сертификаты', 'video-review' => 'Видеобзор', 'how-to-order' => 'Как заказать?', 'simple-block-1' => 'Блок для вставки изображения 1',
                                            'simple-block-2' => 'Блок для вставки изображения 2', 'simple-block-3' => 'Блок для вставки изображения 3', 'reviews' => 'Отзывы', 'reviews-type-img-text' => 'Отзывы с картинками и текстом',
                                            'reviews-type-img' => 'Отзывы с картинками', 'opportunities' => 'Возможности', 'faq' => 'Часто задаваемые вопросы', 'callback-form' => 'Форма "Остались вопросы?"', 'contact-form' => 'Контакты'
                                            );

                                            foreach ($template as $key => $value) {

                                                if (!isset($title[$key]))
                                                    $title[$key] = '';

                                                echo '<div class="border">
                                                        <div class="form-row align-items-center p-2">
                                                            <div class="col-4">
                                                                <p style="font-size: 16px; font-weight: bold" class="mb-0">'.$title[$key].'</p>
                                                                <span>'.$key.'</span>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="row align-items-center">
                                                                    <div class="col-3">
                                                                        <label class="mb-0">Порядок</label>
                                                                    </div>
                                                                    <div class="col-9">
                                                                        <input type="number" name="'.$key.'-order" class="form-control js-settings-field" value="'.$value['order'].'">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="row align-items-center">
                                                                    <div class="col-4">
                                                                        <label class="mb-0">Отображать</label>
                                                                    </div>
                                                                    <div class="col-8">
                                                                        <select name="'.$key.'-active" class="form-control js-settings-field">';

                                                if ($value['active'] == '1') {
                                                    echo '<option value="0">false</option>
                                                        <option value="1" selected>true</option>';
                                                }
                                                else {
                                                    echo '<option value="0" selected>false</option>
                                                    <option value="1">true</option>';
                                                }

                                                echo'</select></div></div></div></div>';
                                                if ($value['dirAdminModule'] != '') {
                                                    include($value['dirAdminModule']);
                                                }
                                                echo'</div>';
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
                                                <input type="text" class="form-control js-settings-field" name="Email" value="<?php echo $_SESSION['DataStorage']['Send']['Email'] ?>">
                                            </div>
                                            <div class="form-group col-6">
                                                <label>Title cтраницы</label>
                                                <input type="text" class="form-control js-settings-field" name="SendPageTitle" value="<?php echo $_SESSION['DataStorage']['Send']['SendPageTitle'] ?>">
                                            </div>
                                            <div class="form-group col-6">
                                                <label>Сайт (from)</label>
                                                <input type="text" class="form-control js-settings-field" name="From" value="<?php echo $_SESSION['DataStorage']['Send']['From'] ?>">
                                            </div>
                                            <div class="form-group col-6">
                                                <label>Тема письма (subject)</label>
                                                <input type="text" class="form-control js-settings-field" name="Subject" value="<?php echo $_SESSION['DataStorage']['Send']['Subject'] ?>">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12">
                                                <h5>Форма с подарками</h5>
                                            </div>
                                            <div class="form-group col-6">
                                                <label>Отображение формы с подарками</label>
                                                <select name="isVisibleGift" class="form-control js-settings-field">
                                                    <?php
                                                        if ($_SESSION['DataStorage']['Send']['isVisibleGift'] == '1')
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
                                                <input type="text" class="form-control js-settings-field" name="SubjectGift" value="<?php echo $_SESSION['DataStorage']['Send']['SubjectGift'] ?>">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <button class="btn btn-success mt-2 js-settings-save-btn" name="Save" type="submit"><i class="fa fa-check-square-o mr-2" aria-hidden="true"></i>Применить</button>
                                <div class="progress js-settings-progress-bar mt-2 mb-2" style="display: none">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        <!--</form>-->

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
                        <form action="/admin/auth" method="POST">
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