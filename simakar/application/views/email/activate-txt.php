<?php echo $site_name; ?>,

Please confirm your email address by clicking the link below.

We may need to send you critical information about our service and it is important that we have an accurate email address.

<?php echo site_url('/auth/activate/'.$user_id.'/'.$new_email_key); ?>

<?php if (strlen($username) > 0) { ?>
Your username: <?php echo $username; ?>
<?php } ?>

Your email address: <?php echo $email; ?>
<?php if (isset($password)) { /* ?>

Your password: <?php echo $password; ?>
<?php */ } ?>


Please verify your email within <?php echo $activation_period; ?> hours, otherwise your registration will become invalid and you will have to register again.


<?php echo $site_name; ?> - 2018