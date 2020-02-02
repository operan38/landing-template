<?php

session_start();

require_once('admin/settings/settings.php');
$G_SETTINGS = Settings::load('admin/settings/');

if (!isset($G_SETTINGS) || $G_SETTINGS === NULL) {
    print('Файл data.json не найден');
    exit();
}

$PAGE_TITLE = $G_SETTINGS['Send']['SendPageTitle'];; // <title> Страницы

$email = $G_SETTINGS['Send']['Email']; // Почта
$from = $G_SETTINGS['Send']['From']; // Сайт
$subject = $G_SETTINGS['Send']['Subject']; // Тема письма
$catalogTitle = 'Товар'; // Наименование из каталога
// ----------
$subjectGift = $G_SETTINGS['Send']['SubjectGift']; // Тема письма для формы с подарками
$isVisibleGift = (bool)$G_SETTINGS['Send']['isVisibleGift']; // Отображение формы с подарками
// ----------
$isVisibleSpecialOffers3col = false; // Отображение специальных предложений true = отображать, false = скрыть. (3 товара)
$isVisibleSpecialOffers2col = false; // Отображение специальных предложений true = отображать, false = скрыть. (2 товара)

$headers  =  'MIME-Version: 1.0' . "\r\n";
$headers .=  'Content-type: text/html; charset=UTF-8' . "\r\n";
$headers .=  'To: <'.$email.'>, '."\r\n";
$headers .=  'From: <'.$from.'>' . "\r\n";

/*if(empty($_POST['product']))
    $_POST['product'] = 'Не указан';

$message = "
    <p>".$catalogTitle.': '.$_POST['product']."</p>
    <p>Имя: ".$_POST['Name']."</p>
    <p>Телефон: ".$_POST['Phone']."</p>
    <p>IP-адрес посетителя: ".@$_SERVER['REMOTE_ADDR']."</p>";*/

if (!empty($_POST['email'])) {
    mail($email, $subjectGift, $_POST['email'], $headers);
    header('Location: /');
}

$content = '';

//if (!empty($_POST['Name']) && !empty($_POST['Phone'])) {

    require_once('template/header.php');

    $content =
    '
    <style type="text/css">
        body {
            background-color: #EDEDED;
        }
    </style>
    <section>
        <section class="send mb-3">
            <div class="container-fluid section-container">
                <div class="row text-center">
                    <div class="col-12">
                        <div>
                            <h1 class="send-title">Спасибо, Ваш заказ принят!</h1>
                            <p class="send-desc">Наш оператор свяжется с вами в течение 30 минут</p>
                        </div>
                        <!--<div>
                            <p class="send-contact__title">Вы указали следующие контактные данные:</p>
                            <ul class="send-contact__list">
                                <li class="send-contact__list-item"><span>Имя:</span> '.$_POST['Name'].'</li>
                                <li class="send-contact__list-item"><span>Телефон:</span> '.$_POST['Phone'].'</li>
                                <li class="send-contact__list-item"><span>'.$catalogTitle.':</span> '.$_POST['product'].'</li>
                            </ul>
                        </div>-->
                        <div>
                            <!--<p class="send-desc-btn">Если вы допустили ошибку, вернитесь на сайт и оставьте заказ еще раз</p>-->
                            <div class="mt-2">
                                <a href="/" class="btn btn-success">Вернуться</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>';
        
        if ($isVisibleSpecialOffers3col) { // 3 товара
            $content .=
            '<section class="special-offers">
                <div class="container-fluid">
                    <div class="row no-gutters mb-3">
                        <div class="col-12">
                            <div class="special-offers__container-title text-center">
                                <p class="special-offers__title">Для новых клиентов у нас есть эксклюзивные предложения!</p>
                                <p class="special-offers__subtitle">С индивидуальной скидкой вы можете заказать следующие товары:</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid section-container">
                    <div class="row">
                        <div class="col-12 col-lg-4">
                            <div class="custom-card special-offers-card">
                                <div class="custom-card__title">
                                    Спец товар 1
                                </div>
                                <div class="custom-card__img">
                                    <img src="/dist/img/special-offers/1.jpg">
                                </div>
                                <div>
                                    <div class="custom-card__desc">
                                        Описание... test test  test test test test test test test test test test test test
                                    </div>
                                    <ul class="custom-card__list">
                                        <li>Цвет: 123456</li>
                                        <li>Размер: 123456</li>
                                        <li>Материал: 123456</li>
                                    </ul>
                                    <div class="custom-card__order-price">
                                        <p class="custom-card__order-price__old-price">2 999Р</p>
                                        <p class="custom-card__order-price__new-price">999Р</p>
                                    </div>
                                    <a class="btn btn-success w-100" style="color: #fff" href="/">
                                        Заказать
                                    </a>
                                </div>
            
                            </div>
                        </div>

                        <div class="col-12 col-lg-4">
                            <div class="custom-card special-offers-card">
                                <div class="custom-card__title">
                                    Спец товар 2
                                </div>
                                <div class="custom-card__img">
                                    <img src="/dist/img/special-offers/2.jpg">
                                </div>
                                <div>
                                    <div class="custom-card__desc">
                                        Описание... test test  test test test test test test test test test test test test
                                    </div>
                                    <ul class="custom-card__list">
                                        <li>Цвет: 123456</li>
                                        <li>Размер: 123456</li>
                                        <li>Материал: 123456</li>
                                    </ul>
                                    <div class="custom-card__order-price">
                                        <p class="custom-card__order-price__old-price">2 999Р</p>
                                        <p class="custom-card__order-price__new-price">999Р</p>
                                    </div>
                                    <a class="btn btn-success w-100" style="color: #fff" href="/">
                                        Заказать
                                    </a>
                                </div>
            
                            </div>
                        </div>

                        <div class="col-12 col-lg-4">
                            <div class="custom-card special-offers-card">
                                <div class="custom-card__title">
                                    Спец товар 3
                                </div>
                                <div class="custom-card__img">
                                    <img src="/dist/img/special-offers/3.jpg">
                                </div>
                                <div>
                                    <div class="custom-card__desc">
                                        Описание... test test  test test test test test test test test test test test test
                                    </div>
                                    <ul class="custom-card__list">
                                        <li>Цвет: 123456</li>
                                        <li>Размер: 123456</li>
                                        <li>Материал: 123456</li>
                                    </ul>
                                    <div class="custom-card__order-price">
                                        <p class="custom-card__order-price__old-price">2 999Р</p>
                                        <p class="custom-card__order-price__new-price">999Р</p>
                                    </div>
                                    <a class="btn btn-success w-100" style="color: #fff" href="/">
                                        Заказать
                                    </a>
                                </div>
            
                            </div>
                        </div>
                    </div>
                </div>
            <section>';
        }

        if ($isVisibleSpecialOffers2col) { // 2 товара
            $content .=
            '<section class="special-offers">
                <div class="container-fluid">
                    <div class="row no-gutters mb-3">
                        <div class="col-12">
                            <div class="special-offers__container-title text-center">
                                <p class="special-offers__title">Для новых клиентов у нас есть эксклюзивные предложения!</p>
                                <p class="special-offers__subtitle">С индивидуальной скидкой вы можете заказать следующие товары:</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid section-container">
                    <div class="row justify-content-center">
                        <div class="col-12 col-lg-4">
                            <div class="custom-card special-offers-card">
                                <div class="custom-card__title">
                                    Спец товар 1
                                </div>
                                <div class="custom-card__img">
                                    <img src="/dist/img/special-offers/1.jpg">
                                </div>
                                <div>
                                    <div class="custom-card__desc">
                                        Описание... test test  test test test test test test test test test test test test
                                    </div>
                                    <ul class="custom-card__list">
                                        <li>Цвет: 123456</li>
                                        <li>Размер: 123456</li>
                                        <li>Материал: 123456</li>
                                    </ul>
                                    <div class="custom-card__order-price">
                                        <p class="custom-card__order-price__old-price">2 999Р</p>
                                        <p class="custom-card__order-price__new-price">999Р</p>
                                    </div>
                                    <a class="btn btn-success w-100" style="color: #fff" href="/">
                                        Заказать
                                    </a>
                                </div>
            
                            </div>
                        </div>

                        <div class="col-12 col-lg-4">
                            <div class="custom-card special-offers-card">
                                <div class="custom-card__title">
                                    Спец товар 2
                                </div>
                                <div class="custom-card__img">
                                    <img src="/dist/img/special-offers/2.jpg">
                                </div>
                                <div>
                                    <div class="custom-card__desc">
                                        Описание... test test  test test test test test test test test test test test test
                                    </div>
                                    <ul class="custom-card__list">
                                        <li>Цвет: 123456</li>
                                        <li>Размер: 123456</li>
                                        <li>Материал: 123456</li>
                                    </ul>
                                    <div class="custom-card__order-price">
                                        <p class="custom-card__order-price__old-price">2 999Р</p>
                                        <p class="custom-card__order-price__new-price">999Р</p>
                                    </div>
                                    <a class="btn btn-success w-100" style="color: #fff" href="/">
                                        Заказать
                                    </a>
                                </div>
            
                            </div>
                        </div>

                    </div>
                </div>
            <section>';
        }

        if ($isVisibleGift) {
            $content .= '<section class="gift-form mb-3">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col">
                            <h2 class="gift-form__title text-center">Подарки для Вас!</h2>
                            <p class="gift-form__text">Пожалуйста, оставьте Ваш e-mail и&nbsp;будьте в&nbsp;курсе проводимых акций и&nbsp;получайте подарки</p>
                            <div class="js-mail_wrap">
                                <form method="POST">
                                    <input type="email" name="email" placeholder="Электронная почта" required class="form-control mb-2">
                                    <button type="submit" class="btn btn-success w-100">ПОЛУЧИТЬ ПОДАРОК</button>	
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>';
        }

        $content .='</section>
    ';

    echo $content;

    //$mail = mail($email, $subject, $message, $headers);

    require_once('template/footer.php');
/*}
else if (empty($_POST['email'])) {
    echo 'Не указано имя или номер телефона';
}*/

?>