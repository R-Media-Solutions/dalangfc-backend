<!-- Contact -->
<section class="page page__half contact" id="contact">
    <div class="container">
        <!-- Title -->
        <div class="page__title text-center">
        <?php if(!empty($homedata['contactpage']) && $homedata['contactpage']->status == 1) : ?>
            <h1 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.4s">
                <?php echo $homedata['contactpage']->title; ?>
            </h1>
            <p class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.8s">
                <?php echo $homedata['contactpage']->content; ?>
            </p>
            <div class="shadowTitle">
                <?php echo $homedata['contactpage']->short_name; ?>
            </div> 
        <?php endif; ?>         
        </div>

        <div class="row">
            <div class="col-sm-6">
            <!--Form-->
                <div class="contact__form wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1.2s">
                    <?php if(!empty($alert)) : ?>
                        <?php if($alert['status'] == 'success') :  ?>
                        <div class="alert alert-success">
                            <strong><?php echo $alert['message']; ?></strong>
                        </div>
                        <?php else : ?>
                        <div class="alert alert-danger">
                            <strong><?php echo $alert['message']; ?></strong>
                        </div>
                        <?php endif; ?>
                    <?php endif; ?>
                    <?php 
                        $form_action = base_url('frontend/savecontact/1');
                    ?>
                    <form action="<?php echo $form_action; ?>" role="form" method="post" class="form-horizontal" id="form_contact">
                        <div class="form__field">
                            <input type="text" name="username" id="username" placeholder="Nama" class="control" required>
                        </div>
                        <div class="form__field">
                            <input type="email" name="email" id="email" placeholder="Email" class="control" required>
                        </div>
                        <div class="form__field">
                            <input type="text" name="phone" id="phone" placeholder="Nomor Telp" class="control">
                        </div>
                        <div class="form__field">
                            <input type="text" name="company_name" id="company_name" placeholder="Nama Perusahaan" class="control">
                        </div>
                        <div class="form__field">
                            <textarea name="message" id="message" cols="30" rows="6" placeholder="Pesan Anda" class="control" required></textarea>                  
                        </div>
                        <div class="button-area">
                            <button type="submit" class="btn btn__primary">Kirim Pesan</button> 
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-5 col-sm-offset-1">
                <div class="contact__illustration wow fadeInRight" data-wow-duration="1s" data-wow-delay="1.5s">
                    <img src="<?= FE_IMG_PATH ?>svg/contact.svg" alt="">
                </div>
            </div>
        </div>
    </div>
</section>