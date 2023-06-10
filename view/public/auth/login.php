<?php
include_once("../../../config/database.php");

session_start();

function isAdmin($email, $password, $pdo)
{
    $stmt = $pdo->prepare("SELECT * FROM admin WHERE email = :email  AND password = :password");
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->execute();

    $admin = $stmt->fetch(PDO::FETCH_ASSOC);

    return $admin !== false;
}

function isCustomer($email, $password, $pdo)
{
    $stmt = $pdo->prepare("SELECT * FROM customer WHERE email = :email AND password = :password");
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    return $user !== false;
}

function loginUser($email, $password, $pdo)
{
    if (isAdmin($email, $password, $pdo)) {
        $_SESSION['admin'] = true;
        echo "Admin Login Successfull";
    } elseif (isCustomer($email, $password, $pdo)) {
        $_SESSION['admin'] = false;
        echo "User Login Successfull";
    } else {
        echo "Invalid Credentials";
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    loginUser($email, $password, $pdo);
}

var_dump($_SESSION);
?>

<?php
include_once("../../inc/header.php");
?>


<section class="register">
    <h1>LOG<span>IN</span></h1>

    <div class="form-section">
        <form action="" method="post">
            <input type="text" placeholder="Your Email..." name="email">
            <input type="password" placeholder="Your Password..." name="password">
            <button type="submit">LOGIN</button>
        </form>
        <p>Already have an account? <a href="register.php">Click Here!</a></p>
    </div>
</section>