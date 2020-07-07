<section>
        <div class="container" style="margin-top: 3em;">
                <div class="heading mb-sm-10"><h3>Cart</h3></div>
				<?php foreach ($foods as $key => $food) : ?>
                        <div class="col-md-12">
                                <div class="sided-90x mb-30">
                                        <div class="s-left"><img class="br-3" src="<?php echo base_url(); ?>assets/images/menu-5-120x120.jpg" alt="Menu Image"></div><!--s-left-->
                                        <div class="s-right">
											<h4 class="mb-10"><b><?php echo $fname[$key]; ?></b><b class="color-primary float-right">Rs. <?php echo $price[$key]; ?></b></h4>
											<h5 class="mb-10"><b><?php echo $rname[$key]; ?></b></h5>
                                        </div><!--s-right-->
                                </div><!-- sided-90x -->
                        </div><!-- food-menu -->
				<?php endforeach; ?>
                <div class="brder-t-light mt-sm-10 mb-60 mb-sm-40"></div>
                <div class="row">
                <h4>Total Cart Price : </h4>
                <h4><p id='price' name='price' style="margin-left: 0.5em;"><?= $total_price; ?>Rs</p></h4>
                </div>  
        </div><!-- container -->
</section>

