<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Update User</h4>
            <div class="ml-auto">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= HOST_NAME ?>admin">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Update User</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<?php if (isset($user) && $user !== false) : ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form class="form-horizontal" method="post">
                    <div class="card-body">
                        <h4 class="card-title">Update User</h4>
                        <div class="form-group row">
                            <label for="fname" class="col-sm-2 control-label col-form-label">First Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="fname" name="firstName" value="<?= $user->firstName ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lname" class="col-sm-2 control-label col-form-label">Last Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="lname" name="lastName" value="<?= $user->lastName ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="username" class="col-sm-2 control-label col-form-label">Username</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="username" name="username" value="<?= $user->username ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-2 control-label col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="email" name="email" value="<?= $user->email ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-sm-2 control-label col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="password" name="password" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="col-sm-2 control-label col-form-label">Phone <small class="text-muted">(999) 999-9999</small></label>
                            <div class="col-sm-10">
                                <input type="tel" name="phone" class="form-control" pattern="^\({0,1}((0|\+61)(2|4|3|7|8)){0,1}\){0,1}( |-){0,1}[0-9]{2}( |-){0,1}[0-9]{2}( |-){0,1}[0-9]{1}( |-){0,1}[0-9]{3}$" id="phone" value="<?= $user->phone ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 m-t-15">Role</label>
                            <div class="col-md-10">
                                <select name="role" class="select2 form-control custom-select" style="width: 100%; height:36px;" >
                                    <option disabled>Select Role</option>
                                    <?php $admin = ($user->role == 'admin') ? 'selected' : ''; ?>
                                    <?php $collaborator = ($user->role == 'collaborator') ? 'selected' : ''; ?>
                                    <option <?= $admin ?> value="admin">Admin</option>
                                    <option <?= $collaborator ?> value="collaborator">Collaborator</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="border-top">
                        <div class="card-body">
                            <button type="submit" name="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>