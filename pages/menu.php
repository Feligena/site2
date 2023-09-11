<ul class="navbar-nav ">
    <li class="nav-item <?php echo ($page==1)? "active":"" ?>">
        <a href="index.php?page=1" class="nav-link">Tours</a>
    </li>
    <li class="nav-item <?php echo ($page==2)? "active":"" ?>">
        <a href="index.php?page=2" class="nav-link">Comments</a>
    </li>
    <li class="nav-item <?php echo ($page==3)? "active":"" ?>">
        <a href="index.php?page=3" class="nav-link">Registration</a>
    </li>
    <li class="nav-item <?php echo ($page==4)? "active":"" ?>">
        <a href="index.php?page=4" class="nav-link">Admin Forms</a>
    </li>
    <?php
        if(isset($_SESSION['radmin']))
        {
            if($page==6) $c='active';
            else $c='';
            
            echo '<li class="nav-item '.$c.'"><a href="index.php?page=6" class="nav-link">Private</a></li>';
        }
    ?>
</ul>