<?php
class Home extends Controller
{
    private $model_home;
    private $data = [];

    public function index()
    {
        $this->model_home = $this->model('HomeModel');

        $this->data['sub_content']['title'] = 'Page Data';
        $this->data['sub_content']['list'] = $this->model_home->getList();
        $this->data['page_title'] = 'Home';
        $this->data['content'] = 'home/index';

        $this->render('layouts/main-layout', $this->data);
    }
}
