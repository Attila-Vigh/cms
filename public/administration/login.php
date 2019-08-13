<?php require_once('../../private/initialize.php');

    $errors = [];
    $username = '';
    $password = '';

    if(is_post_request()) {

        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';

        // Validations
        if(is_blank($username)) {
            $errors[] = "Username cannot be blank.";
        }
        if(is_blank($password)) {
            $errors[] = "Password cannot be blank.";
        }

        // if there were no errors, try to login
        if(empty($errors)) {
            $admin = Admin::find_by_username($username);
            // test if admin found and password is correct
            if($admin != false && $admin->verify_password($password)) {
                // Mark admin as logged in
                $session->login($admin);
                redirect_to('/administration/index.php');
            } else {
                // username not found or password does not match
                $errors[] = "Log in was unsuccessful.";
            }

        }

    }

    // $page_title = 'Log in';
    // include(SHARED_PATH . '/administration_header.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" media="all" href="<?php echo link_to('/css/login.css'); ?>" />
    <title>Login</title>
</head>
<body>
    <div id="wrapper">
        <div class="">
            <h1 >Login</h1>
        </div>
        <?php echo display_errors($errors); ?>
        <form action="login.php" method="post">
            
            <div class="logInput">
                <input type="text" name="username" value="<?php echo h($username); ?>"  placeholder="@username"/><br />
            </div>
            <div class="logInput">
                <input type="password" name="password" value="" placeholder="password"/><br />
            </div>
            <div class="logInput logSubmit">
                <input type="submit" name="submit" value="Login"  />
            </div>

        </form>
    
    </div>
</body>
</html>