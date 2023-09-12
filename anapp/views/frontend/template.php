<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title><?= TITLE ?> | <?php echo $title; ?></title>
    <meta name="robots" content="" />
    <meta name="copyright" content="" />
    <meta name="author" content="" />
    <meta name="robots" content="index,follow" />
    <meta name="googlebot" content="" />
    
    <meta name="description" content="Leading Sector Industri Alat Kesehatan dan Medis di Indonesia">
    <meta name="keywords" content="alat kesehatan, alat medis, kosmetik, skin care, industri kesehatan, farmasi">
    <meta content="<?= LOGO_IMG ?>" name="og:image">

    <!-- Open Graph / Facebook -->
    <meta property="og:description" , content="" />
    <meta property="og:site_name" , content="Official Site of <?= TITLE ?>" />
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?= base_url() ?>">
    <meta property="og:title" content="<?= TITLE ?>">
    <meta property="og:description" content="">
    <meta property="og:image" content="<?= LOGO_IMG ?>">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="<?= base_url() ?>">
    <meta property="twitter:title" content="<?= TITLE ?>">
    <meta property="twitter:description" content="">
    <meta property="twitter:image" content="<?= LOGO_IMG ?>">

    <link rel="icon" type="image/x-icon" href="<?= FAVICON ?>" />
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@100;300;400;700&amp;display=swap" rel="stylesheet">

    <!-- Facebook Pixel Code -->
    <script>
        ! function(f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '12345678910');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=12345678910&ev=PageView&noscript=1" /></noscript>
    <!-- End Facebook Pixel Code -->
    
    <link rel="shortcut icon" href="<?= FE_IMG_PATH ?>favicon.png" type="image/x-icon">
    
    <!-- CSS -->
    <link type="text/css" rel="stylesheet" href="<?= FE_CSS_PATH ?>style.css" />
    <link type="text/css" rel="stylesheet" href="<?= FE_CSS_PATH ?>animate.min.css" />
    <link type="text/css" rel="stylesheet" href="<?= FE_JS_PATH ?>slick/slick.css">
    <link type="text/css" rel="stylesheet" href="<?= FE_JS_PATH ?>slick/slick-theme.css">

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
</head>

<body>
    <!--Header-->
    <?php 
        $segment    = $this->uri->segment('1');
        $home_list  = $this->Model_Home->get_home_detail();

        
        $classHeader = "header--transparent";
        if($segment != 'home' && $segment != ''){
          $classHeader = "header--transparent fixed";
        }
    ?>
    <div class="header header--transparent">
      <div class="container">    
        <nav>
            <div class="logo">
                <a href="<?= base_url() ?>"><img src="<?= FE_IMG_PATH ?>logo.png" alt=""></a>
            </div>
          
            <!-- Main Navigation -->
            <?php $this->load->view(VIEW_FRONT . 'components/nav.php'); ?>

            <!--Hamburger Menu-->
            <div class="visible-xs menu__mobile">
                <div id="nav-icon1">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </nav>      
      </div>
    </div>

    <!--Content -->
    <?php $this->load->view(VIEW_FRONT . $main_content); ?>

    <!-- Footer -->
    <footer class="footer page__half valign">
      <div class="container">
        <div class="row footer__content">
          <div class="col-sm-4 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.8s">
            <div class="brand">
              <div class="logo">
                <img src="<?= FE_IMG_PATH ?>logo.png" alt="">
              </div>
              <p>Perusahaan industri Farmasi dan Alat Laboratorium di Indonesia yang terpercaya berdasarkan pada inovasi produk yang berkualitas.                
              </p>
            </div>  
          </div>
          <div class="col-sm-8">
            <div class="details">
              <div class="row subinfo">
                <div class="col-sm-5 item wow fadeInUp" data-wow-duration="1s" data-wow-delay="1.1s">
                  <div class="item__title">
                    Hubungi Kami
                  </div>
                  <div class="item__desc">          
                      <ul>
                        <li><?php echo $options['company_address']; ?></li> 
                        <li><a href="tel:<?php echo $options['company_phone']; ?>"><?php echo $options['company_phone']; ?></a></li>   
                        <li><a href="mailto:<?php echo $options['company_email']; ?>"><?php echo $options['company_email']; ?></a></li>                  
                      </ul>   
                  </div>
                </div>
                <div class="col-sm-4 item wow fadeInUp" data-wow-duration="1s" data-wow-delay="1.4s">
                  <div class="item__title">
                    Produk
                  </div>
                  <div class="item__desc">
                    <ul>
                      <?php if(!empty($products)) : ?>
                        <?php 
                          $i=1;
                          foreach($products AS $row) : 
                            $id             = an_encrypt($row->id);
                            if($i > 5) break;

                            echo $strProduct = "
                              <li>
                                <a href=".base_url()."product/detail/".$id.">".$row->name."</a>
                              </li>
                            ";
                            $i++;
                          endforeach; 
                        ?>
                      <?php endif; ?>
                    </ul>
                  </div>
                </div>
                <div class="col-sm-3 item wow fadeInUp" data-wow-duration="1s" data-wow-delay="1.7s">
                  <div class="item__title">
                    Bidang Usaha
                  </div>
                  <div class="item__desc">
                    <ul>
                      <?php if(!empty($serviceslist)) : ?>
                        <?php 
                          $i=1;
                          foreach($serviceslist AS $row) : 
                            if($i > 5) break;
                        ?>
                          <li><a href="<?php echo base_url('services'); ?>"><?php echo $row->name; ?></a></li>
                        <?php 
                            $i++;
                          endforeach; 
                        ?>
                      <?php endif; ?>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="copyright">
            <p>Copyright 2022. Powered By <a href="http://elevendigital.id" target="_blank"> Eleven Digital ID</a>. All Right Reserved.</p>
        </div>
      </div>
    </footer>

    <!--Back to Top-->
    <div class="backtop">
      <img src="<?= FE_IMG_PATH ?>svg/arrow-up.svg" alt="">
    </div>

    <!-- Plugin Js -->
    <script src="<?= FE_JS_PATH ?>jquery.min.js"  type="text/javascript"></script>
    <script src="<?= FE_JS_PATH ?>slick/slick.min.js"  type="text/javascript"></script>
    <script src="<?= FE_JS_PATH ?>wow.min.js" type="text/javascript"></script>
    <script src="<?= FE_JS_PATH ?>isotope.pkgd.min.js" type="text/javascript"></script>
    <script src="<?= FE_JS_PATH ?>main.js"  type="text/javascript"></script>

    <?php if($segment == 'home' || $segment == '') : ?>
    <script type="text/javascript">
      console.log('tes');
      //Back To Top
      $(window).scroll(function(){		
          if ($(this).scrollTop() >= 10){
              $('.backtop').fadeIn(300);
              $('.header').addClass("fixed");
              console.log('tes');
          } else{
              $('.backtop').fadeOut(300);	
              $('.header').removeClass("fixed");
          }
      });
    </script>
    <?php else : ?>
    <script type="text/javascript">
        //Back To Top
        $('.header').addClass("fixed");
        $(window).scroll(function(){		
          if ($(this).scrollTop() >= 10){
              $('.backtop').fadeIn(300);
              console.log('tes');
          } else{
              $('.backtop').fadeOut(300);	
          }	
        });
    </script>
    <?php endif; ?>

    <!-- Isotope Filter-->
    <script>    
        var $grid = $('.tab-content').isotope({
            itemSelector: '.tab-content__item',
            layoutMode: 'fitRows'
            });
            
            // Function Click Filter
            $('.tab').on("click", function(){

            // Active Tab
            $('.tab').removeClass('active');
            $(this).addClass('active');

            var value = $(this).attr('data-filter');
            $grid.isotope({
                filter: value
            })
        })
    </script>
</body>
</html>