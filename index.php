<?php
    include("includes/header.php");
?>
    
<?php
    include("includes/navbar.php");
?>

<div class="container-fluid">
    <div class="row">
        <!-- start of  main content area-->
        <div class="col l9 m9 s12" > 

        <?php
            $sql="SELECT * FROM posts ORDER BY post_date DESC";
            $res=mysqli_query($con,$sql);
            if(mysqli_num_rows($res)>0)
            {
                while($row=mysqli_fetch_assoc($res))
                {
                    ?>
                            <!--  Card Start from here -->
                        <div class="col l3 m4 s6">
                            <div class="card small">
                                    <div class="card-image" style="background-image: linear-gradient(#74ebd5,#acb6e5 );">
                                        <img src="img/<?php echo $row["feature_image"]?>" alt="" style="height:150px" class="img-responsive"> 
                                        <span class="card-title"><?php/* echo $row["title"]*/?></span>
                                    </div>
                                    <div class="card-content" style="background-image: linear-gradient(#acb6e5,#74ebd5 );"><span class="card-title"><?php echo $row["title"]?></span>
                                        <?/*php echo $row["content"];*/?>
                                    </div>
                                    <div class="card-action teal center" style="background-image: linear-gradient(#74ebd5,#acb6e5 );">
                                        <a href="post.php?id=<?php echo $row['id'];?>" class="white-text" style="background-image: linear-gradient(#74ebd5,#acb6e5 );border-radius: 5px;padding: 10px;">Read more...</a>
                                    </div>
                            </div>               
                        </div> 
            <!--  Card End from here --> 
                    <?php
                }
            }           
        ?>
                      
        </div>
        <!-- start of  main content area-->

        <!-- start of sidebar  content area-->
        <div class="col l3 m3 s12" >
            <?php
                include("includes/sidebar.php");
            ?>
        </div>
        <!-- end of sidebar  content area-->
    </div>
</div>

<?php
    include("includes/footer.php");
?>
