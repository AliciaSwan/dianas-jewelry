<?php
if(!isset($session['cart.totalSum'])){
    header('Location: /');
}
//echo "<pre>";
//var_dump($session['cart'] );
//echo "<pre>";
$this->title = 'Diana\'s Jewelry | Cart';
use yii\widgets\ActiveForm;
?>
<?php if($session['cart']){?>
<!--<div id="breadcrumbs">-->
<!--    <div class="container">-->
<!--        <ul>-->
<!--            <li><a href="/">Home</a></li>-->
<!--            <li>Cart</li>-->
<!--        </ul>-->
<!--    </div>-->
<!--      container -->
<!--</div>-->
<!-- / body -->

<div id="body">
    <div class="container" id="cart">
        <div id="content" class="full">
            <div class="cart-table">
                <table>
                    <tr>
                        <th class="items">Items</th>
                        <th class="price">Price</th>
                        <th class="qnt">Quantity</th>
                        <th class="total">Total</th>
                        <th class=""></th>
                    </tr>
                    <?php foreach ($session['cart']  as $id=> $item){ ?>
                    <tr>
                        <td class="items">
                            <div class="image">
                                <img class="xs-img" src="/web/images/<?=$item['img']?>" alt="">
                            </div>
                            <h3><a href="#"><?=$item['name']?></a></h3>
                            <p><?=$item['description']?></p>
                        </td>
                        <td class="price">$<?=$item['price']?></td>
                        <td class="qnt"><?=$item['quantity']?><!--<select><option>1</option><option>1</option></select>--></td>
                        <td class="total">$<?=$item['price']*$item['quantity']?></td>
                        <td class="delete-btn delete" data-id="<?=$id?>"><a href="#" class="ico-del"></a></td>
                    </tr>
                    <?php } ?>
                </table>
            </div>

            <div class="total-count order-form">
                    <h3>place your order</h3>

                <?php $form = ActiveForm::begin(); ?>

                <?= $form->field($order, 'name'); ?>
                <?= $form->field($order, 'phone'); ?>
                <?= $form->field($order, 'email'); ?>
                <?= $form->field($order, 'address'); ?>
                <br/>
                <!-- <h4>Subtotal: $4 500.00</h4>-->

                <h5>Total quantity: <span  class="total-quantity"><?=$session['cart.totalQuantity'] ?></span></h5>
                <p>+shippment: $30.00</p>
                <h3>Total to pay: <strong>$<?=$session['cart.totalSum']+30 ?></strong></h3>
                <button class="btn-grey btn-order">Finalize and pay</button>
                <?php ActiveForm::end(); ?>
            </div>

        </div>
        <!-- / content -->
    </div>
    <!-- / container -->
</div>
<!-- / body -->
<?php } else  {  ?>
    <div class="container empty-cart">
        <div id="content" class="full">
            <h5 style="padding-bottom: 20px;">There is nothing in your cart </h5>
            <a href="/" type="button" class="btn-grey btn-order">Start shopping</a>
        </div>
    </div>
<?php } ?>
