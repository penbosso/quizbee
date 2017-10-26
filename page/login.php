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
                    <input type="button" name="login" value="Login" />
                </form>
            </div>
        </div>
        <div class="contain">
            <div class="content">
                
            </div>
            <div class="signup">
                    <form action="../include/process_user.php" method="post" name="registration_form">
                        <table>
                            <tr>
                                <td>Email:</td><td><input type="text" name="email" id="email" placeholder="email"/></td>
                            </tr>
                            <tr>
                                <td>First name:</td><td><input type='text' name='fname' id='fname' /></td>
                            </tr>
                            <tr>
                                <td>Last name:</td><td><input type='text' name='username' id='lname' /></td>
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
                                <td colspan="2"><input type="button" value="Sign up" /></td><td></td>
                            </tr>
                        </table>                        
                    </form>
                </div>
        </div>

        </div>
    </body>
</html>