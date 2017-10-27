<?php
require_once("../include/initialize.php");

if (isset($_POST['login'])){//FORM SUBMITTED
	$username = trim($_POST['username']);
	$password = trim($_POST['password']);

	//check database to see if username/password exist.
	$found_user = User::authenticate($username,$password);

	if($found_user){
		$session->login($found_user);
		log_action('Login',"{$found_user->username} logged in");
		redirect_to("index.html");
	}else{
		//username/password not found in db
        $message = "Username/password combination incorrect.";
        redirect_to("login.php");
	}
}else{//form not submitted.
	$username = "";  
	$password = "";
	$message ="";
}

if(isset($_POST['signup'])){
    $user = new User();
    $user =$user->instantiate($_POST);
    if ($user->save()) {
        $session->message("Welcome! you have successfully signed up");
        redirect_to("index.html");
    } else {
        $session->message("<br />"." unable to sign you up");
        redirect_to("");
    }

}

?>
<html>
    <head>
        <title>Quizbee</title>
        <link rel="stylesheet" type="text/css" href="../css/login.css" />
    </head>
    <body>
        <div class="top">
            <h1 id="logo_txt">Quizbee</h1>
            <div class="login">
                <form action="login.php" method="post">
                    <input type="text" name="username" value="" placeholder="Username" required />
                    <input type="password" name="password" value="" placeholder="Password" required />
                    <input type="submit" name="login" value="Login" />
                </form>
            </div>
        </div>
        <div class="contain">
            <div class="content">
                <?php echo output_message($message); ?>
            </div>
            <div class="signup">
                    <form action="login.php" method="post" name="signup_form">
                        <table>
                            <tr>
                                <td>Email:</td><td><input type="text" name="email" id="email" placeholder="email"/></td>
                            </tr>
                            <tr>
                                <td>First name:</td><td><input type='text' name='first_name' id='fname' /></td>
                            </tr>
                            <tr>
                                <td>Last name:</td><td><input type='text' name='last_name' id='lname' /></td>
                            </tr>
                            <tr>
                                <td>Username:</td><td><input type='text' name='username' id='username' /></td>
                            </tr>
                            <tr>
                                <td>Password:</td><td><input type="password" name="password" id="password"/></td>
                            </tr>
                            <tr>
                                <td>Confirm password:</td><td> <input type="password" name="confirmpwd" id="confirmpwd" /></td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="submit" name="signup" value="Sign up" /></td><td></td>
                            </tr>
                        </table>                        
                    </form>
                </div>
        </div>

        </div>
    </body>
</html>