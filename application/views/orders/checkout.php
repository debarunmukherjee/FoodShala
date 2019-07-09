<div class="container text-center">
	<h2><?php echo($title) ?></h2>
</div>

<!-- Show all the validation errors if any -->
<?php if(validation_errors()): ?>
<div class="alert alert-danger text-center mt-5 alert-dismissible fade show" role="alert">
    <?php echo (validation_errors()); ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<?php endif; ?>

<div class="shopping-cart container">

	<div class="column-labels">
		<label class="product-image">Image</label>
		<label class="product-details">Product</label>
		<label class="product-price">Price</label>
		<label class="product-quantity">Quantity</label>
		<label class="product-removal">Remove</label>
		<label class="product-line-price">Total</label>
	</div>

	<div class="product">
		<div class="product-image">
			<img src="<?php echo(site_url()) ?>assets/uploaded_images/food_items/<?php echo($menu_item['image']) ?>"
				alt="Food item image">
		</div>
		<div class="product-details">
			<div class="product-title"><strong><?php echo($menu_item['item_name']); ?></strong></div>
			<p class="product-description"><?php echo(word_limiter($menu_item['description'], 20)); ?></p>
		</div>
		<div class="product-price"><?php echo($menu_item['price']); ?></div>
		<div class="product-quantity">
			<input type="number" class="form-control" value="1" min="1" max="6">
		</div>
		<div class="product-removal">
			<button class="remove-product">
				Remove
			</button>
		</div>
		<div class="product-line-price"><?php echo($menu_item['price']); ?></div>
	</div>

	<div class="totals">
		<div class="totals-item">
			<label>Subtotal</label>
			<div class="totals-value" id="cart-subtotal"></div>
		</div>
		<div class="totals-item">
			<label>Tax (5%)</label>
			<div class="totals-value" id="cart-tax"></div>
		</div>
		<div class="totals-item">
			<label>Delivery Charges</label>
			<div class="totals-value" id="cart-shipping"></div>
		</div>
		<div class="totals-item totals-item-total">
			<label>Grand Total</label>
			<div class="totals-value" id="cart-total"></div>
		</div>
	</div>

	<button class="checkout"  data-toggle="modal" data-target="#contact">Checkout</button>

</div>

<!-- Modal for filling contact details -->
<div class="modal fade" id="contact" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Contact Details</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<?php echo(form_open('place-order')) ?>
				<div class="modal-body">
					<div class="form-group">
						<label for="address">Enter your address</label>
						<textarea class="form-control" id="address" rows="3" name="address" required></textarea>
					</div>
					<div class="form-group">
						<label for="phone">Enter your phone number</label>
						<input type="text" class="form-control" name="phone" id="phone" pattern="[789][0-9]{9}" required>
					</div>

					<!-- Hidden fields to send other information -->
					<input type="text" hidden value="<?php echo($menu_item['name']) ?>" name="restaurant">
					<input type="text" hidden value="<?php echo($menu_item['menu_id']) ?>" name="menu_id">
					<input type="text" hidden value="1" name="quantity" id="qty">
					<input type="text" hidden value="" name="amount" id="amt">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Make Payment</button>
				</div>
			<?php echo(form_close()); ?>
		</div>
	</div>
</div>
