
<?php
    include("includes/header.php");
    if(isset($_POST["update"]))
    {
        $data= $_POST["ckeditor"];
        $data=mysqli_real_escape_string($con,$data);

        $title= $_POST["title"];
        $title=mysqli_real_escape_string($con,$title);
        $title=htmlentities($title);

        $id=$_POST["id"];

        echo "Title: $title<br/>Data : $data";

        $sql="UPDATE posts SET title='$title' , content='$data' where id=$id";
        $res=mysqli_query($con,$sql);
        if($res)
        {
            $_SESSION["message"]="<div class='chip green white-text'>Post updated successfully.</div>";
            header("location:editPost.php?id=$id");
        }
        else
        {
            $_SESSION["message"]="<div class='chip red white-text'>Error occurred, Something went wrong!.</div>";
            header("location:editPost.php?id=$id");
        }
    }

    include("includes/footer.php");
?>