<section>
        <div class="container" style="margin-top: 3em;">
                <div class="heading mb-sm-10"><h3>Orders</h3></div>
				<?php foreach ($orders as $key => $order) : ?>
                        <div class="col-md-12">
                                <div class="sided-90x mb-30">
                                        <div class="s-left"><img class="br-3" src="<?php echo base_url(); ?>assets/images/menu-5-120x120.jpg" alt="Menu Image"></div><!--s-left-->
                                        <div class="s-right">
                                                <h5 class="mb-10"><b><?php echo $foodname[$key]; ?></b><b class="color-primary float-right">Rs. <?php echo $foodprice[$key]; ?></b></h5>
                                                <p class="pr-70">Customer Name : <?php echo $uname[$key]; ?></p>
                                                <p class="pr-70">Customer Email : <?php echo $email[$key]; ?></p>
                                        </div><!--s-right-->
                                </div><!-- sided-90x -->
                        </div><!-- food-menu -->
				<?php endforeach; ?>
                <div class="brder-t-light mt-sm-10 mb-60 mb-sm-40"></div>
        </div><!-- container -->
</section>

