<?php
    include("includes/header.php");
    include("includes/navbar.php");


    if(isset($_GET["submit"]))
    {
        $q=$_GET["search"];
        $q=mysqli_real_escape_string($con,$q);
        $q=htmlentities($q);

        $sql="SELECT title,content,p.id as p_id,feature_image FROM posts p ,users u WHERE p.author=u.id AND (p.title like '$q' OR p.content like '$q' OR p.title like '%$q%'  OR p.content like '%$q%')" ;
        //echo $sql;
        $res=mysqli_query($con,$sql);
        if(mysqli_num_rows($res)>0)
        {
            ?>
                            <div class="row">
        <!-- start of  main content area-->
        <div class="col l9 m9 s12" > 

        <?php
                while($row=mysqli_fetch_assoc($res))
                {
                    ?>
                            <!--  Card Start from here -->
                        <div class="col l3 m4 s6">
                            <div class="card small">
                                    <div class="card-image">
                                        <img src="img/<?php echo $row["feature_image"]?>" alt="" style="height:150px" class="img-responsive"> 
                                        <span class="card-title"><?php echo $row["title"]?></span>
                                    </div>
                                    <div class="card-content">
                                        <?php echo $row["content"];?>
                                    </div>
                                    <div class="card-action teal center">
                                        <a href="post.php?id=<?php echo $row['p_id'];?>" class="white-text">Read more...</a>
                                    </div>
                            </div>            
                        </div> 
            <!--  Card End from here --> 
                    <?php
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
            <?php 
        }
        else
        {
            ?>
                <h5>NO data found with the given search keywords, try searching with other keywords!</h5>
            <?php
        }
    }
    else
    {
        header("location:index.php");    
    }
?>

<?php
    include("includes/header.php");

?>