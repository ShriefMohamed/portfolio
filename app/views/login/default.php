        <div id="loginform">
            <div class="text-center p-b-20 border-bottom">
                <span class="db">
                    <img style="width: 55px" src="<?= IMAGES_DIR ?>logo.png" alt="logo" />
                    <span class="logo-text" style="font-size: 16px; font-weight: 800; color: #444">Password Vault</span>
                </span>
            </div>
            <!-- Form -->
            <form class="form-horizontal m-t-20" id="loginform" method="post">
                <div class="row p-b-30">
                    <div class="col-12">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-success text-white" id="basic-addon1"><i class="ti-user"></i></span>
                            </div>
                            <input type="text" name="username" class="form-control form-control-lg" placeholder="Email / Username" aria-label="Username" aria-describedby="basic-addon1" required>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-warning text-white" id="basic-addon2"><i class="ti-pencil"></i></span>
                            </div>
                            <input type="password" name="password" class="form-control form-control-lg" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" required>
                        </div>
                    </div>
                </div>
                <div class="row border-top border-secondary">
                    <div class="col-12">
                        <div class="form-group">
                            <div class="p-t-20">
                                <button class="btn btn-info" id="to-recover" type="button"><i class="fa fa-lock m-r-5"></i> Lost password?</button>
                                <button class="btn btn-success float-right" name="login" type="submit">Login</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div id="recoverform">
            <div class="text-center">
                <span class="text-dark">Enter your e-mail address below and we will send you instructions how to recover a password.</span>
            </div>
            <div class="row m-t-20">
                <!-- Form -->
                <form class="col-12" method="post">
                    <!-- email -->
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-danger text-white" id="basic-addon1"><i class="ti-email"></i></span>
                        </div>
                        <input type="text" name="email" class="form-control form-control-lg" placeholder="Email Address" aria-label="Email" aria-describedby="basic-addon1">
                    </div>
                    <!-- pwd -->
                    <div class="row m-t-20 p-t-20 border-top border-secondary">
                        <div class="col-12">
                            <a class="btn btn-success" href="#" id="to-login">Back To Login</a>
                            <button class="btn btn-info float-right" type="submit" name="recover">Recover</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- Login box.scss -->
<!-- ============================================================== -->

<!-- ============================================================== -->
<!-- This page plugin js -->
<!-- ============================================================== -->
<script>
    $(document).ready(function () {
        // ==============================================================
        // Login and Recover Password
        // ==============================================================
        $('#to-recover').on("click", function() {
            $("#loginform").slideUp();
            $("#recoverform").fadeIn();
        });
        $('#to-login').click(function(){
            $("#recoverform").hide();
            $("#loginform").fadeIn();
        });
    });
</script>