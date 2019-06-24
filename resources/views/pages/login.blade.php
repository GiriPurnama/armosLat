<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    @include('includes.css')

    <title>Login</title>
</head>
<body>
    <section class="section-login">
        <div class="container">
            <div class="row">
        
                <div class="main">
                
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="error-msg"></div>
                            <div class="user-info text-center">
                                <span class="circle-user">
                                    <i class="fa fa-user"></i>
                                </span>
                            </div>
                        </div>
                    </div>	
                    <h2 class="font-bold text-center">Log In</h2>
                    <div class="login-or">
                    <hr class="hr-or">
                    </div>
            
                    <form role="form" method="post" >
                        <div class="form-group">
                            <label for="inputUsernameEmail">Username or email</label>
                            <input type="text" class="form-control" id="inputUsernameEmail" name="user_id">
                        </div>
                        <div class="form-group">
                            <a class="pull-right" href="#">Forgot password?</a>
                            <label for="inputPassword">Password</label>
                            <input type="password" class="form-control" id="inputPassword" name="user_password">
                        </div>
                        <button type="submit" class="btn btn btn-primary">
                            Log In 
                        </button>
                    </form>
                
                </div>
            
            </div>
        </div>
    </section>
</body>
</html>