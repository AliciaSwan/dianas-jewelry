<?php
//echo "<pre>";
//var_dump($session['cart'] );
//echo "<pre>";

if($session['cart']){?>
<div id="breadcrumbs">
    <div class="container">
        <ul>
            <li><a href="/">Home</a></li>
            <li>Cart</li>
        </ul>
    </div>
    <!-- / container -->
</div>
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

            <div class="total-count">
                <br/>
                <!--               <h4>Subtotal: $4 500.00</h4>-->
                <h5>Total quantity: <span  class="total-quantity"><?=$session['cart.totalQuantity'] ?></span></h5>
                <p>+shippment: $30.00</p>
                <h3>Total to pay: <strong>$<?=$session['cart.totalSum']+30 ?></strong></h3>
                <a href="#" class="btn-grey">Finalize and pay</a>
            </div>

        </div>
        <!-- / content -->
    </div>
    <!-- / container -->
</div>
<!-- / body -->
<?php } else  {  ?>
    <div class="container">
        <div class="cart">
            <h3 style="padding-bottom: 20px;">В вашей корзине ничего нет :( </h3>
            <button type=" button" class="btn btn-secondary btn-close">Начать покупки</button>
        </div>
    </div>
<?php } ?>
