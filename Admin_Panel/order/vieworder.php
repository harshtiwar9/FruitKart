<?php include '../../connection.php';
session_start();

?><!DOCTYPE html>

<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
     <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/materialize.min.css" />
        <link href="../iconfont/material-icons.css" rel="stylesheet">
        <script type="text/javascript" src="../js/jquery-3.0.0.js"></script>
        <script type="text/javascript" src="../js/materialize.js"></script>
    </head>
    <body>
        <center>
            
<!--                    <div class="col">
                        <h5><u>View Orders Between</u></h5>
                    </div>
            <form method="post" action="vieworder1.php">
                <div class="row" style="padding-top: 20px;padding-left: 200px;">
                    <div class="col">
                        From:<input name="datefrom" type="date" class="datepicker center" style="width: 150px;">
                        To:<input name="dateto" type="date" class="datepicker center" style="width: 150px;">
                    </div>
                    <div class="input-field col s12" style="width: 300px;">
                        <select name="a1">
                            <option value="">Select User</option>
                                <?php $aa=mysqli_query($con,"SELECT * FROM user_details");while($arow=  mysqli_fetch_array($aa)) {?>
                                    <option value="AND ud_id='<?php echo $arow['ud_id']; ?>'"><?php echo "(ID:".$arow['ud_id'].") ".$arow['ud_fname']." ".$arow['ud_lname']; ?></option>
                                <?php }?>
                            </select>
                        </div>
                </div> 
                <div class="col">
                        <input type="submit" value="Get Records" class="btn">&emsp14;&emsp14;&emsp14;&emsp14;
                </div>
            </form>-->
            <!--<div class="input-field" style="width: 300px;"><input class="" style="width: 300px;height:50px;margin-top: 5px;" id="search" onkeyup="fetch(value)" type="search" placeholder="Search Order" required><i class="material-icons">close</i></div>-->
                <div id="searchdiv"></div>
        </center>
        <div class="row center centered" style="width: 100%;">
            <div class="col s2" style="width: 20%;">
                <a style="color:salmon;font-weight:bold;">Pending</a>
                <table style="width: 100%">
                    <thead>
                        <th>ID</th>
                        <th>Date</th>
                        <th>Change Status</th>
                    </thead>
                    <tbody>
                        <?php  $datefrom="";$dateto="";$user="";if(isset($_SESSION['datefrom']) || isset($_SESSION['dateto']) || isset($_SESSION['a1'])){$datefrom=$_SESSION['datefrom'];$dateto=$_SESSION['dateto'];$user=$_SESSION['a1'];}$date=""; if(!isset($datefrom) || !isset($dateto) || $datefrom==NULL || $dateto==NULL){$date=NULL;}else{$date="AND DATE(ord_date) BETWEEN '$datefrom' AND '$dateto'";} 
                            $a=  mysqli_query($con,"SELECT * FROM order_details WHERE ord_status=0 $user $date ORDER BY ord_date DESC");
                            while($a1=  mysqli_fetch_array($a)){?>
                            <tr id="<?php echo $a1['ord_id']; ?>">
                                    <td>
                                        <a href="#my-order" class="modal-trigger" id="aa" style="color: black" onclick="order('<?php echo $a1['ord_id']; ?>')"><?php echo $a1['ord_id']; ?></a>
                                    </td>
                                    <td>
                                        <?php $date=date('d-m-Y',strtotime($a1['ord_date']));echo $date;?>
                                    </td>
                                    <td><select id="status" onchange="changeorderstatus(<?php echo $a1['ord_id']; ?>,this.value)"><option value="" disabled selected>Change</option><option value="0">Pending</option><option value="1">Confirmed</option><option value="2">Dispatched</option><option value="3">Delivered</option><option value="4">Cancelled</option><option value="5">Cancelled After Confirming</option></select></td>
                                </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
            <div class="col s2" style="width: 20%;">
                <a style="color:salmon;font-weight:bold;">Confirmed</a>
                <table style="width: 100%">
                    <thead>
                        <th>ID</th>
                        <th>Date</th>
                        <th>Change Status</th>
                    </thead>
                    <tbody>
                        <?php  if(isset($_SESSION['datefrom']) || isset($_SESSION['dateto']) || isset($_SESSION['a1'])){$datefrom=$_SESSION['datefrom'];$dateto=$_SESSION['dateto'];$user=$_SESSION['a1'];}$date=""; if(!isset($datefrom) || !isset($dateto) || $datefrom==NULL || $dateto==NULL){$date=NULL;}else{$date="AND DATE(ord_date) BETWEEN '$datefrom' AND '$dateto'";} 
                            $a=  mysqli_query($con,"SELECT * FROM order_details WHERE ord_status=1 $user $date ORDER BY ord_date DESC");
                            while($a1=  mysqli_fetch_array($a)){?>
                                <tr>
                                    <td>
                                        <a href="#my-order" class="modal-trigger" id="aa" style="color: black" onclick="order('<?php echo $a1['ord_id']; ?>')"><?php echo $a1['ord_id']; ?></a>
                                    </td>
                                    <td>
                                        <?php $date=date('d-m-Y',strtotime($a1['ord_date']));echo $date;?>
                                    </td>
                                    <td><select id="status" onchange="changeorderstatus(<?php echo $a1['ord_id']; ?>,this.value)"><option value="" disabled selected>Change</option><option value="0">Pending</option><option value="1">Confirmed</option><option value="2">Dispatched</option><option value="3">Delivered</option><option value="4">Cancelled</option><option value="5">Cancelled After Confirming</option></select></td>
                                </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
            <div class="col s2" style="width: 20%;">
                <a style="color:salmon;font-weight:bold;">Dispatched</a>
                <table style="width: 100%">
                    <thead>
                        <th>ID</th>
                        <th>Date</th>
                        <th>Change Status</th>
                    </thead>
                    <tbody>
                       <?php  if(isset($_SESSION['datefrom']) || isset($_SESSION['dateto']) || isset($_SESSION['a1'])){$datefrom=$_SESSION['datefrom'];$dateto=$_SESSION['dateto'];$user=$_SESSION['a1'];}$date=""; if(!isset($datefrom) || !isset($dateto) || $datefrom==NULL || $dateto==NULL){$date=NULL;}else{$date="AND DATE(ord_date) BETWEEN '$datefrom' AND '$dateto'";} 
                            $a=  mysqli_query($con,"SELECT * FROM order_details WHERE ord_status=2 $user $date ORDER BY ord_date DESC");
                            while($a1=  mysqli_fetch_array($a)){?>
                                <tr>
                                    <td>
                                        <a href="#my-order" class="modal-trigger" id="aa" style="color: black" onclick="order('<?php echo $a1['ord_id']; ?>')"><?php echo $a1['ord_id']; ?></a>
                                    </td>
                                    <td>
                                        <?php $date=date('d-m-Y',strtotime($a1['ord_date']));echo $date;?>
                                    </td>
                                    <td><select id="status" onchange="changeorderstatus(<?php echo $a1['ord_id']; ?>,this.value)"><option value="" disabled selected>Change</option><option value="0">Pending</option><option value="1">Confirmed</option><option value="2">Dispatched</option><option value="3">Delivered</option><option value="4">Cancelled</option><option value="5">Cancelled After Confirming</option></select></td>
                                </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
            <div class="col s2" style="width: 20%;">
                <a style="color:salmon;font-weight:bold;">Delivered</a>
                <table style="width: 100%">
                    <thead>
                        <th>ID</th>
                        <th>Date</th>
                        <th>Change Status</th>
                    </thead>
                    <tbody>
                        <?php  if(isset($_SESSION['datefrom']) || isset($_SESSION['dateto']) || isset($_SESSION['a1'])){$datefrom=$_SESSION['datefrom'];$dateto=$_SESSION['dateto'];$user=$_SESSION['a1'];}$date=""; if(!isset($datefrom) || !isset($dateto) || $datefrom==NULL || $dateto==NULL){$date=NULL;}else{$date="AND DATE(ord_date) BETWEEN '$datefrom' AND '$dateto'";} 
                            $a=  mysqli_query($con,"SELECT * FROM order_details WHERE ord_status=3 $user $date ORDER BY ord_date DESC");
                            while($a1=  mysqli_fetch_array($a)){?>
                                <tr>
                                    <td>
                                        <a href="#my-order" class="modal-trigger" id="aa" style="color: black" onclick="order('<?php echo $a1['ord_id']; ?>')"><?php echo $a1['ord_id']; ?></a>
                                    </td>
                                    <td>
                                        <?php $date=date('d-m-Y',strtotime($a1['ord_date']));echo $date;?>
                                    </td>
                                    <td><select id="status" onchange="changeorderstatus(<?php echo $a1['ord_id']; ?>,this.value)"><option value="" disabled selected>Change</option><option value="0">Pending</option><option value="1">Confirmed</option><option value="2">Dispatched</option><option value="3">Delivered</option><option value="4">Cancelled</option><option value="5">Cancelled After Confirming</option></select></td>
                                </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
            <div class="col s2" style="width: 20%;">
                <a style="color:salmon;font-weight:bold;">Canceled</a>
                <table style="width: 100%">
                    <thead>
                        <th>ID</th>
                        <th>Date</th>
                        <th>Change Status</th>
                    </thead>
                    <tbody>
                        <?php  if(isset($_SESSION['datefrom']) || isset($_SESSION['dateto']) || isset($_SESSION['a1'])){$datefrom=$_SESSION['datefrom'];$dateto=$_SESSION['dateto'];$user=$_SESSION['a1'];}$date=""; if(!isset($datefrom) || !isset($dateto) || $datefrom==NULL || $dateto==NULL){$date=NULL;}else{$date="AND DATE(ord_date) BETWEEN '$datefrom' AND '$dateto'";} 
                            $a=  mysqli_query($con,"SELECT * FROM order_details WHERE ord_status=4 $user $date ORDER BY ord_date DESC");
                            while($a1=  mysqli_fetch_array($a)){?>
                                <tr>
                                    <td>
                                        <a href="#my-order" class="modal-trigger" id="aa" style="color: black" onclick="order('<?php echo $a1['ord_id']; ?>')"><?php echo $a1['ord_id']; ?></a>
                                    </td>
                                    <td>
                                        <?php $date=date('d-m-Y',strtotime($a1['ord_date']));echo $date;?>
                                    </td>
                                    <td><select id="status" onchange="changeorderstatus(<?php echo $a1['ord_id']; ?>,this.value)"><option value="" disabled selected>Change</option><option value="0">Pending</option><option value="1">Confirmed</option><option value="2">Dispatched</option><option value="3">Delivered</option><option value="4">Cancelled</option><option value="5">Cancelled After Confirming</option></select></td>
                                </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
            
        </div>
        <div id="my-order" class="modal" style="height: 700px; width: 700px;">
            <div class="modal-content" style="height: 100%; width: 100%;">
                <div id="a1"></div>
            </div>
        </div>
        <script>$(document).ready(function(){$('.modal-trigger').leanModal();});</script>
        <script>$(document).ready(function(){$('select').material_select();});</script>
        <script src="../js/changeorderstatus.js"></script>
        <script>
            $(document).mouseup(function (e)
                {
                        var container = $("#search");

                        if (!container.is(e.target) // if the target of the click isn't the container...
                            && container.has(e.target).length === 0) // ... nor a descendant of the container
                        {
                            container.val(null);
                            setTimeout(function () {$("#searchdiv").text(null);},50);

                        }   
                });
            function order(str)
            {
                var xmlhttp;
                if(window.XMLHttpRequest)
                {
                    xmlhttp= new XMLHttpRequest();
                }
                else
                    {
                        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                    }
                xmlhttp.onreadystatechange=function()
                {  
                    if(xmlhttp.readyState===4 && xmlhttp.status===200)
                    {
                        document.getElementById("a1").innerHTML=xmlhttp.responseText;
                    }
               };
               xmlhttp.open("POST","vieworder2.php",true);
               xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
               xmlhttp.send("a="+str);
            }
            function fetch(str)
            {
                var xmlhttp;
                if(window.XMLHttpRequest)
                {
                    xmlhttp=new XMLHttpRequest();
                }
                else
                {
                    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange=function ()
                {
                    if(xmlhttp.readyState==4 && xmlhttp.status==200)
                    {
                        document.getElementById("searchdiv").innerHTML=xmlhttp.responseText;
                    }
                };
                xmlhttp.open("POST","../../logic.php?page=search0",true);
                xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                xmlhttp.send("value="+str);
            }
        </script>
        <script>$('.datepicker').pickadate({selectMonths: true, // Creates a dropdown to control month
                selectYears: <?php echo"100";?>,
                format: 'yyyy-mm-dd',
                formatSubmit: 'yyyy/mm/dd',
                hiddenPrefix: 'prefix__',
                hiddenSuffix: '__suffix'
                });// Creates a dropdown of 15 years to control year
        </script>
    </body>
</html>
