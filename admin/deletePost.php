<?php
    include("includes/header.php");
    if(isset($_GET["id"])){
        $id=$_GET["id"];
        $id=mysqli_real_escape_string($con,$id);
        $id=htmlentities($id);
        //echo $id;

        $sql="DELETE FROM posts WHERE id=$id";
        $res=mysqli_query($con,$sql);
        if($res){
            echo "<div class='chip green white-text'>Deleted Successfully.</div>";
        }
        else
        {
            echo "<div class='chip red white-text'>Something went wrong ! </div>";
        }
    }

?>

<?php
    include("includes/footer.php");
?>