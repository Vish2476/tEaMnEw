<?php
    include("includes/header.php");
    include("includes/navbar.php");
    if(isset($_SESSION["username"]))
    {
        $user_id=$_SESSION["user_id"];
?>
<div class="main" >
    <div class="card-panel" style="padding:60px;" >
        <div class="collection center teal with-header" style="background-image: linear-gradient(#74ebd5,#acb6e5 );border-radius: 5px;">
            <h5 CLASS="white-text">Comments Section</h5>
        </div>

        <?php
            //$sql="SELECT * FROM comment c,posts p,users u WHERE c.postID=p.id AND p.author=u.id AND u.id=$user_id  GROUP BY postID ORDER BY c.id DESC";
            //echo $sql;
            $sql="SELECT * FROM posts WHERE author=$user_id ORDER BY post_date DESC";
            $res=mysqli_query($con,$sql);
            if(mysqli_num_rows($res))
            {
                while($row=mysqli_fetch_assoc($res))
                {
                    $post_id=$row['id'];
                    ?>
                            <div class="card-panel">
                                <h5 class="teal lighten-3 white-text" style="padding:7px;"><?php echo $row["title"];?></h5> 

                    
                                <?php
                                                        $sql3="SELECT * FROM comment  WHERE postID=$post_id ORDER BY id DESC";
                                                        //echo $sql3;
                                                        $res3=mysqli_query($con,$sql3);
                                                        if(mysqli_num_rows($res3)>0)
                                                        {
                                                            while($row3=mysqli_fetch_assoc($res3))
                                                            {
                                                                ?>
                                                                <div class="collection">
                                                                
                                                                    <li class="collection-item">
                                                                    
                                                                        <?php echo ucwords($row3["comment_text"]);?>
                                                                        <span class="secondary-content">
                                                                            <?php echo ucwords($row3["email"]);?>
                                                                        </span><br/>
                                                                        
                                                                        <div class="" style="padding-top:20px;">   
                                                                        <span>
                                                                        <?php 
                                                                        if($row3["status"]==1)
                                                                        {
                                                                            ?>
                                                                            <a  onclick="return confirm('are you sure want to remove the comment?')" href="dblogic.php?pageno=2&id=<?php echo $row3["id"]?>"><i class="material-icons tiny red-text">clear</i>Remove</a>
                                                                            <?php
                                                                        }
                                                                        else
                                                                        {
                                                                            ?>
                                                                            <a onclick="return confirm('Are you sure want to approve this comment?')" href="dblogic.php?pageno=2&id=<?php echo $row3["id"]?>"><i class="material-icons tiny green-text">done</i>Approve</a>
                                                                            <?php
                                                                        }

                                                                        ?></span>
                                                                        <span class="secondary-content">
                                                                            <?php echo ucwords($row3["commentDate"]);?>
                                                                        </span><br/>
                                                                         </div>
                                                                        
                                                                    </li>
                                                                </div>
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
                                

                            </div>
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
    </div>
</div>
<div class="fixed-action-btn">
                <a href="write.php" class="btn-floating btn btn-large white-text pulse" style="background-image: linear-gradient(#74ebd5,#acb6e5 );border-radius: 5px;"><i class="material-icons">edit</i></a>
            </div>
<?php
    include("includes/footer.php");
}
else
{
     $_SESSION['message']="<div class='chip red white-text'>Please login to continue !</div>";
     header("location:login.php");
}
?>


