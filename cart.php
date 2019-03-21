<?php
error_reporting(E_ERROR | E_PARSE);
session_start();
if (!isset($_SESSION['ud_id'])) {
    header("Location:./Home.php");
} else {
    $ud_id = $_SESSION['ud_id'];
    include './connection.php';
    ?>
    <!DOCTYPE html>
    <html>
        <head>
            <meta charset="UTF-8">
            <title></title>
            <script type="text/javascript">

                function rem_cart(obj)
                {
                    var ud_id = "<?php echo $_SESSION['ud_id']; ?>";
                    var prd_name = obj.value;
                    var prd_id = obj.id;
                    var total_price = $('#tot').text();//alert(total_price);
                    var sub_total = $('#sub' + prd_id).text();//alert(sub_total);
                    var ctot = total_price - sub_total;//alert(ctot);
                    if (ud_id == "")
                    {
                        Materialize.toast("Login to add in cart!", 4000);
                    } else {
                        //var qty = $("#num" + prd_id).val();
                        var xmlhttp = new XMLHttpRequest();
                        xmlhttp.open("POST", "./logic.php?page=rem_cart", true);
                        xmlhttp.onreadystatechange = function ()
                        {
                            if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
                            {
                                var response = xmlhttp.responseText;
                                if (response == "0")
                                {
                                    Materialize.toast(prd_name + " Failed To Remove From Your Cart !", 4000);
                                } else if (response == "1")
                                {
                                    Materialize.toast(prd_name + " Succesfully Removed From Your Cart !", 4000);
                                    $("#prd_row" + prd_id).remove();
                                    $("#tot").html("");
                                    $("#tot").html(ctot);
                                }
                            }
                        }
                        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                        xmlhttp.send("user_id=" + encodeURIComponent(ud_id) + "&prd_id=" + encodeURIComponent(prd_id));
                    }
                }

                function empty_cart()
                {
                    var ud_id = "<?php echo $_SESSION['ud_id']; ?>";
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.open("POST", "./logic.php?page=empty_cart", true);
                    xmlhttp.onreadystatechange = function ()
                    {
                        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
                        {
                            var response = xmlhttp.responseText;
                            if (response == "productempty")
                            {
                                window.location.reload(true);
                            } else if (response == "productfailed")
                            {
                                Materialize.toast("Failed to empty the cart!", 4000);
                            }
                        }
                    }
                    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    xmlhttp.send("user_id=" + ud_id);
                }

                function update_cart(obj)
                {
                    var ud_id = "<?php echo $_SESSION['ud_id']; ?>";
                    var prd_name = obj.data('p_name');
                    var prd_price = obj.data('p_price');
                    var ctotal_price = document.getElementById('total_price_output').innerHTML;
                    var prd_id = obj.attr('id');
                    var csub_total = document.getElementById('qtychange' + prd_id).innerHTML;
                    var qty = obj.val();
                    if (qty <= "0")
                    {
                        Materialize.toast("Quantity Not Acceptable!!", 4000);
                    } else {
                        var xmlhttp = new XMLHttpRequest();
                        xmlhttp.open("POST", "./logic.php?page=update_cart", true);
                        xmlhttp.onreadystatechange = function ()
                        {
                            if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
                            {
                                var response = xmlhttp.responseText;
                                var ajaxoutput = response.slice(0, 14);
                                if (ajaxoutput == "productupdated")
                                {
                                    var quantity = response.slice(14);
                                    if (prd_price === parseInt(prd_price))
                                    {
                                        quantity = quantity * parseInt(prd_price);
                                    } else
                                    {
                                        quantity = quantity * parseFloat(prd_price);
                                    }
                                    $("#qtychange" + prd_id).html(quantity);
                                    var total_price = ((parseInt(ctotal_price) - parseInt(csub_total)) + quantity);
                                    $("#total_price_output").html(total_price);
                                    Materialize.toast(prd_name + " quantity was updated!", 4000);
                                } else if (ajaxoutput == "productfailedd")
                                {
                                    Materialize.toast(prd_name + " Invalid Response Value Detected!", 4000);
                                }
                            }
                        }
                        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                        xmlhttp.send("ud_id=" + ud_id + "&prd_id=" + prd_id + "&quantity=" + qty);
                    }
                }

                function checkout()
                {
                    //                    alert("1")
                    var ud_id = "<?php echo $_SESSION['ud_id']; ?>";
                    //                    alert(ud_id)
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.open("POST", "./cart_checkout.php", true);
                    xmlhttp.onreadystatechange = function ()
                    {
                        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
                        {
                            var response = xmlhttp.responseText;
                            if (response == "incomplete profile")
                            {
                                Materialize.toast("Please complete your profile details before ordering any product!", 4000);
                            } else if (response == "empty cart")
                            {
                                Materialize.toast("No products found in your cart!", 4000);
                            } else if (response == "ok")
                            {
                                window.location.assign("./checkout.php");
                            }
                        }
                    }
                    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    xmlhttp.send("user_id=" + ud_id);
                }

            </script>
        </head>
        <body>
            <?php
            include './header.php';
            ?>
            <div class="card">
                <h1 class="center" style="font-size: 50px;">My Cart</h1>
                <table class="centered highlight">
                    <thead>
                        <tr>
    <!--                            <th data-field="no">No</th>-->
                            <th data-field="img">Image</th>
                            <th data-field="name">Name</th>
                            <th></th>
                            <th data-field="name" style="width: 75px;margin-top: 0px;margin-left: -15px;">Quantity</th>
                            <th></th>
                            <th data-field="name">Price(per 500gm)</th>
                            <th data-field="name">Sub-Total</th>
                            <th data-field="name">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $no = 0;
                        $res = mysqli_query($con, "SELECT p.*,c.* FROM `product_details` p JOIN `cart_details` c on c.prd_id = p.prd_id  where c.ud_id = $ud_id");
                        $total = 0;
                        while ($row = mysqli_fetch_array($res)) {
                            $no++;
                            ?>
                            <tr id="prd_row<?php echo $row["prd_id"] ?>">
                <!--                                <td><?php echo $no; ?></td>-->
                                <td><img height=50px" width="50px" class='responsive-img materialboxed' data-caption="<?php echo $row['prd_name']; ?>" src='./Admin_Panel/<?php echo $row["prd_image"] ?>'></td>
                                <td><a href='./product.php?id=<?php echo $row["prd_id"] ?>'><?php echo $row["prd_name"] ?></a></td>
                                <!--minus product quantity-->
                                <td><div class="col s2 m2 l2">
                                        <a class="waves-effect waves-teal btn-floating waves-light disabled" style="margin-left: -15px;" id="rem<?php echo $row["prd_id"] ?>"><i class="material-icons">remove</i></a>
        <!--                                        <a class="waves-effect waves-teal btn-floating waves-light disabled" style="margin-left: -15px;" id="rem<?php //echo $row["prd_id"]  ?>"><i class="material-icons">remove</i></a>-->
                                    </div></td>
                                <!--quantity update-->
                                <td><div class="col s2 m2 l2" style="width: 75px;margin-top: 0px;margin-left: -15px;">
                                        <input placeholder="Quantity" id="qty<?php echo $row["prd_id"] ?>" type="text" class="disabled validate red-text" disabled="disabled" value="<?php echo $row["cart_product_qty"] ?>">
                                    </div></td>
                                <!--add product quantity-->
                                <td><div class="col s2 m2 l2" style="margin-left: -7px;">
                                        <a class="waves-effect waves-teal btn-floating waves-light" id="add<?php echo $row["prd_id"] ?>" onclick="setval(this)"><i class="material-icons">add</i></a>
                                    </div></td>
                                <?php
                                if ($row['cart_product_qty'] == "500 GM") {
                                    $price = 1 * $row['prd_mrp'];
                                } elseif ($row['cart_product_qty'] == "1 KG") {
                                    $price = 2 * $row['prd_mrp'];
                                } elseif ($row['cart_product_qty'] == "1.5 KG") {
                                    $price = 3 * $row['prd_mrp'];
                                } elseif ($row['cart_product_qty'] == "2 KG") {
                                    $price = 4 * $row['prd_mrp'];
                                } elseif ($row['cart_product_qty'] == "2.5 KG") {
                                    $price = 5 * $row['prd_mrp'];
                                } elseif ($row['cart_product_qty'] == "3 KG") {
                                    $price = 6 * $row['prd_mrp'];
                                } elseif ($row['cart_product_qty'] == "3.5 KG") {
                                    $price = 7 * $row['prd_mrp'];
                                } elseif ($row['cart_product_qty'] == "4 KG") {
                                    $price = 8 * $row['prd_mrp'];
                                } elseif ($row['cart_product_qty'] == "4.5 KG") {
                                    $price = 9 * $row['prd_mrp'];
                                } elseif ($row['cart_product_qty'] == "5 KG") {
                                    $price = 10 * $row['prd_mrp'];
                                }
                                $total += $price;
                                ?>
                                <td><?php echo $row['prd_mrp']; ?></td>
                                <td id="sub<?php echo $row["prd_id"] ?>"><?php echo $price; ?></td>
                                <td>
                                    <button id="<?php echo $row["prd_id"]; ?>" value="<?php echo $row["prd_name"]; ?>" onclick="rem_cart(this)" class="btn-floating red waves-effect waves-light" type="submit"><i class='material-icons small'>clear</i></button>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                        <tr>
                            <td colspan="5">Total</td>
                            <td id="tot<?php echo $row["prd_id"] ?>"><?php echo $total; ?></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="row center">
                <div class="col s12 m4 l4">
                    <a class="waves-effect waves-light btn" href="./Home.php"><i class="material-icons left">shop_two</i>Shop More</a>
                </div>
                <div class="col s12 m4 l4 hide-on-med-and-up">
                    <br/>
                </div>
                <div class="col s12 m4 l4">
                    <button onclick="empty_cart();" class="btn waves-effect waves-light" type="submit"><i class='material-icons left' type="submit">shopping_cart</i>Empty Cart</button>
                </div>
                <div class="col s12 m4 l4 hide-on-med-and-up">
                    <br/>
                </div>
                <div class="col s12 m4 l4">
                    <button onclick="checkout();" class="waves-effect waves-light btn" type="submit"><i class="material-icons right">forward</i>Place Order</button>
                </div>
                <div>
                    <center><font class="red-text"> <b>*Note:</b>For orders below Rs.300 additional shipping charge of Rs.50</font></center>
                </div>
            </div>

            <?php
            include './footer.php';
            ?>
        </body>
    </html>
    <?php
}
?>