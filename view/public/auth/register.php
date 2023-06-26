<?php
include_once("../../../config/database.php");
session_start();

function isDuplicate($email, $pdo)
{
    $stmt = $pdo->prepare("SELECT * FROM admin WHERE email = :email");
    $stmt->bindParam(':email', $email);
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
    if (isDuplicate($email, $pdo)) {
        echo "Email already Taken";
    } else {

        $hashed = password_hash($password, PASSWORD_DEFAULT);



        if (!password_verify($password_confirmation, $hashed)) {
            echo "<script>alert('Password Konfirmasi tidak sama')</script>";
            return false;
        }

        $stmt = $pdo->prepare("INSERT INTO customer (nama_lengkap,no_hp,alamat_lengkap,email,password) VALUES (:nama_lengkap,:no_hp,:alamat_lengkap,:email,:password)");


        $stmt->bindParam(':nama_lengkap', $nama_lengkap);
        $stmt->bindParam(':no_hp', $no_hp);
        $stmt->bindParam(':alamat_lengkap', $alamat_lengkap);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashed);
        $stmt->execute();

        $_SESSION['isLoggedIn'] = true;
        $_SESSION['admin'] = false;

        echo "<script>alert('Registrasi Berhasil')</script>";
    }
}

if (isset($_POST['submit'])) {
    $nama_lengkap = $_POST['nama_lengkap'];
    $no_hp = $_POST['no_hp'];
    $alamat_lengkap = $_POST['alamat_lengkap'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirmation = $_POST['password_confirmation'];

    $errors = [];

    if (empty($nama_lengkap)) {
        $errors[] = "Nama Lengkap Tidak Boleh Kosong";
    }
    if (empty($email)) {
        $errors[] = "Email Tidak Boleh Kosong";
    }
    if (empty($no_hp)) {
        $errors[] = "No Hp Tidak Boleh Kosong";
    }
    if (empty($alamat_lengkap)) {
        $errors[] = "Alamat Lengkap Tidak Boleh Kosong";
    }
    if (empty($password)) {
        $errors[] = "Password Tidak Boleh Kosong";
    }

    if (empty($password_confirmation)) {
        $errors[] = "Password Confirmation Tidak Boleh Kosong";
    }

    if (empty($errors)) {

        registerUser($nama_lengkap, $no_hp, $alamat_lengkap, $email, $password, $password_confirmation, $pdo);
        header("location: ../home/index.php");
    } else {
        foreach ($errors as $error) {
            echo "<script>alert('$error')</script>";
        }
    }
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
            <button type="submit" name="submit" class="auth-button">SIGN IN</button>
        </form>
        <p>Already have an account? <a href="login.php">Click Here!</a></p>
    </div>
</section>

<?php
include_once("../../inc/footer.php");
?>