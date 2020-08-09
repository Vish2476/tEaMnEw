<?php
    include("includes/header.php");
    include("includes/navbar.php");

    if(isset($_SESSION["username"]))
    {
        
    if(isset($_GET["id"])){
        $id=$_GET["id"];
        $id=mysqli_real_escape_string($con,$id);
        $id=htmlentities($id);
        echo $id;
        $sql="SELECT * FROM posts WHERE id=$id";
        $res=mysqli_query($con,$sql);
        if(mysqli_num_rows($res)>0)
        {
            $row=mysqli_fetch_assoc($res);
            ?>
            <div class="main">
    <form action="edit_check.php" method="post" enctype="multipart/form-data">
    <div class="card-panel">
    <?php
                    if(isset($_SESSION["message"]))
                    {
                        echo $_SESSION["message"];
                        unset($_SESSION["message"]);
                    }
                   
                ?>
        <h5>Title For Post</h5>
        <input type="hidden" name="id" value="<?php echo $id;?>">
        <textarea name="title" class="materialize-textarea" placeholder="Title For Post"><?php echo $row["title"];?></textarea>

        <h5>Post Content</h5>
        <textarea name="ckeditor" id="ckeditor" class="ckeditor" cols="30" rows="10"><?php echo $row["content"];?></textarea>

        <div class="center">
            <input type="submit" value="update" name="update" class="btn white-text ">
        </div>
    </div>
    
        
    </form>

</div>




      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="../js/jquery.js"></script>
      <script type="text/javascript" src="../js/ckeditor/ckeditor.js"></script>
            <?php
        }
        else
        {
            header("dashboard.php");
        }

    }
?>
<?php
    include("includes/footer.php");
?>
<?php
          }
          else
          {
               $_SESSION['message']="<div class='chip red white-text'>Please login to continue !</div>";
               header("location:login.php");
          }
?>