<?php
$options = isset($_REQUEST['options'])?$_REQUEST['options']:"";
switch ($options) {
    case "dangnhap":
        include_once 'template/dangnhap.php';
        break;
    case "dangky":
        include_once 'template/dangky.php';
        break;
    case "dangxuat":
        include_once 'template/dangxuat.php';
        break;
    case "tttk":
        include_once 'template/tttk.php';
        break;

    case "sanpham":
        include_once 'template/sanpham.php';
        break;
	case "hdmuahang":
        include_once 'template/hdmuahang.php';
        break;
    case "lienhe":
        include_once 'template/lienhe.php';
        break;
    case "gioithieu":
        include_once 'template/gioithieu.php';
        break;
    case "giohang":
        include_once 'template/giohang.php';
        break;
    case "lsp":
        include_once 'template/lsp.php';
        break;
    case "lsmuahang":
        include_once 'template/lsmuahang.php';
        break;
    case "thanhtoan":
        include_once 'template/thanhtoan.php';
        break;
    case "kqtt":
        include_once 'template/kqtt.php';
        break;
	case "category":
        include_once 'template/category.php';
        break;
	case "baiviet":
        include_once 'template/baiviet.php';
        break;
		

    default:
        include_once 'template/home.php';
        break;
}
?>