<style>
    .form{
        margin: 60px;
        margin-left: 400px;
        margin-right:400px;
        border-color: rgb(213,213,213);
        border-style: solid;
        border-radius: 30px;
        padding: 25px;
    }
</style>

<?php
//var_dump($data['errors']);die;
?>
<span class="invalid-feedback">
</span>
<div style="padding-left: 100px; padding-right: 100px;" class="form">
    <h1>Insert car</h1>
    <form method="post" enctype="multipart/form-data">

        <div class="form-group">
            <label>Name</label>
            <input
                    type="text"
                    class="form-control <?php if (isset($data['errors'])) {
                        echo $data['errors']->hasError('name') ? 'is-invalid' : '';
                    }?>"
                    name="name"
            >
            <p class="invalid-feedback">
                <?php if (isset($data['errors'])) {
                    echo $data['errors']->getFirstError('name');} ?>
            </p>
            <label>Description</label>
            <textarea name="description" id="" cols="30" rows="10"
                      class="form-control <?php if (isset($data['errors'])) {
                          echo $data['errors']->hasError('description') ? 'is-invalid' : '';} ?>"></textarea>

            <p class="invalid-feedback">
                <?php if (isset($data['errors'])) { echo $data['errors']->getFirstError('color') ;}?>
            </p>


            <label>Color</label>
            <input
                    type="text"
                    class="form-control <?php if (isset($data['errors'])) { echo $data['errors']->hasError('color') ? 'is-invalid' : ''; }?>"
                    name="color"
            >
            <p class="invalid-feedback">
                <?php if (isset($data['errors'])) {echo $data['errors']->getFirstError('color');} ?>
            </p>

            <label>Brand</label>
            <input type="text"
                   class="form-control <?php if (isset($data['errors'])) { echo $data['errors']->hasError('brand') ? 'is-invalid' : ''; }?>"
                   name="brand">
            <p class="invalid-feedback">
                <?php if (isset($data['errors'])) { echo $data['errors']->getFirstError('brand') ;}?>
            </p>

            <label>Price</label>
            <input
                    type="number"
                    class="form-control <?php if (isset($data['errors'])) {echo $data['errors']->hasError('price') ? 'is-invalid' : '' ;}?>"
                    name="price"
            >
            <p class="invalid-feedback">
                <?php if (isset($data['errors'])) { echo $data['errors']->getFirstError('price') ;}?>
            </p>

            <label>Image</label>
            <input
                    type="file"
                    class="form-control <?php if (isset($data['img'])) {echo 'is-invalid';} ?>"
                    name="img"
            >
            <p class="invalid-feedback">
                <?php
                if (isset($data['img'])){
                    echo ($data['img']);
                }
                ?>

            </p>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>