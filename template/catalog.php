<section class="catalog mb-3" id="catalog">
    <div class="container-fluid section-container">
        <div class="row">
            <div class="col">
                <h2 class="text-center catalog-title">Каталог</h2>
                <p class="text-center">Описание....</p>
            </div>
        </div>
        <div class="row">
            <?php

            $catalog = isset($_SESSION['DataStorage']['Template']['catalog']) ? $_SESSION['DataStorage']['Template']['catalog'] : '';

            if ($catalog != '') {

                for ($i = 0; $i < $catalog['module']['count']; $i++) {

                    echo '<div class="col12 col-lg-4">
                        <div class="custom-card">
                            <div class="custom-card__title js-catalog-card__title" data-id="1" data-price="999">
                                '.$catalog['module-array'][$i]['title'].'
                            </div>
                            <div class="custom-card__img">
                                <img src="/dist/img/catalog/1.jpg" alt="">
                            </div>
                            <div>
                                <div class="custom-card__desc">
                                    '.$catalog['module-array'][$i]['desc'].'
                                </div>
                                <ul class="custom-card__list">
                                    '.$catalog['module-array'][$i]['characteristic'].'
                                    <!--<li><span>Цвет:</span> 123456</li>
                                    <li><span>Размер:</span> 123456</li>
                                    <li><span>Материал:</span> 123456</li>-->
                                </ul>
                                <div class="custom-card__order-price">
                                    <p class="custom-card__order-price__old-price">'.$catalog['module']['old-price'].'₽</p>
                                    <p class="custom-card__order-price__new-price">'.$catalog['module']['new-price'].'₽</p>
                                </div>
                                <button class="btn custom-card__btn js-catalog-card__btn-order" data-toggle="modal" data-target="#productFormModal">
                                    Заказать
                                </button>
                            </div>
                        </div>
                    </div>';
                }
            }

            ?>
            <!--<div class="col12 col-lg-4">
                <div class="custom-card">
                    <div class="custom-card__title js-catalog-card__title" data-id="1" data-price="999">
                        Тестовый товар 1
                    </div>
                    <div class="custom-card__img">
                        <img src="/dist/img/catalog/1.jpg" alt="">
                    </div>
                    <div>
                        <div class="custom-card__desc">
                            Описание... test test  test test test test test test test test test test test test
                        </div>
                        <ul class="custom-card__list">
                            <li><span>Цвет:</span> 123456</li>
                            <li><span>Размер:</span> 123456</li>
                            <li><span>Материал:</span> 123456</li>
                        </ul>
                        <div class="custom-card__order-price">
                            <p class="custom-card__order-price__old-price">2 999₽</p>
                            <p class="custom-card__order-price__new-price">999₽</p>
                        </div>
                        <button class="btn custom-card__btn js-catalog-card__btn-order" data-toggle="modal" data-target="#productFormModal">
                            Заказать
                        </button>
                    </div>

                </div>
            </div>-->
        </div>
</section>