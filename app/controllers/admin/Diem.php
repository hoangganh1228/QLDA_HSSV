<?php
class Diem extends Controller
{
    private $data, $model;

    function __construct()
    {
        $this->model = $this->model("admin/DiemModel");
    }

    function index()
    {
        if (isset($_GET)) {
            $this->data['mon'] = isset($_GET['mon']) && $_GET['mon'] !== '' ? $_GET['mon'] : '';
            $this->data['khoa'] = isset($_GET['khoa']) && $_GET['khoa'] !== '' ? $_GET['khoa'] : '';
            $this->data['nganh'] = isset($_GET['nganh']) && $_GET['nganh'] !== '' ? $_GET['nganh'] : '';
            $this->data['lop'] = isset($_GET['lop']) && $_GET['lop'] !== '' ? $_GET['lop'] : '';
        }
        $this->data['mons'] = $this->model->getMon($this->data['nganh'], $this->data['khoa']);
        $this->data["khoas"] = $this->model->getKhoa($this->data['mon'], $this->data['nganh']);        //lay khoa
        $this->data['nganhs'] = $this->model->getNganh($this->data['mon'], $this->data['khoa']);
        $this->data['sv'] = $this->model->getSv($this->data['mon'], $this->data['khoa'], $this->data['nganh'], $this->data['lop']);
        $this->view("admin/Diem/Diem_index", $this->data);
    }

    function edit()
    {
        if (isset($_POST)) {
            $grade = isset($_POST['grade']) && $_POST['grade'] !== '' ? $_POST['grade'] : '';
            $editData['chuyen_can'] = isset($_POST['chuyen_can'][$grade]) && $_POST['chuyen_can'][$grade] !== '' ? $_POST['chuyen_can'][$grade] : '';
            $editData['giua_ky'] = isset($_POST['giua_ky'][$grade]) && $_POST['giua_ky'][$grade] !== '' ? $_POST['giua_ky'][$grade] : '';
            $editData['cuoi_ky'] = isset($_POST['cuoi_ky'][$grade]) && $_POST['cuoi_ky'][$grade] !== '' ? $_POST['cuoi_ky'][$grade] : '';

            $this->model->updateGrade($grade, $editData);
        }
        header("Location: ../diem");
    }
}
