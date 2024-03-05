<?php

class Signin extends Controller
{
    public function processSignIn()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $userModel = $this->model('User_model');
            if ($userModel->login($email, $password)) {
                // Jika sign-in berhasil, redirect ke halaman dashboard
                header('Location: '.BASEURL.'/public/home/dashboard'); 
                exit;
            } else {
                // Jika sign-in gagal, tampilkan pesan error atau kembali ke halaman sign-in
                 echo "<script>alert('Password or email is incorrect!');</script>";
                $this->view('home', ['error' => 'Sign-in failed.']);
            }
        } else {
            // Jika bukan metode POST, redirect ke halaman sign-in
            header('Location: /public/home'); // Ganti /sign-in dengan URL halaman sign-in
            exit;
        }
    }
}

?>
