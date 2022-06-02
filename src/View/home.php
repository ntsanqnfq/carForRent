<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="Addport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Car For Rent</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/album/">

</head>

<body>

<header>
    <?php

    if (isset($_SESSION['user'])) {
        echo $_SESSION['user'];
    } ?>


    <main role="main">
        <div class="album py-5 bg-light">

            <div class="container">
                <?php if (!empty($data['count'] === 0)) {
                    echo "<h1 align='center'>There is no car now. Get out my store please!</h1>";
                } else echo "<h1 align='center'>Cars available:</h1>"; ?>
                <div class="row">
                    <?php if (!empty($data)) {
                        foreach ($data['list'] as $key => $car) { ?>

                            <div class="col-md-4">
                                <div class="card mb-4 box-shadow">
                                    <img class="card-img-top"
                                         src="<?php echo $car->getImg() ?>"
                                         alt="Card image cap"
                                         style="height: 210px; object-fit: cover"
                                    >
                                    <div class="card-body">
                                        <p class="card-text"><?php echo $car->getName() ?> </p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-sm btn-outline-secondary">Add
                                                </button>
                                                <button type="button" class="btn btn-sm btn-outline-secondary">Buy now
                                                </button>
                                            </div>
                                            <small class="text-muted"><?php echo '$' . number_format($car->getPrice()).'/hour'?></small>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php }
                    }
                    ?>
                </div>
            </div>
        </div>

    </main>

    <footer class="text-muted">
        <div class="container">
            <p class="float-right">
                <a href="/addcar" style=" color: #7abaff ">Add car here</a>
            </p>
            <p>Choose your car to rent. Don't have money please go.</p>
        </div>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <script
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
</body>
</html>
