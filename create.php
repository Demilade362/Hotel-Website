<?php
require "config/db_connect.php";
require "user_vaildation.php";
$success = '';
if (isset($_POST['submit'])) {
    $validation = new Vaildator($_POST);
    $errors = $validation->formValidation();
    if (array_filter($errors)) {
    } else {
        $success = "Filling is Done";
        $username = $_POST['username'];
        $email = trim($_POST['email']);
        $password = $_POST['password'];
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO userinfo(name, email, password) VALUES(:name, :email, :password);";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ":name" => $username,
            ":email" => $email,
            ":password" => $hashedPassword
        ]);
        $success =  'Created Account Successfully';
        header("Location: index.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/main.css">
    <script defer src="js/index.js"></script>
    <title>WyteMart | Create Account</title>
    <?php include "templates/formStyle.php" ?>
</head>

<body>
    <div class="container">
        <h1 id="#navbar-brand">Wyte<span class="text-dark">Mart Create</span></h1>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
            <?php if ($success) : ?>
                <div class="success">
                    <?php echo $success ?? '' ?>
                </div>
            <?php endif; ?>
            <label id="label" for="username">Username</label>
            <input type="text" name="username" value="<?php echo $_POST['username'] ?? '' ?>">
            <div id="error">
                <?php echo $errors['username'] ?? '' ?>
            </div>

            <label id="label" for="email">Email</label>
            <input type="text" name="email" value="<?php echo $_POST['email'] ?? '' ?> ">
            <div id="error">
                <?php echo $errors['email'] ?? '' ?>
            </div>

            <label id="label" for="password">password</label>
            <input type="password" name="password" value="<?php echo $_POST['password'] ?? '' ?>">
            <div id="error">
                <?php echo $errors['password'] ?? '' ?>
            </div>

            <label id="label" for="confirmPassword">confirm password</label>
            <input type="password" name="confirmPassword" value="<?php echo $_POST['confirmPassword'] ?? '' ?>">
            <div id="error">
                <?php echo $errors['confirmPassword'] ?? '' ?>
            </div>


            <input type="checkbox" name="license">
            <label for="license">I accept the <a href="#" class="link">license and agreement</a></label>

            <input type="submit" value="Create Account" name="submit" id="submit">
        </form>

        <p class="lead">I have an Account? <a href="index.php" class="link">Login to Account</a></p>
    </div>
</body>

</html>