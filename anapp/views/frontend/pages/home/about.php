<!-- About -->
<section class="page about valign" id="about">      
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="page__title">
                <?php if(!empty($homedata['aboutuspage']) && $homedata['aboutuspage']->status == 1) : ?>
                    <h1 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.4s">
                    <?php echo $homedata['aboutuspage']->title; ?>
                    </h1>
                    <p class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
                    <?php
                        $arrData        = explode(" ", $homedata['aboutuspage']->content);
                        $arrDataText    = array();
                        $strText        = "";
                        $i=0;
                        foreach($arrData AS $value){
                            if($i > 20) continue;
                            $arrDataText[] = $value;

                            $i++;
                        }

                        if(!empty($arrDataText)){
                            $strText    = implode(" ", $arrDataText);
                            $strText    .= " ...";
                        }

                        echo $strText;
                    ?>
                    </p>
                    <div class="shadowTitle shadowTitle__2 wow fadeInDown" data-wow-duration="1s" data-wow-delay="1.3s">
                    <?php echo $homedata['aboutuspage']->short_name; ?>
                    </div>
                    <div class="button-area mt2 wow fadeInUp" data-wow-duration="1s" data-wow-delay="1.6s">
                    <a href="<?php echo base_url(); ?>about" class="btn btn__primary">Lihat Selengkapnya</a>
                    </div>
                    <?php endif;?>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="illustration wow fadeIn" data-wow-duration="1s" data-wow-delay="1.3s">
                    <img src="<?= FE_IMG_PATH ?>svg/about.svg" alt="">
                </div>
            </div>          
        </div>
    </div>
</section>