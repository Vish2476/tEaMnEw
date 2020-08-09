<?php
    include("includes/header.php");
    include("includes/navbar.php");
    if(isset($_SESSION["username"]))
    {
        $user_id=$_SESSION["user_id"];
?>
<!-- Main Content started-->
    <div class="main">
        <div class="row">
            <div class="col l6 m6 s12">
                <ul class="collection with-header">
                
                    <li class="collection-header teal" style="background-image: linear-gradient(#74ebd5,#acb6e5 );border-radius: 5px;">
                        <h5 class="white-text" > Recent Posts</h5>
                    </li>
                    <?php
                        
                        $sql="SELECT * FROM posts  WHERE author=$user_id ORDER BY post_date DESC";
                        //echo $sql;
                        $res=mysqli_query($con,$sql);
                        if(mysqli_num_rows($res)>0)
                        {

                            while($row=mysqli_fetch_assoc($res))
                            {
                                ?>
                                     <li class="collection-item">
                        <a href=""><?php echo $row["title"];?></a><br/>
                        <span><a href="editPost.php?id=<?php echo $row['id'];?>"><i class="material-icons tiny">edit</i>Edit</a> |<a href=""><i class="material-icons tiny red-text">delete</i>Delete</a> <!--|<a href=""><i class="material-icons tiny green-texts">share</i>  Share</a>--> </span>
                    </li>  
                                <?php
                            }
                               
                        }
                        else
                        {
                            ?>
                                <div class="center">
                            <div class='chip red white-text' style="margin: 10px 0px 10px 0px">You haven't added any post yet, Write by clicking circular button !</div>
                        </div>
                            <?php
                        }

                    ?>
                         
                    
                </ul>
            </div>


            <div class="col l6 m6 s12">
                <ul class="collection with-header">
                    <li class="collection-header teal" style="background-image: linear-gradient(#74ebd5,#acb6e5 );border-radius: 5px;">
                        <h5 class="white-text"> Recent Comments</h5>
                        <div class="center">
                        <?php
                    if(isset($_SESSION["message"]))
                    {
                        echo $_SESSION["message"];
                        unset($_SESSION["message"]);
                    }
                ?>
                        </div>
                    </li>
                   
                    <?php
                                                        $sql3="SELECT *,c.id as c_id,p.id as post_id FROM comment c,posts p,users u WHERE c.postID=p.id AND p.author=u.id AND u.id=$user_id  ORDER BY c.id DESC";
                                                        //echo $sql3;
                                                        $res3=mysqli_query($con,$sql3);
                                                        if(mysqli_num_rows($res3)>0)
                                                        {
                                                            while($row=mysqli_fetch_assoc($res3))
                                                            {
                                                                ?>
                                                                    <li class="collection-item">
                                                                    <a href="post.php?id=<?php echo $row["post_id"];?>"><span><b class="yellow-text">Post :</b> <?php echo $row["title"];?></span>
                                                                        <br/><b class="yellow-text">Comment :</b> <?php echo $row["comment_text"];?>
                                                                        <span class="secondary-content">
                                                                            <?php echo $row["email"]?>
                                                                        </span><br/>
                                                                        <span><?php 
                                                                        if($row["status"]==1)
                                                                        {
                                                                            ?>
                                                                            <a onclick="return confirm('are you sure want to remove the comment?')" href="dblogic.php?pageno=1&id=<?php echo $row["c_id"]?>"><i class="material-icons tiny red-text">clear</i>Remove</a>
                                                                            <?php
                                                                        }
                                                                        else
                                                                        {
                                                                            ?>
                                                                            <a onclick="return confirm('Are you sure want to approve this comment?')" href="dblogic.php?pageno=1&id=<?php echo $row["c_id"]?>"><i class="material-icons tiny green-text">done</i>Approve</a>
                                                                            <?php
                                                                        }

                                                                        ?></span>
                                                                    </li>
                                                                <?php
                                                            }
                                                        }
                                                        else
                                                        {
                                                            ?>
                                                                <div class="center">
                                                                <div class="text-flow  red white-text">No comments yet .. !</div>
                                                                </div>
                                                                
                                                            <?php
                                                        }
                                                    ?>

                  

                    
                    
                </ul>
            </div>

            <div class="fixed-action-btn" >
                <a href="write.php" class="btn-floating btn btn-large white-text pulse" style="background-image: linear-gradient(#74ebd5,#acb6e5 );border-radius: 5px;"><i class="material-icons">edit</i></a>
            </div>
        </div>
    </div>
<!-- Main Content ended-->


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
