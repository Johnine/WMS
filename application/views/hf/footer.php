<?php
/**
 * Created by John Richard Quitaneg.
 * User: JOQUITAN
 * Email: johnrichardq@gmail.com
 * Date: 12/01/2018
 * Time: 8:09 PM
 */
?>


<!-- jQuery 2.0.2 - 3.3.1-->
<!--        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>-->
<script src="<?=base_url()?>assets/js/jquery-2.0.2.min.js" type="text/javascript"></script>
<!--<script src="--><?//=base_url()?><!--assets/js/jquery-3.3.1.min.js" type="text/javascript"></script>-->
<script src="<?=base_url()?>assets/js/declarations.js" type="text/javascript"></script>
<?php if ($page=='main'){?>
<!--Resizable layout-->
<script src="<?=base_url()?>assets/js/jquery-resizable.js"></script>
<script src="<?=base_url()?>assets/js/main.js" type="text/javascript"></script>
<?php } ?>

<!-- jQuery UI 1.10.3 -->
<script src="<?=base_url()?>assets/js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>

<!-- DATA TABES SCRIPT -->
    <script src="<?=base_url()?>/assets/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="<?=base_url()?>/assets/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
<?php if ($page=='customer'){?>
    <script src="<?=base_url()?>/assets/js/customer.js" type="text/javascript"></script>
<?php }else if($page =='sku') {?>
    <script src="<?=base_url()?>/assets/js/sku.js" type="text/javascript"></script>
<?php }else if($page =='user') {?>
    <script src="<?=base_url()?>/assets/js/user.js" type="text/javascript"></script>
    <script src="<?=base_url()?>/assets/js/ajaxfileupload.js" type="text/javascript"></script>
<?php }else if($page =='role') {?>
    <script src="<?=base_url()?>/assets/js/role.js" type="text/javascript"></script>
<?php }else if($page =='loc') {?>
    <script src="<?=base_url()?>/assets/js/loc.js" type="text/javascript"></script>
<?php }else if($page =='pid') {?>
    <script src="<?=base_url()?>/assets/js/pid.js" type="text/javascript"></script>
<?php }?>

<!-- Bootstrap -->
<script src="<?=base_url()?>assets/js/bootstrap.min.js" type="text/javascript"></script>
<!-- Sparkline -->
<script src="<?=base_url()?>assets/js/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
<!-- jvectormap -->
<script src="<?=base_url()?>assets/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>assets/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
<!-- jQuery Knob Chart -->
<script src="<?=base_url()?>assets/js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?=base_url()?>assets/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
<!-- iCheck -->
<script src="<?=base_url()?>assets/js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="<?=base_url()?>assets/js/AdminLTE/app.js" type="text/javascript"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?=base_url()?>assets/js/AdminLTE/dashboard.js" type="text/javascript"></script>

<?php $this->load->view('pages/chat'); ?>

</body>
</html>
