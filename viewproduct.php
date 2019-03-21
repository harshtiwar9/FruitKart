<?php include './connection.php'; ?>
<html>
    <head>
       <?php // include './scripts.html'; ?>
        <!--<link rel="stylesheet" href="./css/materialize.css" />-->
        <link rel="stylesheet" href="./css/materialize.min.css" />
        <!--<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">-->
        <link href="./iconfont/material-icons.css" rel="stylesheet">
        <script type="text/javascript" src="./js/jquery-3.0.0.js"></script>
        <script type="text/javascript" src="./js/materialize.js"></script>
    </head>
    <body>
    <center><input type="button" value="Add New Product" class="btn" onclick="addprod()"></center>
        <table class="striped centered">
            <thead>
                <tr>
                    <th>Category ID</th>
                    <th>Category Name</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>MRP</th>
                    <th>Avaiable Quantity</th>
                    <th>Update</th>
                    <th>Delete</th>
                 </tr>
             </thead>
            <tbody>
        <?php
            $result= mysqli_query($con,"SELECT product_details.prd_id,product_details.prd_name,product_details.prd_mrp,product_details.prd_quantity,category.cat_id,category.cat_name FROM product_details INNER JOIN category ON product_details.cat_id=category.cat_id;");
            while($row=  mysqli_fetch_array($result))
            {?>
            <tr>
                <td><?php echo $row['cat_id']; ?></td>
                <td><?php echo $row['cat_name']; ?></td>
                <td id="prd_id"><?php echo $row['prd_id']; ?></td>
                <td><?php echo $row['prd_name']; ?></td>
                <td><?php echo $row['prd_mrp']; ?></td>
                <td><?php echo $row['prd_quantity']; ?></td>
                <td><a href="updproduct.php?val=<?php echo $row['prd_id']; ?>">Update</a></td>
                <td><a href="" onclick="deleteprd()">Delete</a></td>
                <td></td>
            </tr>
        <?php }?>
            </tbody>
        </table>
        <script>function addprod(){window.location="./addproduct.php"}</script>
        <script src="../js/deleteprd.js"></script>
    </body>
</html>
