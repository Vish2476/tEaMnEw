<?php
error_reporting(0);
  ob_start();
  session_start();
  include("includes/dbh.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Covid-Blog</title>
      <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
  <link type="text/css" rel="stylesheet" href="css/main.css" />
<style type="text/css">
  body{ 
        background: #c33764; /* fallback for old browsers */
  background: -webkit-linear-gradient(to bottom, #c33764, #1d2671); /* Chrome 10-25, Safari 5.1-6 */
  background: linear-gradient(to bottom, #c33764, #1d2671);
  font-family: rockwell;
  font-size: 22px;
    }
    /footer{
      background-image: linear-gradient(to right top, #6bd1cd, #3ad9c4, #00e0b2, #00e596, #00e970, #00e084, #00d693, #00cb9d, #00aebf, #008ce5, #0062ee, #1c0fbf);
    }
</style>    
</head>
<body class="grey lighten-3" >