<?php
echo "<pre>";

var_dump($session['cart'] );
echo "<pre>";
?>

<div id="breadcrumbs">
    <div class="container">
        <ul>
            <li><a href="#">Home</a></li>
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
                        <th class="delete"></th>
                    </tr>
                    <?php foreach ($article as $item){ ?>
                    <tr>
                        <td class="items">
                            <div class="image">
                                <img src="/web/images/<?=$item['img']?>" alt="">
                            </div>
                            <h3><a href="#"><?=$item['name']?></a></h3>
                            <p><?=$item['description']?></p>
                        </td>
                        <td class="price">$<?=$item['price']?></td>
                        <td class="qnt"><select><option>1</option><option>1</option></select></td>
                        <td class="total">$1 350.00</td>
                        <td class="delete"><a href="#" class="ico-del"></a></td>
                    </tr>
                    <?php } ?>
                </table>
            </div>

            <div class="total-count">
                <h4>Subtotal: $4 500.00</h4>
                <p>+shippment: $30.00</p>
                <h3>Total to pay: <strong>$4 530.00</strong></h3>
                <a href="#" class="btn-grey">Finalize and pay</a>
            </div>

        </div>
        <!-- / content -->
    </div>
    <!-- / container -->
</div>
<!-- / body -->
