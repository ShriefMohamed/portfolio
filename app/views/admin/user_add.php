<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Create New User</h4>
            <div class="ml-auto">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= HOST_NAME ?>admin">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add User</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form class="form-horizontal" method="post">
                    <div class="card-body">
                        <h4 class="card-title">Create New User</h4>
                        <div class="form-group row">
                            <label for="fname" class="col-sm-2 control-label col-form-label">First Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="fname" placeholder="First Name" name="firstName" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lname" class="col-sm-2 control-label col-form-label">Last Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="lname" placeholder="Last Name" name="lastName" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="username" class="col-sm-2 control-label col-form-label">Username</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="username" placeholder="Username" name="username" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-2 control-label col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="email" placeholder="Email Address" name="email" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-sm-2 control-label col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="col-sm-2 control-label col-form-label">Phone <small class="text-muted">(999) 999-9999</small></label>
                            <div class="col-sm-10">
                                <input type="tel" name="phone" placeholder="Phone Number" class="form-control" pattern="^\({0,1}((0|\+61)(2|4|3|7|8)){0,1}\){0,1}( |-){0,1}[0-9]{2}( |-){0,1}[0-9]{2}( |-){0,1}[0-9]{1}( |-){0,1}[0-9]{3}$" id="phone" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 m-t-15">Role</label>
                            <div class="col-md-10">
                                <select name="role" class="select2 form-control custom-select" style="width: 100%; height:36px;" required>
                                    <option disabled>Select Role</option>
                                    <option value="admin">Admin</option>
                                    <option value="collaborator">Collaborator</option>
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
