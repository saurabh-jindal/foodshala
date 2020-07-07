<section class="story-area left-text center-sm-text">
    <div class="container" style="margin-top: 4em;">
            <div class="heading"><h3>Choose from Foods</h3></div>
            <div class="row">
				<?php foreach ($foods as $key => $food) : ?>
				<div class="col-lg-3 col-md-4  col-sm-6 ">
					<div class="center-text mb-30">
<!--						if (return $query->result_array(); !== null) {-->
<!--						<div class="ïmg-200x mlr-auto pos-relative"><img src="{$food['image']}" alt="Image"></div>-->
<!--						}-->
<!--						add image here-->
						<h3 class="mt-20"><?php echo $food['name']; ?></h3>
						<h4 class="mt-20"><?php echo $rnames[$key]; ?></h4>
						<h4 class="mt-5 color-primary"><b>Rs. <?php echo $food['price']; ?></b></h4>
						<h6 class="mt-20"><a href="<?php echo base_url(); ?>foods/order_food/<?php echo $food['id']  ?>" class="btn-brdr-primary plr-25"><b>Order Now</b></a></h6>
					</div><!--text-center-->
				</div><!-- col-md-3 -->
				<?php endforeach; ?>
			</div><!-- row-->
    </div><!-- container -->
</section>
