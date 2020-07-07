<?php echo validation_errors(); ?>
<section class="story-area left-text center-sm-text">
        <div class="container" style="margin-top:3em;">
                <div class="heading">
                        <h2>SignUp as Restaurant</h2>
                </div>

                <form action="<?php echo base_url(); ?>users/register_restaurant" method="post" class="form-style-1 placeholder-1">
                        <div class="row">
                                <div class="col-md-6"> <input class="mb-20" name="name" type="text" placeholder="Name of Restaurant">  </div>
                                <div class="col-md-6"> <input class="mb-20" name="email" type="email" placeholder="E-mail">  </div>
                                <div class="col-md-12"><input class="mb-20" name="password" type="password" placeholder="Password">  </div>
                                <div class="col-md-12"><input class="mb-20" name="password2" type="password" placeholder="Confirm Password">  </div>
                        </div>
                        <h6 class="center-text mtb-30"><button type="submit" class="btn-primaryc plr-25"><b>SignUp</b></button></h6>
                </form>
        </div><!-- container -->
</section>
