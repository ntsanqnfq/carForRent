<style>
    .btn-block {
        background-color: rgb(121,119,119);
        border-color: rgb(151,149,149);
    }
    .form{
        margin: 60px;
        margin-left: 400px;
        margin-right:400px;
        border-color: rgb(213,213,213);
        border-style: solid;
        border-radius: 30px;
        padding: 50px;
    }
</style>

<div class="form">
    <form method="post" action="/login">
        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>

        <div class="form-outline mb-4">
            <label class="form-label"  style="margin-left: 0px;">Username</label>
            <input type="text" class="form-control form-control-lg" name="username">
            <?php
            if (isset($data) && array_key_exists('username', $data)) {

                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">'
                    . $data["username"] .
                    '</div>';
            }
            ?>

            <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 88.8px;"></div><div class="form-notch-trailing"></div></div></div>

        <div class="form-outline mb-4">
            <label class="form-label" for="form2Example27" style="margin-left: 0px;">Password</label>
            <input type="password" class="form-control form-control-lg" name="password">
            <?php
            if (isset($data) && array_key_exists('password', $data)) {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">'
                    . $data["password"] .
                    '</div>';
            }
            ?>
            <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 64.8px;"></div><div class="form-notch-trailing"></div></div></div>

        <div class="pt-1 mb-4">
            <button class="btn btn-dark btn-lg btn-block" type="submit">Login</button>
        </div>

        <a class="small text-muted" href="#!">Forgot password?</a>
        <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a href="#!" style="color: #393f81;">Register here</a></p>
        <a href="#!" class="small text-muted">Terms of use.</a>
        <a href="#!" class="small text-muted">Privacy policy</a>
    </form>
</div>
