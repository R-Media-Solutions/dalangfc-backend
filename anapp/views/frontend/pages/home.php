<?php 
    $home_list  = $this->Model_Home->get_home_detail();
    $img_src    = an_page_home_image($home_list['homepage']->image, true);
?>
<!--Cover-->
<section class="page cover" id="home">
    <!--Content-->      
    <div class="content">
        <div class="container">
            <div class="row valign">
                <div class="col-lg-6 col-sm-6">              
                    <div class="tagline">
                    <?php if(!empty($homedata['homepage']) && $homedata['homepage']->status == 1) : ?>
                        <h1 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="">
                            <?php echo $homedata['homepage']->title; ?>
                        </h1>
                        <p class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.4s">
                            <?php echo $homedata['homepage']->content; ?>
                        </p>
                        <div class="shadowTitle shadowTitle__1 wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.4s">
                            <?php echo $homedata['homepage']->short_name; ?>
                        </div>
                    <?php endif; ?>
                    </div>
                    <div class="button-area">
                    <a href="#about" class="btn btn__primary wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.8s" style="visibility: visible; animation-duration: 1s; animation-delay: 0.8s; animation-name: fadeInUp;">Explore Lebih Jauh</a>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6">
                    <div class="hero wow fadeIn" data-wow-duration="1s" data-wow-delay="0.8s">
                    <div class="hero round-1">
                        <?php if(!empty($home_list['homepage']->image)) : ?>
                            <img src="<?php echo $img_src; ?>">
                        <?php else: ?>
                            <img src="<?= FE_IMG_PATH ?>hero-banner.png">
                        <?php endif; ?>
                    </div>
                    </div>
                </div>                
            </div>
            
            <!--Social-->
            <div class="social hidden-xs">
            <ul>
                <li><a href="<?php echo $options['twitter_link']; ?>" target="blank"><img src="<?= FE_IMG_PATH ?>icon/twitter.svg" alt=""></a></li>
                <li><a href="<?php echo $options['facebook_link']; ?>" target="blank"><img src="<?= FE_IMG_PATH ?>icon/facebook.svg" alt=""></a></li>
                <li><a href="<?php echo $options['instagram_link']; ?>" target="blank"><img src="<?= FE_IMG_PATH ?>icon/instagram.svg" alt=""></a></li>
            </ul>
            </div>
        </div>  
    </div>
    
    <!--Scroll Down-->
    <div id="scrollMouse">
        <div class="mouse" id="view-initiatives-button">
            <div class="wheel"></div>
        </div>
    <div>
        <span class="unu"></span> 
        <span class="doi"></span> 
        <span class="trei"></span>
    </div>
    </div>  
</section>
<?php 
    $home_list  = $this->Model_Home->get_home_detail();
?>
<?php if(!empty( $home_list)) : ?>
    <!--Content About -->
    <?php if($home_list['aboutuspage']->status == 1): ?>
    <?php $this->load->view(VIEW_FRONT . 'pages/home/about.php'); ?>
    <?php endif; ?>

    <!--Content Product -->
    <?php if($home_list['productpage']->status == 1): ?>
    <?php $this->load->view(VIEW_FRONT . 'pages/home/product.php'); ?>
    <?php endif; ?>

    <!--Content Services -->
    <?php if($home_list['servicepage']->status == 1): ?>
    <?php $this->load->view(VIEW_FRONT . 'pages/home/services.php'); ?>
    <?php endif; ?>

    <!--Content Contact -->
    <?php if($home_list['contactpage']->status == 1): ?>
    <?php $this->load->view(VIEW_FRONT . 'pages/home/contact.php'); ?>
    <?php endif; ?>
<?php endif; ?>