<div class="flex-wrapper">
    <h2 class="text-center">
    <?php echo($title); ?>
    </h2>

    <div class="container mt-5">
        <?php if(empty($history)){ ?>
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                <strong><i class="fas fa-info-circle"></i> No order history</strong> Looks like you still haven't tried anything yet !
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php }else{ foreach($history as $item){ ?>
            <a href="<?php echo( site_url('/menu_items/'.$item['menu_id']) ); ?>" class="list-group-item list-group-item-action flex-column align-items-start mb-5">
                <div class="row">
                    <div class="col-md-3">
                        <img src="<?php echo(site_url()) ?>assets/uploaded_images/food_items/<?php echo($item['image']); ?>" class="img-thumbnail" alt="Food item thumbnail">
                    </div>
                    <div class="col-md-9">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1"><?php echo($item['item_name']) ?></h5>
                            <small><strong>Ordered On: </strong><?php echo date('M j Y g:i A', strtotime($item['order_created_at'])); ?></small>
                        </div>
                        <p class="mb-1"><?php echo(word_limiter($item['description'], 50)); ?> <span class="read-more">Read More</span></p>
                        <div class="row mt-3 mb-2">
                            <div class="col-md">
                                <div class="price-box">
                                    Price: <span class="font-weight-bold"><?php echo($item['price']) ?> ₹</span>
                                </div>
                                <div class="<?php echo($item['type']); ?>">
                                    Type: <span class="font-weight-bold"><?php echo($item['type']) ?></span>   
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="restaurant-box">
                                    Restaurant Name: <span class="font-weight-bold"><?php echo($item['restaurant_name']) ?></span>   
                                </div>
                            </div>
                        </div>
                        <small>Price inclusive of GST</small>
                    </div>
                </div>
            </a>
        <?php }} ?>
    </div>
</div>