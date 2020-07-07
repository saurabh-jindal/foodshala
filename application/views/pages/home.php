
<section class="bg-1 h-900x main-slider pos-relative">
        <div class="triangle-up pos-bottom"></div>
        <div class="container h-100">
                <div class="dplay-tbl">
                        <div class="dplay-tbl-cell center-text color-white">

                                <h5><b>BEST IN TOWN</b></h5>
                                <h1 class="mt-30 mb-15">Foods & Beverages</h1>
                        </div><!-- dplay-tbl-cell -->
                </div><!-- dplay-tbl -->
        </div><!-- container -->
</section>


<section class="story-area left-text center-sm-text pos-relative">
        <div class="abs-tbl bg-2 w-20 z--1 dplay-md-none"></div>
        <div class="abs-tbr bg-3 w-20 z--1 dplay-md-none"></div>
        <div class="container">
                <div class="heading">
                        <img class="heading-img" src="<?php echo base_url(); ?>assets/images/heading_logo.png" alt="">
                        <h2>Our Story</h2>
                </div>

                <div class="row">
                        <div class="col-md-6">
                                <p class="mb-30">Tom Sellers is the Chef Patron of Restaurant Story. He dreamed of
									opening Restaurant Story at the age of 19, and in April 2013, aged 26,
									was able to realise his dream. Tom trained at some of the world’s best
									restaurants including Restaurant Tom Aikens, Noma and Per Se. His food
									is predominantly British, using seasonality to lead a menu that invokes
									memory and brings a narrative to
									each plate. </p>
                        </div><!-- col-md-6 -->

                        <div class="col-md-6">
                                <p class="mb-30">Gary joined Restaurant Story in August 2017.
									He has over three years experience with working for the Fat Duck Group.
									His time there nurtured his cooking skills and experience with
									managing a kitchen of this level.
									Hailing from the West Country, Gary brings his love of good produce
									and a lot of energy to the team. His role has now developed to be
									in charge of all external events and projects for the group. </p>
                        </div><!-- col-md-6 -->
                </div><!-- row -->
        </div><!-- container -->
</section>


<section class="story-area left-text center-sm-text">
        <div class="container">
                <div class="heading"><h3>Menu</h3></div>
                <div class="row">
					<?php foreach ($foods as $key => $food) : ?>
						<div class="col-lg-3 col-md-4  col-sm-6 ">
						<div class="center-text mb-30">
							<div class="ïmg-200x mlr-auto pos-relative"><img src="<?php echo base_url(); ?>assets/images/seller-2-200x200.png" alt=""></div>
							<h5 class="mt-20"><?php echo $food['name']; ?></h5>
							<h4 class="mt-5 color-primary"><b>Rs. <?php echo $food['price']; ?></b></h4>
						</div><!--text-center-->
						</div><!-- col-md-3 -->
					<?php endforeach; ?>
                </div><!-- row-->
        </div><!-- container -->
</section>

