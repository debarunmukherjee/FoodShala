<div class="flex-wrapper">
<h2 class="text-center">
<?php echo($title); ?>
</h2>

<div class="container">
    <?php if(empty($orders)){ ?>
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <strong><i class="fas fa-info-circle"></i> No orders taken</strong> Looks like you still haven't taken any order yet !
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php }else{ ?>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr class="table-info text-dark">
                        <th scope="col">Sl. No.</th>
                        <th scope="col">Customer Name</th>
                        <th scope="col">Food Item</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $counter=1; foreach($orders as $order){ ?>
                        <tr>
                            <th scope="row"><?php echo($counter++); ?></th>
                            <td><?php echo($order['name']); ?></td>
                            <td><?php echo($order['item_name']); ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    <?php } ?>
</div>

</div>