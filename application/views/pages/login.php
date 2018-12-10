<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<link href="<?=base_url()?>assets/css/style.css" rel="stylesheet" id="bootstrap-css">
<link href="<?=base_url()?>assets/css/bootstrap.css" rel="stylesheet" id="bootstrap-css">
<script src="<?=base_url()?>assets/js/bootstrap.js"></script>
<script src="<?=base_url()?>assets/js/jquery-2.0.2.min.js"></script>
<section class="content">
    <div class="wrapper fadeInDown">
        <div id="formContent">
            <!-- Tabs Titles -->

            <!-- Icon -->
            <div class="fadeIn first">
                <img id="profile-img" class="profile-img-card" src="<?=base_url()?>assets/pic/default.png" />
<!--                <h1 style="color:#60a0ff;">LOGIN</h1>-->
            </div>

            <!-- Login Form -->
            <?php
            $attributes = array("class" => "form-horizontal", "id" => "loginform", "name" => "loginform");
            echo form_open("", $attributes);?>

            <input type="text" id="username" class="fadeIn second" name="username" placeholder="username" required onkeyup="$('#errorLogin').hide('slow');">
            <span class="text-danger"><?php echo form_error('username'); ?></span>
            <input type="password" id="password" class="fadeIn third" name="password" placeholder="password" required onkeyup="$('#errorLogin').hide('slow');">
            <span class="text-danger"><?php echo form_error('password'); ?></span>
            <?php echo $this->session->flashdata('msg'); ?>
            <input type="submit" class="fadeIn fourth" value="Log In">
            </form>
            <!-- Remind Passowrd -->
            <div id="formFooter">
                <a class="underlineHover" href="#">Forgot Password?</a>
            </div>

        </div>
    </div>
</section>

