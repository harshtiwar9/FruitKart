<?php
error_reporting(E_ERROR | E_PARSE);
session_start();
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <!--<link rel="stylesheet" href="./css/materialize.css" />-->
        <link rel="stylesheet" href="./css/materialize.min.css" />
        <!--<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">-->
        <link href="./iconfont/material-icons.css" rel="stylesheet">
        <script type="text/javascript" src="./js/jquery-3.0.0.js"></script>
        <script type="text/javascript" src="./js/materialize.js"></script>
        <script>

            function search(obj)
            {
                //alert("1")
                var a = obj.value;//alert(a);
                var opt = [];
                var pattern = new RegExp(/[~`!#$@%\^.&*+=\-\[\]\\';,/{}()|\\":<>\?]/); //unacceptable chars
                if (pattern.test(a) == true || a == "" || a == " " || a == null || a == "\s" || a == "/\S/")
                {
                    $("#result").hide();
                } else
                {
                    var jsonResponse = "<table width='480px;'>";
                    //alert(jsonResponse)
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.open("GET", "./fSearch.php?page=search&value=" + a, true);
                    xmlhttp.onreadystatechange = function ()
                    {
                        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
                        {
                            var response = xmlhttp.responseText;//alert(response);
                            var myArr = JSON.parse(response);
                            for (var i = 0; i <= myArr.length - 1; i++)
                            {
                                //console.log(myArr[i].prd_name);


                                //opt.push(myArr[i].prd_name+"<br/>");
                                jsonResponse += "<tr><td valign='top' width='428px;'><a href='product.php?id=" + myArr[i].prd_id + "' style='color: black;font-size: 15px;'>" + myArr[i].prd_name + "</a></td><td width='52px' height=''><font style='float: right;font-size: 17px;color: red;'>&#8377;" + myArr[i].prd_mrp + "</font></td></tr>";
                                //jsonResponse += myArr[i] + "<br/>";
                                //alert(jsonResponse)

                            }
                        }
                        //$(".search-results").removeAttr("hidden");
                        if (response == 0)
                        {
//                            $("#search-head").slideUp();
//                            $("#search-result").slideUp();
//                            $("#search-head").attr("hidden", "true");
//                            $("#search-result").attr("hidden", "true");
//                            $("#random_prd_ajax").slideDown();
//                            $("#feature-prd").slideDown();
                            $("#result").hide();
                        } else
                        {
//                            $("#feature-prd").slideUp();
//                            $("#random_prd_ajax").slideUp();
//                            $("#search-head").show();
//                            $("#search-result").show();
//                            $("#search-head").html("Search Results");
//                            $("#search-result").html(jsonResponse);
                            $("#result").show();
                            $("#result").html(jsonResponse);
                        }
                        //console.log(opt);
                    }
                    xmlhttp.send();
                }
            }
        </script>

    </head>
    <body>
        <div class="navbar-fixed">
            <nav>
                <div class="nav-wrapper">
                    <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                    <a href="./Home.php" class="brand-logo">FruitKart</a>

                    <ul class="left hide-on-med-and-down">

                        <li>

                            <div class="input-field col s12"><input type="text" name="search" id="search" onkeyup="search(this);" onkeydown="search(this);" autocomplete="off" style="width: 380px;max-width: 380px;min-width: 380px;background-color: white;margin-top: 12px; height: 40px; width: auto;border-radius: 10px 10px 0px 0px;border-bottom-left-radius: 0px;color: red;margin-left: 200px" results="5" placeholder="  Search Products">
                                <label for="search" style="margin-left: 200px; margin-top: 0.1px"><i class="material-icons" style="color: black;">search</i></label>
                                <div class="search-results" style="color: black;min-width: 400px; width: 400px;position: fixed;z-index: 2;background-color: white;color: black;margin-top: -18px;margin-left: 200px;border-bottom-left-radius: 10px;border-bottom-right-radius: 10px;font-size: 15px;" id="result">
                                </div>
                            </div>

                        </li>
                    </ul>

                    <ul class="right hide-on-med-and-down">
        <!--                <li><a href="#login-signup" class="modal-trigger"><i class="material-icons left">perm_identity</i>Login/SignUp</a></li>-->
                        <?php
                        if (!isset($_SESSION['ud_fname'])) {
                            echo"<li style=' margin-left:0px;'><!-- Modal Trigger -->
                            <a href='#login-signup' class='modal-trigger'><i class='material-icons left'>perm_identity</i>Login/SignUp</a>
                        </li> ";
                        } else {
                            ?>
                            <li style="margin-left: 5px" id="dtl" onclick="$('#u1').css('width', ($(this).width() + 'px')), $('#u1').slideDown(), this.style = 'background-color: white;', $('#usrbtn').css('color', 'red');">
                                <a id="usrbtn">
                                    Welcome <span style="text-transform: uppercase;"><?php echo $_SESSION['ud_fname']; ?></span><i  style="margin-left:0px;" class="material-icons right">arrow_drop_down</i>
                                </a>
                                <div id="u1" style="text-align: -webkit-center;margin-top: -12px;width: 130px;border-bottom: 2px red solid;border-top: 0px red solid;position: fixed;z-index: 5;background-color: white;font-size: 15px;" hidden>
                                    <a href="./profile.php" style="color: red;margin-top: -14px;margin-left: -6px;width: inherit;"><i class="material-icons prefix" style="margin-bottom: -64px;margin-left: -102px;">account_circle</i>Profile</a><br/>
                                    <a href="./wishlist.php" style="color: red;margin-top: -14px;margin-left: -6px;width: inherit;"><i class="material-icons prefix" style="margin-bottom: -64px;margin-left: -102px;">favorite border</i>Wishlist</a><br/>
                                    <a href="./orders.php" style="color: red;margin-top: -23px;margin-left: -4px;width: inherit;"><i class="material-icons prefix" style="margin-bottom: -64px;margin-left: -102px;">local_shipping</i>Orders</a><br/>
                                    <!--                                                <a href="./cart.php" style="color: red;margin-top: -22px;margin-left: -4px;">Cart</a>-->
                                    <a href="./logic.php?value=logout" style="color: red;margin-top: -23px;margin-left: 0px;width: inherit;"><i class="material-icons prefix" style="margin-bottom: -64px;margin-left: -102px;">exit_to_app</i>Logout</a>
                                </div>
                            </li>
                            <?php
                        }
                        if (isset($_SESSION['ud_fname'])) {
                            ?>
                            <li><a href="./cart.php"><i class="material-icons left">shopping_cart</i>My Cart</a></li>
                            <?php
                        }
                        ?>
<!--                        <li><a href="./product.php"><i class="material-icons left">shopping_basket</i>Products</a></li>-->
                        <li><a href="./about.php"><i class="material-icons left">description</i>AboutUs</a></li>
                        <li><a href="./faq.php"><i class="material-icons left">question_answer</i>FAQs</a></li>
                        <li><a href="./Home.php"><i class="material-icons left">store</i>Home</a></li>
                    </ul>

                    <ul class="side-nav" id="mobile-demo" class="teal lighten-2">
                        <!--                <li>
                                            <a href="#login-signup" class="modal-trigger"><i class="material-icons left">perm_identity</i>Login/SignUp</a>
                                        </li>-->

                        <?php
                        if (!isset($_SESSION['ud_fname'])) {
                            echo"<li style=' margin-left:0px;'><!-- Modal Trigger -->
                            <a href='#login-signup' class='modal-trigger'><i class='material-icons left'>perm_identity</i>Login/SignUp</a>
                        </li> ";
                        } else {
                            ?>
                            <li style="margin-left: 5px" id="dtl" onclick="$('#u1').slideDown(), this.style = 'background-color: white;', $('#usrbtn').css('color', 'red');">
                                <a id="usrbtn">
                                    Welcome <span style="text-transform: uppercase;"><?php echo $_SESSION['ud_fname']; ?></span><i  style="margin-left:0px;" class="material-icons right">arrow_drop_down</i>
                                </a>
                                <div id="u1" style="text-align: -webkit-center;margin-top: -12px;width: 130px;border-bottom: 2px red solid;border-top: 0px red solid;position: fixed;z-index: 2;background-color: white;font-size: 15px;" hidden>
                                    <a href="./profile.php" style="color: red;margin-top: -14px;margin-left: -6px;">Profile</a>
                                    <a href="./orders.php" style="color: red;margin-top: -23px;margin-left: -4px;">Orders</a>
                                    <!--<a href="./cart.php" style="color: red;margin-top: -22px;margin-left: -4px;">Cart</a>-->
                                    <a href="./logic.php?value=logout" style="color: red;margin-top: -23px;margin-left: 0px;">Logout</a>
                                </div>
                            </li>
                            <?php
                        }
                        ?>
                        <li><a href = "#"><i class = "material-icons left">shopping_cart</i>My Cart</a></li>
<!--                        <li><a href = "product.php"><i class = "material-icons left">shopping_basket</i>Products</a></li>-->
                        <li><a href = "about.php"><i class = "material-icons left">description</i>AboutUs</a></li>
                        <li><a href = "faq.php"><i class = "material-icons left">question_answer</i>FAQs</a></li>
                        <li><a href="./Home.php"><i class="material-icons left">store</i>Home</a></li>
                    </ul>
                    <!--<center>
                    <div class = "input-field" align = "center">
                    <input id = "search" type = "text" onkeyup = "" onkeydown = "" autocomplete = "off" style = "width: 380px;max-width: 380px;min-width: 380px;background-color: white;margin-top: 12px; height: 40px; width: auto;border-radius: 10px 10px 0px 0px;border-bottom-left-radius: 0px;color: red;" results = "8" placeholder = "  Search Over Many Products">
                    <label for = "search" style = "margin-top: 1px;margin-left:139px;"><i class = "material-icons" style = "color: black;">search</i></label>
                    <div class = "search-results" style = "color: black;min-width: 400px; width: 400px;position: fixed;z-index: 2;background-color: white;color: black;margin-top: -18px;border-bottom-left-radius: 10px;border-bottom-right-radius: 10px;font-size: 15px;" id = "result">
                    </div>
                    </div>
                    </center> -->
                    <!--<div class = "input-field">
                    <input id = "search" type = "search" required>
                    <label for = "search"><i class = "material-icons">search</i></label>
                    <i class = "material-icons">close</i>
                    </div> -->
                </div>

            </nav>
        </div>
        <?php
//include './slider.php';
        ?>
        <!-- Modal Structure -->
        <div id="login-signup" class="modal" style=" max-height: 390px; max-width: 450px; overflow-y: hidden;">
            <div class="modal-content" style="margin-top: -20px;">
                <div class="row section">
                    <center><h5 class="red-text">Login</h5></center>
                    <div class="row divider"></div>

                    <div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="email"  name="txtemail_mobile" type="text"  autofocus required>
                                <label for="user-email">Email</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="pwd" name="txtpassword" type="password" required>
                                <label for="user-password">Password</label>
                            </div>
                            <div class="col s12">
                                <span id='err' class="red-text" hidden>
                                </span><a href="forgot_password.php" class="right">Forgot Password ?</a> 
                            </div>
                        </div> 
                        <div class="row"><center>
                                <button class="modal-action btn waves-effect waves-light red " id='login_sub' onclick="submit_data();" type="button">Login
                                    <i class="material-icons right">send</i></button>&nbsp;&nbsp;&nbsp;
                                <a href="registration.php" class="modal-action modal-close waves-effect waves-light btn ">Sign Up</a>
                            </center></div>
                        <div class="row center">
                            <span id="msg_usr" class="red-text">

                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script>
        $(document).ready(function () {
            $(".button-collapse").sideNav();
            $('.modal-trigger').leanModal({
                dismissible: true, // Modal can be dismissed by clicking outside of the modal
                opacity: .3, // Opacity of modal background
            });
            $('.dropdown-button').dropdown();
            $("#u1").mouseleave(function () {
                $("#usrbtn").css("color", "white");
                $("#dtl").css("background-color", "#ee6e73");
                $(this).slideUp();
            });
        });
    </script>
</html>