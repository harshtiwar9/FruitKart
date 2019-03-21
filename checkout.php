<?php
session_start();
include './connection.php';
if (!isset($_SESSION['ud_id'])) {
    header("Location:./404.html");
} else {
    $amt;
    ?>  
    <html>
        <head>
            <title>Checkout</title>
            <!-- Compiled and minified CSS -->
            <link rel="stylesheet" href="./css/materialize.css">
            <!--Import Google Icon Font-->
            <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
            <script type="text/javascript" src="./js/jquery-2.2.1.js"></script>
            <script type="text/javascript" src="./js/materialize.js"></script>
            <style>  i.is {font-size: 1.5em;}</style>
            <script>
                //                function promodisplay() {
                //                    $('#mypromo').hide();
                //                    $("#promocode").show();
                //                }
                //                function promo(obj) {
                //                    var total_amount = obj.id;
                //                    var promo_code = $("#promo_code" + total_amount).val();
                //                    var xmlhttp = new XMLHttpRequest();
                //                    xmlhttp.open("POST", "./checkout/checkout_promo.php", true);
                //                    xmlhttp.onreadystatechange = function ()
                //                    {
                //                        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
                //                        {
                //                            var response = xmlhttp.responseText;
                //                            var ajaxoutput = response.slice(0, 8);
                //                            if (response == "fail")
                //                            {
                //                                Materialize.toast("Cart does not meet Minimum Offer Amount!", 4000);
                //                            } else if (response == "faildate")
                //                            {
                //                                Materialize.toast("Offer has expired!", 4000);
                //                            } else if (response == "invalid")
                //                            {
                //                                Materialize.toast("Please enter a valid Promo Code!", 4000);
                //                            } else
                //                            {
                //                                var responseafter = response.slice(7);
                //                                total_amount = total_amount - parseInt(responseafter);
                //                                $("#promocode").hide();
                //                                $("#afterpromo").html(responseafter);
                //                                $("#afterpromoin").attr("value", responseafter);
                //                                $("#afterpromomaster").show();
                //                                $("#total_amount_output").html(total_amount);
                //                                Materialize.toast("Promo Code applied successfully!", 4000);
                //                            }
                //                        }
                //                    }
                //                    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                //                    xmlhttp.send("total_amount=" + total_amount + "&promo_code=" + promo_code);
                //                }
            </script>
        </head>
        <body>
            <?php include './header.php'; ?>
            <div class="container">
                <?php
                $sql = "SELECT * FROM user_details WHERE ud_id='" . $_SESSION['ud_id'] . "'";
                $result = mysqli_query($con, $sql);
                $row = mysqli_fetch_assoc($result);
                $ud_fname = $row['ud_fname'];
                $ud_lname = $row['ud_lname'];
                $ud_mobile = $row['ud_mobile'];
                $ud_address = $row['ud_address'];
//                $ud_pincode = $row['ud_pincode'];
                $ud_city = $row['ud_city'];
                ?>
                <div class="row">
                    <h2 class="left-align">Your Order Summary</h2>
                    <?php
                    $total_price = 0;
                    $sql1 = "SELECT * FROM cart_details WHERE ud_id='" . $_SESSION['ud_id'] . "'";
                    $result1 = mysqli_query($con, $sql1);
                    $num = mysqli_affected_rows($con);
                    if ($num > 0) {
                        ?>
                        <div class="col s8">
                            <table class="highlight responsive-table">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Price(per 500gm)</th>
                                        <th>Quantity</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    while ($row1 = mysqli_fetch_assoc($result1)) {
                                        if ($row1['ud_id'] == $_SESSION['ud_id']) {
                                            $sql2 = "SELECT * FROM product_details WHERE prd_id=" . $row1["prd_id"] . "";
                                            $result2 = mysqli_query($con, $sql2);
                                        }
                                        while ($row2 = mysqli_fetch_assoc($result2)) {
                                            $chck_ofr_prd = mysqli_query($con, "SELECT p.*,o.* from offer_details o inner join product_details p on p.prd_id = o.prd_id where o.prd_id='" . $row2['prd_id'] . "'");
                                            $num = mysqli_affected_rows($con);
                                            ?>
                                            <tr>
                                                <td><img width="100px" height="100px" class=" materialboxed" src="<?php echo $row2["prd_image"]; ?>"></td>
                                                <td><?php echo "<a href='./product.php?id=" . $row2["prd_id"] . "'>" .$row2["prd_name"]."</a>"; ?></td>
                                                <?php
                                                if ($num <= 0) {
                                                    ?>
                                                    <td class="center-align"><?php echo $row2["prd_mrp"]; ?></td>
                                                    <td class="center-align"><?php echo $row1["cart_product_qty"]; ?></td>
                                                    <td class="center-align"><?php
                                                        if ($row1['cart_product_qty'] == "500 GM") {
                                                            $price = 1 * $row2['prd_mrp'];
                                                            echo $price;
                                                        } elseif ($row1['cart_product_qty'] == "1 KG") {
                                                            $price = 2 * $row2['prd_mrp'];
                                                            echo $price;
                                                        } elseif ($row1['cart_product_qty'] == "1.5 KG") {
                                                            $price = 3 * $row2['prd_mrp'];
                                                            echo $price;
                                                        } elseif ($row1['cart_product_qty'] == "2 KG") {
                                                            $price = 4 * $row2['prd_mrp'];
                                                            echo $price;
                                                        } elseif ($row1['cart_product_qty'] == "2.5 KG") {
                                                            $price = 5 * $row2['prd_mrp'];
                                                            echo $price;
                                                        } elseif ($row1['cart_product_qty'] == "3 KG") {
                                                            $price = 6 * $row2['prd_mrp'];
                                                            echo $price;
                                                        } elseif ($row1['cart_product_qty'] == "3.5 KG") {
                                                            $price = 7 * $row2['prd_mrp'];
                                                            echo $price;
                                                        } elseif ($row1['cart_product_qty'] == "4 KG") {
                                                            $price = 8 * $row2['prd_mrp'];
                                                            echo $price;
                                                        } elseif ($row1['cart_product_qty'] == "4.5 KG") {
                                                            $price = 9 * $row2['prd_mrp'];
                                                            echo $price;
                                                        } elseif ($row1['cart_product_qty'] == "5 KG") {
                                                            $price = 10 * $row2['prd_mrp'];
                                                            echo $price;
                                                        }

//                                                        $subtotal = $row2["prd_mrp"] * $row1["cart_product_qty"];
                                                        ?></td>
                                                    <?php
//                                                } else {
//                                                    while ($row7 = mysqli_fetch_array($chck_ofr_prd)) {
//                                                        $dc_percent = $row7['ofd_discount'];
//                                                        $mrp = $row7['prd_mrp'];
//                                                        $dis1 = $mrp * $dc_percent;
//                                                        $disfinal = $dis1 / 100;
//                                                        $discount = $mrp - $disfinal;
                                                    ?>
                                                    <td class="center-align"><?php // echo $discount;     ?></td>
                                                    <td class="center-align"><?php // echo $row1["cart_product_qty"];      ?></td>
                                                    <td class="center-align"><?php
//                                                            $subtotal = $discount * $row1["cart_product_qty"];
//                                                            echo $subtotal;
                                                        ?></td>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </tr>
                                        <?php
                                        $total_price+=$price;
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    <?php } ?>
                </div>
                <div class="col s4">
                    <form action="logic.php?value=placeorder" method="POST">
                        <table class="bordered">
                            <thead>
                                <tr>
                                    <td class="center-align">
                                        <h4>Invoice</h4>
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <span><b>Full Name : </b><?php echo $ud_fname . " " . $ud_lname; ?></span>

                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span><b>Contact No : </b><?php echo $ud_mobile; ?></span>

                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span><b>Shipping Address : </b><?php echo $ud_address; ?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span><b>City : </b><?php echo "Vadodara"; ?></span>
                                    </td>
                                </tr>
<!--                                    <tr>
                                    <td>
                                        <span><b>Pincode : </b><?php // echo $ud_pincode;      ?></span>
                                    </td>
                                </tr>-->
                                <tr>
                                    <td>
                                        <span> <b>Cart Total : </b></span>
                                        <span><?php echo $total_price; ?></span>
                                    </td>
                                </tr>
<!--                                    <tr class="center-align">
                                    <td>
                                        <button id="mypromo" onclick='promodisplay();' class="waves-effect waves-light btn" type="button"><i class='material-icons left'>spellcheck</i>Have a Promo Code?</button>
                                        <style>#promocode{display:none;}</style>
                                        <style>#afterpromomaster{display:none;}</style>
                                        <span id="promocode" class="center-align">
                                            <span class="input-field col s12">
                                                <input id="promo_code<?php // echo $total_price;      ?>" type="text" autocomplete="off">
                                                <label for="promo_code">Enter Promocode</label>
                                                <button id="<?php // echo $total_price;      ?>" onclick='promo(this);' class="waves-effect waves-light btn" type="button"><i class='material-icons left'>spellcheck</i>Apply</button>
                                            </span>
                                        </span>
                                        <span id="afterpromomaster"><b>You Save :</b>(-) 
                                            <span id="afterpromo">
                                            </span>
                                        </span>
                                    </td>
                                </tr>-->
                                <tr>
                                    <td>
                                        <span><b>To Pay : </b></span>
                                        <span id="total_amount_output"><?php
                                            if ($total_price < 300) {
                                                $total_price = $total_price + 50;
                                                echo $total_price ;
                                                echo ' (Additional Shipping Charge Rs.50) ';
                                            } else {
                                                echo $total_price;
                                            }
                                            +amt;
                                            ?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span><b>Payment Type: </b></span>
                                        <b>
                                            <?php
//                                            $dateplus2 = date('d-m-Y', strtotime('+2 hours'));
                                            echo $dateplus2 . "<br>Cash On Delivery (COD)";
                                            ?>
                                        </b>
                                    </td>
                                </tr>
                                <tr>
                                    <td>

                                        <button class="waves-effect waves-light btn" type="submit"><i class='material-icons left'>receipt</i>Proceed to Pay</button>
                                        <input type="hidden" value="<?php echo $_SESSION['ud_id']; ?>" name="ud_id">
                                        <input type="hidden" id="afterpromoin" name="code_amt">
                                        <input type="hidden" value="<?php // echo$ud_pincode;      ?>" name="pincode">

                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
<!--    <center><font class="red-text">* Note We Currently Provide Service In Vadodara Only.</font></center>-->
        <?php include './test.php'; ?>
        <?php include 'footer.php'; ?>
</body>
</html><?php
//}?>