<!DOCTYPE html>
<?php
$login = array(
    'name' => 'login',
    'id' => 'login',
    'value' => set_value('login'),
    'maxlength' => 80,
    'size' => 30,
);
if ($login_by_username AND $login_by_email) {
    $login_label = 'Email or login';
} else if ($login_by_username) {
    $login_label = 'Login';
} else {
    $login_label = 'Email';
}
$password = array(
    'name' => 'password',
    'id' => 'password',
    'size' => 30,
);
$remember = array(
    'name' => 'remember',
    'id' => 'remember',
    'value' => 1,
    'checked' => set_value('remember'),
    'style' => 'margin:0;padding:0',
);
$captcha = array(
    'name' => 'captcha',
    'id' => 'captcha',
    'maxlength' => 8,
);
?><html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Login Aplikasi Sistem Informasi Managament | </title>
        <style>
            * {
                box-sizing: border-box;
            }

            *:focus {
                outline: none;
            }
            body {
                font-family: Arial;
                background-color: #ECF0F1;
                padding: 50px;
            }
            .login {
                margin: 20px auto;
                width: 400px;
            }
            .login-screen {
                background-color: #00CCFF;
                padding: 20px;
                border-radius: 5px
            }

            .app-title {
                text-align: center;
                color: #777;
            }

            .login-form {
                text-align: center;
            }
            .control-group {
                margin-bottom: 10px;
            }

            input {
                text-align: left;
                background-color: #FFF;
                border: 2px solid transparent;
                border-radius: 3px;
                font-size: 16px;
                font-weight: 200;
                padding: 10px 5px;
                width: 350px;
                transition: border .5s;
            }

            input:focus {
                border: 2px solid #3498DB;
                box-shadow: none;
            }

            .btn {
                border: 2px solid transparent;
                background: #fff568;
                color: #444;
                font-size: 16px;
                line-height: 25px;
                padding: 10px 0;
                text-decoration: none;
                text-shadow: none;
                border-radius: 8px;
                box-shadow: none;
                transition: 0.25s;
                display: block;
                width: 350px;
                margin: 0 auto;
            }

            .btn:hover {
                background-color: #2980B9;
            }

            .login-link {
                font-size: 12px;
                color: #444;
                display: block;
                margin-top: 12px;
            }
        </style>

    </head>

    <body>

        <div class="login">
            <div class="login-screen">
                <div class="app-title">
                    <img src="<?php echo base_url() ?>asset/logo.png">
                    <h3>Silahkan Isikan Data Anda Dengan Benar!!</h3>
                </div>

                <div class="login-form">
                    <?php echo isset($errors[$login['name']]) ? '<div class="alert alert-danger alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <strong>' . $errors[$login['name']] . '</strong> </div>' : ''; ?>
                    <?php echo form_open($this->uri->uri_string()); ?>

                    <div class="control-group">
                        <input type="text" class="login-field" name="login" placeholder="username" id="login-name" required="required">
                        <label class="login-field-icon fui-user" for="login-name"></label>
                    </div>

                    <div class="control-group">
                        <input type="password" class="login-field" name="password" placeholder="password" id="login-pass" required="required">
                        <label class="login-field-icon fui-lock" for="login-pass"></label>
                    </div>
                    <button type="submit" class="btn btn-primary btn-large btn-block">Login</button>



                    </form>
                </div>
                <div style="text-align: center">
                    <div class="separator">
                        <p class="change_link">Pengguna Baru?
                            <a href="<?php echo base_url() ?>auth/register" class="to_register"> Buat Akun </a>
                        </p>

                        <div class="clearfix"></div>
                        <br />


                    </div>

                </div>
            </div>
        </div>
    </body>
</html>
