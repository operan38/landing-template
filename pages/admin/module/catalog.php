<section>
    <div class="form-row align-items-center p-2">
        <div class="form-group col-12">
            <input type="hidden">
            <label>Цена</label>
            <input type="number" name="catalog-old-price" class="js-settings-field form-control" data-type="module" data-name="catalog" value="<?php echo isset($value['module']['catalog-old-price']) ? $value['module']['catalog-old-price'] : '' ?>">
        </div>
        <div class="form-group col-12">
            <input type="hidden">
            <label>Цена со скидкой</label>
            <input type="number" name="catalog-new-price" class="js-settings-field form-control" data-type="module" data-name="catalog">
        </div>
        <div class="form-group col-12">
            <input type="hidden">
            <label>Количество товаров</label>
            <input type="number" name="catalog-count" class="js-settings-field js-catalog-count form-control" data-type="module" data-name="catalog">
            <button class="btn js-catalog-enter-count-btn">Применить</button>
        </div>
        <hr>
        <div class="js-settings-field-array">
            <?php 

            ?>
            <div class="form-group js-settings-field border p-2" data-type="module-array" data-name="catalog" data-num="0">
                <label>Заголовок</label>
                <input type="text" name="catalog-title-0" class="form-control">
                <label>Описание</label>
                <input type="text" name="catalog-desc-0" class="form-control">
            </div>
            <div class="form-group js-settings-field border p-2" data-type="module-array" data-name="catalog" data-num="1">
                <label>Заголовок</label>
                <input type="text" name="catalog-title-1" class="form-control">
                <label>Описание</label>
                <input type="text" name="catalog-desc-1" class="form-control">
            </div>
        </div>
    </div>
</section>