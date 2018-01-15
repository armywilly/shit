<div class="container">
    <div class="backbox">
      <div class="loginMsg">
        <div class="textcontent">
          <p class="title">Don't have an account?</p>
          <p>Sign up to save all your graph.</p>
          <button id="switch1">Sign Up</button>
        </div>
      </div>
      <div class="signupMsg visibility">
        <div class="textcontent">
          <p class="title">Have an account?</p>
          <p>Log in to see all your collection.</p>
          <button id="switch2">LOG IN</button>
        </div>
      </div>
    </div>
    <!-- backbox -->

    <div class="frontbox">
      <div class="login">
        <h2>LOG IN</h2>
        <?php echo form_open('login/index'); ?>
        <div class="inputbox">
          <input type="text" name="username" placeholder="  USERNAME" value="<?php echo set_value('username'); ?>">
          <input type="password" name="password" placeholder="  PASSWORD">
        </div>

        <p>FORGET PASSWORD?</p>
        <button>LOG IN</button>
        <?php echo form_close(); ?>
      </div>

      <div class="signup hide">
        <h2>SIGN UP</h2>
        <div class="inputbox">
          <input type="text" name="fullname" placeholder="  FULLNAME">
          <input type="text" name="email" placeholder="  EMAIL">
          <input type="password" name="password" placeholder="  PASSWORD">
        </div>
        <button>SIGN UP</button>
      </div>

    </div>
    <!-- frontbox -->
  </div>

  <?php if(validation_errors()) { ?>
  <div class="container">
  <div class="col-md-6 pull-left">
    <div class="alert alert-danger alert-with-icon">
      <i data-notify="icon" class="material-icons">add_alert</i>
    <button type="button" class="close" data-dismiss="alert">×</button>
      <h4>Terjadi Kesalahan!</h4>
    <?php echo validation_errors(); ?>
  </div>
</div>
</div>
  <?php } ?>
  
  <?php if($this->session->flashdata('result_login')) { ?>
  <div class="container">
  <div class="col-md-6 pull-left">
    <div class="alert alert-danger alert-with-icon">
      <i data-notify="icon" class="material-icons">add_alert</i>
    <button type="button" class="close" data-dismiss="alert">×</button>
      <h4>Terjadi Kesalahan!</h4>
    <?php echo $this->session->flashdata('result_login'); ?>
  </div>
</div>
</div>
  <?php } ?>

  <script>
    var $loginMsg = $('.loginMsg'),
  $login = $('.login'),
  $signupMsg = $('.signupMsg'),
  $signup = $('.signup'),
  $frontbox = $('.frontbox');

$('#switch1').on('click', function() {
  $loginMsg.toggleClass("visibility");
  $frontbox.addClass("moving");
  $signupMsg.toggleClass("visibility");

  $signup.toggleClass('hide');
  $login.toggleClass('hide');
})

$('#switch2').on('click', function() {
  $loginMsg.toggleClass("visibility");
  $frontbox.removeClass("moving");
  $signupMsg.toggleClass("visibility");

  $signup.toggleClass('hide');
  $login.toggleClass('hide');
}) </script>