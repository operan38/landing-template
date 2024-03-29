<?php 
    include('helper/func.php');
?>

<section class="admin">

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <?php if (isset($_SESSION['message'])) { echo $_SESSION['message']; unset($_SESSION['message']); } ?>
            </div>
        </div>
    </div>

    <?php if (!isset($_SESSION['data-storage']) && isset($_SESSION['admin'])) { ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <form action="/admin/save" method="POST">
                    <button class="btn btn-success mt-2" name="Save" type="submit"><i class="fa fa-floppy-o mr-2" aria-hidden="true"></i>Новая сессия</button>
                </form>
            </div>
        </div>
    </div>

    <?php } else if (isset($_SESSION['admin'])) { ?>

        <div class="container-fluid section-container">

            <div class="row">
                <div class="col-12">

                    <div class="d-flex">
                        <form action="/admin/saveFile" method="POST">
                            <button class="btn btn-sm btn-success mr-2" type="submit"><i class="fa fa-floppy-o mr-2" aria-hidden="true"></i>Сохранить data-storage.json</button>
                        </form>
                        <form action="/admin/loadFile" method="POST">
                            <button class="btn btn-sm btn-success" type="submit"><i class="fa fa-download mr-2" aria-hidden="true"></i>Загрузить data-storage.json</button>
                        </form>
                    </div>

                    <div class="d-flex flex-column justify-content-center mt-2 mb-2">
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
                                        <input type="text" class="form-control js-settings-field" data-type="field" name="page-title" value="<?php echo $_SESSION['data-storage']['general']['page-title'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Facebook метрика</label>
                                        <textarea class="form-control js-settings-field" data-type="field" name="facebook-metric" rows="8"><?php echo $_SESSION['data-storage']['general']['facebook-metric'] ?></textarea>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="template" role="tabpanel" aria-labelledby="template-tab">
                                    <?php

                                        $template = $_SESSION['data-storage']['template'];

                                        $title = array('product-form-modal'=> 'Модальное окно заказа', 'center-form' => 'Центральная форма заказа', 'catalog-1col' => 'Каталог с одинм товаром',
                                        'opportunities-type-left-img-1' => 'Возможности (картинка слева, текст с кнопкой справа)', 'opportunities-type-right-img-1' => 'Возможности (картинка справа, текст слева)',
                                        'opportunities-type-left-img-2' => 'Возможности (картинка слева, текст с кнопкой справа)', 'opportunities-type-right-img-2' => 'Возможности (картинка справа, текст слева)',
                                        'catalog-6col' => 'Каталог с 6 товарами', 'catalog-3col' => 'Каталог с 3 товарами', 'gallery' => 'Галерея', 'characteristics-form' => 'Форма с характеристиками, таймером и кнопкой заказать',
                                        'why-us' => 'Почему мы?', 'certificates' => 'Сертификаты', 'video-review' => 'Видеобзор', 'how-to-order' => 'Как заказать?', 'simple-block-1' => 'Блок для вставки изображения 1',
                                        'simple-block-2' => 'Блок для вставки изображения 2', 'simple-block-3' => 'Блок для вставки изображения 3', 'reviews' => 'Отзывы', 'reviews-type-img-text' => 'Отзывы с картинками и текстом',
                                        'reviews-type-img' => 'Отзывы с картинками', 'opportunities' => 'Возможности', 'faq' => 'Часто задаваемые вопросы', 'callback-form' => 'Форма "Остались вопросы?"', 'contact-form' => 'Контакты',
                                        'catalog' => 'Каталог'
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
                                                                    <input type="number" data-type="field" name="'.$key.'-order" class="form-control js-settings-field" value="'.$value['order'].'">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="row align-items-center">
                                                                <div class="col-4">
                                                                    <label class="mb-0">Отображать</label>
                                                                </div>
                                                                <div class="col-8">
                                                                    <select name="'.$key.'-active" data-type="field" class="form-control js-settings-field">';

                                            if ($value['active'] == '1') {
                                                echo '<option value="0">false</option>
                                                    <option value="1" selected>true</option>';
                                            }
                                            else {
                                                echo '<option value="0" selected>false</option>
                                                <option value="1">true</option>';
                                            }

                                            echo'</select></div></div></div></div>';
                                            if ($value['dir-admin-module'] != '') {
                                                include($value['dir-admin-module']);
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
                                            <input type="text" class="form-control js-settings-field" data-type="field" name="email" value="<?php echo $_SESSION['data-storage']['send']['email'] ?>">
                                        </div>
                                        <div class="form-group col-6">
                                            <label>Title cтраницы</label>
                                            <input type="text" class="form-control js-settings-field" data-type="field" name="send-page-title" value="<?php echo $_SESSION['data-storage']['send']['send-page-title'] ?>">
                                        </div>
                                        <div class="form-group col-6">
                                            <label>Сайт (from)</label>
                                            <input type="text" class="form-control js-settings-field" data-type="field" name="from" value="<?php echo $_SESSION['data-storage']['send']['from'] ?>">
                                        </div>
                                        <div class="form-group col-6">
                                            <label>Тема письма (subject)</label>
                                            <input type="text" class="form-control js-settings-field" data-type="field" name="subject" value="<?php echo $_SESSION['data-storage']['send']['subject'] ?>">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <h5>Форма с подарками</h5>
                                        </div>
                                        <div class="form-group col-6">
                                            <label>Отображение формы с подарками</label>
                                            <select name="is-visible-gift" data-type="field" class="form-control js-settings-field">
                                                <?php
                                                    if ($_SESSION['data-storage']['send']['is-visible-gift'] == '1')
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
                                            <input type="text" class="form-control js-settings-field" data-type="field" name="subject-gift" value="<?php echo $_SESSION['data-storage']['send']['subject-gift'] ?>">
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <button class="btn btn-success mt-2 js-settings-save-btn" name="Save" type="submit">
                                <i class="fa fa-check-square-o mr-2" aria-hidden="true"></i>
                                Применить
                                <span class="spinner-border js-settings-spinner-border spinner-border-sm" role="status" aria-hidden="true" style="display: none"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    <?php } else { include('template/authForm.php'); }?>
</section>