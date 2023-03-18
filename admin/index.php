<?php
session_start();
include "../config/db_connect.php";
require "../login_validation.php";
$success = '';
$error = '';
if (isset($_POST['submit'])) {
    $loginValid = new loginValidation($_POST);
    $errors = $loginValid->loginValid();
    if (array_filter($errors)) {
    } else {

        $query = "SELECT * FROM admininfo WHERE email = :email";
        $stmt = $pdo->prepare($query);
        $email = trim($_POST['email']);
        $password = $_POST['password'];
        $stmt->execute([
            ":email" => $email
        ]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $verify = password_verify($password, $result['password']);
        if ($email == $result['email'] && $verify == true) {
            $success = "Logging in";
            $_SESSION['adminId'] = $result['id'];
            $_SESSION['adminEmail'] = $result['email'];
            header('Location: ');
        } else {
            $error = "Can't Login Check The form You Submitted";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script defer src="js/index.js"></script>
    <title>WyteMart | Login</title>
    <?php include "../templates/formStyle.php" ?>
</head>

<body>
    <div class="container">
        <h1 id="navbar-brand">Wyte<span class="text-dark">Mart Login Admin</span></h1>
        <form action="index.php" method="POST">
            <?php if ($success) : ?>
                <div class="success">
                    <?php echo $success ?? '' ?>
                </div>
            <?php elseif ($error) : ?>
                <div id="error">
                    <?php echo $error ?? '' ?>
                </div>
            <?php endif; ?>
            <label id="label">Email</label>
            <input type="text" name="email" value="<?php echo $_POST['email'] ?? '' ?> ">
            <div id="error">
                <?php echo $errors['email'] ?? '' ?>
            </div>

            <label id="label">password</label>
            <input type="password" name="password" value="<?php echo $_POST['password'] ?? '' ?>">
            <div id="error">
                <?php echo $errors['password'] ?? '' ?>
            </div>

            <input type="submit" value="LogIn To Account" name="submit" id="submit">
        </form>
    </div>
</body>

</html>