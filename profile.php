<?php
error_reporting(E_ERROR | E_PARSE);
session_start();
if (!isset($_SESSION['ud_fname'])) {
    header("Location: ./Home.php");
} else {
//print_r($_SESSION);
    include './connection.php';
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
            <script type="text/javascript" src="./js/materialize.js"></script>
            <script>
            
            </script>
        </head>
        <body>
            <?php
            // put your code here
            include './header.php';
            $user = $_SESSION['ud_email'];
            $query1 = mysqli_query($con, "select * from user_details where ud_email='$user'");
            while ($row = mysqli_fetch_array($query1)) {
                ?>
                <div class="container">
                    <ul class="collapsible popout" data-collapsible="expandable">
                        <li>
                            <div class="collapsible-header active"><i class="material-icons">list</i>Personal Details</div>
                            <div class="collapsible-body center row">
                                <div class="input-field col s11 m12 l8 offset-l2">
                                    <i class="material-icons prefix">contact_phone</i>
                                    <input id="txtnumber" type="text" name="txtnumber" pattern="(7|8|9)\d{9}" oninput="if(this.value.length > 10) {this.value = this.value.slice(0,10);}"  value="<?php echo $row['ud_mobile']; ?>" class="validate">
                                    <span id="errmobile" class="red-text"></span>
                                    <label for="txtnumber">Mobile Number</label>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="collapsible-header active"><i class="material-icons">list</i>Address</div>
                            <div class="collapsible-body center row">
                                <div class="input-field col s11 m12 l8 offset-l2">
                                    <i class="material-icons prefix">home</i>
                                    <input id="txtaddress1" value="<?php echo $row['ud_address']; ?>" type="text" name="txtaddress1" class="validate">
                                    <label for="txtaddress1">Address</label>
                                </div>
                            </div>
                        </li>
                    </ul>
        <?php
        if ($row['ud_mobile'] == "" && $row['ud_address'] == "") {
            ?>
                        <div class="row center">
                            <div class="col s12 m6 l6">
                                <a class="waves-effect waves-light btn"  onclick="set_details()">Save Details</a>
                            </div>
                            <div class="col s12 m6 l6">
                                <a class="waves-effect waves-light btn" onclick="window.location.href = './Home.php'">Skip Now</a>
                            </div>
                        </div>
            <?php
        } else {
            ?>
                        <div class="row center">
                            <div class="col s12 m12 l12">
                                <a class="waves-effect waves-light btn" onclick="set_details()">Update Details</a>
                            </div>
                        </div>
            <?php
        }
        ?>
                </div>
            </body>
        </html>
        <?php
    }
// put your code here
    include './footer.php';
}
?>