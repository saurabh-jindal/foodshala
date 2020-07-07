<section class="story-area left-text center-sm-text">
        <div class="container" style="margin-top: 3em;">
                <div class="heading">
                        <h2>Login</h2>
                </div>

                <form action="<?php echo base_url(); ?>users/login" method="post" class="form-style-1 placeholder-1">
                        <div class="row">
                                <div class="col-md-12"> <input class="mb-20" name="email" type="email" placeholder="E-mail">  </div>
<!--								do something for email validation-->
                                <div class="col-md-12"><input class="mb-20" name="password" type="password" placeholder="Password">  </div>
                        </div><!-- row -->
                        <h6 class="center-text mtb-30"><button type="submit" class="btn-primaryc plr-25"><b>Login</b></button></h6>
                </form>
        </div><!-- container -->
</section>
