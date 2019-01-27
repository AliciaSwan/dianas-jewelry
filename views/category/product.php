<?= \app\widgets\MenuWidget::widget();
use yii\helpers\Url;

 $this->title = 'Diana\'s Jewelry | '.$catArticles[0]['category'];
?>

<div id="breadcrumbs">
    <div class="container">
        <ul>
            <li><a href="/">Home</a></li>
            <li><?=$catArticles[0]['category']?></li>
        </ul>
    </div>
    <!-- / container -->
</div>
<!-- / body -->

<div id="body">
    <div class="container">
        <div class="pagination">
            <ul>
                <li><a href="#"><span class="ico-prev"></span></a></li>
                <li><a href="#">1</a></li>
                <li class="active"><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#"><span class="ico-next"></span></a></li>
            </ul>
        </div>
        <div class="products-wrap">
            <aside id="sidebar">
                <div class="widget">
                    <h3>Products per page:</h3>
                    <fieldset>
                        <input checked type="checkbox">
                        <label>8</label>
                        <input type="checkbox">
                        <label>16</label>
                        <input type="checkbox">
                        <label>32</label>
                    </fieldset>
                </div>
                <div class="widget">
                    <h3>Sort by:</h3>
                    <fieldset>
                        <input checked type="checkbox">
                        <label>Popularity</label>
                        <input type="checkbox">
                        <label>Date</label>
                        <input type="checkbox">
                        <label>Price</label>
                    </fieldset>
                </div>
                <div class="widget">
                    <h3>Condition:</h3>
                    <fieldset>
                        <input checked type="checkbox">
                        <label>New</label>
                        <input type="checkbox">
                        <label>Used</label>
                    </fieldset>
                </div>
                <div class="widget">
                    <h3>Price range:</h3>
                    <fieldset>
                        <div id="price-range"></div>
                    </fieldset>
                </div>
            </aside>
            <div id="content">
                <section class="products">
                    <?php foreach ($catArticles as $article){ ?>
                    <article>
                        <a href="<?=Url::to(['article/index', 'id'=>$article['id']])?>"><img  class="small-img" src="/web/images/<?=$article['img']; ?>" alt="<?=$article['name'] ?>"></a>
                        <h3><a href="<?=Url::to(['article/index', 'id'=>$article['id']])?>"><?=$article['name'] ?></a></h3>
                        <h4><a href="<?=Url::to(['article/index', 'id'=>$article['id']])?>">$<?=$article['price'] ?></a></h4>
                        <a href="#"  data-id="<?=$article['id']?>" class="btn-add add-cart">Add to cart</a>
                    </article>
                    <?php } ?>
                </section>
            </div>
            <!-- / content -->
        </div>
        <div class="pagination">
            <ul>
                <li><a href="#"><span class="ico-prev"></span></a></li>
                <li><a href="#">1</a></li>
                <li class="active"><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#"><span class="ico-next"></span></a></li>
            </ul>
        </div>
    </div>
    <!-- / container -->
</div>
<!-- / body -->