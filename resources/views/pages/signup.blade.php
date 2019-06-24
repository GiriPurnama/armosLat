<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    @include('includes.css')

    <title>Signup</title>
</head>
<body>
    <section class="section-login">
        <div class="container">
            <div class="row">
                <div class="main">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="user-info text-center">
                                <span class="circle-user">
                                    <i class="fa fa-user"></i>
                                </span>
                            </div>
                        </div>
                    </div>	
                    <h2 class="font-bold text-center">Signup Master</h2>
                    <div class="login-or">
                        <hr class="hr-or">
                    </div>
                    <form role="form" id="formSignup" action="RegisterController" method="post">
                        <div class="form-group">
                            <label for="inputUsernameEmail">Username</label>
                            <input type="text" class="form-control" id="inputUsernameEmail" name="user_id" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="roleId">Role ID</label>
                            <!-- <input type="text" class="form-control" id="inputrole" name="role_id"> -->
                            <select class="form-control" id="inputrole" name="role_id" readonly="readonly">
                                <option value="master">Master</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="employeeId">Employee ID</label>
                            <!-- <input type="text" class="form-control" id="inputEmployee" name="employee_id"> -->
                            <select class="form-control" id="inputEmployee" name="employee_id" readonly="readonly">
                                <option value="none">None</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="inputPassword">Password</label>
                            <input type="password" class="form-control" id="inputPassword" name="user_password">
                        </div>
                        
                        <div class="form-group">
                            <label for="inputPassword">Confirm Password</label>
                            <input type="password" class="form-control" id="ConfirmPassword" name="c_password">
                            <span class="error"></span>
                        </div>
                        
                        <button class="btn btn-primary btnSignup" type="submit" class="btn btn btn-primary">
                            Create 
                        </button>
                    
                    </form>
                    
                </div>
                
            </div>
        </div>
    </section>
</body>
<script>
    var allowsubmit = false;
    $(function(){
        //on keypress 
        $('#ConfirmPassword').keyup(function(e){
            //get values 
            var pass = $('#inputPassword').val();
            var confpass = $(this).val();
            
            //check the strings
            if(pass == confpass){
                //if both are same remove the error and allow to submit
                $('.error').text('');
                $(".btnSignup").prop('disabled', false);
                allowsubmit = true;
            }else{
                //if not matching show error and not allow to submit
                $('.error').text('Password not matching');
                $(".btnSignup").prop('disabled', true);
                allowsubmit = false;
            }
        });
    });
</script>
</html>
