<!DOCTYPE html>
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
    </head>
    <body>
        <?php
// put your code here
        include './header.php';
        ?>
        <div class="row" style="border: 0px red solid;">
            <div class="col s12 m4 l12">
                <h2>Create An Account</h2>
                <span class="red-text left">(* Marks Field Are Mandatory To Fill !!)</span>
            </div>
            <div class="row">
                <div class="input-field col s12 m4 l3">
                    <i class="material-icons prefix">account_circle</i>
                    <input id="first_name" name="fname" type="text" onkeyup="var a = this.value;if (isNaN(a.substr(-1))) {
                            } else {
                                this.value = a.slice(0, -1);
                                Materialize.toast('Characters Only Acceptable !!', 2000);
                            }" required>
                    <label for="first_name">First Name<span class="red-text">*</span></label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m4 l3">
                    <i class="material-icons prefix">account_circle</i>
                    <input id="last_name" type="text" name="lname" class="validate" onkeyup="var a = this.value;if (isNaN(a.substr(-1))) {
                            } else {
                                this.value = a.slice(0, -1); Materialize.toast('Characters Only Acceptable !!', 2000);
                            }" required>
                    <label for="last_name">Last Name<span class="red-text">*</span></label>
                </div>
            </div>
            <!--      <div class="row">
                    <div class="input-field col s12">
                      <input disabled value="I am not editable" id="disabled" type="text" class="validate">
                      <label for="disabled">Disabled</label>
                    </div>
                  </div>-->
            <div class="row">
                <div class="input-field col s12 m4 l3">
                    <i class="material-icons prefix">vpn_key</i>
                    <input id="password" type="password" name="password"  class="validate" required>
                    <label for="password">Password<span class="red-text">*</span></label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m4 l3">
                    <i class="material-icons prefix">email</i>
                    <input id="rg_email" onblur="check_mail()" type="email" name="email" class="validate" required>
                    <label for="rg_email">Email<span class="red-text">*</span></label>
                </div>
                <!--                <div class="row">
                                    <div class="col s12 m8 l8 offset-l2 offset-m2 left">
                                        <span class="red-text left">* Marks Field Are Mandatory To Fill !!</span>
                                    </div>
                                </div>-->
            </div>
            <div class="row">
                <div class="input-field col s12 m4 l4 offset-l1">
                    <input type="Submit"  class="btn disabled" onclick="register()" value="Register" id="rgsubmitbtn" />
                </div>
            </div>
        </div>
<?php
include './footer.php';
?>
    </body>
</html>
