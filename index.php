<?php
 include "database/config.php";
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Online Shop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./assets/links/bootstrap.min.css">
    <script src="./assets/links/bootstrap.min.js.download"></script>
    <script src="./assets/links/jquery.min.js.download"></script>
    <script src="./assets/links/popper.min.js.download"></script>
    <script src="./assets/javascript/main.js"></script>
    <link rel="stylesheet" href="./assets/css/style.css">
    
</head>
    <style>
        .header-img {
    width: 100%;
    height: 500px;
}

    </style>
<body>

<?php 
    $features = query("select * FROM features order by rand() limit 1;"); 
    $feature = $features -> fetch_array(MYSQLI_NUM);
?>

    <div class="container" style="margin-top:30px">
        <div class="row">
           <div class="col feature">
               <div class="header-img"  style="background-image:url(<?php echo $feature[3];?>)" >
                <div class="col-md-3 text-dark float-left p-fixed"><h3>Awesome <span class="text-success">Shop</span></h3></div>
                <ul class="nav justify-content-end "> 
                        <li class="nav-item">
                            <img class="question-img mt-2 p-fixed" src="./assets/pictures/icons/question.png" alt="question mark">
                        </li>
                        <li class="nav-item">
                          <a class="nav-link text-head p-fixed" href="#">Need help</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link border border-dark bg-success rounded-circle text-dark btn p-fixed" href="#">Join</a>
                        </li>
                      </ul>
                    <div class="search-btn p-fixed">
                        <h3 class="text-danger"><?php echo $feature[1];?></h3>
                        <p class="text-warning"><?php echo $feature[2];?></p>
                        <div class="active-pink-3 mb-2">
                            <input class="form-control" type="text" placeholder="Search your product from here" aria-label="Search">
                        </div>
                    </div>         
               </div>  
           </div>
        </div>
        <br>
        <div class="row">
            <!-- Promotion -->
            <div class="col-md-4 mt-1">
                <div class="bg-success background border border-dark ">
                    <h4 class="text-white">Coupon Savings</h4>
                    <div class="float-right"> <img class="promotion-img" src="./assets/pictures/icons/coupon.png" alt="coupon"></div>
                    <p class="text-white">Up to 60% off everyday essentials</p>
                   
                    <button type="button" class="btn btn-light border border-dark promotion-btn">Shop Coupons</button>
                </div>    
            </div>
            <div class="col-md-4 mt-1">
                <div class="bg-primary background border border-dark">
                    <h4 class="text-white">Free Delivery</h4>
                    <div class="float-right"><img class="promotion-img" src="./assets/pictures/icons/car.png" alt="delivery"> </div>
                    <p class="text-white">With selected items</p>
                    <button type="button" class="btn btn-light border border-dark promotion-btn">Deliver Now</button>
                </div>
            </div>
            <div class="col-md-4 mt-1">
                <div class="bg-secondary background border border-dark">
                    <h4 class="text-white">Gift Voucher</h4>
                    <div class="float-right"><img class="promotion-img" src="./assets/pictures/icons/gift.png" alt="gift"></div>
                    <p class="text-white">With personal card items</p>
                    <button type="button " class="btn btn-light border border-dark promotion-btn">Gift Now</button>
                </div>
            </div>
        </div>
        <br>
        <!-- Category Section -->
        <?php
            $categories = query("select * FROM categories ")
        ?>

        <div class="row">
            <div class="col-3">   
                <ul class="nav flex-column border-dark border">
                    <?php
                        foreach($categories as $cate):
                            echo '
                            <li class="nav-item">
                                <a id="cate" class="nav-link" href="#cateId"><img class="nav-img" src="assets/pictures/icons/'.$cate['icon'].'" alt="laptop">'.$cate['name'].'</a>
                            </li>
                            ';
                            
                        endforeach;
                        ?>
                </ul>
            </div>
            
            <!-- Product -->
    
            <div class="col-md-9 background">
                <div class="row">
                    <?php
                        $cateId = 1;
                        $product = 'select * from products join assets where assets.product_id=products.id and products.category_id = '.$cateId;
                        $items = query($product);
                       
                        foreach($items as $item):
                            $dis_count = ((100 - $item['discount']) * $item['price']/100);
                            echo '
                                
                                    <div class="col-md-4 item_product">
                                        <div class="card mt-1" style="width: 100%;">
                                        <h5 ><span class="bg-warning float-right p-1 m-2">'.$item['discount'].'%</span></h5>
                                                <img class="card-img-top sell-img" src="'.$item['resource_path'].'" alt="Card image cap">
                                            <div class="card-body">
                                                <p class="card-text">'.$item['name'].'</p>
                                                <p class="card-text">'.$item['description'].'</p>
                                                <p><del class="text-danger">'.$item['price'].'</del></p>
                                                <p class="d-inline">$'.$dis_count.'</p>
                                                <a href="#" class="btn btn-white float-right border border-dark"><img class="cart-img" src="./assets/pictures/icons/cart.png" alt="cart"> Cart</a>
                                        
                                            </div> 
                                        </div>
                                    </div>
                                
                                ';
                                 
                                 $cateId++;
                                endforeach;   
                            if($cateId > 5){
                                // Show more button
                            echo '
                                <div class="row justify-content-md-center" style="width: 100%;">
                                    <div class="col col-lg-2"> </div>
                                        <div class="col-md-auto mt-3" > 
                                            <a href="#" id="load" class="border border-success text-dark bg-primary p-2">Load More</a>
                                        </div>
                                    <div class="col col-lg-2"></div>
                                </div>
                                    ';
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>

</body>
</html>

