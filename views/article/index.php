<?
use yii\helpers\Url;
$this->title = 'Diana\'s Jewelry | '.$article['name'];?>

<div id="breadcrumbs">
    <div class="container">
        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="<?=Url::to(['category/product', 'id'=> $article['category']] )?>"><?=$article['category']?></a></li>
            <li><?=$article['name'] ?></li>
        </ul>
    </div>
    <!-- / container -->
</div>
<div id="body">
    <div class="container">
        <div id="content" class="full">
            <div class="product">
                <div class="image">
                    <img src="/web/images/<?=$article['img'] ?>" alt="">
                </div>
                <div class="details">
                    <h1><?=$article['name'] ?></h1>
                    <h4>$<?=$article['price'] ?></h4>
                    <div class="entry">
                        <p><?=$article['description'] ?></p>
                        <div class="tabs">
                            <div class="nav">
                                <ul>
                                    <li class="active"><a href="#desc">Material</a></li>
                                    <li><a href="#spec">Weight</a></li>
                                    <li><a href="#ret">Specification</a></li>
                                </ul>
                            </div>
                            <div class="tab-content active" id="desc">
                                <p><?=$article['matiere'] ?></p>
                            </div>
                            <div class="tab-content" id="spec">
                                <p><?=$article['pois'] ?></p>
                            </div>
                            <div class="tab-content" id="ret">
                                <p><?=$article['coposition'] ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="actions">
                        <label>Quantity:</label>
                        <select><option>1</option></select>
                        <a href="<?//=Url::to(['cart/add', 'id'=>$article->id])?>#" data-id="<?=$article['id']?>" class="btn-grey add-cart">Add to cart</a>
                    </div>
                </div>
            </div>
        </div>
<!--        --><?php //} ?>
        <!-- / content -->
    </div>
    <!-- / container -->
</div>
<!-- / body -->
