<!-- Banner Page -->
<?php 
    $home_list  = $this->Model_Home->get_home_detail();
    $img_src    = an_page_home_image($home_list['aboutuspage']->image, true);
?>
<?php if(!empty($home_list['aboutuspage']->image)) : ?>
<div class="banner banner__about" style="background: url(<?php echo $img_src; ?>) center;"></div>
<?php else : ?>
<div class="banner banner__about"></div>
<?php endif; ?>

<!-- About -->
<section class="page about valign" id="about">      
    <div class="container">
    <!--About Us-->
    <div class="page__title text-center">
        <h1 class="wow fadeInUp">
        Tentang Kami <br> 
        <?php echo $options['company_name']; ?>
        </h1>
    </div>
    <!--Timeline-->
    <div class="timeline">
        <?php if($data_history) : ?>
            <?php 
                $i = 1;
                $position = "left";
                foreach($data_history AS $row) : 
                    if($row->status != 1) continue;
                    if($i % 2 == 0) $position = "right";
            ?>
            <div class="wrapper <?php echo $position; ?>">
                <div class="content">
                    <div class="image">
                        <img src="<?php echo ABOUTHISTORY_IMG_PATH.$row->image; ?>" alt="">
                    </div>
                    <h2><?php echo $row->str_year_from; ?> - <?php echo $row->str_year_thru; ?></h2>
                    <p> 
                    <?php echo $row->description; ?>
                    </p>
                </div>
            </div>
            <?php
                    $i++; 
                endforeach; 
            ?>
        <?php endif; ?>
    </div>

    <div class="visi-misi mt2">
        <?php if(!empty($aboutusdata)) : ?>
            <!--Vision-->
            <?php if(!empty($aboutusdata['vision']) && $aboutusdata['vision']->status == 1) : ?>
            <h1 class="wow fadeInUp"><?php echo $aboutusdata['vision']->title; ?></h1>
            <div class="page__content">
                <p class="wow fadeInUp"><?php echo $aboutusdata['vision']->content; ?></p>
            </div>
            <?php endif;?>

            <!--Mision-->
            <?php if(!empty($aboutusdata['mision']) && $aboutusdata['mision']->status == 1) : ?>
            <h1 class="wow fadeInUp"><?php echo $aboutusdata['mision']->title; ?></h1>
            <div class="page__content wow fadeInUp">          
                <p><?php echo $aboutusdata['mision']->content; ?></p>
            </div>  
            <?php endif;?>

            <!--Description-->
            <?php if(!empty($aboutusdata['description']) && $aboutusdata['description']->status == 1) : ?>
            <h1 class="wow fadeInUp"><?php echo $aboutusdata['description']->title; ?></h1>
            <div class="page__content wow fadeInUp">          
                <p><?php echo $aboutusdata['description']->content; ?></p>
            </div>  
            <?php endif;?>
        <?php endif; ?>
    </div>
    </div>
</section>