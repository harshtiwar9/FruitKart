<?php
if (!isset($_GET['id'])) {
    header("Location: ./Home.php");
} else {
    $id = $_GET['id'];
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
            ?>
            <br/>
            <?php
            $qry4 = mysqli_query($con, "select * from product_details where `prd_id`=$id");

            if (mysqli_affected_rows($con) > 0) {
                while ($row = mysqli_fetch_array($qry4)) {
                    ?>
                    <div class="row center">
                        <div class="col s12 m5 l5 offset-l1 offset-m1">
                            <img src="./Admin_Panel<?php echo $row['prd_image']; ?>" class="responsive-img materialboxed" data-caption="<?php echo$row['prd_name']; ?>" />
                            <?php //echo $row['prd_name']; ?>
                        </div>
                        <div class="col s12 m5 l5 offset-l1 offset-m1 pull-l1 pull-m1">
                            <div class="row">
                                <div class="col">
                                    <h5><b class="red-text left"><?php echo $row['prd_name']; ?></b></h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <b>MRP :  &#8377; <?php echo $row['prd_mrp']; ?></b>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s4 m4 l3">
                                    <a class="waves-effect waves-teal btn-floating waves-light disabled" id="rem<?php echo $row["prd_id"] ?>"><i class="material-icons">remove</i></a>
                                </div>
                                <div class="input-field col s4 m4 l3" style="margin-top: 0px;">
                                    <input placeholder="Placeholder" id="qty<?php echo $row["prd_id"] ?>" type="text" class="center validate red-text" value="500 GM" disabled="disabled">
                                    <label for="qty<?php echo $row["prd_id"] ?>" style="margin-left: -14px;">Quantity</label>
                                </div>
                                <div class="col s4 m4 l3" style="margin-left: -20px;">
                                    <a class="waves-effect waves-teal btn-floating waves-light" id="add<?php echo $row["prd_id"] ?>" onclick="setval(this)"><i class="material-icons">add</i></a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s6 m3 l3">
                                    <button value='<?php echo $row["prd_name"] ?>' id='<?php echo $row["prd_id"] ?>' style='/*margin-left:86px;/* margin-top:-53px;*/' onclick="add_wl(this)" class='btn-floating btn-small red' type='submit'><i class='tiny material-icons' style="margin-top: 2px;margin-right: -13px;">favorite border</i></button>
                                </div>
                                <div class="col s6 m3 l3">
                                    <button value='<?php echo $row["prd_name"] ?>' id='<?php echo $row["prd_id"] ?>' style='/*margin-left:131px;/* margin-top:-53px;*/' onclick="add_cart(this)" class='btn-floating btn-small red' type='submit'><i class='tiny material-icons'>shopping_cart</i></button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <h5><b class="red-text left">About</b></h5>
                                    <br/>
                                    <span class="section left"><?php echo $row['prd_about']; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            } else {
                header("Location: ./Home.php");
            }
            ?>
            <br/>
            <hr/>
            <div class="row">
                <div class="col s12 m12 l12 center">
                    <h5><b>People Also Search</b></h5>
                </div>
            </div>
            <hr/>
            <div class="row">
                <?php
                $qry5 = mysqli_query($con, "select * from product_details where `prd_id`!=$id ORDER BY RAND() LIMIT 4");
                while ($row2 = mysqli_fetch_array($qry5)) {
                    ?>
                    <div class="col s12 m6 l3">
                        <div class='card sticky-action small hoverable'>
                            <div class='card-image waves-effect waves-light'>
                                <img height='205px'  class='activator' src='./Admin_Panel/<?php echo $row2["prd_image"] ?>'>
                                <span class='card-title red-text'></span>
                            </div>
                            <div class='card-content' height='320px'>
                                <a href='./product.php?id=<?php echo $row2["prd_id"] ?>'><?php echo $row2["prd_name"] ?></a>
                            </div>
                            <div class='card-action row' style='height:60px;'>
                                <div class="col s2 m2 l2 red-text" style="margin-left: -18px;width: 60px;margin-top: 9px;">
                                    &#8377; <?php echo $row2["prd_mrp"] ?>
                                </div>
                                <div class="col s2 m2 l2">
                                    <a class="waves-effect waves-teal btn-floating waves-light disabled" style="margin-left: -15px;" id="rem<?php echo $row2["prd_id"] ?>"><i class="material-icons">remove</i></a>
                                </div>
                                <div class="input-field col s2 m2 l2" style="width: 75px;margin-top: 0px;margin-left: -15px;">
                                    <input placeholder="Quantity" disabled="disabled" id="qty<?php echo $row2["prd_id"] ?>" type="text" class="validate red-text" value="500 GM">
                                    <label for="qty" class="red-text">Quantity</label>
                                </div>
                                <div class="col s2 m2 l2" style="margin-left: -20px;">
                                    <a class="waves-effect waves-teal btn-floating waves-light" id="add<?php echo $row2["prd_id"] ?>" onclick="setval(this)"><i class="material-icons">add</i></a>
                                </div>
                                <div class="col s2 m2 l2" style="margin-left: -1px;">
                                    <button value='<?php echo $row2["prd_name"] ?>' id='<?php echo $row2["prd_id"] ?>' onclick="add_wl(this)" class='btn-floating btn-small waves-light red' type='submit'><i class='tiny material-icons' style="margin-right: -11px;margin-top: 2px">favorite border</i></button>
                                </div>
                                <div class="col s2 m2 l2" style="margin-left: -1px;">
                                    <button value='<?php echo $row2["prd_name"] ?>' id='<?php echo $row2["prd_id"] ?>' onclick="add_cart(this)" class='btn-floating btn-small waves-light red' type='submit'><i class='tiny material-icons'>shopping_cart</i></button>
                                </div>
                            </div>
                            <div class="card-reveal">
                                <span class="card-title grey-text text-darken-4"><?php echo $row2["prd_name"] ?><i class="material-icons right">close</i></span>
                                <hr/>
                                <p><?php echo $row2["prd_name"] ?></p>
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
        <script>
            $(document).ready(function () {
                $('select').material_select();
            });
        </script>
    </html>
    <?php
}

//include './js/common.php';
?>