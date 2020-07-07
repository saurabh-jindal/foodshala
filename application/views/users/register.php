<?php echo validation_errors(); ?>
<section class="story-area left-text center-sm-text">
        <div class="container" style="margin-top:3em;">
                <div class="heading">
                        <h2>SignUp as Customer</h2>
                </div>

                <form action="<?php echo base_url(); ?>users/register" method="post" class="form-style-1 placeholder-1">
                        <div class="row">
                                <div class="col-md-6"> <input minlength="8" maxlength="50" class="mb-20" name="name" type="text" placeholder="Name">  </div>
                                <div class="col-md-6"> <input minlength="8" maxlength="50" class="mb-20" name="email" type="email" placeholder="E-mail">  </div>
                                <div class="col-md-12"><input minlength="8" maxlength="50" class="mb-20" name="password" type="password" placeholder="Password">  </div>
                                <div class="col-md-12"><input class="mb-20" name="password2" type="password" placeholder="Confirm Password">  </div>
                                <div class="col-md-12"><label class="mb-20">Are you vegetarian ? </label><select class="form-control" name="veg"><option value="1">Yes</option><option value="0">No</option></select></div>
                        </div>
                        <h6 class="center-text mtb-30"><button type="submit" class="btn-primaryc plr-25"><b>SignUp</b></button></h6>
                </form>
        </div><!-- container -->
</section>
