<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <!--        <link rel="stylesheet" href="./css/materialize.css" />-->
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
        <div class="slider" style="margin-top: 2px; ">
            <ul class="slides">
                <li>
                    <img src="./Images/Apple.jpg"> <!-- random image -->
                    <div class="caption center-align">
                        <!--                        <h3>This is our big Tagline!</h3>
                                                <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>-->
                    </div>
                </li>
                <li>
                    <img src="./Images/grapes.jpg"> <!-- random image -->
                    <div class="caption left-align">
                        <!--                        <h3>Left Aligned Caption</h3>
                                                <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>-->
                    </div>
                </li>
                <li>
                    <img src="./Images/oranges.jpg"> <!-- random image -->
                    <div class="caption right-align">
                        <!--                        <h3>Right Aligned Caption</h3>
                                                <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>-->
                    </div>
                </li>
                <!--                <li>
                                    <img src="http://lorempixel.com/580/250/nature/4">  random image 
                                    <div class="caption center-align">
                                        <h3>This is our big Tagline!</h3>
                                        <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
                                    </div>
                                </li>-->
            </ul>
        </div>
<!--        <div class="row">
            <div class="col s10 offset-s10" style="width: 200px; margin-left: 75%;">
                Sort by <select onchange="sortby(this)" id="sort">
                    <option value="0" selected >A-Z</option>
                    <option value="0" selected >Z-A</option>
                    <option value="1">Price: Low to High</option>
                    <option value="2">Price: High to Low</option>
                </select>
            </div>
        </div>-->
    </body>
    
    <script>
        $(document).ready(function () {
            $('.slider').slider({full_width: true});
        });
        
        $(document).ready(function () {
            $('select').material_select();
        });
    </script>
</html>
