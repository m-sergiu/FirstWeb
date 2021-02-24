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
            echo '<script>window.location="productDetail4.php"</script>';
        }else{
            echo '<script>alert("Product is already Added to Cart")</script>';
            echo '<script>window.location="productDetail4.php"</script>';

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
    <title>Product Details - Elek-Tik</title>
    <link rel="stylesheet" href="../CSS/pages.css">
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
                    <li><a href="../UI%20html/FirstPage.html">Home</a></li>
                    <li><a href="../UI%20html/products.php">Products</a></li>
                    <li><a href="../UI%20html/index.html">About</a></li>
                    <li><a href="../UI%20html/contact.html">Contact</a></li>
                </ul>
            </nav>
            <button id="modalBtn" class="button" ><img src="../Images/cart.png" width="30px" height="30px"/></button>
        </div>
    </div>
</div>

<!----------- singe products details---------->

<div class="small-container single-product">

    <?php
    $id = "4";
    $query = "SELECT * FROM product WHERE id = $id";
    $result = mysqli_query($con,$query);
    if(mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_array($result)) {

            ?>

            <form method="post" action="productDetail4.php?action=add&id=<?php echo $row["id"];?>">
                <div class='row'>
                    <div class='col-2'>
                        <img src="<?php echo $row["image"]; ?>">
                    </div>
                    <div class="col-2">
                        <h1><?php echo $row["name"]; ?></h1>
                        <h4>$<?php echo $row["price"]; ?></h4>
                        <input type="text" name="quantity"  value="1">
                        <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>">
                        <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">

                        <input type="submit" name="add"  class="btn" value="Add to Cart">
                        <h3>Product Details &#10136;</h3>
                        <br>
                        <p> <ul>
                            <li>&#10149;Zero Compromise Powerhouse: Built for gaming</li>
                            <li>&#10149;Perfect Display for Work or Play: An edge-to-edge 15.6" Full HD</li>
                            <li>&#10149;Biometric Security: Supports Windows Hello instant facial unlock</li>
                            <li>&#10149;Customizable RGB Individual Key Lighting: Includes 16.8 million colors</li>
                            <li>&#10149;8th Gen Intel Core i7-8750H 6 core processor w/ 4.1GHz turbo,<br> NVIDIA GeForce RTX 2060, 15.6" FHD 144Hz matte display, 16GB RAM, 512GB SSD</li>
                        </ul>
                        </p>
                    </div>
                </div>
            </form>
            <?php
        }
    }
    ?>

</div>

<!------title---->
<div class="small-container">
    <div class=" row row-2">
        <h2>Related Products</h2>
        <a href="../UI%20html/products.php"> View More </a>
    </div>
</div>

<!-----Related products-->

<div class="small-container">
    <div class="row">
        <div class="col-4">
            <img src="../Images/product-9.jpg">
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
            <img src="../Images/product-10.jpg">
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
            <img src="../Images/product-11.jpg">
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
            <img src="../Images/product-12.jpg">
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
                            <td><a href="productDetail4.php?action=delete&id=<?php echo $value["product_id"]; ?>"><span
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