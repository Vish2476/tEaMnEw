<?php
    ob_start();
    session_start();
    include("includes/dbh.php");

    if(isset($_GET["pageno"]))
    {
        $pageno=$_GET["pageno"];
        switch($pageno)
        {
            case 1:
                //approve comments
                if(isset($_GET["id"]))
                {
                    $id=$_GET["id"];
                    $sql1="SELECT status FROM comment where id=$id";
                    $res1=mysqli_query($con,$sql1);
                    $row=mysqli_fetch_assoc($res1);
                    $status=0;
                    if($row["status"]==1){
                        $status=0;
                    }else
                    {
                        $status=1;
                    }
                    $sql="UPDATE comment SET status=$status WHERE id=$id";
                    $res=mysqli_query($con,$sql);
                    if($res)
                    {
                        if($row["status"]==1)
                        {
                            $_SESSION['message']="<div class='chip center red white-text'>Comment Removed !</div>";
                        }else
                        {
                            $_SESSION['message']="<div class='chip center green white-text'>Comment Approved !</div>";
                        }
                        
                        header("location:dashboard.php");
                    }
                    else
                    {
                        $_SESSION['message']="<div class='chip center red white-text'>Sorry, Something went wrong !</div>";
                        header("location:dashboard.php");
                    }
                }
                else
                {
                    $_SESSION['message']="<div class='chip center red white-text'>Sorry, Something went wrong !</div>";
                    header("location:dashboard.php");
                } 
            break;

            case 2:
                //approve comments
                if(isset($_GET["id"]))
                {
                    $id=$_GET["id"];
                    $sql1="SELECT status FROM comment where id=$id";
                    $res1=mysqli_query($con,$sql1);
                    $row=mysqli_fetch_assoc($res1);
                    $status=0;
                    if($row["status"]==1){
                        $status=0;
                    }else
                    {
                        $status=1;
                    }
                    $sql="UPDATE comment SET status=$status WHERE id=$id";
                    $res=mysqli_query($con,$sql);
                    if($res)
                    {
                        if($row["status"]==1)
                        {
                            $_SESSION['message']="<div class='chip center red white-text'>Comment Removed !</div>";
                        }else
                        {
                            $_SESSION['message']="<div class='chip center green white-text'>Comment Approved !</div>";
                        }
                        
                        header("location:comment.php");
                    }
                    else
                    {
                        $_SESSION['message']="<div class='chip center red white-text'>Sorry, Something went wrong !</div>";
                        header("location:comment.php");
                    }
                }
                else
                {
                    $_SESSION['message']="<div class='chip center red white-text'>Sorry, Something went wrong !</div>";
                    header("location:comment.php");
                } 
            break;

            case 3:
                //update profle photo

                if(isset($_POST["update"]))
                {
                    $user_id=$_GET["id"];
                    $image=$_FILES["image"];
                    $image_name=$_FILES["image"]["name"];
                    $img_size=$_FILES["image"]["size"];
                    $tmp_name=$_FILES["image"]["tmp_name"];
                    $image_type=$_FILES["image"]["type"];

                    $extension=pathinfo($image_name);
                    $image_name=rand().".".$extension['extension'];	//545454.jpg

                    if($image_type=="image/jpeg" || $image_type=="image/jpg" || $image_type=="image/png" )
                    {
                        if(($img_size/(1024**2))<2)
                        {
                            $sql1="SELECT profile_image FROM users where id=$user_id";
                            $res1=mysqli_query($con,$sql1);
                            $row1=mysqli_fetch_assoc($res1);

                            if($row1["profile_image"]!=null){
                                $profile_image=$row1["profile_image"];
                                if(unlink("../img/$profile_image"))
                                {
                                    move_uploaded_file($tmp_name,"../img/$image_name");
                                    $sql="UPDATE users SET profile_image = '$image_name' WHERE id=$user_id";
                                    $res=mysqli_query($con,$sql);
                                    if($res)
                                    {
                                        $_SESSION["message_img"]="<div class='chip green white-text'>Profile image uploaded successfully.</div>";
                                        header("location:setting.php");
                                    }
                                    else
                                    {
                                        $_SESSION["message_img"]="<div class='chip red white-text'>Error occurred, Something went wrong!.</div>";
                                        header("location:setting.php");
                                    }
                                }
                                else
                                {
                                    $_SESSION["message_img"]="<div class='chip red white-text'>Error occurred, can't delete previous profile image !</div>";
                                    header("location:setting.php");
                                }
                            }
                            else
                            {
                                move_uploaded_file($tmp_name,"../img/$image_name");
                                $sql="UPDATE users SET profile_image = '$image_name' WHERE id=$user_id";
                                $res=mysqli_query($con,$sql);
                                if($res)
                                {
                                    $_SESSION["message_img"]="<div class='chip green white-text'>Profile image uploaded successfully.</div>";
                                    header("location:setting.php");
                                }
                                else
                                {
                                    $_SESSION["message_img"]="<div class='chip red white-text'>Error occurred, Something went wrong!.</div>";
                                    header("location:setting.php");
                                }
                            }

                            
                        }
                        else
                        {
                            $_SESSION["message_img"]="<div class='chip red white-text'>Error occurred, Image size is more than 2 mb !.</div>";
                            header("location:setting.php");
                        }
                    }
                    else
                    {
                            $_SESSION["message_img"]="<div class='chip red white-text'>Error occurred, Image type is invalid !</div>";
                            header("location:setting.php");
                    }
                    
                    
                }
                else
                {
                    $_SESSION['message_img']="<div class='chip center red white-text'>Sorry, Something went wrong while updateing profile image!</div>";
                    header("location:setting.php");
                }
            break;
        }
    }
    
?>