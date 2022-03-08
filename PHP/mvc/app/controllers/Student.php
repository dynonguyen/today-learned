<?php
require_once 'app/repositories/Student.php';

class Student extends Controller
{
    // get a student with id
    public function index($id = '')
    {
        $this->data['viewContent']['studentInfo'] = StudentRepository::getStudentWithId($id);
        $this->setBasicData('student/index', "Thông tin sinh viên $id");
        $this->render('layouts/main-layout', $this->data);
    }

    public function list()
    {
        $this->data['viewContent']['studentList'] = StudentRepository::getAll();
        $this->setBasicData('student/list', 'Danh sách sinh viên');
        $this->render('layouts/main-layout', $this->data);
    }
}
