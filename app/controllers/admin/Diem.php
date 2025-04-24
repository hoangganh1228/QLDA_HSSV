<?php

use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

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
            if (isset($_GET['importSubmit'])) $this->import();
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
        header("Location: ../diem?mon=" . $_GET['mon'] . "&khoa=" . $_GET['khoa'] . "&nganh=" . $_GET['nganh'] . "&lop=" . $_GET['lop']);
    }

    function import()
    {
        require_once 'vendor/autoload.php';
        $excelMimes = array(
            'text/xls',
            'text/xlsx',
            'application/excel',
            'application/vnd.msexcel',
            'application/vnd.ms-excel',
            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
        );

        // var_dump($_FILES);

        if (!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $excelMimes)) {
            if (is_uploaded_file($_FILES['file']['tmp_name'])) {
                $reader = new Xlsx();
                $spreadSheet = $reader->load($_FILES['file']['tmp_name']);
                $worksheet = $spreadSheet->getActiveSheet();
                $worksheet_arr = $worksheet->toArray();

                unset($worksheet_arr[0]);

                foreach ($worksheet_arr as $row) {
                    $this->model->importGrades($row, $_GET['mon']);
                }
                $qstring = '?status=success';
            } else {
                $qstring = '?status=error';
            }
        } else {
            $qstring = '?status=invalid_file';
        }

        header("Location: ../diem" . $qstring);
    }
}
