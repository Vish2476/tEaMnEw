<?php
    include("includes/header.php");
?>
    

<?php
    include("includes/navbar.php");
?>

<div class="container-fluid" >
    <div class="row" >
        <!-- start of  main post content area-->
        <div class="col l9 m9 s12" >
                <?php
                    if(isset($_GET["id"]))
                    {
                        $id=$_GET["id"];
                        $id=mysqli_real_escape_string($con,$id);
                        $id=htmlentities($id);
                        $sql="SELECT * FROM posts p, users u  WHERE  p.author=u.id AND p.id=$id";
                        $res=mysqli_query($con,$sql);
                        if(mysqli_num_rows($res)>0)
                        {
                            $sql="select ";
                            $row=mysqli_fetch_assoc($res);
                            $title=$row["title"];
                            $content=$row["content"];
                            $views=$row["view"];
                            //echo $views;
                            $sql1="UPDATE posts SET view=view+1 WHERE id=$id";
                            mysqli_query($con,$sql1);
                            ?>
                                
                                <div class="card-panel">
                                    <div class="collection  teal center with-header" style="background-image: linear-gradient(#acb6e5,#74ebd5 );border-radius: 5px;">
                                    <h5 class="teal white-text" style="background-image: linear-gradient(#acb6e5,#74ebd5 );border-radius: 5px;"><?php echo ucwords($title);?></h5>
                                    </div>
                                    <h5 style="background-image: linear-gradient(#74ebd5,#acb6e5 );border-radius: 5px;padding: 10px;"><b>Author</b> : <?php echo $row["username"]?> <br/><b>Date</b> : <?php echo $row["post_date"];?></h5>

                                        <p class="flow-text">
                                            <?php echo $content;?>
                                        </p> 
                                        <div class="card-panel">
                                        <div class="collection teal center with-header" style="background-image: linear-gradient(#acb6e5,#74ebd5 );border-radius: 5px;">
                                            <h5 class="white-text">Write comments to us</h5>
                                        </div>
                                        <div class="center">
                                        <?php
                                            if(isset($_SESSION["message"]))
                                                {
                                                    echo $_SESSION["message"];
                                                    unset($_SESSION["message"]);
                                                }
                                        ?>
                                            </div>
                                        
                                            <div class="row ">
                                                <div class="col l8 offset-l2 m10 offset-m1 s12 ">
                                                    <form action="addComment.php?id=<?php echo $id?>" method="post">
                                                        <div class="input-field">
                                                            <input type="email" name="email" id="" placeholder="Enter Email" class="validate">
                                                            <label for="email" data-error="Invalid email format"></label>
                                                        </div>
                                                        <div class="input-field">
                                                            <textarea name="comment_text" class="materialize-textarea" placeholder="Your comment goes here..."></textarea>
                                                        </div>
                                                        <div class="center">
                                                            <input type="submit" value="Comment" name="comment" class="btn">
                                                        </div>
                                                    </form>
                                                    <div class="collection teal center with-header" style="background-image: linear-gradient(#acb6e5,#74ebd5 );border-radius: 5px;">
                                            <h5 class="white-text">Comments</h5>
                                        </div>
                                                    <ul class="collection">
                                                    <?php
                                                        $sql3="SELECT * FROM comment WHERE postID=$id AND status=1 ORDER BY id DESC";
                                                        $res3=mysqli_query($con,$sql3);
                                                        if(mysqli_num_rows($res3)>0)
                                                        {
                                                            while($row=mysqli_fetch_assoc($res3))
                                                            {
                                                                ?>
                                                                    <li class="collection-item" >
                                                                        <?php echo $row["comment_text"];?>
                                                                        <span class="secondary-content">
                                                                            <?php echo $row["email"]?>
                                                                        </span>
                                                                    </li>
                                                                <?php
                                                            }
                                                        }
                                                        else
                                                        {
                                                            ?>
                                                                <div class="center" style="background-image: linear-gradient(#acb6e5,#74ebd5 );border-radius: 5px;">
                                                                <div class="text-flow  red white-text">No comments yet .. !</div>
                                                                </div>
                                                                
                                                            <?php
                                                        }
                                                    ?>
                                                        
                                                    </ul>
                                                </div>
                                            </div>

                                        </div>                                

                                    <div class="row">
                                    
                                                <!-- start of  Related blogs content area-->
        <div class="col l12 m12 s12" style="margin-top:10em;background-image: linear-gradient(#74ebd5, #acb6e5);border-radius: 5px;" >
            <div class="collection teal center with-header" style="background-image: linear-gradient(#acb6e5,#74ebd5 );border-radius: 5px;">
                    <h5 class="teal white-text" style="background-image: linear-gradient(#acb6e5,#74ebd5 );border-radius: 5px;">Related Blogs</h5>
            </div>
                            <!-- start of  main content area-->
        <div class="col l12 m12 s12" > 

        <?php
            $sql="SELECT * FROM posts ORDER BY rand() limit 4";
            $res=mysqli_query($con,$sql);
            if(mysqli_num_rows($res)>0)
            {
                while($row=mysqli_fetch_assoc($res))
                {
                    ?>
                            <!--  Card Start from here -->
                        <div class="col l3 m4 s6" >
                            <div class="card" style="border-radius: 15px;">
                                    <div class="card-image">
                                        <img src="img/<?php echo $row["feature_image"]?>" alt="" style="height:150px;border-radius: 15px 15px 0px 0px;" class="img-responsive" > 
                                        <span class="card-title"><?php echo $row["title"]?></span>
                                    </div>                                  
                                    <div class="card-action teal center" style="background-image: linear-gradient(#74ebd5,#acb6e5 );">
                                        <a href="post.php?id=<?php echo $row['id'];?>" class="white-text" style="background-image: linear-gradient(#acb6e5,#74ebd5 );">Read more...</a>
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
            
        </div>
        <!-- end of  Related blogs content area--></div>
                                </div>

                            <?php
                        }
                        else
                        {
                            header("location:index.php");
                        }
                    }
                    else
                    {
                        header("location:index.php");
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
