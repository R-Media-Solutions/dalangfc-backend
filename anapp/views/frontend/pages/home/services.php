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
        <div class="button__area text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.4s">
            <a href="<?php base_url(); ?>services" class="btn btn__primary">Lihat semua layanan</a>
        </div>
    </div>
</section> 

<!-- Client Section-->
<section class="page page__half testimonials valign ">
    <div class="container">             
        <div class="page__title client wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.4s">
            <h1>Client trusted By</h1>
        </div>
        <div class="client-list">
        <?php if(!empty($clientlist)) : ?>
            <ul>
            <?php
                $second = 0.6; 
                foreach($clientlist AS $row) : ?>
                    <li class="item wow fadeInUp" data-wow-duration="1s" data-wow-delay="<?php echo $second; ?>s">
                        <img src="<?php echo CLIENT_IMG_PATH.$row->image; ?>" alt="">
                    </li>
                <?php 
                    $second += 0.3;
                endforeach; 
            ?>    
            </ul>
        <?php endif; ?>
        </div>
    </div>
</section>