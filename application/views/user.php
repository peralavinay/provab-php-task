<?php
function cvf_convert_object_to_array($user) {

    if (is_object($user)) {
        $user = get_object_vars($user);
    }

    if (is_array($user)) {
        return array_map(__FUNCTION__, $user);
    }
    else {
        return $user;
    }
}

$user = cvf_convert_object_to_array($user);
// print_r($user);
// die();
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css"
         rel = "stylesheet">
      <script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
      <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

      
    <title>Registration Form</title>
  </head>
  <body>
    <style>
        .has-error
        {
        border-color:#cc0000;
        background-color:#ffff99;
        }
    </style>
    <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Home</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
    <?php if(isset($_SESSION['user_logged'])) { ?>
    <li class="nav-item">
        <a class="nav-link" href="<?php base_url()?>user">Profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php base_url()?>hotels">Hotels</a>
      </li>
    <?php } 
    else { ?>      
      <li class="nav-item">
        <a class="nav-link" href="<?php base_url()?>login">Login</a>
      </li>
      <?php } ?>
      
    </ul>
    <span class="float-right">
    <a class="nav-link" href="<?php base_url()?>auth/logout">Logout</a>
    </span>
  </div>
</nav>
        <h1>User Profile</h1>
        <?php 
        if (isset($_SESSION['success'])) { 
            echo '<div class="alert alert-success">'.$_SESSION["success"].'</div>';
        }
        if (isset($_SESSION['error'])) { 
        echo '<div class="alert alert-danger">'.$_SESSION["error"].'</div>';
        } 
        ?>
        <?php if(!empty($user)) { ?>
        <form method="post" id="register_form" action="<?= base_url('auth/update')?>" enctype="multipart/form-data">
            <div class="row">
                <div class="form-group col-md-6">
                    <label>First Name</label>
                    <input type="text" class="form-control" id="fname" name="fname" value="<?= $user['fname'] ?>" placeholder="First Name" required>
                    <span id="error_fname" class="text-danger"></span>
                </div>

                <div class="form-group col-md-6">
                    <label>Last Name</label>
                    <input type="text" class="form-control" id="lname" name="lname" value="<?= $user['lname'] ?>" placeholder="Last Name" required>
                    <span id="error_lname" class="text-danger"></span>
                </div>

                <div class="form-group col-md-6">
                    <label>Designation</label>
                    <input type="text" class="form-control" id="design" name="design" value="<?= $user['designation'] ?>" placeholder="Enter Designation" required>
                    <span id="error_design" class="text-danger"></span>
                </div>

                <div class="form-group col-md-6">
                    <label>Date of Birth</label>
                    <input type="text" class="form-control" id="dob" name="dob" value="<?= $user['dob'] ?>" placeholder="Enter Date of birth" required>
                </div>

                <div class="form-group col-md-6">
                    <label>Email address</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?= $user['email'] ?>" placeholder="Enter email" required>
                </div>

                <div class="form-group col-md-6">
                    <label>Mobile</label>
                    <input type="tel" class="form-control" id="mobile" name="mobile" value="<?= $user['mobile'] ?>" placeholder="Enter Mobile Number" required>
                    <span id="error_mobile" class="text-danger"></span>
                </div>

                <div class="form-group col-md-6">
                    <label>Password</label>
                    <input type="password" class="form-control" id="pass" name="pass" placeholder="Enter Password" required>
                    <span id="error_pass" class="text-danger"></span>
                </div>

                <div class="form-group col-md-6">
                    <label>Confirm Password</label>
                    <input type="password" class="form-control" id="cpass" name="cpass" placeholder="Re-enter Password" required>
                </div>
            </div>
            <label>Profile Image</label>
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="profile" name="profile" required>
                <label class="custom-file-label">Choose file...</label>
                <p id="error1" style="display:none; color:#FF0000;">
                Invalid Image Format! Image Format Must Be JPG, JPEG, PNG or GIF.
                </p>
                <p id="error2" style="display:none; color:#FF0000;">
                Maximum File Size Limit is 1MB.
                </p>
            </div>
            
            <input name="update" class="btn btn-primary mt-5" type="submit" value="Submit" id="submit" />
        </form>
        <?php }  ?>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- <script src="http://cdn.jsdelivr.net/jquery.validation/1.15.0/additional-methods.min.js"></script> -->

    <script>
        
        $(document).ready(function(){
            var filtertext = /^[A-Za-z ]*$/;
            var filternum = /^[0-9]{10}$/;
         $(function() {
            $( "#dob" ).datepicker();
            maxDate: 0;
         });
            $('#fname').change(function(){
                if (!filtertext.test($('#fname').val()))
                {
                    error_fname = 'Only alphabets are allowed';
                    $('#error_fname').text(error_fname);
                    $('#fname').addClass('has-error');
                }
                else
                {
                    error_fname = '';
                    $('#error_fname').text(error_fname);
                    $('#fname').removeClass('has-error');
                }
            });

            $('#lname').change(function(){
                if (!filtertext.test($('#lname').val()))
                {
                    error_fname = 'Only alphabets are allowed';
                    $('#error_lname').text(error_lname);
                    $('#lname').addClass('has-error');
                }
                else
                {
                    error_lname = '';
                    $('#error_lname').text(error_lname);
                    $('#lname').removeClass('has-error');
                }
            });

            $('#design').change(function(){
                if (!filtertext.test($('#design').val()))
                {
                    error_design = 'Only alphabets are allowed';
                    $('#error_design').text(error_design);
                    $('#design').addClass('has-error');
                }
                else
                {
                    error_design = '';
                    $('#error_design').text(error_design);
                    $('#design').removeClass('has-error');
                }
            });

            $('#mobile').change(function(){
                if (!filternum.test($('#mobile').val()))
                {
                    error_design = 'Only numbers are allowed';
                    $('#error_mobile').text(error_design);
                    $('#mobile').addClass('has-error');
                }
                else
                {
                    error_mobile = '';
                    $('#error_mobile').text(error_mobile);
                    $('#mobile').removeClass('has-error');
                }
            });

            $('#cpass').change(function(){
                var pass = $('#pass').val();
                var cpass = $('#cpass').val();

                if(pass != cpass){
                    error_pass = "Passwords do not match";
                    $('#error_pass').text(error_pass);
                    $('#pass').addClass('has-error');
                    $('#cpass').addClass('has-error');
                }
                else{
                    error_pass = '';
                    $('#error_pass').text(error_pass);
                    $('#pass').removeClass('has-error');
                    $('#cpass').removeClass('has-error');
                }
            });

            $('input[type="submit"]').prop("disabled", true);
            var a=0;
            //binds to onchange event of your input field
            $('#profile').bind('change', function() {
                if ($('input:submit').attr('disabled',false)){
                    $('input:submit').attr('disabled',true);
                }
                var ext = $('#profile').val().split('.').pop().toLowerCase();
                if ($.inArray(ext, ['gif','png','jpg','jpeg']) == -1){
                    $('#error1').slideDown("slow");
                    $('#error2').slideUp("slow");
                    a=0;
                }
                else{
                    var picsize = (this.files[0].size);
                    if (picsize > 1000000){
                        $('#error2').slideDown("slow");
                        a=0;
                    }
                    else{
                        a=1;
                        $('#error2').slideUp("slow");
                    }
                    $('#error1').slideUp("slow");
                    if (a==1){
                    $('input:submit').attr('disabled',false);
                    }
                }
            });
        });
    </script>
  </body>
</html>