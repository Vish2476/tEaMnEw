<?php
    $userFromSession=$_SESSION["username"];
    
?>
<?php
                $sql="SELECT * FROM users where username='$userFromSession'";
                //$name="SELECT username from users where "
                $res=mysqli_query($con,$sql);
                $row=mysqli_fetch_assoc($res);
            ?>
<nav class="teal">
    <div class="nav-wrapper" style="background-image: linear-gradient(#74ebd5,#acb6e5 );border-radius: 5px;">
        <div class="container">
            <a href="dashboard.php" class="brand-logo center" style="background-image: linear-gradient(#74ebd5,#acb6e5 );border-radius: 5px;">Blogger  <span ><?php echo $userFromSession;?></span></a>
            <a href="" class="button-collapse show-on-large" data-activates="sidenav"><i class="material-icons" style="color: black;">menu</i></a>
        </div>
    </div>s
</nav>
<ul class="side-nav fixed" id="sidenav" style="background-image: linear-gradient(#74ebd5,#acb6e5 );">
        <div class="user-view">
            <div class="background">
                <img src="../img/img8.jpg" alt="" class="responsive-img">
            </div>
            <a href=""><img src="../img/<?php echo $row["profile_image"];?>" class="circle" alt=""></a>
            <span class="name white-text" style="font-size: 28px;"><?php echo $_SESSION["username"];?></span>
            <span class="email white-text" style="font-size: 24px;">
            <?php
                echo $row["email"];
            ?></span>
        </div>
       <li><a href="dashboard.php">Dashboard</a></li>
       <li><a href="post.php">Posts</a></li>
       <li><a href="image.php">Images</a></li>
       <li><a href="comment.php">Comments</a></li>
       <li><a href="setting.php">Settings</a></li>
       <li><a href="../index.php">Main Page</a></li>
       <div class="divider"></div>
       <li><a href="logout.php">Logout</a></li>
</ul>