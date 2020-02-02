<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    session_start();

    require_once('admin/settings/settings.php');
    $G_SETTINGS = Settings::load('admin/settings/');

    $PAGE_TITLE = isset($G_SETTINGS['General']['PageTitle']) ? $G_SETTINGS['General']['PageTitle'] : '';

    require_once('template/header.php'); // Подключение header

    if (!isset($G_SETTINGS) || $G_SETTINGS === NULL) {
        print('Файл data.json не найден');
        exit();
    }

    $template = $G_SETTINGS['Template'];

    foreach ($template as $value) {
        if ($value['active'] == '1') {
            include($value['dir']);
        }
    }

    /*include('template/product-form-modal.html'); // Модальное окно заказа
    include('template/center-form.html'); // Центральная форма заказа
    include('template/catalog-1col.html'); // Каталог с одинм товаром
    include('template/opportunities-type-left-img-1.html'); // Возможности (картинка слева, текст с кнопкой справа)
    include('template/opportunities-type-right-img-1.html'); // Возможности (картинка справа, текст слева)
    include('template/opportunities-type-left-img-2.html'); // Возможности (картинка слева, текст с кнопкой справа)
    include('template/opportunities-type-right-img-2.html'); // Возможности (картинка справа, текст слева)
    include('template/catalog-6col.html'); // Каталог с 6 товарами
    include('template/gallery.php'); // Галерея
    //include('template/characteristics-form.html'); // Форма с характеристиками, таймером и кнопкой заказать
    include('template/why-us.html'); // Почему мы?
    include('template/certificates.html'); // Сертификаты
    include('template/video-review.html'); // Видеобзор
    include('template/how-to-order.html'); // Как заказать?
    //include('template/simple-block-1.html'); // Блок для вставки изображения
    include('template/reviews.html'); // Отзывы
    //include('template/reviews-type-img-text.html'); // Отзывы с картинками и текстом
    //include('template/reviews-type-img.html'); // Отзывы с картинками
    include('template/opportunities.html'); // Возможности
    include('template/faq.html'); // Часто задаваемые вопросы
    include('template/callback-form.html'); // Форма 'Остались вопросы?'
    include('template/contact-form.html'); // Контакты (подвал сайта)*/



    require_once('template/footer.php'); // Подключение footer
?>