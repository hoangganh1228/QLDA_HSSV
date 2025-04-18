<?php
class DiemModel extends Model
{

    function getMon($nganh, $khoa)
    {
        return $this->database->select([], "credit_registration join subjects on credit_registration.subject_id = subjects.subject_id", "where credit_registration.major_id like '%$nganh%' and khoa_hoc_id like '%$khoa%'");
    }
    function getKhoa($mon, $nganh)
    {
        return $this->database->select([], "credit_registration", "where subject_id like '%$mon%' and major_id like '%$nganh%'");
    }

    function getNganh($mon, $khoa)
    {
        return $this->database->select([], "credit_registration join majors on majors.major_id = credit_registration.major_id", "where subject_id like '%$mon%' and khoa_hoc_id like '%$khoa%'");
    }

    function getSv($mon, $khoa, $nganh, $lop)
    {
        return $this->database->select([], "`credit_registration` join `student_subject` on credit_registration.reg_id = student_subject.reg_id join students on students.student_id = student_subject.student_id join grades on students.student_id = grades.student_id and credit_registration.reg_id = grades.reg_id", "where credit_registration.khoa_hoc_id like '%$khoa%' and major_id like '%$nganh%' and subject_id like '%$mon%' and class_id like '%$lop%'");
    }

    function updateGrade($grade, $editData)
    {
        return $this->database->update('grades', $editData, "where grade_id = '$grade'");
    }
}
