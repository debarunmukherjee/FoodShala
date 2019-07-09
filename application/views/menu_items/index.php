<div class="container">
    <h2 class="text-center">
        <?php echo($title); ?>
    </h2>
    <div class="search-bar container">
        <input type="text" class="form-control search-input" placeholder="Search for your favourite food item...">
        <ul class="list-group search-result">
            
        </ul>
    </div>
    <?php 
        if(!empty($menu_items))
        {
            ?>
            <div class="list-group mt-5">
            <?php
                foreach($menu_items as $item)
                {
                    ?>
                        <a href="<?php echo( site_url('/menu_items/'.$item['menu_id']) ); ?>" class="list-group-item list-group-item-action flex-column align-items-start mb-5">
                            <div class="row">
                                <div class="col-md-3">
                                    <img src="<?php echo(site_url()) ?>assets/uploaded_images/food_items/<?php echo($item['image']); ?>" class="img-thumbnail" alt="Food item thumbnail">
                                </div>
                                <div class="col-md-9">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1"><?php echo($item['item_name']) ?></h5>
                                        <small><?php echo date('M j Y g:i A', strtotime($item['created_at'])); ?></small>
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
                                                Restaurant Name: <span class="font-weight-bold"><?php echo($item['name']) ?></span>   
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    <?php
                }
            ?>
            </div>
            <?php
            echo $this->pagination->create_links();
        }
        else
        {
            ?>
                <div class="alert alert-info" role="alert">
                    <img src="<?php echo( base_url() ) ?>assets/imgs/crying.svg" alt="Crying emoji" style="width:40px;"> <span class="font-weight-bolder">Sorry! </span> Nothing we can put on you plate today mate!
                </div>
            <?php
        }
    ?>

</div>