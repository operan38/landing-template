<?php 
    $galleryItemCount = 3; // Количество слайдов в галереи
?>

<section class="gallery">
    <div class="container-fluid gallery-container">
        <div class="row mb-2">
            <div class="col-12">
                <h2 class="text-center gallery-title">Галерея</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="slick-slider-gallery-wrap">
                    <div class="slick-slider-gallery">
                        <?php
                            for ($i = 1; $i <= $galleryItemCount; $i++) {
                                echo '<div class="slick-slider-gallery__item">
                                        <img data-lazy="/dist/img/gallery/'.$i.'.jpg" class="slick-slider-gallery__item-img" alt="">
                                    </div>';
                            }
                        ?>
                    </div>
                    <!--<div class="slick-slider-gallery-nav">
                        <div class="slick-slider-gallery-nav__item">
                            <img src="http://placehold.it/80x80">
                        </div>
                        <div class="slick-slider-gallery-nav__item">
                            <img src="http://placehold.it/80x80">
                        </div>
                        <div class="slick-slider-gallery-nav__item">
                            <img src="http://placehold.it/80x80">
                        </div>
                        <div class="slick-slider-gallery-nav__item">
                            <img src="http://placehold.it/80x80">
                        </div>
                        <div class="slick-slider-gallery-nav__item">
                            <img src="http://placehold.it/80x80">
                        </div>
                    </div>-->
                </div>
            </div>
        </div>
    </div>
</section>