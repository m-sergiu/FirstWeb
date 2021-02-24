<?php
session_start();
$database_name = "ecommerce_cms_elektik";
$con = mysqli_connect("localhost","root","",$database_name);

if (isset($_POST["add"])){
    if (isset($_SESSION["cart"])){
        $item_array_id = array_column($_SESSION["cart"],"product_id");
        if (!in_array($_GET["id"],$item_array_id)){
            $count = count($_SESSION["cart"]);
            $item_array = array(
                'product_id' => $_GET["id"],
                'item_name' => $_POST["hidden_name"],
                'product_price' => $_POST["hidden_price"],
                'item_quantity' => $_POST["quantity"],
            );
            $_SESSION["cart"][$count] = $item_array;

        }else{
            echo '<script>alert("Product is already Added to Cart")</script>';

        }
    }else{
        $item_array = array(
            'product_id' => $_GET["id"],
            'item_name' => $_POST["hidden_name"],
            'product_price' => $_POST["hidden_price"],
            'item_quantity' => $_POST["quantity"],
        );
        $_SESSION["cart"][0] = $item_array;
    }
}

if (isset($_GET["action"])){
    if ($_GET["action"] == "delete"){
        foreach ($_SESSION["cart"] as $keys => $value){
            if ($value["product_id"] == $_GET["id"]){
                unset($_SESSION["cart"][$keys]);
                echo '<script>alert("Product has been Removed...!")</script>';

            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All Products - Elek-Tik</title>
    <link rel="stylesheet" href="../CSS/pages.css">
    <script src="../Scripts/shopCart.js" async></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body>
    <div class="header">
    <div class = "container">
        <div class="navbar">
            <div class = "logo">
                <img src="../Images/icon.png" width="150px">
            </div>
            <nav>
                <ul>
                    <li><a href="FirstPage.html">Home</a></li>
                    <li><a href="products.php">Products</a></li>
                    <li><a href="index.html">About</a></li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
            </nav>
            <button id="modalBtn" class="button" ><img src="../Images/cart.png" width="30px" height="30px"/></button>

        </div>
    </div>
    </div>


<div class="small-container">

    <div class="row row-2">
        <h2>All Products</h2>
        <select>
            <option>Default Sorting</option>
            <option>Sort by price</option>
            <option>Sort by popularity</option>
            <option>Sort by rating</option>
        </select>
    </div>

    <div class="row">
        <div class="col-4">
            <a href="../Php/productDetail1.php"><img  src="../Images/product-1.jpg"></a>
            <h4>Razer Viper mouse</h4>
            <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o"></i>
            </div>
            <p>$70.00</p>
        </div>
        <div class="col-4">
            <a href="../Php/productDetail2.php"><img src="../Images/product-2.jpg"></a>
            <h4>Razer Kraken headset</h4>
            <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-half-o"></i>
            </div>
            <p>$80.00</p>
        </div>
        <div class="col-4">
            <a href="../Php/productDetail3.php"><img src="../Images/product-3.jpg"></a>
            <h4>Razer BlackWidow keyboard</h4>
            <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
            </div>
            <p>$400.00</p>
        </div>
        <div class="col-4">
            <a href="../Php/productDetail4.php"><img src="../Images/product-4.jpg"></a>
            <h4>Razer Blade 15</h4>
            <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o"></i>
            </div>
            <p>$2000.00</p>
        </div>
    </div>

    <div class="row">
        <div class="col-4">
            <a href="../Php/productDetail5.php"><img src="../Images/product-5.jpg"></a>
            <h4>Geforce GTX 1080 TI</h4>
            <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o"></i>
            </div>
            <p>$800.00</p>
        </div>
        <div class="col-4">
            <a href="../Php/productDetail6.php"><img src="../Images/product-6.jpg"></a>
            <h4>ASUS ROG Strix Hero II</h4>
            <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
            </div>
            <p>$1800.00</p>
        </div>
        <div class="col-4">
            <a href="../Php/productDetail7.php"><img src="../Images/product-7.jpg"></a>
            <h4>Apple Macbook pro 13</h4>
            <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
            </div>
            <p>$1700.00</p>
        </div>
        <div class="col-4">
            <a href="../Php/productDetail8.php"><img src="../Images/product-8.jpg"></a>
            <h4>Procesor Intel Core™ i7-9700K</h4>
            <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o"></i>
            </div>
            <p>$360.00</p>
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <a href="../Php/productDetail9.php"><img src="../Images/product-9.jpg"></a>
            <h4>Dell UltraSharp, UWQHD, 49"</h4>
            <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o"></i>
            </div>
            <p>$1500.00</p>
        </div>
        <div class="col-4">
            <a href="../Php/productDetail10.php"><img src="../Images/product-10.jpg"></a>
            <h4>Beats Studio3 Wireless</h4>
            <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-half-o"></i>
            </div>
            <p>$300.00</p>
        </div>
        <div class="col-4">
            <a href="../Php/productDetail11.php"><img src="../Images/product-11.jpg"></a>
            <h4>Samsung Gear S3 frontier</h4>
            <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
            </div>
            <p>$250.00</p>
        </div>
        <div class="col-4">
            <a href="../Php/productDetail12.php"><img src="../Images/product-12.jpg"></a>
            <h4>nJoy Vanguard Gaming</h4>
            <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o"></i>
            </div>
            <p>$60.00</p>
        </div>
    </div>

</div>

    <!------------------ Footer ------------->
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col-1">
                    <h3>Download Our App</h3>
                    <div class="app-logo">
                        <img src="../Images/play-store.png">
                        <img src="../Images/app-store.png">
                    </div>
                </div>
                <div class="footer-col-2">
                    <img src="../Images/icon%20-%20Copy.png" >
                    <p>Our purpose is to help you</p>
                </div>
                <div class="footer-col-3">
                    <h3>Useful links</h3>
                    <ul>
                        <li>Coupouns</li>
                        <li>BlogPost</li>
                        <li>Contact</li>
                    </ul>
                </div>
                <div class="footer-col-4">
                    <h3>Follow us</h3>
                    <ul>
                        <li><a href="https://www.Facebook.com/">Facebook</a></li>
                        <li><a href="https://www.Instagram.com/">Instagram</a></li>
                        <li><a href="https://www.Youtube.com/">Youtube</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div id="simpleModal" class="modal">
        <div class="modal-content">
            <span class="closeBtn">&times;</span>


            <h3 class="title2">Shopping Cart Details</h3>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th width="30%">Product Name</th>
                        <th width="10%">Quantity</th>
                        <th width="13%">Price Details</th>
                        <th width="10%">Total Price</th>
                        <th width="17%">Remove Item</th>
                    </tr>

                    <?php
                    if(!empty($_SESSION["cart"])){
                        $total = 0;
                        foreach ($_SESSION["cart"] as $key => $value) {
                            ?>
                            <tr>
                                <td><?php echo $value["item_name"]; ?></td>
                                <td><?php echo $value["item_quantity"]; ?></td>
                                <td>$ <?php echo $value["product_price"]; ?></td>
                                <td>
                                    $ <?php echo number_format($value["item_quantity"] * $value["product_price"], 0); ?></td>
                                <td><a href="asd.php?action=delete&id=<?php echo $value["product_id"]; ?>"><span
                                                class="text-danger">Remove Item</span></a></td>

                            </tr>
                            <?php
                            $total = $total + ($value["item_quantity"] * $value["product_price"]);
                        }
                        ?>
                        <tr>
                            <td colspan="3" align="right">Total</td>
                            <th align="right">$ <?php echo number_format($total, 0); ?></th>
                            <td></td>
                        </tr>
                        <?php
                    }
                    ?>

                </table>
            </div>
            <a href="" class="btn" width="100%">Checkout</a>

        </div>
    </div>

    <script src="../Scripts/scripts2.js"></script>
</body>
</html>