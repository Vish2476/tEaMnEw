<?php
    include("includes/header.php");
    if(isset($_POST["comment"]))
    {
        $email=$_POST["email"];
        $comment=$_POST["comment_text"];
        $id=$_GET["id"];

         //----- this prevent us from sql injection attack ----------------------
         $email=mysqli_real_escape_string($con,$email);
         $comment=mysqli_real_escape_string($con,$comment);
         $id=mysqli_real_escape_string($con,$id);
         //------this will prevent JS Attack
         $email=htmlentities($email);
         $comment=htmlentities($comment);
         $id=htmlentities($id);

         $sql3="INSERT INTO comment (email,comment_text,postID,commentDate,status) VALUES('$email','$comment',$id,curdate(),1)";
            echo $sql3;
         $res3=mysqli_query($con,$sql3);
         if($res3)
         {
            $_SESSION['message']="<div class='chip green center white-text'>Comment added successfully!</div>";
            header("Location:post.php?id=$id");
         }
         else
         {
            $_SESSION['message']="<div class='chip red center white-text'>Sorry, Something went wrong!</div>";
            header("Location:post.php?id=$id");
         }


    }
?>