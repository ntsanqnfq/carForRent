<style>
    .form {
        margin: 60px;
        margin-left: 400px;
        margin-right: 400px;
        border-color: rgb(213, 213, 213);
        border-style: solid;
        border-radius: 30px;
        padding: 25px;
    }
</style>


<span class="invalid-feedback">
</span>
<div style="padding-left: 100px; padding-right: 100px;" class="form">
    <h1>Insert car</h1>
    <form method="post" enctype="multipart/form-data">

        <div class="form-group">
            <label>Name</label>
            <input
                    type="text"
                    class="form-control"
                    name="name"
            >
            <?php
            if ($data != null && array_key_exists('name', $data)) {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">' . $data["name"][0] . '</div>';
            }
            ?>
            <label>Description</label>
            <textarea name="description" id="" cols="30" rows="10"
                      class="form-control"></textarea>
            <?php
            if ($data != null && array_key_exists('description', $data)) {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">' . $data["description"][0] . '</div>';
            }
            ?>
            <label>Color</label>
            <input
                    type="text"
                    class="form-control"
                    name="color"
            >
            <?php
            if ($data != null && array_key_exists('color', $data)) {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">' . $data["color"][0] . '</div>';
            }
            ?>

            <label>Brand</label>
            <input type="text"
                   class="form-control "
                   name="brand">
            <?php
            if ($data != null && array_key_exists('brand', $data)) {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">' . $data["brand"][0] . '</div>';
            }
            ?>

            <label>Price</label>
            <input
                    type="number"
                    class="form-control"
                    name="price"
            >
            <?php
            if ($data != null && array_key_exists('price', $data)) {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">' . $data["price"][0] . '</div>';
            }
            ?>

            <label>Image</label>
            <input
                    type="file"
                    class="form-control"
                    name="img"
            >
                <?php
                if ($data != null && array_key_exists('img-error', $data)) {
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">' . $data["img-error"] . '</div>';
                }
                ?>

        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>