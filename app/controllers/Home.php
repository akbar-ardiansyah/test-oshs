<?php 

class Home extends Controller {
    public function index()
    {
        $data['judul'] = 'Home';
        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }

    public function register(){
        $data['judul'] = 'Register';
        $this->view('templates/header', $data);
        $this->view('auth/register', $data);
        $this->view('templates/footer');
    }

    public function dashboard(){
        $data['judul'] = 'Dashboard';
        $data['user'] = $this->model('User_model')->getAllUser();
        $this->view('templates/header', $data);
        $this->view('page/dashboard', $data);
        $this->view('templates/footer');
    }


}