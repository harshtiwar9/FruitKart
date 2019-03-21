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
        </head>
        <body>
            <?php
            include './header.php';

            $res = mysqli_query($con, "SELECT w.*,p.*,u.* FROM `wishlist_details` w JOIN `product_details` p on p.prd_id = w.prd_id JOIN `user_details` u on u.ud_id = w.ud_id where w.ud_id = $ud_id");
            ?>
            <div class="row">
                <h1 class="center" style="font-size: 50px;">My Wishlist</h1>
                <?php
                while ($row = mysqli_fetch_array($res)) {
                    ?>
                    <div class='col s12 m6 l3' id="wlprd<?php echo $row["prd_id"] ?>" style='/*width:247px;*/'>
                        <div class='card sticky-action small hoverable' style='/*width:230px; height:300px;*/'>
                            <div class='card-image waves-effect waves-light'>
                                <img height='205px'  class='activator' src='./Admin_Panel/<?php echo $row["prd_image"] ?>'>
                                <span class='card-title red-text'></span>
                            </div>
                            <div class='card-content' height='320px'>
                                <a href='./product.php?id=<?php echo $row["prd_id"] ?>'><?php echo $row["prd_name"] ?></a>
                            </div>
                            <div class='card-action row' style='height:60px;'>
                                <div class="col s2 m2 l2 red-text" style="margin-left: -18px;width: 60px;margin-top: 9px;">
                                    &#8377; <?php echo $row["prd_mrp"] ?>
                                </div>
                                <div class="col s2 m2 l2">
                                    <a class="waves-effect waves-teal btn-floating waves-light disabled" style="margin-left: -15px;" id="rem<?php echo $row["prd_id"] ?>"><i class="material-icons">remove</i></a>
                                </div>
                                <div class="input-field col s2 m2 l2" style="width: 119px;margin-top: 0px;margin-left: -15px;">
                                    <input placeholder="Quantity" disabled="disabled" id="qty<?php echo $row["prd_id"] ?>" type="text" class="validate red-text center" value="500 GM">
                                    <label for="qty" class="red-text center" style="margin-left: -11px;">Quantity</label>
                                </div>
                                <div class="col s2 m2 l2" style="margin-left: -10px;">
                                    <a class="waves-effect waves-teal btn-floating waves-light" id="add<?php echo $row["prd_id"] ?>" onclick="setval(this)"><i class="material-icons">add</i></a>
                                </div>
                                <!--                                <div class="col s2 m2 l2" style="margin-left: -2px;">
                                                                    <button value='<?php echo $row["prd_name"] ?>' id='<?php echo $row["prd_id"] ?>' onclick="add_wl(this)" class='btn-floating btn-small waves-light red' type='submit'><i class='tiny material-icons' style="margin-right: -11px;margin-top: 2px">favorite border</i></button>
                                                                </div>-->
                                <div class="col s2 m2 l2" style="margin-left: -2px;">
                                    <button value='<?php echo $row["prd_name"] ?>' id='<?php echo $row["prd_id"] ?>' onclick="add_cart_wl(this)" class='btn-floating btn-small waves-light red' type='submit'><i class='tiny material-icons'>shopping_cart</i></button>
                                </div>
                            </div>
                            <div class="card-reveal">
                                <span class="card-title grey-text text-darken-4"><?php echo $row["prd_name"] ?><i class="material-icons right">close</i></span>
                                <hr/>
                                <p><?php echo $row["prd_name"] ?></p>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
            <?php
            include './footer.php';
            ?>
        </body>
    </html>
    <?php
}
?>
