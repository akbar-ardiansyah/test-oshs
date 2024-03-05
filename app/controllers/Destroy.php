<?php 

class Destroy extends Controller
{
    public function index()
    {
        $redirectUrl = BASEURL . 'public/home/dashboard';
        $id = $_POST['user_id'];
        if ($this->model('User_model')->deleteData($id) > 0) {
            header('Location: ' . $redirectUrl);
        } else {
            header('Location: ' . $redirectUrl);
        }
        exit;
    }
}
