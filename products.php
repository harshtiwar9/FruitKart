<?php
//error_reporting(E_ERROR | E_PARSE);
session_start();
include './connection.php';
$sort = null;
//$ss = null;
//$ss1 = "All";
if (!isset($_GET['chk1']) || $_GET['chk1'] == "" || $_GET['chk1'] == NULL || $_GET['chk1'] == " ") {
    $sort = "ORDER BY product_details.prd_name ASC";
    $ss = "A-Z";
} else {
    if ("nasc" == $_GET['chk1']) {
        $sort = "ORDER BY product_details.prd_name ASC";
        //$ss = "A-Z";
    } else if ("ndsc" == $_GET['chk1']) {
        $sort = "ORDER BY product_details.prd_name DESC";
       // $ss = "Z-A";
    } else if ("pasc" == $_GET['chk1']) {
        $sort = "ORDER BY product_details.prd_mrp ASC";
        //$ss = "&#8377; Low - &#8377; High";
    } else if ("pdsc" == $_GET['chk1']) {
        $sort = "ORDER BY product_details.prd_mrp DESC";
       // $ss = "&#8377; High - &#8377; Low";
    } else if ("new" == $_GET['chk1']) {
        $sort = "ORDER BY product_details.prd_id DESC";
        //$ss = "New";
    } else if ("old" == $_GET['chk1']) {
        $sort = "ORDER BY product_details.prd_id ASC";
        //$ss = "Oldest";
    }
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <!--<link rel="stylesheet" href="./css/materialize.css" />-->
        <link rel="stylesheet" href="./css/materialize.min.css" />
        <!--<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">-->
        <link href="./iconfont/material-icons.css" rel="stylesheet">
        <script type="text/javascript" src="./js/jquery-3.0.0.js"></script>
        <script type="text/javascript" src="./js/materialize.min.js"></script>
        <style>
            input[type=number]::-webkit-inner-spin-button, 
            input[type=number]::-webkit-outer-spin-button { 
                -webkit-appearance: none;
                -moz-appearance: none;
                appearance: none;
                margin: 0; 
            }
        </style>
    </head>
    <body>
        <div class="row">
            <div class="col s2 m2 l2 offset-l2 offset-m2 ">
                <?php //echo $ss; ?>
                <b style="font-size: 25px;color: #FF1744;">Sort By</b><select onchange="sort(value)">
                    <option value="nasc">A - Z</option>
                    <option value="ndsc">Z - A</option>
                    <option value="pasc">&#8377; Low - &#8377; High</option>
                    <option value="pdsc">&#8377; High - &#8377; Low</option>
                    <option value="new">New</option>
                    <option value="old">Oldest</option>
                </select>
            </div>
        </div>
            <div class="col center" style="width: 200px;">
                <?php //echo $ss1; ?>
<!--                <select onchange="sort1('Home.php?chk=' + value)">
                    <option value="">Category</option>
                    //<?php
//                    $q = mysqli_query($con, "SELECT cat_name FROM category");
//                    while ($q1 = mysqli_fetch_array($q)) {
//                        ?>
                        <option value="<?php // echo $q1['cat_name']; ?>"><?php // echo $q1['cat_name']; ?></option>    
                    <?php //} ?>
                </select>-->
            </div>
            <div class="col center" style="width: 200px;">
                <span id="cate1"></span>
                <br>
<!--                <select id="view" onchange="changeview(value)">
                    <option value="">Select View</option>
                    <option value="list">List View</option>
                    <option value="grid">Grid View</option>
                </select>-->
            </div>
        
        <?php
//            include './header.php';
        $res = mysqli_query($con, "select * from product_details $sort1 $sort");
        ?>
        <!--        <div class="row">
                    <div class="col s12 m12 l12 offset-l1">-->
        <div class="row">
            <?php
            while ($row = mysqli_fetch_array($res)) {
                ?>
                <div class='col s12 m6 l3' style='/*width:247px;*/'>
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
                            <div class="input-field col s2 m2 l2" style="width: 75px;margin-top: 0px;margin-left: -15px;">
                                <input placeholder="Quantity" id="qty<?php echo $row["prd_id"] ?>" type="text" class="disabled validate red-text" disabled="disabled" value="500 GM">
                                <label for="qty" class="red-text">Quantity</label>
                            </div>
                            <div class="col s2 m2 l2" style="margin-left: -7px;">
                                <a class="waves-effect waves-teal btn-floating waves-light" id="add<?php echo $row["prd_id"] ?>" onclick="setval(this)"><i class="material-icons">add</i></a>
                            </div>
                            <div class="col s2 m2 l2" style="margin-left: -2px;">
                                <button value='<?php echo $row["prd_name"] ?>' id='<?php echo $row["prd_id"] ?>' onclick="add_wl(this)" class='btn-floating btn-small waves-light red' type='submit'><i class='tiny material-icons' style="margin-right: -11px;margin-top: 2px">favorite border</i></button>
                            </div>
                            <div class="col s2 m2 l2" style="margin-left: -2px;">
                                <button value='<?php echo $row["prd_name"] ?>' id='<?php echo $row["prd_id"] ?>' onclick="add_cart(this)" class='btn-floating btn-small waves-light red' type='submit'><i class='tiny material-icons'>shopping_cart</i></button>
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
    </body>
    <script>function sort1(str) {
            window.location = str;
        }</script>
    <script>function sort(str) {
            window.location = "Home.php?chk1=" + str;
        }</script>
    <script>
        $(document).ready(function () {
            $('select').material_select();
            $('.dropdown-button').dropdown({
                inDuration: 300,
                outDuration: 225,
                constrain_width: false, // Does not change width of dropdown to that of the activator
                hover: true, // Activate on hover
                gutter: 0, // Spacing from edge
                belowOrigin: false, // Displays dropdown below the button
                alignment: 'left' // Displays dropdown with edge aligned to the left of button
            }
            );
        });
    </script>
    
</html>
<?php
include './js/common.php';
?>