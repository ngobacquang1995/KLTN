<?php
$options = isset($_REQUEST['options'])?$_REQUEST['options']:"";
switch ($options) {
	case "logout":
        include_once 'views/layout/logout.php';
        break;
    case "profile":
        include_once 'views/include/profile.php';
        break;
    case "doimk":
        include_once 'views/include/doimk.php';
        break;
    case "import":
        include_once 'views/include/import.php';
        break;
    case "banner_list":
        include_once 'views/include/banner_list.php';
        break;
    case "banner_edit":
        include_once 'views/include/banner_edit.php';
        break;

    case "sanpham_list":
        include_once 'views/include/sanpham_list.php';
        break;
    case "sanpham_edit":
        include_once 'views/include/sanpham_edit.php';
        break;
	case "sanpham_add":
        include_once 'views/include/sanpham_add.php';
        break;
    case "taotaikhoan":
        include_once 'views/include/taotaikhoan.php';
        break;

	case "loaisanpham_edit":
        include_once 'views/include/loaisanpham_edit.php';
        break;
	case "loaisanpham_add":
        include_once 'views/include/loaisanpham_add.php';
        break;
    case "loaisanpham_list":
        include_once 'views/include/loaisanpham_list.php';
        break;

    case "nhanvien_edit":
        include_once 'views/include/nhanvien_edit.php';
        break;
    case "nhanvien_add":
        include_once 'views/include/nhanvien_add.php';
        break;
    case "nhanvien_list":
        include_once 'views/include/nhanvien_list.php';
        break;

    case "nhacungcap_edit":
        include_once 'views/include/nhacungcap_edit.php';
        break;
    case "nhacungcap_add":
        include_once 'views/include/nhacungcap_add.php';
        break;
    case "nhacungcap_list":
        include_once 'views/include/nhacungcap_list.php';
        break;

    case "khachhang_edit":
        include_once 'views/include/khachhang_edit.php';
        break;
    case "khachhang_add":
        include_once 'views/include/khachhang_add.php';
        break;
    case "khachhang_list":
        include_once 'views/include/khachhang_list.php';
        break;

    case "hoadonban_edit":
        include_once 'views/include/hoadonban_edit.php';
        break;
    case "hoadonban_add":
        include_once 'views/include/hoadonban_add.php';
        break;
    case "hoadonban_list":
        include_once 'views/include/hoadonban_list.php';
        break;

    case "cthoadonban_edit":
        include_once 'views/include/cthoadonban_edit.php';
        break;
    case "cthoadonban_add":
        include_once 'views/include/cthoadonban_add.php';
        break;
    case "cthoadonban_list":
        include_once 'views/include/cthoadonban_list.php';
        break;

    case "hoadonnhap_edit":
        include_once 'views/include/hoadonnhap_edit.php';
        break;
    case "hoadonnhap_add":
        include_once 'views/include/hoadonnhap_add.php';
        break;
    case "hoadonnhap_list":
        include_once 'views/include/hoadonnhap_list.php';
        break;

    case "cthoadonnhap_edit":
        include_once 'views/include/cthoadonnhap_edit.php';
        break;
    case "cthoadonnhap_add":
        include_once 'views/include/cthoadonnhap_add.php';
        break;
    case "cthoadonnhap_list":
        include_once 'views/include/cthoadonnhap_list.php';
        break;
    // thống kê báo cáo
    case "tk_doanhthu":
        include_once 'views/include/tkdoanhthu.php';
        break;
    case "tk_hangton":
        include_once 'views/include/tk_hangton.php';
        break;
    case "tkmhbanchay":
        include_once 'views/include/tkmhbanchay.php';
        break;

    default:
        include_once 'views/include/home.admin.php';
        break;
}
?>