<?php
  ob_start();
  session_start();
  include("dbh.php");
  include("sessionHead.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>
      <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="../css/materialize.min.css" media="screen,projection" />
  <link type="text/css" rel="stylesheet" href="../css/main.css" />
  <style> 
        header,footer,.main
        {
            padding-left:300px;s
        }
        @media(max-width:992px)
        {
            header,footer,.main
                {
                    padding-left:0px;s
                }
        }
         body{ 
        background: #c33764; /* fallback for old browsers */
  background: -webkit-linear-gradient(to bottom, #c33764, #1d2671); /* Chrome 10-25, Safari 5.1-6 */
  background: linear-gradient(to bottom, #c33764, #1d2671);
  font-family: rockwell;
  font-size: 22px;
  height: 100%
    }
 
    </style>      
</head>
<body class="grey lighten-3">