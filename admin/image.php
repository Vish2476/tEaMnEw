<?php
    include("includes/header.php");
    include("includes/navbar.php");
    if(isset($_SESSION["username"]))
    {
        $user_id=$_SESSION["user_id"];
        //$dir="../img/";
        //$files=scandir($dir);
        $sql="SELECT feature_image FROM posts where author=$user_id ORDER BY post_date DESC";
        $res=mysqli_query($con,$sql);
        if(mysqli_num_rows($res)>0)
        {          
                ?>
                    <div class="main">
                        <div class="row">

                        <?php 
                             while($row=mysqli_fetch_assoc($res))
                             {
                                ?>
                                        <div class="col l2 m3 s6">
                                            <div class="card">
                                                <div class="card-image">
                                                    <img src="../img/<?php echo $row["feature_image"];?>" alt="" style="height:100px;;" class="img-responsive">
                                                    <span class="card-title"><?php echo $row["feature_image"]?></span>
                                                </div>
                                                
                                            </div>
                                        </div>
                                <?php
                             }
                        ?>
                            
                        </div>                           
                    </div>
                <?php
            
        }
?>
<div class="fixed-action-btn">
                <a href="write.php" class="btn-floating btn btn-large white-text pulse" style="background-image: linear-gradient(#74ebd5,#acb6e5 );border-radius: 5px;"><i class="material-icons">edit</i></a>
            </div>
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