<section class="container">
    <div class="row">
        <div class="col-lg text-center m-lg-5">
            <div class="h3">Create your Todo Manager Account</div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="card text-left w-50">
            <div class="card-header">
                <span class="h3 d-block">REGISTER</span>
                <span class="text-danger d-block p-3"></span>
            </div>
            <div class="card-body">
                <div class="col-sm d-flex justify-content-center">
                    <div id="username" class="form-group w-50 m-1">
                        <label for="username">ENTER YOUR USERNAME</label>
                        <input type="text" class="form-control" name="username" placeholder="USERNAME" required>
                        <span class="text-danger"></span>
                    </div>
                    <div id="email" class="form-group w-50 m-1">
                        <label for="email">ENTER YOUR EMAIL</label>
                        <input type="email" class="form-control" name="email" placeholder="EMAIL" required>
                        <span class="text-danger"></span>
                    </div>
                </div>
                <div class="col-sm d-flex justify-content-center">
                    <div id="password" class="form-group w-50 m-1">
                        <label for="password">ENTER YOUR PASSWORD</label>
                        <div class="input-group">
                            <input type="password" class="form-control" name="password" placeholder="PASSWORD" required>
                            <div class="input-group-append">
                                <button class="input-group-text btn view">
                                    <i class="fa fa-eye"></i>
                                </button>
                            </div>
                        </div>
                        <span class="text-danger"></span>
                    </div>
                    <div id="confirm" class="form-group w-50 m-1">
                        <label for="confirm">CONFIRM YOUR PASSWORD</label>
                        <input type="password" class="form-control" name="confirm" placeholder="CONFIRM PASSWORD" required>
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button id="btnRegister" class="btn bg-dark w-100 text-light">
                    <span id="btnLoading" class="d-none p-1"><i class="fas fa-spinner fa-pulse"></i></span>
                    <span id="btnText">REGISTER</span>
                </button>
            </div>
        </div>
    </div>
</section>
<script>
    $(document).ready(function () {
        $(this).keypress(function(e) {
            if(e.which == 13) {
                register();
            }
        });

        $('#btnRegister').click(function () {
            register();
        });
        
        var isClicked = false;

        function register() {
            if(isClicked) return;

            isClicked = true;
            const emailRegex = /^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;

            $('#btnLoading').removeClass('d-none');
            $('#btnText').html('SUBMITTING...');
            
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
            else if($('#confirm input').val() === $('#password input').val()) {
                $('#confirm span').html('Password not matched!');
                isClicked = false;
                return;
            }
            else {
                $('#confirm span').html('');
            }

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
                window.location.replace('login');
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
