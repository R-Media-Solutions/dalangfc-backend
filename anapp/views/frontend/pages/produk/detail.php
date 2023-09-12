<!-- Banner Page -->
<div class="banner banner__detail">
    <h1>
        <?php echo $product_name; ?>
    </h1>
</div>

<!-- Product Detail -->
<section class="detail container">
    <div class="row">
        <div class="col-lg-8">
        <div class="product-image">
            <img src=<?php echo $img_src; ?> alt=<?php echo $data_product->slug; ?>>
        </div>
        </div>
        <div class="col-lg-4">
        <div class="product-info">
            <div class="title"><?php echo $product_name; ?></div>
            <div class="description">
            <p>
                <?php echo $data_product->short_description; ?>
            </p>
            </div>
            <div class="icon">
            <img src="<?= FE_JS_PATH ?>icon/info-2.svg" alt="">
            </div>
        </div>
        </div>
    </div>
    <div class="product-content">
        <p><?php echo $data_product->description; ?></p>
    </div>
</section>