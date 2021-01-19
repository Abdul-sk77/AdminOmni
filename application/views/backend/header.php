<style>

</style>
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light" style="zoom:90%;">
    <!-- Left navbar links -->
    <!-- <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                        class="fas fa-bars"></i></a>
        </li>
    </ul> -->
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto header_bar" >
        <li class="nav-item profile"><a class="nav-link"  href="#" role="button" Click=""><i class="fa fa-user" aria-hidden="true"></i></a>
        </li>
        <li class="nav-item">
            <a class="nav-link"  href="<?php echo base_url('index.php/logout'); ?>" role="button"> <i
                        class="fa fa-power-off" style="color:red"></i>
            </a>
        </li>
    </ul>
</nav>
<!-- /.navbar -->
<!-- start prfile  Modal -->
<div class="modal fade" id="profile_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-target=".bs-example-modal-lg" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" style="zoom:90%;">
        <div class="modal-header">
            <h5 class="modal-title" id="myModalLabel">Edit Profile</h5>
            <button type="button" class="close" data-dismiss="modal" data-toggle="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
            <div id="error_div" class="error_div"></div>
            <form name="profile_form" id="profile_form">
                <div class="form-row">
                    <input type="hidden" id="user_id" >
                    <label for="inputEmail4">Name<span aria-hidden="true" style="color: red;">*</span></label>
                    <input type="text" class="form-control form-control-sm required" id="edit_name" name="edit_name">
                    <label id="edit_name-error" class="error" for="edit_name"  style="display: inline-block;"></label>
                </div>
                <div class="form-row">
                    <label for="inputEmail4">Email<span aria-hidden="true" style="color: red;">*</span></label>
                    <input type="email" class="form-control form-control-sm required" id="edit_email" name="edit_email">
                    <label id="edit_email-error" class="error" for="edit_email"  style="display: inline-block;"></label>
                </div>
                <div class="form-group">
                    <label for="inputPassword4">Phone Number<span aria-hidden="true" style="color: red;">*</span></label>
                    <input type="tel" class="form-control form-control-sm required" id="edit_phone" name="edit_phone">
                    <label id="edit_phone-error" class="error" for="edit_phone"  style="display: inline-block;"></label>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    <button type="button" id="resetPassword1" class="btn btn-sm btn-danger" data-toggle="modal" >Reset Password</button>
                    <button type="submit" id ="update" class="btn btn-primary btn-sm">Update</button>
                </div>
            </form>
        </div>
    </div>
  </div>
</div>
<!-- start reset password  Modal -->
<div class="modal fade" id="reset_password_modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-target=".bs-example-modal-lg" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" style="width:380px;margin-left:25%zoom:90%;">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Reset Password</h5>
                <button type="button" class="close" data-dismiss="modal" data-toggle="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div id="error_div" class="error_div"></div>
                <form name="reset_password_form1" id="reset_password_form1" method="post" action="#" >
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Password</label>
                        <div class="input-group" id="show_hide_password">
                            <input class="form-control form-control-sm" type="password" name="edit_password" id="edit_password">
                            <div class="input-group-prepend"
                                    style="border: 1px solid #ced4da; border-left: none; padding: 0px 5px;">
                                <a href="#"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Confirm password</label>
                        <input type="password" class="form-control form-control-sm" id="edit_cpassword" name="edit_cpassword">
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End reset password Modal -->
<script>

    $('li.profile').click(function(e){ 
        $('#profile_modal').modal('show');
        $.ajax({
            url: "<?php echo base_url('index.php/superadmin/profile/get_profile'); ?>",
            type: "GET",
            dataType: "JSON",
            cache: false,
            success: function(response)
            {
                $('#user_id').val(response.data.user_id);
                $('#edit_name').val(response.data.fullname);
                $('#edit_email').val(response.data.email_id);
                $('#edit_phone').val(response.data.phone_no); 
            }
        });
    });
    
    $('#resetPassword1').on('click', function(e){
        $('#reset_password_modal1').modal("show");
    });
    // $(function (){
    
    $("#update").unbind('click');
    $('#update').on('click', function(e){
            var fd =$('#profile_form').serialize();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('index.php/superadmin/profile/update-profile'); ?>",
                data:fd,
                dataType: "json",
                cache: false,
                success: function (response) {
                        alert("Profile Updated Successfully! Redirecting you to login page, you need to login again.");
                        window.location = "<?php echo base_url('index.php/logout'); ?>";
                       
                }
            });
    });
  
    
    $("#reset_password_form1").validate({
        rules:{
            edit_password:"required",
            edit_cpassword: {
                equalTo: "#edit_password"
            },
        },
        
        submitHandler: function (form){
            var fd =$('#reset_password_form1').serialize();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('index.php/superadmin/password/reset-password'); ?>",
                data:  fd ,
                dataType: "json",
                cache: false,
                success: function (response) {
                    if(response.status){
                    alert("Password reset Successfully! Redirecting you to login page, you need to login again.");
                            window.location = "<?php echo base_url('index.php/logout'); ?>";
                    }else{
                        $('.error_div').html(response.errors);
                    }
                }
            });
        }
    });
</script>