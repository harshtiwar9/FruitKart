<?php
error_reporting(E_ERROR | E_PARSE);
session_start();
if (!isset($_SESSION['ud_fname'])) {
    header("Location: ../home.php");
} else {
    //print_r($_SESSION);
//    if ($_SESSION['ud_fname'] != 'Admin') {
//        header("Location: ../home.php");
//    } else {
        //$con = mysqli_connect("localhost", "root", "", "nfa");
        include '../connection.php';
        ?>
        <html>
            <head>
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <title></title>
                <link rel="stylesheet" href="../css/materialize.min.css" />
                <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
                <link href="./iconfont/material-icons.css" rel="stylesheet">
                <script type="text/javascript" src="../js/jquery-3.0.0.js"></script>
                <script type="text/javascript" src="../js/materialize.min.js"></script>
                <script type="text/javascript" src="./js/functions.js"></script>
                <script type="text/javascript">
                    function posi(obj) {
                        var curr = obj.find("i.material-icons").html();
                        $(".side-nav ul#sidenav_collapsible").children().each(function (index, element) {
                            $(element).find("i.material-icons").html("keyboard_arrow_down");
                        });
                        if (curr == "keyboard_arrow_down") {
                            obj.find("i.material-icons").html("keyboard_arrow_up");
                        } else {
                            obj.find("i.material-icons").html("keyboard_arrow_down");
                        }
                    }

                    function set_page(obj)
                    {
                        var name = obj.name;//alert(name);
                        if (name == "add_prd")
                        {
                            $('#div').html("<object data='../Admin_Panel/add_product.php' style='width: 100%;height: 100%;' />");
                        } else if (name == "add_cat")
                        {
                            $('#div').html("<object data='../Admin_Panel/add_category.php' style='width: 100%;height: 100%;' />");
                        } else if (name == "update_prd")
                        {
                            $('#div').html("<object data='../Admin_Panel/update_product.php' style='width: 100%;height: 100%;' />");
                        } else if (name == "update_cat")
                        {
                            $('#div').html("<object data='../Admin_Panel/update_category.php' style='width: 100%;height: 100%;' />");
                        } else if (name == "cust_search")
                        {
                            $('#div').html("<object data='../Admin_Panel/search.php' style='width: 100%;height: 100%;' />");
                        } else if (name == "view_user")
                        {
                            $('#div').html("<object data='../Admin_Panel/view_user.php' style='width: 100%;height: 100%;' />");
                        }
                        else if (name == "dis_user")
                        {
                            $('#div').html("<object data='../Admin_Panel/disable_user.php' style='width: 100%;height: 100%;' />");
                        }
                        else if (name == "view_orders")
                        {
                            $('#div').html("<object data='../Admin_Panel/order/vieworder.php' style='width: 100%;height: 100%;' />");
                        }
                    }

                    function start_Time() {
                        var today = new Date();
                        var h = today.getHours();
                        var m = today.getMinutes();
                        var s = today.getSeconds();
                        var ampm = h >= 12 ? 'PM' : 'AM';
                        if (h > 12) {
                            h -= 12;
                        } else if (h === 0) {
                            h = 12;
                        }
                        m = checkTime(m);
                        s = checkTime(s);
                        document.getElementById('time').innerHTML =
                                h + ":" + m + ":" + s + " " + ampm;
                        var t = setTimeout(start_Time, 500);
                    }
                    function checkTime(i) {
                        if (i < 10) {
                            i = "0" + i
                        }
                        ; // add zero in front of numbers < 10
                        return i;
                    }

                </script>
                <style>
                    .cnt {
                        overflow-y: scroll;
                    }

                    .cnt::-webkit-scrollbar { 
                        /* This is the magic bit */
                        display: none;
                    }
                </style>
            </head>
            <body class="cnt" onload="start_Time()">
                <?php
                // put your code here
                ?>
                <ul class="side-nav fixed right" id="mobile-demo" style="width: 240px;">
                    <li class="bold">
                        <ul class="collapsible" id="sidenav_collapsible" data-collapsible="accordion" style="margin-left: -14px;">
                            <li style="width: 240px;">
                                <div id="d1" class="collapsible-header waves-effect waves-teal" style="margin-left: 0px;width: 285px;">
                                    <a class="red-text tooltipped" onclick="posi($(this))" id="a1" data-position="right" data-delay="50" data-tooltip="User Details" style="font-size: 1.5em;">USER<i class="material-icons right" id="c1">keyboard_arrow_down</i></a>
                                </div>
                                <div class="collapsible-body" style="margin-left: 59px;">
                                    <ul class="collapsible collapsible-accordion no-padding">
                                        <ul>
                                            <li>
                                                <a class="waves-effect waves-teal no-padding text-darken-2" onclick="set_page(this)" name="view_user" style="width: 210px;">View User</a>
                                            </li>
                                            <li>
                                                <a class="waves-effect waves-teal no-padding text-darken-2" onclick="set_page(this)" name="dis_user" style="width: 210px;">Disable User</a>
                                            </li>
                                        </ul>
                                    </ul>
                                </div>
                            </li>

                            <li style="width: 240px;">
                                <div id="d2" class="collapsible-header waves-effect waves-teal" style="margin-left: 0px;width: 285px;">
                                    <a class="red-text tooltipped" onclick="posi($(this))" id="a2" data-position="right" data-delay="50" data-tooltip="Category Details" style="font-size: 1.4em;">CATEGORY<i class="material-icons right" id="c2">keyboard_arrow_down</i></a>
                                </div>
                                <div class="collapsible-body" style="margin-left: 59px;">
                                    <ul class="collapsible collapsible-accordion no-padding">
                                        <ul>
                                            <li>
                                                <a class="waves-effect waves-teal no-padding text-darken-2" onclick="set_page(this)" name="add_cat" style="width: 210px;">Add Category</a>
                                            </li>
                                            <li>
                                                <a class="waves-effect waves-teal no-padding text-darken-2" onclick="set_page(this)" name="update_cat" style="width: 210px;">Update Category</a>
                                            </li>
                                        </ul>
                                    </ul>
                                </div>
                            </li>

                            <li style="width: 240px;">
                                <div id="d2" class="collapsible-header waves-effect waves-teal" style="margin-left: 0px;width: 285px;">
                                    <a class="red-text tooltipped" onclick="posi($(this))" id="a2" data-position="right" data-delay="50" data-tooltip="Product Details" style="font-size: 1.4em;">STOCK<i class="material-icons right" id="c2">keyboard_arrow_down</i></a>
                                </div>
                                <div class="collapsible-body" style="margin-left: 59px;">
                                    <ul class="collapsible collapsible-accordion no-padding">
                                        <ul>
                                            <li>
                                                <a class="waves-effect waves-teal no-padding text-darken-2" onclick="set_page(this)" name="add_prd" style="width: 210px;">Add Product</a>
                                            </li>
                                            <li>
                                                <a class="waves-effect waves-teal no-padding text-darken-2" onclick="set_page(this)" name="update_prd" style="width: 210px;">Update Products</a>
                                            </li>
                                        </ul>
                                    </ul>
                                </div>
                            </li>
                            <li style="width: 240px;">
                                <div id="d3" class="collapsible-header waves-effect waves-teal" style="margin-left: 0px;width: 285px;">
                                    <a class="red-text tooltipped" onclick="posi($(this))" id="a3" data-position="right" data-delay="50" data-tooltip="View orders" style="font-size: 1.3em;">ORDERS<i class="material-icons right" id="c3">keyboard_arrow_down</i></a>
                                </div>
                                <div class="collapsible-body" style="margin-left: 59px;">
                                    <ul class="collapsible collapsible-accordion no-padding">
                                        <ul>
                                            <li>
                                                <a class="waves-effect waves-teal no-padding text-darken-2" onclick="set_page(this)" name="view_orders" style="width: 210px;">View Orders</a>
                                            </li>
                                            <!--                                    <li>
                                                                                    <a class="waves-effect waves-teal no-padding text-darken-2" onclick="set_page(this)" name="update_inst" style="width: 210px;">Update School/College</a>
                                                                                </li>-->
                                        </ul>
                                    </ul>
                                </div>
                            </li>

                            <li style="width: 240px;">
                                <div id="d1" class="collapsible-header waves-effect waves-teal" style="margin-left: 0px;width: 285px;">
                                    <a class="red-text tooltipped" onclick="posi($(this))" id="a1" data-position="right" data-delay="50" data-tooltip="Search Product & Category" style="font-size: 1.5em;">SEARCH<i class="material-icons right" id="c1">keyboard_arrow_down</i></a>
                                </div>
                                <div class="collapsible-body" style="margin-left: 59px;">
                                    <ul class="collapsible collapsible-accordion no-padding">
                                        <ul>
                                            <li>
                                                <a class="waves-effect waves-teal no-padding text-darken-2" onclick="set_page(this)" name="cust_search" style="width: 210px;">Custom Search</a>
                                            </li>
                                            <!--                                    <li>
                                                                                    <a class="waves-effect waves-teal no-padding text-darken-2" onclick="set_page(this)" name="update_help" style="width: 210px;">Disable User</a>
                                                                                </li>-->
                                        </ul>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
                
                

                <nav>
                    <div class="nav-wrapper">
                        <a href="./panel.php" class="brand-logo center">Welcome Administrator</a>
                        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                        <a href="./logic.php?page=logout">
                            <i class="small material-icons right tooltipped" data-position="left" data-delay="50" data-tooltip="Logout" style="margin-right: 20px;">power_settings_new</i>
                        </a>
                        <a href="#!" class="right hide-on-med-and-down" id="time"></a>
                    </div>
                </nav>
                <!--z-depth-1-->
                 <div class="row container center">
                <div id="div" class="col s12 m12 l12 offset-l1 cnt">
                    <iframe style="margin-top:-20px;height:91.5%;width:84.5%;" src="./dashboard.php"></iframe>
                </div>
            </div>

                <div id="del_prd" class="modal modal-fixed-footer" style="width: 32%;height: 220px;">
                    <div class="modal-content">
                        <h4 class="center">Alert</h4>
                        <hr style="margin-right: -23px;margin-left: -23px;" />
                        <p class="center">Are You Sure To Delete This Product ?</p>
                    </div>
                    <div class="modal-footer">
                        <a href="#!" class="modal-action modal-close waves-effect waves-green btn" id="del_prd" onclick="del_prd(this)" style="margin-right: 70px;">NO</a>
                        <a href="#!" class="modal-action modal-close waves-effect waves-green btn" id="del_prd" onclick="del_prd(this)" style="margin-right: 117px;">YES</a>
                    </div>
                </div>

                <div id="del_cat" class="modal modal-fixed-footer" style="width: 32%;height: 220px;">
                    <div class="modal-content">
                        <h4 class="center">Alert</h4>
                        <hr style="margin-right: -23px;margin-left: -23px;" />
                        <p class="center">Are You Sure To Delete This Category ?</p>
                    </div>
                    <div class="modal-footer">
                        <a href="#!" class="modal-action modal-close waves-effect waves-green btn" id="del_cat" onclick="del_cat(this)" style="margin-right: 70px;">NO</a>
                        <a href="#!" class="modal-action modal-close waves-effect waves-green btn" id="del_cat" onclick="del_cat(this)" style="margin-right: 117px;">YES</a>
                    </div>
                </div>

                <div id="upd_prd" onfocus="set_id()" class="modal modal-fixed-footer" style="width: 75%;max-height: 100%;">
                    <div class="modal-content  cnt">
                        <h4 class="center">Update Product</h4>
                        <hr style="margin-right: -23px;margin-left: -23px;" />
                        <p class="center">
                        <form>
                            <div class="row upd_prd center">
                            </div>
                        </form>
                        </p>
                    </div>
                    <div class="modal-footer center container">
                        <a href="#!" class="modal-action modal-close waves-effect waves-green btn right red" id="upd_prd" onclick="">NO</a>
                        <a href="#!" class="modal-action modal-close waves-effect waves-green btn left" id="upd_prd" onclick="upd_prd()">YES</a>
                    </div>
                </div>

                <div id="upd_cat" onfocus="set_id2()" class="modal modal-fixed-footer" style="width: 32%;height: 220px;">
                    <div class="modal-content cnt">
                        <h4 class="center">Update Category</h4>
                        <hr style="margin-right: -23px;margin-left: -23px;" />
                        <form class="center">
                            <div class="row upd_cat center">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer center container">
                        <a href="#!" class="modal-action modal-close waves-effect waves-green btn right red" id="upd_cat" onclick="">NO</a>
                        <a href="#!" class="modal-action waves-effect waves-green btn left" id="upd_cat" onclick="upd_cat()">YES</a>
                    </div>
                </div>

                <input type="hidden" id="prd_id_hide" />
                <input type="hidden" id="cat_id_hide" />
                
               

            </body>
            <script>
                $(document).ready(function () {
                    $(".button-collapse").sideNav();
                    $('select').material_select();
                });
                $("#upd_prd").click(function () {
                    change_prd_img();
                });
            </script>
        </html>
        <?php
    }
//}
?>