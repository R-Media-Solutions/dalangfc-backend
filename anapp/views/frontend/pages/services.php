<!-- Banner Page -->
<?php 
    $home_list  = $this->Model_Home->get_home_detail();
    $img_src        = an_page_home_image($home_list['servicepage']->image, true);
?>
<?php if(!empty($home_list['servicepage']->image)) : ?>
<div class="banner banner__services" style="background: url(<?php echo $img_src; ?>) center;"></div>
<?php else : ?>
<div class="banner banner__services"></div>
<?php endif; ?>

<!-- Service -->
<section class="page service" id="services">
    <div class="container">  
        <!-- Title -->
        <div class="page__title text-center">
        <?php if(!empty($homedata['servicepage']) && $homedata['servicepage']->status == 1) : ?>
            <h1 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                <?php echo $homedata['servicepage']->title; ?>
            </h1>
            <p class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.6s">
                <?php echo $homedata['servicepage']->content; ?>
            </p>
            <div class="shadowTitle shadowTitle__5 wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1.8s">
                <?php echo $homedata['servicepage']->short_name; ?>
            </div>
        <?php endif; ?>
        </div>
        <!-- Service Item -->
        <?php if(!empty($servicesdata)) : ?>
            <?php
                $second = 0.6; 
                foreach($servicesdata AS $idx => $value) : ?>
                <div class="row wrapper">
                    <?php 
                        foreach($value AS $row) : 
                    ?>
                    <div class="col-sm-3">
                        <div class="item wow fadeInUp" data-wow-duration="1s" data-wow-delay="<?php echo $second; ?>s">
                            <div class="item__images">
                            <?php
                                $img_src        = an_services_image($row->image, true);
                            ?>
                            <img src="<?php echo $img_src; ?>" alt="">
                            </div>
                            <div class="item__title">
                                <?php echo $row->name; ?>
                            </div>  
                        </div>
                    </div>
                    <?php 
                            $second += 0.3;
                        endforeach; 
                    ?>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</section> 