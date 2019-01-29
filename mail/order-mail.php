<h3>Ваш заказ под номером <?= $oder->id ?> принят</h3>
Ваш телефон <?= $order->phone ?>

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
        <?php foreach ($session['cart'] as $id=>$item) { ?>
            <tr>
                <th style="padding: 8px; border: 1px solid #ddd"><?=$item['name'] ?></th>
                <th style="padding: 8px; border: 1px solid #ddd"><?=$item['quantity'] ?></th>
                <th style="padding: 8px; border: 1px solid #ddd">$<?=$item['price'] ?></th>
                <th style="padding: 8px; border: 1px solid #ddd">$<?=$item['price']* $item['productQuantity'] ?></th>
            </tr>
        <?php } ?>
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