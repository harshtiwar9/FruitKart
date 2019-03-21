<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>
        <link rel="stylesheet" href="../css/materialize.min.css" />
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script type="text/javascript" src="../js/jquery-3.0.0.js"></script>
        <script type="text/javascript" src="../js/materialize.min.js"></script>
        <!--<script type="text/javascript" src="./js/functions.js"></script>-->
        <script type="text/javascript">
            function user()
            {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.open("POST", "logic.php?page=view_user", true);
                xmlhttp.onreadystatechange = function ()
                {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
                    {
                        var response = xmlhttp.responseText;//alert(response);
                        var json = JSON.parse(response);
                        var disp = "<table class='striped centered'><tr><th>Id</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Mobile No.</th><th>Address</th><th>Status</th>";
                        for (var i = 0; i <= json.length - 1; i++)
                        {
                            disp += "<tr><td>" + (i + 1) + "</td><td>" + json[i].ud_fname + "</td><td>" + json[i].ud_lname + "</td><td>" + json[i].ud_email + "</td><td>" + json[i].ud_mobile + "</td><td>" + json[i].ud_address + "</td><td>";
                            if (json[i].ud_type === "0")
                            {
                                disp += "<div class='switch'><label>Enabled/Disabled<input type='checkbox' id='chk" + json[i].ud_id + "' onchange='set_status(this)'><span class='lever'></span></label></div>";
                            } else if (json[i].ud_type === "1")
                            {
                                disp += "<div class='switch'><label>Enabled/Disabled<input type='checkbox' id='chk" + json[i].ud_id + "' checked onchange='set_status(this)'><span class='lever'></span></label></div>";
                            }
                            disp += "</td></tr>";
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

            function set_status(obj)
            {
                var id = obj.id;
                //alert($('#' + id).prop('checked'));
                var id2 = id.substr(3);
                if ($('#' + id).prop('checked'))
                {
                    //alert(id);
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.open("POST", "logic.php?page=disable_user", true);
                    xmlhttp.onreadystatechange = function ()
                    {
                        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
                        {
                            var response = xmlhttp.responseText;//alert(response);
                            if (response === "0")
                            {
                                parent.Materialize.toast("User Not Found !!", 2000);
                            } else if (response === "1")
                            {
                                parent.Materialize.toast("Error While Disabling User !!", 2000);
                            } else if (response === "2")
                            {
                                parent.Materialize.toast("User Succesfully Disabled !!", 2000);
                            }
                        }
                        //$(".main_disp").html(jsonResponse);
                    }
                    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    xmlhttp.send("id=" + id2 + "&dis=1");
                } else {
                    //alert(id);
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.open("POST", "logic.php?page=disable_user", true);
                    xmlhttp.onreadystatechange = function ()
                    {
                        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
                        {
                            var response = xmlhttp.responseText;//alert(response);
                            if (response === "0")
                            {
                                parent.Materialize.toast("User Not Found !!", 2000);
                            } else if (response === "1")
                            {
                                parent.Materialize.toast("Error While Enabling User !!", 2000);
                            } else if (response === "2")
                            {
                                parent.Materialize.toast("User Succesfully Enabled !!", 2000);
                            }
                        }
                        //$(".main_disp").html(jsonResponse);
                    }
                    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    xmlhttp.send("id=" + id2 + "&dis=0");
                }
                //alert(id);
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
    <body onload="user()" class="cnt">
        <?php
        // put your code here
        ?>
        <div class="container hoverable">
            <form method='POST' name='help'>
                <h3 class='center-align'>Disable User</h3>
                <hr/>
                <div id="res"></div>
            </form>
        </div>
    </body>

</body>
</html>
