
<section class="vh-100">
    <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="/asset/img/3.png"
                     class="img-fluid" alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                <form method="post" action="/login">

                    <div class="divider d-flex align-items-center my-4">
                        <h1>Login</h1>
                    </div>

                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <label class="form-label">Email address</label>
                        <input type="text" class="form-control form-control-lg" name="username"/>
                        <?php
                        if (isset($data) && array_key_exists('username', $data)) {

                            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">'
                                . $data["username"] .
                                '</div>';
                        }
                        ?>
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control form-control-lg" name="password"/>
                        <?php
                        if (isset($data) && array_key_exists('password', $data)) {
                            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">'
                                . $data["password"] .
                                '</div>';
                        }
                        ?>
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                    </div>

                    <div class="text-center text-lg-start mt-4 pt-2">

                        <button type="submit" class="btn btn-primary btn-lg"
                                style="padding-left: 2.5rem; padding-right: 2.5rem;">Login
                        </button>
                        <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="#!"
                                                                                          class="link-danger">Register</a>
                        </p>
                    </div>

                </form>
            </div>
        </div>
    </div>
</section>
