<h1>Home</h1>

<h3>
    <?php
    if (isset($_SESSION['username'])) {
        echo "Welcome".$_SESSION['username'];
    } else echo "Please sign in";
    ?>
</h3>
