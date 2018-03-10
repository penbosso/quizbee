<?php
require_once("../include/initialize.php");

if ($session->is_logged_in()) {
    redirect_to("index.php");
}

if (isset($_POST['login'])){//FORM SUBMITTED
	$username = trim($_POST['username']);
	$password = trim($_POST['password']);

	//check database to see if username/password exist.
	$found_user = User::authenticate($username,$password);

	if($found_user){
        $session->login($found_user);
        $sql = "UPDATE user SET status ='online' WHERE id = '$found_user->id'";
        $database->query($sql);
		log_action('Login',"{$found_user->username} logged in");
		redirect_to("index.php");
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
        redirect_to("index.php");
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
            <h1 id="logo_txt">IMPULSE</h1>
            <div class="login">
                <form action="login.php" method="post">
                    <input type="text" name="username" value="" placeholder="Username" required class="signinput" />
                    <input type="password" name="password" value="" placeholder="Password" class="signinput" required />
                    <input type="submit" name="login" value="Login" id="btnsignin" />
                    <button type="button" id="newuser" onclick="document.getElementById('signup').style.display='block'">New User</button>
                </form>
            </div>
        </div>
        <div class="contain">
            <div class="content">
                <?php echo output_message($session->message); ?>
            </div>
            <div id="know">
                <h2><em>Do You Know?</em><br> The 10 Benefits benefits of quizzes and tests in educational practice<b>!!</b> </h2>
                <p>
                    <ol>
                        <li>Retrieval aids later retention. There is clear evidence from psychological experiments that practicing retrieval of something after learning it, for instance by taking a quiz or test, makes you more likely to retain it for the long term.</il>
                        <li>Testing causes students to learn more from the next study episode. Essentially it reduces forgetting which makes the next related study area more productive.</il>
                        <li>Testing produces better organization of knowledge by helping the brain organize material in clusters to allow better retrieval.</il>
                    </ol>
                    Login to find out more....
                </p>

            </div>
            
            <div class="signup" id="signup">
                <span onclick="document.getElementById('signup').style.display='none'" class="close" title="Close Modal"><h1>&times;</h1></span>
                    <form action="login.php" method="post" name="signup_form">
                        <table>
                            <tr><p id ="para">Create a new account </p></tr>
                            <tr>
                                <td>Email:</td><td><input type="text" name="email" id="email" class="signupinput" required/></td>
                            </tr>
                            <tr>
                                <td>First name:</td><td><input type='text' name='first_name' id='fname' class="signupinput" required/></td>
                            </tr>
                            <tr>
                                <td>Last name:</td><td><input type='text' name='last_name' id='lname' class="signupinput" required/></td>
                            </tr>
                            <tr>
                                <td>Username:</td><td><input type='text' name='username' id='username' class="signupinput" required/></td>
                            </tr>
                            <tr>
                                <td>Password:</td><td><input type="password" name="password" id="password" class="signupinput" required/></td>
                            </tr>
                            <tr>
                                <td>Confirm password:</td><td> <input type="password" name="confirmpwd" id="confirmpwd" class="signupinput" required/></td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="submit" name="signup" value="Sign up" id="btnsignup" 
                                onclick="return validateForm(this.form,
                               this.form.username,
                               this.form.email,
                               this.form.password,
                               this.form.confirmpwd,
                               this.form.first_name,
                               this.form.last_name);" /></td><td></td>
                            </tr>
                        </table>                        
                    </form>
                </div>
        </div>

        </div>
    <script  src="../js/valid.js"></script>
    </body>
</html>