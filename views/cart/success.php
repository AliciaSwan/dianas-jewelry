<?php $this->title = 'Diana\'s Jewelry | Your order №'.$currentID ;?>
<div id="body">
    <div class="container" class="empty-cart">
        <div id="content" class="full">
<!--            --><?php //echo '<pre>';
//            var_dump($session['cart']);
//            //var_dump($orderArticle);
//            echo '</pre>'; ?>
            <h3 class="title">Thank you for the order.</h3>
            <p>Your order number is <?=$currentID ?>  </br>
                Your name:<span class="color-black"><?=$order->name ?></span></br>
                Your phone:<span class="color-black"><?=$order->phone ?></span></br>
                Your e-mail:<span class="color-black"><?=$order->email ?></span></br>
                Your address:<span class="color-black"><?=$order->address ?></span></p>
            <p>Your order:</p>
            <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <thead>
                    <tr>
                        <th style="padding: 8px; border: 1px solid #ddd">Name</th>
                        <th style="padding: 8px; border: 1px solid #ddd">Quantity</th>
                        <th style="padding: 8px; border: 1px solid #ddd">Price</th>
                        <th style="padding: 8px; border: 1px solid #ddd">Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    <? foreach ( $session['cart'] as $id=>$item) {?>
                        <tr>
                            <th style="padding: 8px; border: 1px solid #ddd"><?=$item['name'] ?></th>
                            <th style="padding: 8px; border: 1px solid #ddd"><?=$item['quantity'] ?></th>
                            <th style="padding: 8px; border: 1px solid #ddd">$<?=$item['price'] ?></th>
                            <th style="padding: 8px; border: 1px solid #ddd">$<?=$item['price']* $item['quantity'] ?></th>
                        </tr>
                    <? } ?>
                    <tr>
                        <td colspan="3">Total :</td>
                        <td><?=$session['cart.totalQuantity'] ?></td>
                    </tr>
                    <tr>
                        <td colspan="3">Total to pay:</td>
                        <td>$<?=$session['cart.totalSum'] ?></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <br>
            <a href="/" class="btn-grey btn-order">Back to the main page</a>

        </div>
    </div>
</div>
<?php
    $session->remove('cart');
    $session->remove('cart.totalQuantity');
    $session->remove('cart.totalSum');
    ?>