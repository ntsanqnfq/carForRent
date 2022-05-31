<h1>Insert car</h1>
<?php

?>

<div style="padding-left: 100px; padding-right: 100px;">
    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label>Name</label>
            <input
                    type="text"
                    class="form-control <?php echo $data['errors']->hasError('name') ? 'is-invalid' : '' ?>"
                    name="name"
            >
            <p class="invalid-feedback">
                <?php echo $data['errors']->getFirstError('name') ?>
            </p>
            <label>Color</label>
            <input
                    type="text"
                    class="form-control <?php echo $data['errors']->hasError('color') ? 'is-invalid' : '' ?>"
                    name="color"
            >
            <p class="invalid-feedback">
                <?php echo $data['errors']->getFirstError('color') ?>
            </p>

            <label>Brand</label>
            <input type="text"
                   class="form-control <?php echo $data['errors']->hasError('brand') ? 'is-invalid' : '' ?>"
                   name="brand">
            <p class="invalid-feedback">
                <?php echo $data['errors']->getFirstError('brand') ?>
            </p>

            <label>Price</label>
            <input
                    type="number"
                    class="form-control <?php echo $data['errors']->hasError('price') ? 'is-invalid' : '' ?>"
                    name="price"
            >
            <p class="invalid-feedback">
                <?php echo $data['errors']->getFirstError('price') ?>
            </p>

            <label>Image</label>
            <input
                    type="file"
                    class="form-control <?php echo $data['errors']->hasError('img') ? 'is-invalid' : '' ?>"
                    name="img"
            >
            <p class="invalid-feedback">
                <?php echo $data['errors']->getFirstError('img') ?>
            </p>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>