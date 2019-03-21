<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>
        <link rel="stylesheet" href="../css/materialize.min.css" />
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script type="text/javascript" src="../js/jquery-3.0.0.js"></script>
        <script type="text/javascript" src="../js/materialize.min.js"></script>
<!--        <script type="text/javascript" src="../js/functions.js"></script>-->
        <script type="text/javascript">
            function abc()
            {

                var xmlhttp = new XMLHttpRequest();
                xmlhttp.open("POST", "logic.php?page=update_cat", true);
                xmlhttp.onreadystatechange = function ()
                {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
                    {
                        var response = xmlhttp.responseText;//alert(response);
                        var json = JSON.parse(response);
                        var disp = "<table class='striped centered'><tr><th>Id</th><th>Name</th><th>Update</th><th>Delete</th></tr>";
                        for (var i = 0; i <= json.length - 1; i++)
                        {
                            disp += "<tr><td>" + (i + 1) + "</td><td>" + json[i].cat_name + "</td><td><a href='#' onclick='parent.$(\"#upd_cat\").openModal(),parent.$(\"#cat_id_hide\").val(this.id),window.parent.set_id2()' id='" + json[i].cat_id + "' class='tooltipped' data-position='right' data-delay='50' data-tooltip='Update/Edit This Category'><i class='material-icons'>mode_edit</i></a></td><td><a href='#' onclick='parent.$(\"#del_cat\").openModal(),parent.$(\"#cat_id_hide\").val(this.id)' id='" + json[i].cat_id + "' class='tooltipped' data-position='left' data-delay='50' data-tooltip='Delete/Remove This Category'><i class='material-icons'>delete</i><a></td></tr>";
                        }
                        disp += "</table>";
                    }
                    document.getElementById("res").innerHTML = disp;
                    $('.materialboxed').materialbox();
                    $('.tooltipped').tooltip({delay: 50});
                }
                xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xmlhttp.send();
            }
        </script>
        <style>
            input[type=number]::-webkit-inner-spin-button,
            input[type=number]::-webkit-outer-spin-button {
                -webkit-appearance: none;
                -moz-appearance: none;
                appearance: none;
                margin: 0;
            }
            tr,td,th.tdspacing{
                /*               padding: 0px 0px;*/
                align-content: center;
                /*               border-bottom: 1px black solid;*/
                font-size: 15px;

            }
             .cnt {
                overflow-y: scroll;
            }

            .cnt::-webkit-scrollbar { 
                /* This is the magic bit */
                display: none;
            }
        </style>
    </head>
    <body onload="abc()" class="cnt">
        <?php
        ?>
        <div class="container hoverable">
            <form method='POST' name='help'>
                <h3 class='center-align'>Update Category</h3>
                <div id="res"></div>
            </form>
        </div>
    </body>
</html>
