<?php echo validation_errors(); ?>
<section class="story-area left-text center-sm-text">
	<div class="container" style="margin-top:3em;">
		<div class="heading">
			<h2>Add Menu</h2>
		</div>

		<form action="<?php echo base_url(); ?>foods/add_menu" method="post" class="form-style-1 placeholder-1">
			<div class="row">
				<div class="col-md-12 col-md-offset-4">
					<div class="form-group">
						<label>Name</label>
						<input name="name" type="text" class="form-control" placeholder="Enter name of food.">
					</div>
					<div class="form-group">
						<label>Food Type</label>
						<select class="form-control" name="veg">
							<option value="1">Veg</option>
							<option value="0">Non- Veg</option>
						</select>
					</div>
					<div class="form-group">
						<label>Price</label>
						<input name="price" type="number" class="form-control" placeholder="Enter price.">
					</div>
					<div class="form-group">
						<label>Image</label>
						<input type="file" name="image" />
					</div>
				</div>
			</div>
			<h6 class="center-text mtb-30"><button type="submit" class="btn-primaryc plr-25"><b>ADD</b></button></h6>
		</form>
	</div><!-- container -->
</section>
