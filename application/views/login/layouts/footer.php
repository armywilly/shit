
</body>
<!--   Core JS Files   -->
<script src="<?php echo base_url() ?>assets/admin/assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/admin/assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/admin/assets/js/material.min.js" type="text/javascript"></script>
<!--  Charts Plugin -->
<script src="<?php echo base_url() ?>assets/admin/assets/js/chartist.min.js"></script>
<!--  Dynamic Elements plugin -->
<script src="<?php echo base_url() ?>assets/admin/assets/js/arrive.min.js"></script>
<!--  PerfectScrollbar Library -->
<script src="<?php echo base_url() ?>assets/admin/assets/js/perfect-scrollbar.jquery.min.js"></script>
<!--  Notifications Plugin    -->
<script src="<?php echo base_url() ?>assets/admin/assets/js/bootstrap-notify.js"></script>
<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!-- Material Dashboard javascript methods -->
<script src="<?php echo base_url() ?>assets/admin/assets/js/material-dashboard.js?v=1.2.0"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="<?php echo base_url() ?>assets/admin/assets/js/demo.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

        // Javascript method's body can be found in assets/js/demos.js
        demo.initDashboardPageCharts();

    });
</script>

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

</html>