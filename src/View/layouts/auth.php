<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="/assets/css/style.css" rel="stylesheet">
    <title>CarForRent - Sayno</title>
</head>

<body class="text-center">
<nav class="navbar bg-info p-2 bg-opacity-25">
    <div class="container-fluid">
        <h1><a href="/" class="navbar-brand" style="color: red">
                <?php if (isset($_SESSION['username'])) {
                    echo $_SESSION['username'];
                    ?>

                <?php } else {
                    echo 'Sayno';
                } ?></a></h1>
        <ul class="nav justify-content-end">
            <?php if (!isset($_SESSION['user_id'])) {
                echo '<li class="nav-item">
                <a class="nav-link" href="/login">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/register">Register</a>
            </li>';

                ?>

            <?php } else{
                echo '
            <li class="nav-item">
                    <form action="/logout" method="post">
                        <button type="submit">logout</button>
                    </form>
                </li>';
            } ?>
        </ul>
    </div>
</nav>
{{content}}
{{content}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>
</html>