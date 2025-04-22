-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 13, 2024 lúc 02:53 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qlda_hssv`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `classes`
--

CREATE TABLE `classes` (
  `id` int(11) NOT NULL,
  `class_id` varchar(9) NOT NULL,
  `major_id` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `class_subject`
--

CREATE TABLE `class_subject` (
  `id` int(9) NOT NULL,
  `class_subject_id` varchar(9) NOT NULL,
  `reg_id` varchar(9) NOT NULL,
  `class_id` varchar(9) NOT NULL,
  `day_start` date NOT NULL,
  `day_end` date NOT NULL,
  `period_start` int(9) NOT NULL,
  `period_end` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `credit_registration`
--

CREATE TABLE `credit_registration` (
  `id` int(9) NOT NULL,
  `reg_id` varchar(9) NOT NULL,
  `major_id` varchar(9) NOT NULL,
  `subject_id` varchar(9) NOT NULL,
  `semester_id` varchar(9) NOT NULL,
  `khoa_hoc_id` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `departments`
--

CREATE TABLE `departments` (
  `id` int(9) NOT NULL,
  `department_id` varchar(9) NOT NULL,
  `department_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `departments`
--

INSERT INTO `departments` (`id`, `department_id`, `department_name`) VALUES
(4, 'MK01', 'CNTT'),
(5, 'MK02', 'KT');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `grades`
--

CREATE TABLE `grades` (
  `id` int(9) NOT NULL,
  `grade_id` varchar(9) NOT NULL,
  `student_id` varchar(9) NOT NULL,
  `teacher_id` varchar(9) NOT NULL,
  `reg_id` varchar(9) NOT NULL,
  `chuyen_can` float NOT NULL,
  `giua_ky` float NOT NULL,
  `cuoi_ky` float NOT NULL,
  `tong_ket` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khoa_hoc`
--

CREATE TABLE `khoa_hoc` (
  `id` int(9) NOT NULL,
  `khoa_hoc_id` varchar(9) NOT NULL,
  `start_year` year(4) NOT NULL,
  `end_year` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `majors`
--

CREATE TABLE `majors` (
  `id` int(9) NOT NULL,
  `major_id` varchar(9) NOT NULL,
  `major_name` varchar(30) NOT NULL,
  `department_id` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `majors`
--

INSERT INTO `majors` (`id`, `major_id`, `major_name`, `department_id`) VALUES
(2, 'MN01', 'CNTT', 'MK01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `semesters`
--
<<<<<<< HEAD
-- hoc ky
=======

>>>>>>> d2a1f1f15bfcddb260b48e41c5b5b7b115614ed3
CREATE TABLE `semesters` (
  `id` int(9) NOT NULL,
  `semester_id` varchar(9) NOT NULL,
  `name` varchar(9) NOT NULL,
  `year_id` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `students`
--

CREATE TABLE `students` (
  `id` int(9) NOT NULL,
  `student_id` int(9) NOT NULL,
  `user_id` int(9) NOT NULL,
  `fullname` int(30) NOT NULL,
  `date_of_birth` date NOT NULL,
  `sex` enum('Nam','Nữ') NOT NULL,
  `address` varchar(100) NOT NULL,
  `class_id` varchar(9) NOT NULL,
  `khoa_hoc_id` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `student_subject`
--

CREATE TABLE `student_subject` (
  `id` int(11) NOT NULL,
  `student_id` varchar(9) NOT NULL,
  `reg_id` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `studies`
--

CREATE TABLE `studies` (
  `id` int(9) NOT NULL,
  `class_subject_id` varchar(9) NOT NULL,
  `day_of_week` varchar(15) NOT NULL,
  `room` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `subjects`
--

CREATE TABLE `subjects` (
  `id` int(9) NOT NULL,
  `subject_id` varchar(9) NOT NULL,
  `subject_name` varchar(30) NOT NULL,
  `credits` int(3) NOT NULL,
  `major_id` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `subject_teacher`
--

CREATE TABLE `subject_teacher` (
  `id` int(9) NOT NULL,
  `subject_id` varchar(9) NOT NULL,
  `teacher_id` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `teachers`
--

CREATE TABLE `teachers` (
  `id` int(9) NOT NULL,
  `teacher_id` varchar(9) NOT NULL,
  `user_id` varchar(9) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `date_of_birth` date NOT NULL,
  `sex` enum('Nam','Nữ') NOT NULL,
  `address` varchar(100) NOT NULL,
  `department_id` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tuitions`
--

CREATE TABLE `tuitions` (
  `id` int(9) NOT NULL,
  `student_id` varchar(9) NOT NULL,
  `semester_id` varchar(9) NOT NULL,
  `total` int(11) NOT NULL,
  `paid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tuition_fee`
--

CREATE TABLE `tuition_fee` (
  `id` int(9) NOT NULL,
  `tuition_fee_id` varchar(9) NOT NULL,
  `department_id` varchar(9) NOT NULL,
  `fee_per_credit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(9) NOT NULL,
  `user_id` varchar(9) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `role` enum('Quản lý','Giảng viên','Sinh viên') NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `role`, `email`, `phone`, `created_date`)
VALUES
(1, 'QL001', 'admin', 'admin', 'Quản lý', 'admin@qlda.local', '0909123456', '2024-01-01'),
(2, 'GV001', 'giangvien', '123456', 'Giảng viên', 'gv1@qlda.local', '0912123456', '2024-02-01'),
(3, 'SV001', 'nghia', '123456', 'Sinh viên', 'sv1@qlda.local', '0933123456', '2024-03-01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `years`
--

CREATE TABLE `years` (
  `id` int(11) NOT NULL,
  `year_id` varchar(9) NOT NULL,
  `start` year(4) NOT NULL,
  `end` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_classId` (`class_id`);

--
-- Chỉ mục cho bảng `class_subject`
--
ALTER TABLE `class_subject`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_classSubjectId` (`class_subject_id`);

--
-- Chỉ mục cho bảng `credit_registration`
--
ALTER TABLE `credit_registration`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_regId` (`reg_id`);

--
-- Chỉ mục cho bảng `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_departmentId` (`department_id`);

--
-- Chỉ mục cho bảng `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_gradeId` (`grade_id`);

--
-- Chỉ mục cho bảng `khoa_hoc`
--
ALTER TABLE `khoa_hoc`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_khoaHocId` (`khoa_hoc_id`);

--
-- Chỉ mục cho bảng `majors`
--
ALTER TABLE `majors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_majorId` (`major_id`);

--
-- Chỉ mục cho bảng `semesters`
--
ALTER TABLE `semesters`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_semesterId` (`semester_id`);

--
-- Chỉ mục cho bảng `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_studentId` (`student_id`);

--
-- Chỉ mục cho bảng `student_subject`
--
ALTER TABLE `student_subject`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `studies`
--
ALTER TABLE `studies`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY ` uq_subjectId` (`subject_id`);

--
-- Chỉ mục cho bảng `subject_teacher`
--
ALTER TABLE `subject_teacher`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_teacherId` (`teacher_id`);

--
-- Chỉ mục cho bảng `tuitions`
--
ALTER TABLE `tuitions`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tuition_fee`
--
ALTER TABLE `tuition_fee`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_tuitionFeeId` (`tuition_fee_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_userId` (`user_id`);

--
-- Chỉ mục cho bảng `years`
--
ALTER TABLE `years`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_yearId` (`year_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `class_subject`
--
ALTER TABLE `class_subject`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `credit_registration`
--
ALTER TABLE `credit_registration`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `grades`
--
ALTER TABLE `grades`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `khoa_hoc`
--
ALTER TABLE `khoa_hoc`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `majors`
--
ALTER TABLE `majors`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `semesters`
--
ALTER TABLE `semesters`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `students`
--
ALTER TABLE `students`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `student_subject`
--
ALTER TABLE `student_subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `studies`
--
ALTER TABLE `studies`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `subject_teacher`
--
ALTER TABLE `subject_teacher`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tuitions`
--
ALTER TABLE `tuitions`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tuition_fee`
--
ALTER TABLE `tuition_fee`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `years`
--
ALTER TABLE `years`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
