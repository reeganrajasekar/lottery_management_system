<?php require("./layout/db.php") ?>
<?php require("./layout/Header.php") ?>
<?php require("./layout/Navbar.php") ?>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="container bg-white p-3 rounded">
            <h4 class="text-secondary mb-3">
                Change Password :
            </h4>
            <br>
            <div class="row">
                <div class="col-sm-12 col-lg-3"></div>
                <div class="col-sm-12 col-lg-6">
                    <form action="/member/action/change.php" method="post">
                        <div class="form-group">
                            <input type="email" name="email" required class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input type="password" name="oldpassword" required class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Old Password">
                        </div>
                        <div class="form-group">
                            <input type="password" name="newpassword" required class="form-control form-control-lg" id="exampleInputPassword1" placeholder="New Password">
                        </div>
                        <div class="mt-3 text-center">
                            <button class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">Change</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require("./layout/Footer.php") ?>