
<?php
        include("includes/header.php");
        if(isset($_SESSION["username"]))
        {
            $user_id=$_SESSION["user_id"];
            if(isset($_POST["ChangePassword"]))
            {
                    $password=$_POST["password"];
                    $con_password=$_POST["con_password"];
    
                    //----- this prevent us from sql injection attack ----------------------
                    $password=mysqli_real_escape_string($con,$password);
                    $con_password=mysqli_real_escape_string($con,$con_password);
    
                    //------this will prevent JS Attack
                    $password=htmlentities($password);
                    $con_password=htmlentities($con_password);

                    if($password===$con_password)
                    {
                        $password=password_hash($password,PASSWORD_BCRYPT);
                        $sql="UPDATE users SET password='$password' where id = $user_id";
                        //echo $sql;
                        $res=mysqli_query($con,$sql);
                        if($res)
                        {
                            $_SESSION['message']="<div class='chip green white-text'>Password updated successfully.</div>";
                            header("location:setting.php");
                        }
                        else
                        {
                            $_SESSION['message']="<div class='chip red white-text'>Something went wrong while saving password, please try again !</div>";
                            header("location:setting.php");
                        }

                    }
                    else
                    {
                        $_SESSION['message']="<div class='chip red white-text'>Passwords didn't match!</div>";
                            header("location:setting.php");
                    }

                    
    
            }
            else
            {
                $_SESSION['message']="<div class='chip red white-text'>Something went wrong, please try again !</div>";
                header("location:setting.php");
            }
        }
        else
        {
            
            $_SESSION['message']="<div class='chip red white-text'>Please login to continue !</div>";
            header("location:login.php");

        }
        
?>