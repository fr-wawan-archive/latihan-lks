<?php
include_once("../../../config/database.php");
session_start();

function isDuplicate($email, $password, $pdo)
{
    $stmt = $pdo->prepare("SELECT * FROM admin WHERE email = :email AND password = :password");
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->execute();

    $admin = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($admin !== false) {
        return true;
    }

    $stmt = $pdo->prepare("SELECT * FROM customer WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    $customer = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($customer !== false) {
        return true;
    }

    return false;
}

function registerUser($nama_lengkap, $no_hp, $alamat_lengkap, $email, $password, $password_confirmation, $pdo)
{
    if (isDuplicate($email, $password, $pdo)) {
        echo "Email already Taken";
    } else {

        if ($password_confirmation !== $password) {
            echo "Password & Password Confirmation not the same";
            return false;
        }

        $stmt = $pdo->prepare("INSERT INTO customer (nama_lengkap,no_hp,alamat_lengkap,email,password) VALUES (:nama_lengkap,:no_hp,:alamat_lengkap,:email,:password)");


        $stmt->bindParam(':nama_lengkap', $nama_lengkap);
        $stmt->bindParam(':no_hp', $no_hp);
        $stmt->bindParam(':alamat_lengkap', $alamat_lengkap);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->execute();

        $_SESSION['admin'] = false;

        echo "Registration Successfull";
    }
}

if (isset($_POST['submit'])) {
    $nama_lengkap = $_POST['nama_lengkap'];
    $no_hp = $_POST['no_hp'];
    $alamat_lengkap = $_POST['alamat_lengkap'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirmation = $_POST['password_confirmation'];

    registerUser($nama_lengkap, $no_hp, $alamat_lengkap, $email, $password, $password_confirmation, $pdo);
}

?>

<?php
include_once("../../inc/header.php");
?>

<section class="register">
    <h1>REGI<span>STER</span></h1>

    <div class="form-section">
        <form action="" method="post">
            <input type="text" placeholder="Your Full Name..." name="nama_lengkap">
            <input type="number" placeholder="Your Phone Number..." name="no_hp">
            <input type="text" placeholder="Your Address..." name="alamat_lengkap">
            <input type="email" placeholder="Your Email..." name="email">
            <input type="password" placeholder="Your Password..." name="password">
            <input type="password" placeholder="Your Password Confirmation..." name="password_confirmation">
            <button type="submit" name="submit">SIGN IN</button>
        </form>
        <p>Already have an account? <a href="login.php">Click Here!</a></p>
    </div>
</section>