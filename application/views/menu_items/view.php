<div class="container">
    <div class="row">
        <div class="col-md-8 item-details">
            <div class="container text-center">
                <h2><?php echo($title) ?></h2>
            </div>
            <div class="text-center">
                <img src="<?php echo(site_url()) ?>assets/uploaded_images/food_items/<?php echo($item['image']) ?>" alt="Food item image" class="food-image img-fluid">
            </div>
            <div class="container mt-4 text-justify">
                <?php echo($item['description']); ?>
            </div>
        </div>
        <div class="col-md-4">
            <div class="item-info text-center">
                <div>
                Restaurant Name : <br>
                <span class="font-weight-bold"><?php echo($item['name']) ?></span>
                </div>
                <div class="mt-5 mb-5">
                    Price: <span class="font-weight-bold"><?php echo($item['price']) ?> ₹</span>
                    <br>
                </div>
                <div class="mt-5 mb-5">
                    Type: <span class="font-weight-bold"><?php echo($item['type']) ?></span>
                </div>
                <div class="mt-4 text-center">
                    <?php if(!$this->session->userdata('logged_in')): ?>
                        <a href="<?php echo(base_url()) ?>login" class="btn buy-btn">Buy Now</a>
                    <?php endif; ?>
                    <?php if($this->session->userdata('logged_in') && ($this->session->userdata('role') === "Restaurant")): ?>
                        <button href="<?php echo(base_url()) ?>login" class="btn buy-btn" disabled>Resturants can't place orders</button>
                    <?php endif; ?>
                    <?php if($this->session->userdata('logged_in') && ($this->session->userdata('role') === "User")): ?>
                        <a href="<?php echo(base_url()) ?>orders/<?php echo($item['menu_id']); ?>" class="btn buy-btn" disabled>Buy Now</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>