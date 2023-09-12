<!-- Product-->
<section class="page case-study" id="product">
    <div class="container">
        <!-- Title -->
        <div class="page__title text-center">
        <?php if(!empty($homedata['productpage']) && $homedata['productpage']->status == 1) : ?>
            <h1 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.4s">
            <?php echo $homedata['productpage']->title; ?>
            </h1>
            <p class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.8s">
            <?php echo $homedata['productpage']->content; ?>
            </p>
            <div class="shadowTitle shadowTitle__3 wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.4s">
                <?php echo $homedata['productpage']->short_name; ?>
            </div>
        <?php endif; ?>   
        </div> 
        <div class="project wow fadeInUp" data-wow-duration="1s" data-wow-delay="1.2s">
        <?php if(!empty($products)) : ?>
            <?php foreach($products AS $row) : ?>
            <?php
                $id             = an_encrypt($row->id);
                $id_category    = $row->id_category;
                $category       = an_strong(ucwords($row->category));
                $img_src        = an_product_image($row->image, true);

                echo $strProduct = "
                    <div class='project__item'>
                        <a href='".base_url()."/product/detail/".$id."'>
                            <div class='project__images'>
                                <img src='".$img_src."' alt='".$row->slug."'>
                            </div>
                            <div class='project__title'>
                                <h3>".$row->name."</h3>
                                <p>".$row->short_description."</p>
                            </div>
                        </a>
                    </div>
                ";
            ?>
            <?php endforeach; ?>
        <?php endif; ?>
        </div>
        <div class="button__area text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.4s">
            <a href="<?php base_url(); ?>product" class="btn btn__primary">Lihat semua produk</a>
        </div>
    </div>
</section>