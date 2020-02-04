<section>
    <div class="form-row align-items-center p-2">
        <div class="form-group col-12">
            <label>Цена</label>
            <input type="number" name="catalog-old-price" class="js-settings-field form-control" data-type="module" data-name="catalog" value="<?php echo isset($value['module']['old-price']) ? $value['module']['old-price'] : '' ?>">
        </div>
        <div class="form-group col-12">
            <input type="hidden">
            <label>Цена со скидкой</label>
            <input type="number" name="catalog-new-price" class="js-settings-field form-control" data-type="module" data-name="catalog" value="<?php echo isset($value['module']['old-price']) ? $value['module']['new-price'] : '' ?>">
        </div>
        <div class="form-group col-12">
            <input type="hidden">
            <label>Количество товаров</label>
            <input type="number" name="catalog-count" class="js-settings-field js-catalog-count form-control" data-type="module" data-name="catalog" value="<?php echo isset($value['module']['count']) ? $value['module']['count'] : '' ?>">
            <button class="btn btn-success mt-2 js-catalog-enter-count-btn">Применить</button>
        </div>
        <hr>
    </div>
    <div class="form-row align-items-center p-2 js-catalog-array">
        <?php
            //print_r($value['module-array']);
            for ($i = 0; $i < count($value['module-array']); $i++) {
                echo '<div class="form-group border col-4 p-2">
                <label>Заголовок</label>
                <input type="text" name="catalog-title" data-num="'.$i.'" class="form-control js-settings-field-array" data-name="catalog" data-type="module-array" value="'.$value['module-array'][$i]['title'].'">
                <label>Описание</label>
                <input type="text" name="catalog-desc" data-num="'.$i.'" class="form-control js-settings-field-array" data-name="catalog" data-type="module-array" value="'.$value['module-array'][$i]['desc'].'">
                </div>';
            }
        ?>
        <!--<div class="form-group border p-2">
            <label>Заголовок</label>
            <input type="text" name="catalog-title" data-num="0" class="form-control js-settings-field-array" data-name="catalog" data-type="module-array">
            <label>Описание</label>
            <input type="text" name="catalog-desc" data-num="0" class="form-control js-settings-field-array" data-name="catalog" data-type="module-array">
        </div>
        <div class="form-group border p-2">
            <label>Заголовок</label>
            <input type="text" name="catalog-title" data-num="1" class="form-control js-settings-field-array" data-name="catalog" data-type="module-array">
            <label>Описание</label>
            <input type="text" name="catalog-desc" data-num="1" class="form-control js-settings-field-array" data-name="catalog" data-type="module-array">
        </div>
        <div class="form-group border p-2">
            <label>Заголовок</label>
            <input type="text" name="catalog-title" data-num="2" class="form-control js-settings-field-array" data-name="catalog" data-type="module-array">
            <label>Описание</label>
            <input type="text" name="catalog-desc" data-num="2" class="form-control js-settings-field-array" data-name="catalog" data-type="module-array">
        </div>-->
    </div>
</section>