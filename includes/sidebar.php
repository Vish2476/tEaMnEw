
            <ul class="collection" style="background-image: linear-gradient(#74ebd5,#acb6e5 );border-radius: 5px;padding: 10px;">
            <h5 class="teal white-text" style="background-image: linear-gradient(#74ebd5,#acb6e5 );border-radius: 5px;padding: 10px;">Search Here</h5>
                <li class="collection-item" style="background-image: linear-gradient(#74ebd5,#acb6e5 );border-radius: 5px;padding: 10px;">
                    <form action="search.php" method="GET" style="background-image: linear-gradient(#acb6e5,#74ebd5 );border-radius: 5px;padding: 10px;">
                        <div class="input-field">
                            <input type="text" name="search" id="search" placeholder="Search anything."/ style="color: blue">
                            <div class="center">
                                <input type="submit" class="btn" name="submit" value="Search" style="background-image: linear-gradient(#acb6e5,#74ebd5 );border-radius: 5px;">
                            </div>
                        </div>
                    </form>
                </li>
            </ul>

            <div class="collection with-header" style="background-image: linear-gradient(#74ebd5,#acb6e5 );border-radius: 5px;padding: 10px;">
            <h5 class="teal white-text" style="background-image: linear-gradient(#acb6e5 ,#74ebd5);border-radius: 5px;padding: 10px;">Trending Blogs</h5>
                <?php
                    $sql="SELECT * FROM posts order by view DESC LIMIT 5";
                    $res=mysqli_query($con,$sql);
                    if(mysqli_num_rows($res))
                    {
                        while($row=mysqli_fetch_assoc($res))
                        {
                            ?>
                                    <a href="post.php?id=<?php echo $row["id"]?>" class="collection-item" style="padding: 10px;margin: 3px;border-radius: 5px;"><?php echo $row["title"];?></a>
                                    <div class="divider"></div>
                            <?php
                        }
                    }
                    else
                    {
                        ?>
                            <div class="chip red white-text">
                                No trending blogs found!
                            </div>
                        <?php    
                    }
                ?>
                
            </div>