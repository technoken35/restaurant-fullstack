@extends('layouts.admin')

@section('content')
<div class="container-fluid  dashboard-content">
    <!-- ============================================================== -->
    <!-- pageheader -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">Create User </h2>
                <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin" class="breadcrumb-link">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="/admin/users" class="breadcrumb-link">All Users</a></li>
                            <li class="breadcrumb-item active" aria-current="page">New User</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- ============================================================== -->
        <!-- basic form -->
        <!-- ============================================================== -->
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
            <div class="card">
                <h5 class="card-header">Create a new User</h5>
                <div class="card-body">
                    <form action="#" id="basicform" data-parsley-validate="">
                        <div class="form-group">
                            <label for="inputFirstName">Enter First Name</label>
                            <input id="inputFirstName" type="text" name="fname" data-parsley-trigger="change" required="" placeholder="John" autocomplete="off" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="inputLastName">Enter Last Name</label>
                            <input id="inputLastName" type="text" name="lname" data-parsley-trigger="change" required="" placeholder="Doe" autocomplete="off" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="inputEmail">Email</label>
                            <input id="inputEmail" type="email" name="email" data-parsley-trigger="change" required="" placeholder="johndoe@gmail.com" autocomplete="off" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="inputPassword">Password</label>
                            <input id="inputPassword" type="password" name="password" data-parsley-trigger="change" required="" placeholder="Enter Password" autocomplete="off" class="form-control">
                        </div>
                        <div class="form-group">
                            <form>
                                <div class="form-group">
                                    <label for="inputRole">Role</label>
                                    <select class="form-control" id="inputRole">
                                        <option value="admin">Admin</option>
                                        <option value="employee">Employee</option>
                                    </select>
                                </div>
                            </form>
                        </div>

                        <div class="row">
                            <div class="col-sm-6 pb-2 pb-sm-4 pb-lg-0 pr-0">

                            </div>
                            <div class="col-sm-6 pl-0">
                                <p class="text-right">
                                    <button type="submit" class="btn btn-space btn-primary">Submit</button>

                                </p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
