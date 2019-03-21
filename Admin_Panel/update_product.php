<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>
        <link rel="stylesheet" href="../css/materialize.min.css" />
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script type="text/javascript" src="../js/jquery-3.0.0.js"></script>
        <script type="text/javascript" src="../js/materialize.min.js"></script>
        <script type="text/javascript" src="./js/functions.js"></script>
        <script type="text/javascript">
            function abc()
            {

                var xmlhttp = new XMLHttpRequest();
                xmlhttp.open("POST", "logic.php?page=update_prd", true);
                xmlhttp.onreadystatechange = function ()
                {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
                    {
                        var response = xmlhttp.responseText;//alert(response);
                        var json = JSON.parse(response);
                        var disp = "<table class='striped centered'><tr><th>No</th><th>Name</th><th>About</th><th>Mrp</th><th>Quantity</th><th>Image</th><th>Update</th><th>Delete</th></tr>";
                        for (var i = 0; i <= json.length - 1; i++)
                        {
                            disp += "<tr><td>" + (i + 1) + "</td><td>" + json[i].prd_name + "</td><td>" + json[i].prd_about + "</td><td>" + json[i].prd_mrp + "</td><td>" + json[i].prd_quantity + "</td><td><img height='50px' width='50px' class='materialboxed responsive-img' src='" + json[i].prd_image + "' /></td><td><a href='#' onclick='parent.$(\"#upd_prd\").openModal(),parent.$(\"#prd_id_hide\").val(this.id),window.parent.set_id()' id='" + json[i].prd_id + "' class='tooltipped' data-position='right' data-delay='50' data-tooltip='Update/Edit This Product'><i class='material-icons'>mode_edit</i></a></td><td><a href='#' onclick='parent.$(\"#del_prd\").openModal(),parent.$(\"#prd_id_hide\").val(this.id)' id='" + json[i].prd_id + "' class='tooltipped' data-position='left' data-delay='50' data-tooltip='Delete/Remove This Product'><i class='material-icons'>delete</i><a></td></tr>";
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
                 /*This is the magic bit*/ 
                display: none;
            }

        </style>
    </head>
    <body onload="abc()" class="cnt">
        <?php ?>
        <div class="container hoverable">
            <form method='POST' name='help'>
                <h3 class='center-align'>Update Product</h3>
                <div id="res"></div>
            </form>
        </div>
    </body>
    <script>
        $(document).ready(function () {
            // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
//            $('.modal-trigger').leanModal({
//                dismissible: true, // Modal can be dismissed by clicking outside of the modal
//                opacity: .3, // Opacity of modal background
//            });
            $('select').material_select();
        });
    </script>
</html>
