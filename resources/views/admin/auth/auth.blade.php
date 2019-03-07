<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Login</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="Themesbrand" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App Icons -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        <!-- Basic Css files -->
        <link href="/admin-asset/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="/admin-asset/assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="/admin-asset/assets/css/style.css" rel="stylesheet" type="text/css">
    </head>
    <body class="fixed-left">
        <!-- Loader -->
        <div id="preloader"><div id="status"><div class="spinner"></div></div></div>
        <!-- Begin page -->
        <div class="accountbg"></div>
        <div class="wrapper-page">
            <div class="card">
                <div class="card-body">
                    <h3 class="text-center m-0">
                        <i class="fa fa-university fa-4x"></i>
                    </h3>
                    <div class="p-3">
                        <h4 class="text-muted font-18 m-b-5 text-center">Welcome Back !</h4>
                        <p class="text-muted text-center">Sign in to continue to School.</p>
                        <form class="form-horizontal m-t-30" action="index.html">
                            <div class="form-group">
                                <label for="school_id"><i class="fa fa-university"></i> School ID</label>
                                <input type="text" class="form-control" name="school_id" id="school_id" placeholder="Enter School ID">
                            </div>
                            <div class="form-group">
                                <label for="user_id"><i class="fa fa-user"></i> User ID</label>
                                <input type="text" class="form-control" name="user_id" id="user_id" placeholder="Enter User ID">
                            </div>
                            <div class="form-group">
                                <label for="password"><i class="fa fa-key"></i> Password</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Enter password">
                            </div>
                            <div class="form-group row m-t-20">
                                <div class="col-sm-6">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customControlInline">
                                        <label class="custom-control-label" for="customControlInline">Remember me</label>
                                    </div>
                                </div>
                                <div class="col-sm-6 text-right">
                                    <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Log In</button>
                                </div>
                            </div>
                            <div class="form-group m-t-10 mb-0 row">
                                <div class="col-12 m-t-20">
                                    <a href="pages-recoverpw.html" class="text-muted"><i class="mdi mdi-lock    "></i> Forgot your password?</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="m-t-40 text-center">
                <p class="text-white">Don't have an account ? <a href="pages-register.html" class="font-500 font-14 text-white font-secondary"> Signup Now </a> </p>
                <p class="text-white">© 2017 - 2018 Admiria. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand</p>
            </div>
        </div>
        <!-- jQuery  -->
        <script src="/admin-asset/assets/js/jquery.min.js"></script>
        <script src="/admin-asset/assets/js/popper.min.js"></script><!-- Popper for Bootstrap -->
        <script src="/admin-asset/assets/js/bootstrap.min.js"></script>
        <script src="/admin-asset/assets/js/modernizr.min.js"></script>
        <script src="/admin-asset/assets/js/jquery.slimscroll.js"></script>
        <script src="/admin-asset/assets/js/waves.js"></script>
        <script src="/admin-asset/assets/js/jquery.nicescroll.js"></script>
        <script src="/admin-asset/assets/js/jquery.scrollTo.min.js"></script>
        <!-- App js -->
        <script src="/admin-asset/assets/js/app.js"></script>
    </body>
</html>