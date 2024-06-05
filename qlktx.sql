-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th01 22, 2024 lúc 10:11 AM
-- Phiên bản máy phục vụ: 10.4.10-MariaDB
-- Phiên bản PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qlktx`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietchuyenphong`
--

CREATE TABLE `chitietchuyenphong` (
  `MaDK` int(11) NOT NULL,
  `MaSV` bigint(20) NOT NULL,
  `MaPhongChuyen` varchar(10) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `MaPhongO` varchar(20) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `Lydo` varchar(300) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `TinhTrang` varchar(20) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `NgayChuyen` date DEFAULT NULL,
  `NgayDangKy` date DEFAULT current_timestamp(),
  `LanChuyen` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietchuyenphong`
--

INSERT INTO `chitietchuyenphong` (`MaDK`, `MaSV`, `MaPhongChuyen`, `MaPhongO`, `Lydo`, `TinhTrang`, `NgayChuyen`, `NgayDangKy`, `LanChuyen`) VALUES
(86, 171250533535, NULL, 'A104', NULL, NULL, NULL, '2019-12-22', 0),
(87, 171, NULL, 'C101', NULL, NULL, NULL, '2019-12-22', 0),
(88, 161250533333, 'C203', 'C101', '1', 'đã trả', '2019-12-22', '2024-01-22', 1),
(89, 161250533333, NULL, 'C101', 'phòng rộng quá', NULL, NULL, '2024-01-22', 0),
(90, 161250533333, NULL, 'C101', NULL, NULL, NULL, '2019-12-22', 0),
(91, 161250533333, NULL, 'C101', NULL, NULL, NULL, '2019-12-22', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdangky`
--

CREATE TABLE `chitietdangky` (
  `MaDK` int(11) NOT NULL,
  `MaSV` bigint(11) NOT NULL,
  `MaPhong` varchar(10) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `MaNV` varchar(20) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `NgayDangKy` date NOT NULL DEFAULT current_timestamp(),
  `NgayTraPhong` date DEFAULT NULL,
  `TinhTrang` varchar(50) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietdangky`
--

INSERT INTO `chitietdangky` (`MaDK`, `MaSV`, `MaPhong`, `MaNV`, `NgayDangKy`, `NgayTraPhong`, `TinhTrang`) VALUES
(86, 171250533535, 'A104', 'NV1', '2019-12-22', NULL, 'đã duyệt'),
(87, 171, 'C101', 'NV1', '2019-12-22', NULL, 'đã duyệt'),
(88, 161250533333, 'C203', 'NV1', '2019-12-22', '2019-12-22', 'đã duyệt'),
(89, 161250533333, 'C101', 'NV1', '2019-12-22', '2019-12-22', 'đã duyệt'),
(90, 161250533333, 'C101', 'NV1', '2019-12-22', '2019-12-22', 'đã duyệt'),
(91, 161250533333, 'C101', 'NV1', '2019-12-22', '2019-12-22', 'chưa duyệt');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadondiennuoc`
--

CREATE TABLE `hoadondiennuoc` (
  `MaHD` int(11) NOT NULL,
  `MaPhong` varchar(20) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `TienDien` decimal(10,0) NOT NULL,
  `TienNuoc` decimal(10,0) NOT NULL,
  `Thang` int(11) NOT NULL,
  `TinhTrang` varchar(20) COLLATE utf8mb4_vietnamese_ci NOT NULL DEFAULT 'chưa thu'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadondiennuoc`
--

INSERT INTO `hoadondiennuoc` (`MaHD`, `MaPhong`, `TienDien`, `TienNuoc`, `Thang`, `TinhTrang`) VALUES
(8, 'C101', '400000', '200000', 1, 'đã thu'),
(9, 'C101', '235000', '190000', 2, 'đã thu'),
(10, 'C101', '255300', '150500', 3, 'đã thu'),
(11, 'C101', '235000', '200000', 4, 'đã thu'),
(12, 'C101', '200000', '150500', 5, 'đã thu'),
(13, 'C101', '255300', '200000', 6, 'đã thu'),
(14, 'C101', '400000', '150500', 7, 'đã thu'),
(15, 'C101', '200000', '150500', 8, 'đã thu'),
(6, 'C101', '200000', '200000', 9, 'đã thu'),
(16, 'C101', '282000', '187000', 10, 'đã thu'),
(17, 'C101', '282000', '150500', 11, 'chưa thu');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khu`
--

CREATE TABLE `khu` (
  `MaKhu` varchar(10) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `TenKhu` varchar(20) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `Sex` varchar(3) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `khu`
--

INSERT INTO `khu` (`MaKhu`, `TenKhu`, `Sex`) VALUES
('A', 'Khu A', 'Nam'),
('B', 'Khu B', 'Nam'),
('C', 'Khu C', 'Nu'),
('D', 'Khu D', 'Nu');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MaNV` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `HoTen` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `NgaySinh` date DEFAULT NULL,
  `DiaChi` varchar(50) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `SDT` bigint(12) DEFAULT NULL,
  `MatKhau` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `Quyen` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`MaNV`, `HoTen`, `NgaySinh`, `DiaChi`, `SDT`, `MatKhau`, `Quyen`) VALUES
('NV1', 'Nhân Viên A', '1995-01-18', 'Đà Nẵng', 123456789, '123456', 1),
('NV2', 'Nhân Viên B', '1998-11-20', 'Quảng Nam', 987654321, '123456', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phong`
--

CREATE TABLE `phong` (
  `MaPhong` varchar(10) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `MaKhu` varchar(10) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `SoNguoiToiDa` int(2) DEFAULT NULL,
  `SoNguoiHienTai` int(2) DEFAULT 0,
  `Gia` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `phong`
--

INSERT INTO `phong` (`MaPhong`, `MaKhu`, `SoNguoiToiDa`, `SoNguoiHienTai`, `Gia`) VALUES
('A101', 'A', 4, 0, '1250000'),
('A102', 'A', 4, 0, '1250000'),
('A103', 'A', 4, 0, '1250000'),
('A104', 'A', 4, 1, '1250000'),
('A201', 'A', 6, 0, '800000'),
('A202', 'A', 6, 0, '800000'),
('A203', 'A', 6, 0, '800000'),
('A204', 'A', 6, 0, '800000'),
('A301', 'A', 8, 0, '600000'),
('A302', 'A', 8, 0, '600000'),
('A303', 'A', 8, 0, '600000'),
('A304', 'A', 8, 0, '600000'),
('B101', 'B', 4, 0, '1250000'),
('B102', 'B', 4, 0, '1250000'),
('B103', 'B', 4, 0, '1250000'),
('B201', 'B', 8, 0, '600000'),
('B202', 'B', 6, 0, '800000'),
('B203', 'B', 6, 0, '800000'),
('B301', 'B', 8, 0, '600000'),
('B302', 'B', 8, 0, '600000'),
('B303', 'B', 8, 0, '600000'),
('C101', 'C', 4, 4, '1250000'),
('C102', 'C', 4, 0, '1250000'),
('C201', 'C', 6, 0, '800000'),
('C202', 'C', 6, 0, '800000'),
('C203', 'C', 6, -2, '800000'),
('C301', 'C', 8, 0, '600000'),
('C302', 'C', 8, 0, '600000'),
('C303', 'C', 8, 0, '600000'),
('D101', 'D', 8, 0, '600000');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sinhvien`
--

CREATE TABLE `sinhvien` (
  `MaSV` bigint(50) NOT NULL,
  `HoTen` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `GioiTinh` varchar(10) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `NgaySinh` date DEFAULT NULL,
  `DiaChi` varchar(50) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `SDT` bigint(12) DEFAULT NULL,
  `MatKhau` varchar(50) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
   `Anh` varchar(255) DEFAULT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `sinhvien`
--

INSERT INTO `sinhvien` (`MaSV`, `HoTen`, `GioiTinh`, `NgaySinh`, `DiaChi`, `SDT`, `MatKhau`, `Anh`) VALUES
(171, 'sinh vien a', 'Nu', '2000-11-11', 'Đà Nẵng', 1228923743, '123456', 'anh1.jpg'),
(161250533333, 'Huỳnh Minh Thông', 'Nu', '1998-02-15', '10 Tôn Đản - Đà Nẵng', 778923745, '123456', 'anh1.jpg'),
(161250533360, 'Nguyễn Đình Trí', 'Nam', '1998-07-25', '1092 Trường Chinh Đà Nẵng', 7789237432, '123456', 'anh1.jpg'),
(171250533535, 'Nguyễn Nam Cường', 'Nam', '1998-06-28', '45 Lê Duẫn - Đà Nẵng', 789455468, '123456', 'anh1.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongbao`
--

CREATE TABLE `thongbao` (
  `MaTB` int(11) NOT NULL,
  `MaSV` bigint(20) NOT NULL,
  `MaNV` varchar(20) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `TieuDe` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `NoiDung` varchar(500) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `LoaiTB` varchar(10) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `NgayTB` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `thongbao`
--

INSERT INTO `thongbao` (`MaTB`, `MaSV`, `MaNV`, `TieuDe`, `NoiDung`, `LoaiTB`, `NgayTB`) VALUES
(32, 161250533333, 'NV1', 'Thông Báo Đăng Ký Phòng Ký Túc Xá', 'Bạn đã đăng ký thành công ! Phòng : C303. Vui lòng lên ký túc xá để thanh toán tiền phòng và nhận phòng trước ngày 2019-11-26 18:5:15. Nếu không lên nhận phòng hệ thống sẽ hủy phòng của bạn và thêm bạn vào danh sách Xấu. Xin Cảm ơn !!!', 'đăng ký', '2019-11-23'),
(33, 161250533333, 'NV1', 'Thông Báo Chuyển Phòng Ký Túc Xá', 'Bạn đã chuyển phòng thành công ! Phòng : C101. Vui lòng lên ký túc xá để thanh toán tiền phòng và nhận phòng trước ngày 2019-11-26 18:6:5. Nếu không lên nhận phòng hệ thống sẽ hủy phòng của bạn và thêm bạn vào danh sách Xấu. Xin Cảm ơn !!!', 'chuyển ph', '2019-11-23'),
(34, 161250533333, 'NV1', 'Thông Báo Trả Phòng Ký Túc Xá', 'Bạn đã Trả phòng thành công. Xin Cảm ơn !!!', 'trả phòn', '2019-11-23'),
(35, 161250533333, 'NV1', 'Thông Báo Đăng Ký Phòng Ký Túc Xá', 'Bạn đã đăng ký thành công ! Phòng : C101. Vui lòng lên ký túc xá để thanh toán tiền phòng và nhận phòng trước ngày 2019-12-12 10:31:9. Nếu không lên nhận phòng hệ thống sẽ hủy phòng của bạn và thêm bạn vào danh sách Xấu. Xin Cảm ơn !!!', 'đăng ký', '2019-12-09'),
(36, 171250533535, 'NV1', 'Thông Báo Đăng Ký Phòng Ký Túc Xá', 'Bạn đã đăng ký thành công ! Phòng : A104. Vui lòng lên ký túc xá để thanh toán tiền phòng và nhận phòng trước ngày 2019-12-25 15:12:28. Nếu không lên nhận phòng hệ thống sẽ hủy phòng của bạn và thêm bạn vào danh sách Xấu. Xin Cảm ơn !!!', 'đăng ký', '2019-12-22'),
(37, 161250533360, 'NV1', 'Thông Báo Đăng Ký Phòng Ký Túc Xá', 'Bạn đã đăng ký thành công ! Phòng : A104. Vui lòng lên ký túc xá để thanh toán tiền phòng và nhận phòng trước ngày 2019-12-25 15:12:29. Nếu không lên nhận phòng hệ thống sẽ hủy phòng của bạn và thêm bạn vào danh sách Xấu. Xin Cảm ơn !!!', 'đăng ký', '2019-12-22'),
(38, 171, 'NV1', 'Thông Báo Đăng Ký Phòng Ký Túc Xá', 'Bạn đã đăng ký thành công ! Phòng : C303. Vui lòng lên ký túc xá để thanh toán tiền phòng và nhận phòng trước ngày 2019-12-25 15:13:33. Nếu không lên nhận phòng hệ thống sẽ hủy phòng của bạn và thêm bạn vào danh sách Xấu. Xin Cảm ơn !!!', 'đăng ký', '2019-12-22'),
(39, 161250533333, 'NV1', 'Thông Báo Chuyển Phòng Ký Túc Xá', 'Bạn đã chuyển phòng thành công ! Phòng : C101. Vui lòng lên ký túc xá để thanh toán tiền phòng và nhận phòng trước ngày 2019-12-25 15:14:17. Nếu không lên nhận phòng hệ thống sẽ hủy phòng của bạn và thêm bạn vào danh sách Xấu. Xin Cảm ơn !!!', 'chuyển ph', '2019-12-22'),
(40, 161250533333, 'NV1', 'Thông Báo Chuyển Phòng Ký Túc Xá', 'Bạn đã chuyển phòng thành công ! Phòng : C101. Vui lòng lên ký túc xá để thanh toán tiền phòng và nhận phòng trước ngày 2019-12-25 15:14:18. Nếu không lên nhận phòng hệ thống sẽ hủy phòng của bạn và thêm bạn vào danh sách Xấu. Xin Cảm ơn !!!', 'chuyển ph', '2019-12-22'),
(41, 161250533360, 'NV1', 'Thông Báo Chuyển Phòng Ký Túc Xá', 'Bạn đã chuyển phòng thành công ! Phòng : C101. Vui lòng lên ký túc xá để thanh toán tiền phòng và nhận phòng trước ngày 2019-12-25 15:14:18. Nếu không lên nhận phòng hệ thống sẽ hủy phòng của bạn và thêm bạn vào danh sách Xấu. Xin Cảm ơn !!!', 'chuyển ph', '2019-12-22'),
(42, 171250533535, 'NV1', 'Thông Báo Chuyển Phòng Ký Túc Xá', 'Bạn đã chuyển phòng thành công ! Phòng : C101. Vui lòng lên ký túc xá để thanh toán tiền phòng và nhận phòng trước ngày 2019-12-25 15:14:19. Nếu không lên nhận phòng hệ thống sẽ hủy phòng của bạn và thêm bạn vào danh sách Xấu. Xin Cảm ơn !!!', 'chuyển ph', '2019-12-22'),
(43, 171, 'NV1', 'Thông Báo Chuyển Phòng Ký Túc Xá', 'Bạn đã chuyển phòng thành công ! Phòng : C101. Vui lòng lên ký túc xá để thanh toán tiền phòng và nhận phòng trước ngày 2019-12-25 15:14:19. Nếu không lên nhận phòng hệ thống sẽ hủy phòng của bạn và thêm bạn vào danh sách Xấu. Xin Cảm ơn !!!', 'chuyển ph', '2019-12-22'),
(44, 161250533333, 'NV1', 'Thông Báo Chuyển Phòng Ký Túc Xá', 'Bạn đã chuyển phòng thành công ! Phòng : C203. Vui lòng lên ký túc xá để thanh toán tiền phòng và nhận phòng trước ngày 2019-12-25 15:16:20. Nếu không lên nhận phòng hệ thống sẽ hủy phòng của bạn và thêm bạn vào danh sách Xấu. Xin Cảm ơn !!!', 'chuyển ph', '2019-12-22'),
(45, 161250533333, 'NV1', 'Thông Báo Chuyển Phòng Ký Túc Xá', 'Bạn đã chuyển phòng thành công ! Phòng : C203. Vui lòng lên ký túc xá để thanh toán tiền phòng và nhận phòng trước ngày 2019-12-25 15:17:15. Nếu không lên nhận phòng hệ thống sẽ hủy phòng của bạn và thêm bạn vào danh sách Xấu. Xin Cảm ơn !!!', 'chuyển ph', '2019-12-22'),
(46, 161250533360, 'NV1', 'Thông Báo Chuyển Phòng Ký Túc Xá', 'Bạn đã chuyển phòng thành công ! Phòng : C203. Vui lòng lên ký túc xá để thanh toán tiền phòng và nhận phòng trước ngày 2019-12-25 15:17:15. Nếu không lên nhận phòng hệ thống sẽ hủy phòng của bạn và thêm bạn vào danh sách Xấu. Xin Cảm ơn !!!', 'chuyển ph', '2019-12-22'),
(47, 171250533535, 'NV1', 'Thông Báo Chuyển Phòng Ký Túc Xá', 'Bạn đã chuyển phòng thành công ! Phòng : C203. Vui lòng lên ký túc xá để thanh toán tiền phòng và nhận phòng trước ngày 2019-12-25 15:17:15. Nếu không lên nhận phòng hệ thống sẽ hủy phòng của bạn và thêm bạn vào danh sách Xấu. Xin Cảm ơn !!!', 'chuyển ph', '2019-12-22'),
(48, 171, 'NV1', 'Thông Báo Chuyển Phòng Ký Túc Xá', 'Bạn đã chuyển phòng thành công ! Phòng : C203. Vui lòng lên ký túc xá để thanh toán tiền phòng và nhận phòng trước ngày 2019-12-25 15:17:16. Nếu không lên nhận phòng hệ thống sẽ hủy phòng của bạn và thêm bạn vào danh sách Xấu. Xin Cảm ơn !!!', 'chuyển ph', '2019-12-22'),
(49, 161250533333, 'NV1', 'Thông Báo Chuyển Phòng Ký Túc Xá', 'Bạn đã chuyển phòng thành công ! Phòng : C102. Vui lòng lên ký túc xá để thanh toán tiền phòng và nhận phòng trước ngày 2019-12-25 15:22:22. Nếu không lên nhận phòng hệ thống sẽ hủy phòng của bạn và thêm bạn vào danh sách Xấu. Xin Cảm ơn !!!', 'chuyển ph', '2019-12-22'),
(50, 161250533333, 'NV1', 'Thông Báo Chuyển Phòng Ký Túc Xá', 'Bạn đã chuyển phòng thành công ! Phòng : C102. Vui lòng lên ký túc xá để thanh toán tiền phòng và nhận phòng trước ngày 2019-12-25 15:25:33. Nếu không lên nhận phòng hệ thống sẽ hủy phòng của bạn và thêm bạn vào danh sách Xấu. Xin Cảm ơn !!!', 'chuyển ph', '2019-12-22'),
(51, 161250533360, 'NV1', 'Thông Báo Chuyển Phòng Ký Túc Xá', 'Bạn đã chuyển phòng thành công ! Phòng : C102. Vui lòng lên ký túc xá để thanh toán tiền phòng và nhận phòng trước ngày 2019-12-25 15:25:33. Nếu không lên nhận phòng hệ thống sẽ hủy phòng của bạn và thêm bạn vào danh sách Xấu. Xin Cảm ơn !!!', 'chuyển ph', '2019-12-22'),
(52, 171250533535, 'NV1', 'Thông Báo Chuyển Phòng Ký Túc Xá', 'Bạn đã chuyển phòng thành công ! Phòng : C102. Vui lòng lên ký túc xá để thanh toán tiền phòng và nhận phòng trước ngày 2019-12-25 15:25:34. Nếu không lên nhận phòng hệ thống sẽ hủy phòng của bạn và thêm bạn vào danh sách Xấu. Xin Cảm ơn !!!', 'chuyển ph', '2019-12-22'),
(53, 171, 'NV1', 'Thông Báo Chuyển Phòng Ký Túc Xá', 'Bạn đã chuyển phòng thành công ! Phòng : C102. Vui lòng lên ký túc xá để thanh toán tiền phòng và nhận phòng trước ngày 2019-12-25 15:25:34. Nếu không lên nhận phòng hệ thống sẽ hủy phòng của bạn và thêm bạn vào danh sách Xấu. Xin Cảm ơn !!!', 'chuyển ph', '2019-12-22'),
(54, 171, 'NV1', 'Thông Báo Chuyển Phòng Ký Túc Xá', 'Bạn đã chuyển phòng thành công ! Phòng : C101. Vui lòng lên ký túc xá để thanh toán tiền phòng và nhận phòng trước ngày 2019-12-25 15:26:0. Nếu không lên nhận phòng hệ thống sẽ hủy phòng của bạn và thêm bạn vào danh sách Xấu. Xin Cảm ơn !!!', 'chuyển ph', '2019-12-22'),
(55, 161250533333, 'NV1', 'Thông Báo Trả Phòng Ký Túc Xá', 'Bạn đã Trả phòng thành công. Xin Cảm ơn !!!', 'trả phòn', '2019-12-22'),
(56, 161250533360, 'NV1', 'Thông Báo Trả Phòng Ký Túc Xá', 'Bạn đã Trả phòng thành công. Xin Cảm ơn !!!', 'trả phòn', '2019-12-22'),
(57, 171250533535, 'NV1', 'Thông Báo Trả Phòng Ký Túc Xá', 'Bạn đã Trả phòng thành công. Xin Cảm ơn !!!', 'trả phòn', '2019-12-22'),
(58, 171250533535, 'NV1', 'Thông Báo Đăng Ký Phòng Ký Túc Xá', 'Bạn đã đăng ký thành công ! Phòng : A104. Vui lòng lên ký túc xá để thanh toán tiền phòng và nhận phòng trước ngày 2019-12-25 15:41:55. Nếu không lên nhận phòng hệ thống sẽ hủy phòng của bạn và thêm bạn vào danh sách Xấu. Xin Cảm ơn !!!', 'đăng ký', '2019-12-22'),
(59, 171, 'NV1', 'Thông Báo Đăng Ký Phòng Ký Túc Xá', 'Bạn đã đăng ký thành công ! Phòng : C101. Vui lòng lên ký túc xá để thanh toán tiền phòng và nhận phòng trước ngày 2019-12-25 15:42:35. Nếu không lên nhận phòng hệ thống sẽ hủy phòng của bạn và thêm bạn vào danh sách Xấu. Xin Cảm ơn !!!', 'đăng ký', '2019-12-22'),
(60, 161250533333, 'NV1', 'Thông Báo Đăng Ký Phòng Ký Túc Xá', 'Bạn đã đăng ký thành công ! Phòng : C101. Vui lòng lên ký túc xá để thanh toán tiền phòng và nhận phòng trước ngày 2019-12-25 15:43:38. Nếu không lên nhận phòng hệ thống sẽ hủy phòng của bạn và thêm bạn vào danh sách Xấu. Xin Cảm ơn !!!', 'đăng ký', '2019-12-22'),
(61, 161250533333, 'NV1', 'Thông Báo Chuyển Phòng Ký Túc Xá', 'Bạn đã chuyển phòng thành công ! Phòng : C203. Vui lòng lên ký túc xá để thanh toán tiền phòng và nhận phòng trước ngày 2019-12-25 15:44:16. Nếu không lên nhận phòng hệ thống sẽ hủy phòng của bạn và thêm bạn vào danh sách Xấu. Xin Cảm ơn !!!', 'chuyển ph', '2019-12-22'),
(62, 161250533333, 'NV1', 'Thông Báo Trả Phòng Ký Túc Xá', 'Bạn đã Trả phòng thành công. Xin Cảm ơn !!!', 'trả phòn', '2019-12-22'),
(63, 161250533333, 'NV1', 'Thông Báo Đăng Ký Phòng Ký Túc Xá', 'Bạn đã đăng ký thành công ! Phòng : C101. Vui lòng lên ký túc xá để thanh toán tiền phòng và nhận phòng trước ngày 2019-12-25 15:45:13. Nếu không lên nhận phòng hệ thống sẽ hủy phòng của bạn và thêm bạn vào danh sách Xấu. Xin Cảm ơn !!!', 'đăng ký', '2019-12-22'),
(64, 161250533333, 'NV1', 'Thông Báo Chuyển Phòng Ký Túc Xá', 'Chuyển Phòng của bạn đã bị hủy. vui lòng lên gặp Nhân viên Ký túc xá để biết thêm chi tiết. Xin cảm ơn !!!', 'chuyển ph', '2019-12-22'),
(65, 161250533333, 'NV1', 'Thông Báo Trả Phòng Ký Túc Xá', 'Bạn đã Trả phòng thành công. Xin Cảm ơn !!!', 'trả phòn', '2019-12-22'),
(66, 161250533333, 'NV1', 'Thông Báo Đăng Ký Phòng Ký Túc Xá', 'Bạn đã đăng ký thành công ! Phòng : C101. Vui lòng lên ký túc xá để thanh toán tiền phòng và nhận phòng trước ngày 2019-12-25 15:55:5. Nếu không lên nhận phòng hệ thống sẽ hủy phòng của bạn và thêm bạn vào danh sách Xấu. Xin Cảm ơn !!!', 'đăng ký', '2019-12-22'),
(67, 161250533333, 'NV1', 'Thông Báo Trả Phòng Ký Túc Xá', 'Bạn đã Trả phòng thành công. Xin Cảm ơn !!!', 'trả phòn', '2019-12-22'),
(68, 161250533333, 'NV1', 'Thông Báo Đăng Ký Phòng Ký Túc Xá', 'Bạn đã đăng ký thành công ! Phòng : C101. Vui lòng lên ký túc xá để thanh toán tiền phòng và nhận phòng trước ngày 2019-12-25 15:58:10. Nếu không lên nhận phòng hệ thống sẽ hủy phòng của bạn và thêm bạn vào danh sách Xấu. Xin Cảm ơn !!!', 'đăng ký', '2019-12-22');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitietchuyenphong`
--
ALTER TABLE `chitietchuyenphong`
  ADD PRIMARY KEY (`MaDK`),
  ADD KEY `MaPhongO` (`MaPhongO`),
  ADD KEY `MaPhongChuyen` (`MaPhongChuyen`);

--
-- Chỉ mục cho bảng `chitietdangky`
--
ALTER TABLE `chitietdangky`
  ADD PRIMARY KEY (`MaDK`),
  ADD KEY `MaNV` (`MaNV`),
  ADD KEY `MaPhong` (`MaPhong`),
  ADD KEY `MaSV` (`MaSV`);

--
-- Chỉ mục cho bảng `hoadondiennuoc`
--
ALTER TABLE `hoadondiennuoc`
  ADD PRIMARY KEY (`MaPhong`,`Thang`),
  ADD UNIQUE KEY `MaHD` (`MaHD`);

--
-- Chỉ mục cho bảng `khu`
--
ALTER TABLE `khu`
  ADD PRIMARY KEY (`MaKhu`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MaNV`);

--
-- Chỉ mục cho bảng `phong`
--
ALTER TABLE `phong`
  ADD PRIMARY KEY (`MaPhong`),
  ADD KEY `MaKhu` (`MaKhu`);

--
-- Chỉ mục cho bảng `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD PRIMARY KEY (`MaSV`);

--
-- Chỉ mục cho bảng `thongbao`
--
ALTER TABLE `thongbao`
  ADD PRIMARY KEY (`MaTB`),
  ADD KEY `MaSV` (`MaSV`),
  ADD KEY `MaNV` (`MaNV`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chitietdangky`
--
ALTER TABLE `chitietdangky`
  MODIFY `MaDK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT cho bảng `hoadondiennuoc`
--
ALTER TABLE `hoadondiennuoc`
  MODIFY `MaHD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `thongbao`
--
ALTER TABLE `thongbao`
  MODIFY `MaTB` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitietchuyenphong`
--
ALTER TABLE `chitietchuyenphong`
  ADD CONSTRAINT `chitietchuyenphong_ibfk_1` FOREIGN KEY (`MaDK`) REFERENCES `chitietdangky` (`MaDK`),
  ADD CONSTRAINT `chitietchuyenphong_ibfk_2` FOREIGN KEY (`MaPhongO`) REFERENCES `phong` (`MaPhong`),
  ADD CONSTRAINT `chitietchuyenphong_ibfk_3` FOREIGN KEY (`MaPhongChuyen`) REFERENCES `phong` (`MaPhong`);

--
-- Các ràng buộc cho bảng `chitietdangky`
--
ALTER TABLE `chitietdangky`
  ADD CONSTRAINT `chitietdangky_ibfk_1` FOREIGN KEY (`MaNV`) REFERENCES `nhanvien` (`MaNV`),
  ADD CONSTRAINT `chitietdangky_ibfk_2` FOREIGN KEY (`MaPhong`) REFERENCES `phong` (`MaPhong`),
  ADD CONSTRAINT `chitietdangky_ibfk_4` FOREIGN KEY (`MaSV`) REFERENCES `sinhvien` (`MaSV`);

--
-- Các ràng buộc cho bảng `hoadondiennuoc`
--
ALTER TABLE `hoadondiennuoc`
  ADD CONSTRAINT `hoadondiennuoc_ibfk_1` FOREIGN KEY (`MaPhong`) REFERENCES `phong` (`MaPhong`);

--
-- Các ràng buộc cho bảng `phong`
--
ALTER TABLE `phong`
  ADD CONSTRAINT `phong_ibfk_1` FOREIGN KEY (`MaKhu`) REFERENCES `khu` (`MaKhu`);

--
-- Các ràng buộc cho bảng `thongbao`
--
ALTER TABLE `thongbao`
  ADD CONSTRAINT `thongbao_ibfk_1` FOREIGN KEY (`MaSV`) REFERENCES `sinhvien` (`MaSV`),
  ADD CONSTRAINT `thongbao_ibfk_2` FOREIGN KEY (`MaNV`) REFERENCES `nhanvien` (`MaNV`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
