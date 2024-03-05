<?php 

class Update_data extends Controller
{
    public function index()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nama = $_POST['updated_name'];
            $email = $_POST['updated_email'];
            $password = $_POST['updated_password'];
            $userId = $_POST['user_id'];
            $userModel = $this->model('User_model');
            $result = $userModel->updateUserData($userId, $nama, $email, $password);
            if ($result) {
                echo 'Update gagal.';
            } else {
                echo 'Update berhasil.';
            }
        } else {
            header('Location: '.BASEURL.'/public/home/dashboard');
            exit;
        }
    }
}
