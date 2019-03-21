<?php
        // put your code here
        include './header.php';
        ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <!--<link rel="stylesheet" href="./css/materialize.css" />-->
        <link rel="stylesheet" href="./css/materialize.min.css" />
        <!--<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">-->
        <link href="./iconfont/material-icons.css" rel="stylesheet">
<!--        <script type="text/javascript" src="./js/jquery-3.0.0.js"></script>-->
        <script type="text/javascript" src="./js/materialize.min.js"></script>
        <script type="text/javascript">
            function set_ans(obj)
            {
                var id = obj.id;
                if ($("#a" + id).is(":visible"))
                {
                    $("#a" + id).slideUp();
                } else {
                    $("#a" + id).slideDown();
                }
            }
        </script>
    </head>
    <body>
        
        <!--        <div class="row">
                    <div class="col s12 m8 l8 z-depth-5 offset-l2 offset-m2">
                        <h3 class="center">Frequently Asked Questions</h3>
                        <hr/>
                        <div class="row">
                            <div class="col s12 m12 l12 #ff5252 red accent-2">
                                <a id="1" href="#!" class="white-text" onclick="set_ans(this)"><i class="material-icons small">add</i> <div style="margin-left: 35px;margin-top: -31px;">What are the health benefits from eating fruits and vegetables ?</div></a>
                            </div>
                            <div class="col s12 m12 l12 #ff8a80 red accent-1">
                                <span id="a1" class="white-text" hidden>Fruits and Vegetables can help prevent heart disease and certain types of cancer.</span>
                            </div>
                            <br/>
                            <br/>
                            <div class="col s12 m12 l12 #ff5252 red accent-2">
                                <a id="2" href="#!" class="white-text" onclick="set_ans(this)"><i class="material-icons small">add</i> <div style="margin-left: 35px;margin-top: -31px;">What nutrients do fruits and vegetables provide ?</div></a>
                            </div>
                            <div class="col s12 m12 l12 #ff8a80 red accent-1">
                                <span id="a2" class="white-text" hidden>Fruits and vegetables are rich in many important vitamins and minerals like vitamin A, vitamin C, folate and potassium. Plus, most fruits and vegetables are low in calories and high in fiber!</span>
                            </div>
                        </div>
                    </div>
                </div>-->

        <div class="row">
            <div class="col s12 m8 l8 z-depth-5 offset-l2 offset-m2">
                <h3 class="center">Frequently Asked Questions</h3>
                <hr/>
                <ul class="collapsible popout col s12 m12 l12 white-text" data-collapsible="accordion">
<!--                    <li>
                        <div class="collapsible-header #ce93d8 red lighten-1"><i class="material-icons">add</i>What are the health benefits from eating fruits and vegetables ?</div>
                        <div class="collapsible-body #f3e5f5 red lighten-4 black-text"><p>Fruits and Vegetables can help prevent heart disease and certain types of cancer.</p></div>
                    </li>-->
<!--                    <li>
                        <div class="collapsible-header #ce93d8 red lighten-1"><i class="material-icons">add</i>What nutrients do fruits give?</div>
                        <div class="collapsible-body #f3e5f5 red lighten-4 black-text"><p>Fruits are rich in many important vitamins and minerals like vitamin A, vitamin C, folate and potassium. Plus, most fruits are low in calories and high in fiber!</p></div>
                    </li>-->
                    <li>
                        <div class="collapsible-header #ce93d8 red lighten-1"><i class="material-icons">add</i>What are your Delivery timings?</div>
                        <div class="collapsible-body #f3e5f5 red lighten-4 black-text"><p><b>TIMING: <span class="red-text">10:00 A.M. TO 08:00 P.M.</span> <br/> </b></p></div>
                    </li>
                    <li>
                        <div class="collapsible-header #ce93d8 red lighten-1"><i class="material-icons">add</i>What are your Order timing?</div>
                        <div class="collapsible-body #f3e5f5 red lighten-4 black-text"><p><b>MORNING TIMING: <span class="red-text">6:00 A.M. TO 12:00 P.M.</b></span></p></div>
                    </li>
                    <li>
                        <div class="collapsible-header #ce93d8 red lighten-1"><i class="material-icons">add</i>What about Delivery delays?</div>
                        <div class="collapsible-body #f3e5f5 red lighten-4 black-text"><p>We value our customer's time, so we always believe to stick with time, but once in a while due to some unavoidable reasons which are not in our control, delivery could be delayed.</p></div>
                    </li>
                    <li>
                        <div class="collapsible-header #ce93d8 red lighten-1"><i class="material-icons">add</i>If i do not have internet connection, then how can i place my order with Fruitkart?</div>
                        <div class="collapsible-body #f3e5f5 red lighten-4 black-text"><p>pick up your phone and dial Mobile #: +91-982-454-1467 (Devidasbhai), we take order over phone also</p></div>
                    </li>
<!--                    <li>
                        <div class="collapsible-header #ce93d8 red lighten-1"><i class="material-icons">add</i>Most fruits are low in calories?</div>
                        <div class="collapsible-body #f3e5f5 red lighten-4 black-text"><p>Fruits are high in fiber, which helps you feel full Fruits make a great snack replacement for unhealthy foods like chips, cookies and cakes. </p></div>
                    </li>-->
                </ul>
            </div>
        </div>
<!--        <script type="text/javascript" src="./js/jquery-3.0.0.js"></script>
        <script type="text/javascript" src="./js/materialize.min.js"></script>-->
    </body>
    <?php
    include './footer.php';
    ?>
</html>