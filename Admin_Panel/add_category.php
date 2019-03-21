<!DOCTYPE html>
<?php
error_reporting(E_ERROR | E_PARSE);
?>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>
        <link rel="stylesheet" href="../css/materialize.min.css" />
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script type="text/javascript" src="../js/jquery-3.0.0.js"></script>
        <script type="text/javascript" src="../js/materialize.min.js"></script>
        <script type="text/javascript" src="./js/functions.js"></script>
    </head>
    <body>
        <?php
        // put your code here
        ?>
        <!--        <form method='POST' name='help' action='logic.php?page=add_cat'>-->
        <h3 class='center-align'>Add Category</h3>
        <hr/>
        <div class='row'>
            <div class='input-field col s12 m8 l8 offset-l2 offset-m2 center'>
                <input id='name_cat' name='cat_name' type='text' onblur='validate(this)' onkeyup="var a = this.value;if (isNaN(a.substr(-1))){}else{this.value = a.slice(0,-1); Materialize.toast('Characters Only Acceptable !!',2000);}" class='validate' required>
                <label for='name_cat'>Category Name</label>
            </div>


            <div class='row'>
                <div class='input-field col s12 m8 l8 offset-l2 offset-m2 center'>
                    <button class='btn waves-effect waves-light' id="add_cat_btn" onclick="add_cat()" disabled type='submit' name='action'>Add Category</button>
                </div>
            </div>

        </div>
        <!--</form>-->
    </body>
    <script>
        $('.alphaonly').bind('keyup blur', function () {
            var node = $(this);
            node.val(node.val().replace(/[^A-Za-z]/g, ''));
//            if (isNaN($(this)))
//            {
//                //Materialize.toast("Characters Allowed Only !!", 2000);
//            } else {
//                Materialize.toast("Characters Allowed Only !!", 2000);
//            }
        }
        );

    </script>
</html>
