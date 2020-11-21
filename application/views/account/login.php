<!-- <img src="<?=base_url('assets/img/loginbg.jpg')?>" style="top: 0; position: absolute; z-index: -2; width: 100%; height: 100%; -webkit-filter: blur(5px);  filter: blur(5px);"> -->
<section class="container" style="min-height: 93.9vh; max-height: 93.9vh">
    <div class="row justify-content-center" style="transform: translate(0%, 40%);">
        <div class="card shadow-light border-teal" style="width: 400px; min-width: 400px">
            <div class="card-header darktheme text-teal">
                <h4 class="h3">Login</h4>
                <div class="p-2">
                    <span class="text-danger" id="formError"></span>
                </div>
            </div>
            <div class="card-body darktheme-blue">
                <div id="username" class="form-group">
                    <label for="username" class="font-weight-bold text-teal">USERNAME</label>
                    <input type="text" name="username" class="form-control border-teal bg-transparent" placeholder="ENTER YOUR USERNAME">
                    <span class="text-danger"></span>
                </div>
                <div id="password" class="form-group">
                    <label for="password" class="font-weight-bold text-teal">PASSWORD</label>
                    <div class="input-group">
                        <input type="password" name="password" class="form-control border-teal bg-transparent" placeholder="ENTER YOUR PASSWORD">
                        <div class="input-group-append">
                            <button class="input-group-text btn view border-teal bg-transparent text-teal">
                                <i class="fa fa-eye"></i>
                            </button>
                        </div>
                    </div>
                    <span class="text-danger"></span>
                </div>
                <div class="form-check">
                  <label class="form-check-label h6">
                    <input class="form-check-input bg-transparent" name="rememberme" id="remember" type="checkbox" aria-label="Remember me">
                    <span class="text-teal">REMEMBER ME</span>
                  </label>
                </div>
            </div>
            <div class="card-footer darktheme-blue">
                <button id="submit" class="btn darktheme text-teal-alive btn-md w-100 border-teal">
                    <span id="btnLoading" class="d-none p-1"><i class="fas fa-spinner fa-pulse"></i></span>
                    <span id="btnText">LOGIN</span>
                </button>
                <div class="w-100 text-center mt-2 mb-2">
                    <span class="d-inline align-middle">No account yet?</span>
                    <span onclick="window.location.href = '<?=base_url('register')?>';" class="align-middle d-inline text-teal">Create account</span>
                </div>
                <a href="<?=base_url('home')?>" class="btn btn-light btn-md w-100 text-primary bg-transparent border-teal">
                    <span class="text-teal">BACK TO HOME</span>
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
            // if pressed enter key
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
                    console.log(data);
                    if(data.response.result == 'SUCCESS'){
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