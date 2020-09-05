<section class="container">
    <div class="row">
        <div class="col-sm text-center p-lg-5">
            <h3>Login your account in Todo Manager</h3>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="card w-50">
            <div class="card-header">
                <h4 class="card-title">Login</h4>
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
                    <input type="password" name="password" class="form-control" placeholder="ENTER YOUR PASSWORD">
                    <span class="text-danger"></span>
                </div>
            </div>
            <div class="card-footer">
                <button id="submit" class="btn btn-primary btn-md w-100">
                    <span id="btnLoading" class="d-none p-1"><i class="fas fa-spinner fa-pulse"></i></span>
                    <span id="btnText">LOGIN</span>
                </button>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            var clickable = true;
            $('#submit').click(function() {
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
                    'password': $('#password input').val()
                }
                validateData(inputs, baseUrl('login/acceptLogin'),
                function(data) {
                    if(data.response.result == 'success'){
                        $('#formError').html('');
                        console.log('Login Successfull!');                    
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
            });
        });
    </script>
</section>