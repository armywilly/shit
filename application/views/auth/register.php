<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Kuzila Ajari! | </title>
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

  <body class="login">
   <div class="login">
            <div class="login-screen">
                <div class="app-title">
                    <img src="<?php echo base_url() ?>asset/logo.png">
                    <h2>Buat Akun</h2>
                </div>

                <div class="login-form">
             <?php echo form_open($this->uri->uri_string()); ?>
               <div class="control-group">
                  <input type="text" name="username" class="form-control" placeholder="Username" required />
                  <font style="color: #ff3333">
                      <?php echo form_error('username'); ?><?php echo isset($errors['username'])?$errors['username']:''; ?>
                  </font>
              </div>
               <div class="control-group">
                <input type="email" name="email" class="form-control" placeholder="Email" required />
                <font style="color: #ff3333">
                    <?php echo form_error('email'); ?><?php echo isset($errors['email'])?$errors['email']:''; ?>
                </font>
              </div>
                    <input type="hidden" name="role" value="4"/>
               
              <div> &nbsp;</div>
               <div class="control-group">
                <input type="password" name="password" class="form-control" placeholder="Password" required />
                <font style="color: #ff3333"><?php echo form_error('password'); ?></font>
              </div>
               <div class="control-group">
                <input type="password" name="confirm_password" class="form-control" placeholder="confirm Password" required />
                <font style="color: #ff3333"><?php echo form_error('confirm_password'); ?></font>
              </div>

              <button type="submit" class="btn btn-primary btn-large btn-block">Submit</button>


              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                    <a href="<?php echo base_url();?>" class="to_login"> Log in </a>
                </p>
              </div>
            </form>
    </div>
  </body>
</html>
