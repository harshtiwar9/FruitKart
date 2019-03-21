<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
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
    </head>
    <body>
        <?php
        // put your code here
        ?>
        <div class="row">
            <div class="col s2 m1 l1">
                <a class="waves-effect waves-teal btn-floating disabled" id="rem"><i class="material-icons">remove</i></a>
            </div>
            <div class="col s2 m2 l1">
                <input type="text" id="qty" value="500 GM" />
            </div>
            <div class="col s2 m1 l1">
                <a class="waves-effect waves-teal btn-floating" id="add" onclick="setval(this)"><i class="material-icons">add</i></a>
            </div>
        </div>
        
        <i class="material-icons prefix" style="margin-bottom: -64px;margin-left: -102px;">local shipping</i>
        
        <div class='card-action' style='height:60px;'>
            <span style='margin-left:-85px;' class='red-text'>&#8377; <?php echo $row["prd_mrp"] ?></span>
            <div style='margin-left:10px;' class="row">
                <div class="col s12 m1 l1">
                    <a class="waves-effect waves-teal btn-floating disabled" style="margin-left: 14px;margin-top: -6px;" id="rem"><i class="material-icons">remove</i></a>
                </div>
                <div class="input-field col s6 yellow">
                    <input placeholder="Placeholder" id="qty" type="text" class="validate red-text" value="500 GM">
                    <label for="qty">Quantity</label>
                </div>
                <div class="col s12 m1 l1">
                    <a class="waves-effect waves-teal btn-floating" id="add" style="margin-left: 97px;margin-top: -6px;" onclick="setval(this)"><i class="material-icons">add</i></a>
                </div>
            </div>
            <button value='<?php echo $row["prd_name"] ?>' id='<?php echo $row["prd_id"] ?>' style='margin-left:200px; margin-top:-127px;' onclick="add_cart(this)" class='btn-floating btn-small red' type='submit'><i class='tiny material-icons' style="margin-right: -11px;margin-top: 2px">favorite border</i></button>
            <button value='<?php echo $row["prd_name"] ?>' id='<?php echo $row["prd_id"] ?>' style='margin-left:250px; margin-top:-171x;' onclick="add_cart(this)" class='btn-floating btn-small red' type='submit'><i class='tiny material-icons'>shopping_cart</i></button>
        </div>
    </body>
    <script>
//        function setval(obj)
//        {
//            var id = obj.id;
//            var val = $('#qty').val();
//            if (id == "add")
//            {
//                if (val == "500 GM")
//                {
//                    $('#qty').val("1 KG");
//                } else {
//                    //val.trim();
//                    if (val.length > 4)
//                    {
//                        val = val.substr(0, 3);
//                        //alert(val);
//                        if (val == "4.5")
//                        {
//                            $('#add').addClass('disabled');
//                            $('#add').prop('onclick', null).off('click');
//                            val += 0.5;
//                            $('#qty').val("");
//                            $('#qty').val((parseInt(val) + 1) + " KG");
//                        } else {
//                            //console.log((parseInt(val) + 1));
//                            $('#qty').val("");
//                            $('#qty').val((parseInt(val) + 1) + " KG");
//                        }
//                    } else {
//                        var unit = val.slice(-2);
//                        val = parseInt(val[0]);
//                        if (val == "5")
//                        {
//                                $('#add').addClass('disabled');
//                            val += 0.5;
//                            $('#qty').val(val + " " + unit);
//                        } else {
//                            val += 0.5;
//                            $('#qty').val(val + " " + unit);
//                        }
//                    }
//                }
//            } else if (id == "rem")
//            {
//                if (val.length > 4)
//                {
//                    val = val.substr(0, 3);
//                    //alert(val);
//                    if (val == "500")
//                    {
//                        $('#rem').addClass('disabled');
//                    } else {
//                        //console.log((parseInt(val) + 1));
//                        $('#qty').val("");
//                        $('#qty').val((parseInt(val) - 1) + " KG");
//                    }
//                } else {
//                    var unit = val.slice(-2);
//                    val = parseInt(val[0]);
//                    if (val == "500")
//                    {
//                        $('#rem').addClass('disabled');
//                        val -= 0.5;
//                        $('#qty').val(val + " " + unit);
//                    } else {
//                        $("#add").removeClass("disabled");
//                        $("#add").click(function () {
//                            setval(this);
//                        });
//                        val -= 0.5;
//                        $('#qty').val(val + " " + unit);
//                    }
//                }
//            }
//        }

        function setval(obj)
        {
            var id = obj.id;
            var val = $('#qty').val();
            var qty = ["500 GM", "1 KG", "1.5 KG", "2 KG", "2.5 KG", "3 KG", "3.5 KG", "4 KG", "4.5 KG", "5 KG"];
            //alert(qty.length);
            var index = "";
            if (id == "add")
            {
                index = qty.indexOf(val);
                //alert("current :" + index);
                if (index <= 8)
                {
                    index++;
                    if (index > 8)
                    {
                        $('#qty').val(qty[index]);
                        $('#add').addClass('disabled');
                        $('#add').prop('onclick', null).off('click');
                    } else {
                        //alert("now :" + index);
                        $('#qty').val(qty[index]);
                        $('#rem').removeClass('disabled');
                        $('#rem').attr('onclick', 'setval(this)');
                    }
                }
            } else if (id == "rem")
            {
                index = qty.indexOf(val);
                //alert("current :" + index);
                if (index == 9)
                {
                    index--;
                    $('#qty').val(qty[index]);
                    $('#add').removeClass('disabled');
                    $('#add').attr('onclick', 'setval(this)');
                } else if (index == 1)
                {
                    index--;
                    $('#qty').val(qty[index]);
                    $('#rem').addClass('disabled');
                    $('#rem').prop('onclick', null).off('click');
                } else {
                    index--;
                    $('#qty').val(qty[index]);
                }
            }
        }
    </script>
</html>
