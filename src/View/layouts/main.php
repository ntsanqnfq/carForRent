<!doctype html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Car For Rent</title>
    <style>
        .hover-underline-animation {
            display: inline-block;
            position: relative;
            color: #676d70;
        }

        .hover-underline-animation:after {
            content: '';
            position: absolute;
            width: 100%;
            transform: scaleX(0);
            height: 2px;
            bottom: 0;
            left: 0;
            background-color: #7c8488;
            transform-origin: bottom right;
            transition: transform 0.25s ease-out;
        }
        .hover-underline-animation:hover:after {
            transform: scaleX(1);
            transform-origin: bottom left;
        }
    </style>

</head>
<nav class="navbar navbar-expand-lg navbar-light " style="background-color: lightgrey">
    <a class="navbar-brand" href="#">Car For Rent</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link hover-underline-animation" href="/">Home</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link hover-underline-animation" href="/aboutus" style="padding-left: 10px">About us</a>
            </li>
            <?php
            if (!isset($_SESSION['username'])) { ?>

                <li class="nav-item">
                    <a class="btn btn-outline-dark" style="margin-left: 980px" href="/login">Log in</a>
                </li>

            <?php } ?>
            <?php
            if (isset($_SESSION['username'])) { ?>
                <li class="nav-item" style="margin-left: 870px">
                    <?php echo "Welcome " . $_SESSION['username']; ?>
                </li>
                <li class="nav-item">
                    <form method="post" action="/logout">
                        <button type="submit" class="btn btn-outline-dark" style="margin-left: 20px">Log out</button>
                    </form>
                </li>

            <?php } ?>
    </div>
</nav>


<div class="container">
</div>

