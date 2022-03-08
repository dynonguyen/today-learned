<?php
class Home extends Controller
{
    public function index()
    {
        $this->setBasicData('home/index', 'Trang chủ');
        $this->render('layouts/main-layout', $this->data);
    }
}
