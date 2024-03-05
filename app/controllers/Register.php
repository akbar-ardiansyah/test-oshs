<?php
class Register extends Controller 
{
    public function index()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nama = $_POST['nama'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $userModel = $this->model('User_model');
            if ($userModel->isEmailRegistered($email)) {
                echo 'Email sudah terdaftar.';
            } else {
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                $result = $userModel->registerUser($nama, $email, $hashedPassword);
                if ($result = true) {
                    echo 'Registrasi berhasil.';
                } else {
                    echo 'Registrasi gagal.';
                }
            }
        } else {
            // header('Location: '.BASEURL.'/public/signup');
            exit;
        }
    }
}