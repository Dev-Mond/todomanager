<!-- <img src="<?=base_url('assets/img/registerbg.jpg')?>" style="top: 0; position: absolute; z-index: -2; width: 100%; height: 100%; -webkit-filter: blur(5px);  filter: blur(5px);"> -->
<section class="w-100" style="min-height: 93.9vh; max-height: 93.9vh">
    <div class="row justify-content-center" style="transform: translate(0%, 40%);">
        <div class="card text-left border-teal" style="width: 600px; min-width: 400px">
            <div class="card-header darktheme text-teal">
                <span class="h3 d-block">REGISTER</span>
                <span class="text-danger d-block p-3"></span>
            </div>
            <div class="card-body darktheme-blue">
                <div class="col-sm d-flex justify-content-center">
                    <div id="username" class="form-group w-50 m-1">
                        <label for="username" class="text-teal">ENTER YOUR USERNAME</label>
                        <input type="text" class="form-control bg-transparent" name="username" placeholder="USERNAME" required>
                        <span class="text-danger"></span>
                    </div>
                    <div id="email" class="form-group w-50 m-1">
                        <label for="email" class="text-teal">ENTER YOUR EMAIL</label>
                        <input type="email" class="form-control bg-transparent" name="email" placeholder="example@mail.com" required>
                        <span class="text-danger"></span>
                    </div>
                </div>
                <div class="col-sm d-flex justify-content-center">
                    <div id="password" class="form-group w-50 m-1">
                        <label for="password" class="text-teal">ENTER YOUR PASSWORD</label>
                        <div class="input-group">
                            <input type="password" class="form-control bg-transparent" name="password" placeholder="PASSWORD" required>
                            <div class="input-group-append">
                                <button class="input-group-text btn view bg-transparent text-teal">
                                    <i class="fa fa-eye"></i>
                                </button>
                            </div>
                        </div>
                        <span class="text-danger"></span>
                    </div>
                    <div id="confirm" class="form-group w-50 m-1">
                        <label for="confirm" class="text-teal">CONFIRM YOUR PASSWORD</label>
                        <input type="password" class="form-control bg-transparent" name="confirm" placeholder="CONFIRM PASSWORD" required>
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
            <div class="card-footer p-5 darktheme-blue">
                <button id="btnRegister" class="btn bg-dark w-100 text-light border-teal">
                    <span id="btnLoading" class="d-none p-1"><i class="fas fa-spinner fa-pulse"></i></span>
                    <span id="btnText" class="text-teal">REGISTER</span>
                </button>
            </div>
        </div>
    </div>
</section>
<script>
    $(document).ready(function () {
        $(this).keypress(function(e) {
            // if pressed enter key
            if(e.which == 13) {
                register();
            }
        });

        $('#btnRegister').click(function () {
            register();
        });

        $('#password .btn').click(function () {
            if( $('#password svg').hasClass('fa-eye') ){ 
                $('#password svg').removeClass('fa-eye');
                $('#password svg').addClass('fa-eye-slash');
                $('#password input').prop('type', 'text');
                $('#passwordTooltip').html('Hide your password');
            }
            else {
                $('#password svg').removeClass('fa-eye-slash');
                $('#password svg').addClass('fa-eye');
                $('#password input').prop('type', 'password');
                $('#passwordTooltip').html('Show your password');
            }
        });
        
        var isClicked = false;

        function register() {
            if(isClicked) return;

            isClicked = true;
            const emailRegex = /^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;

            if($('#username input').val() === '') {
                $('#username span').html('Please enter a username!');
                isClicked = false;
                return;
            }
            else {
                $('#username span').html('');
            }
            if($('#email input').val() === '') {
                $('#email span').html('Please enter a email!');
                isClicked = false;
                return;
            }
            else if(!emailRegex.test($('#email input').val())) {
                $('#email span').html('Please enter a valid email!');
                isClicked = false;
                return;
            }
            else {
                $('#email span').html('');
            }
            if($('#password input').val() === '') {
                $('#password span').html('Please enter a password!');
                isClicked = false;
                return;
            }
            else {
                $('#password span').html('');
            }
            if($('#confirm input').val() === '') {
                $('#confirm span').html('Please confirm your Password!');
                isClicked = false;
                return;
            }
            else if($('#confirm input').val() !== $('#password input').val()) {
                $('#confirm span').html('Password not matched!');
                isClicked = false;
                return;
            }
            else {
                $('#confirm span').html('');
            }

            $('#btnLoading').removeClass('d-none');
            $('#btnText').html('SUBMITTING...');

            var userInputs = {
                'username' : $('#username input').val(),
                'email' : $('#email input').val(),
                'password' : $('#password input').val(),
                'confirmation' : $('#confirm input').val()
            };

            validateData(userInputs, baseUrl('register/validate'),
            function (result) {
                console.log(result);
                isClicked = false;
                $('#btnLoading').addClass('d-none');
                $('#btnText').html('REGISTER');
                if(result.status === "FAILED") {
                    $('.card-header .text-danger').html(result.error);
                }
                else {
                    window.location.replace('login');
                }
                
            }, 
            function (err) {
                console.log(err);
                isClicked = false;
                $('#btnLoading').addClass('d-none');
                $('#btnText').html('REGISTER');
            });
        }
    });
</script>
