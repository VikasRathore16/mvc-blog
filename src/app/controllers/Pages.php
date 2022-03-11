<?php


class Pages extends Controller
{
    public function __construct()
    {
        $this->userModel = $this->model('User');
        $this->blogModel = $this->model('Blogs');
    }

    public function index()
    {
        $users = $this->userModel->getUsers();
        $data = [
            'title' => 'Home Page',
            'users' => $users

        ];
        $this->view('pages/index', $data);
    }

    public function about()
    {
        echo "About";
    }

    public function signup()
    {
        $blog = $this->blogModel->blogheader();
        $data = [
            'title' => 'Home Page',
            'blog' => $blog

        ];
        $this->view('pages/signup', $data);
    }
}
