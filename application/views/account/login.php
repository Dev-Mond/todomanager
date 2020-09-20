<section class="container">
    <div class="row">
        <div class="col-sm text-center p-lg-5">
            <h3>Login to your Todo Manager Accout</h3>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="card w-50 shadow-light">
            <div class="card-header">
                <h4 class="h3">Login</h4>
                <div class="p-2">
                    <span class="text-danger" id="formError"></span>
                </div>
            </div>
            <div class="card-body">
                <div id="username" class="form-group">
                    <label for="username" class="font-weight-bold">USERNAME</label>
                    <input type="text" name="username" class="form-control" placeholder="ENTER YOUR USERNAME">
                    <span class="text-danger"></span>
                </div>
                <div id="password" class="form-group">
                    <label for="password" class="font-weight-bold">PASSWORD</label>
                    <div class="input-group">
                        <input type="password" name="password" class="form-control" placeholder="ENTER YOUR PASSWORD">
                        <div class="input-group-append">
                            <button class="input-group-text btn view">
                                <i class="fa fa-eye"></i>
                            </button>
                        </div>
                    </div>
                    <span class="text-danger"></span>
                </div>
                <div class="form-check">
                  <label class="form-check-label h6">
                    <input class="form-check-input align-top" name="rememberme" id="remember" type="checkbox" aria-label="Remember me">
                    REMEMBER ME
                  </label>
                </div>
            </div>
            <div class="card-footer">
                <button id="submit" class="btn bg-dark text-light btn-md w-100">
                    <span id="btnLoading" class="d-none p-1"><i class="fas fa-spinner fa-pulse"></i></span>
                    <span id="btnText">LOGIN</span>
                </button>
                <div class="w-100 text-center">
                    <span class="d-inline">NO ACCOUNT YET?</span>
                    <a href="<?=base_url('register')?>" class="btn btn-link d-inline">CREATE AN ACCOUNT</a>
                </div>
                <a href="<?=base_url('home')?>" class="btn btn-light btn-md w-100 text-primary">
                    BACK TO HOME
                </a>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            var clickable = true;
            $('#submit').click(function() {
                invokeLogin();
            });

            $('.view').on('click', function () {
                if ($(this).find('svg').hasClass('fa-eye-slash')) {
                    $(this).find('svg').addClass('fa-eye').removeClass('fa-eye-slash');
                    // password type
                    $('#password input').prop('type', 'password');
                }
                else {
                    $(this).find('svg').addClass('fa-eye-slash').removeClass('fa-eye');
                    // text type
                    $('#password input').prop('type', 'text');
                }
            });

            $(document).on('keypress', function (evt) {
                if(evt.which == 13) {
                    invokeLogin();
                }
            });

            function invokeLogin() {
                if(!clickable) return;
                clickable=false;
                if($('#username input').val() === '') {
                    $('#username span').html('Please enter your user name!');
                    clickable=true;
                    return;
                } 
                else {
                    $('#username span').html('');
                }

                if($('#password input').val() === '') {
                    $('#password span').html('Please enter your password!');
                    clickable=true;
                    return;
                }
                else {
                    $('#password span').html('');
                }

                $('#btnLoading').removeClass('d-none');
                $('#btnText').html('LOGGING IN ...');

                var inputs = {
                    'username': $('#username input').val(),
                    'password': $('#password input').val(),
                    'rememberme': $('#remember').is(":checked")
                }
                console.log(inputs);
                validateData(inputs, baseUrl('login/acceptLogin'),
                function(data) {
                    if(data.response.result == 'success'){
                        $('#formError').html('');
                        console.log('Login Successfull!');
                        window.location.replace('dashboard');                    
                    }
                    else {
                        $('#formError').html('Your username or password is incorrect!');
                        console.log('Login Failed!');    
                    }
                    $('#btnLoading').addClass('d-none');
                    $('#btnText').html('LOGIN');
                    clickable=true;
                },
                function(err) {
                    console.log(err);
                    $('#btnLoading').addClass('d-none');
                    $('#btnText').html('LOGIN');
                    clickable=true;
                });
            }
        });
    </script>
</section>