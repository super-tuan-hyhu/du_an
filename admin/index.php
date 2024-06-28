<?php
ob_start();
session_start();
    include "../model/pdo.php";
    include "../model/insert.php";
    include "../model/delete.php";
    include "../model/update.php";
    include "../model/select.php";

    include "inclusde/header.php";
    include "inclusde/container.php";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['keyy'])){
        $key = $_POST['keyy'];
        $_SESSION['keyy'] = $key;
        header("location:index.php?act=timkiem");
    }
}

    if(isset($_GET['act'])){
        $act = $_GET['act'];
        switch ($act){
            case 'viewdm':
                $listdm = loadAll();
                include "danhmuc/list.php";
                break;
            case 'timkiem':
                include "inclusde/timkiem.php";
                break;
            case "addm":
                if(isset($_POST['themmoi'])){
                    $ten_loai = $_POST['tenloai'];                        
                    $trang_thai = $_POST['trangthai'];
                    $hinhanh = $_FILES["hinhanh"]["name"];
                    $target_dir = "../upload2/";
                    $target_file = $target_dir . basename($_FILES["hinhanh"]["name"]);
                    if(move_uploaded_file($_FILES['hinhanh']['tmp_name'],$target_file)){

                    }else{

                    }
                    insert_danhmuc($ten_loai, $hinhanh, $trang_thai);
                }
                include "danhmuc/add.php";
                break;    
            case "suadm":
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    $dm=loaddm($id);
                    include "danhmuc/update.php";
                }
                break;   
                case "updatedm":
                    $id = isset($_POST['id']) ? $_POST['id'] : null; // Khởi tạo $id với giá trị null hoặc một giá trị mặc định
                    if(isset($_POST['capnhat'])){
                        $target_dir = "../upload2/";
                        $target_file = $target_dir . basename($_FILES["uphinh"]["name"]);
                        
                        $ten_loai = $_POST['tenloai'];
                        $trang_thai = $_POST['trangthai'];
                        
                        if(!empty($_POST['tenloai']) && !empty($_POST['trangthai'])){
                            $imgs = $_FILES["uphinh"]["name"];
                            move_uploaded_file($_FILES['uphinh']['tmp_name'],$target_file);
                            update($id, $ten_loai, $imgs, $trang_thai);
                            $thongBao = "Cập Nhật Thành Công";
                        }else{
                            $dmm = loaddm($id);
                            $imgs = $dmm['imgs'];
                        }  
                    }
                    $dm = loaddm($id);  
                    include "danhmuc/update.php";
                    break;
            case "xoadm":
                if(isset($_GET['id'])&& ($_GET['id'])>0){
                    $id = $_GET['id'];
                    deleteProduct($id);
                    include "danhmuc/list.php";
                }
                $dm = loadAll();
                break;


            
            case "adsp":
                $thongBao = $thongBao1 = $thongBao2 = $thongBao3 = $thongBao4 = "";
                if(isset($_POST['themmois'])){
                    $target_dir = "../upload/";
                    $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
                    if(empty($_POST['tensp'])){
                        $thongBao ="Vui lòng nhập tên sản phẩm";
                    }else if(empty($_POST['gia'])){
                        $thongBao1 ="Vui lòng nhập giá sản phẩm";
                    }else if($_FILES["hinh"]["size"] >5000000){
                        $thongBao2 ="Định dạng hình ảnh không đúng";
                    }else if(empty($_POST['mHang'])){
                        $thongBao3 ="Vui lòng chọn danh mục sản phẩm";
                    }else if(empty($_POST['size'])){
                        $thongBao4 ="Vui lòng nhập size sản phẩm";
                    }else if(empty($_POST['mau'])){
                        $thongBao5 ="Vui lòng nhập màu sản phẩm";
                    }else {
                        if(!empty($_POST['tensp']) && !empty($_POST['gia']) && !empty($_POST['mHang'])){
                            move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file);
                            $tensp = check($_POST['tensp']);
                            $gia = check($_POST['gia']);
                            $gianew = check($_POST['gianew']);
                            $mHang = check($_POST['mHang']);
                            $mota = check($_POST['mota']);
                            $hinh = check($_FILES["hinh"]["name"]);
                            // Thêm sản phẩm vào cơ sở dữ liệu
                            sp($tensp, $gia, $gianew, $mHang, $mota, $hinh);
                            $listsp = loadall_sp();
                            $ma_sp = $listsp[0]['ma_sp'];

                            if(isset($_POST['mau'])){
                                $maus = $_POST['mau'];
                             }
                             if(isset($_POST['size'])){
                                $sizes = $_POST['size'];
                             }
                             foreach($maus as $mau){
                                addmau($ma_sp,$mau);
                                foreach($sizes as $key =>$size){
                                    addsl($ma_sp,$mau,$size);
                                }
                             }

                             foreach($sizes as $size){
                                addsizes($ma_sp, $size);
                             }
                            header("location:index.php?act=suaha&id=$ma_sp");
                             $thongBao6 = "Thêm Thành Công";
                        }
                    }
                }
                $dm = loadAll();
                include "sanpham/add.php";
                break;
            
            case "xoasp":
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    deletesp($id);
                    delms($id);
                    delkt($id);
                    $listsp = loadall_sp();
                    include "sanpham/list.php";
                }
                break;
            case "suasp":
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    $dms=loaddm($id);
                    $listsp = loadsp($id);
                    
                }
                include "sanpham/update.php";
                break;
                case "updatesp":
                    if (isset($_POST['themmois'])) {
                        $target_dir = "../upload/";
                        $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                        $id = isset($_POST['id']) ? $_POST['id'] : null;
                
                        if (!empty($_POST['tensp']) && !empty($_POST['gia']) && !empty($_POST['mHang'])) {
                            $tensp = $_POST['tensp'];
                            $gia = $_POST['gia'];
                            $gianew = isset($_POST['gianew']) ? $_POST['gianew'] : null;
                            $mHang = $_POST['mHang'];
                            $mota = isset($_POST['mota']) ? $_POST['mota'] : null;
                
                            // Kiểm tra nếu có hình được tải lên
                            if (!empty($_FILES['hinh']['name'])) {
                                $hinh = $_FILES['hinh']['name'];
                                move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file);
                            } else {
                                // Nếu không có hình, giữ nguyên hình cũ
                                $sp = loadsp($id);
                                $hinh = $sp['hinh_anh'];
                            }
                
                            // Gọi hàm updatesp để cập nhật sản phẩm
                            updatesp($tensp, $gia, $gianew, $mHang, $mota, $hinh, $id);
                            $thongBao = "Cập nhật thành công";
                        } else {
                            $thongBao = "Vui lòng điền đầy đủ thông tin bắt buộc: Tên sản phẩm, Giá, Mã hãng.";
                        }
                    }
                
                    // Load lại danh sách sản phẩm
                    $listsp = loadall_sp();
                    header("location:index.php?act=viewsp");
                    break;
                case "viewsp":
                    $dm = loadall_sp();
                    include "sanpham/list.php";
                    break;
            // size Sản Phẩm 
            case "suasize":
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    $listms = load_sizes_by_product_id($id);
                    $listmau = load_mau_by_product_id($id);
                    include "sanpham/updatesize.php";
                }
                break;
            case "xoasize":
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    delkt($id);
                    $listms = loadsize();
                }
                include "sanpham/list.php";
                break;
            case "suamau":
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    $listms = load_mau_by_product_id($id);
                    $listsize = load_sizes_by_product_id($id);
                    include "sanpham/updatemau.php";
                }
                break;
                case "xoamau":
                    if(isset($_GET['id'])){
                        $id = $_GET['id'];
                        delmau($id);
                        $listms = loadmau();
                    }
                    include "sanpham/list.php";
                    break;
            // and mau   
            // add HÌnh ảnh   
            case "addha":
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                }
                $mau = loadms($id);
                $masp = $mau['ma_sp'];
                $target = "../upload/";
            
                if (isset($_POST['addimgs'])) {
                    if (isset($_FILES['imgs'])) {
                        $files = $_FILES['imgs'];
                    }
                    $imgs = $files['name'];
                    $thongbao = ""; // Để chứa thông báo lỗi
                    $ma_ms = $_POST['ma'];
                    $img = $_FILES['img']['name'];
                    $file = $target . basename($img);
                    if($_FILES['img']['name'] == ""){
                        $thongbao ="Ảnh không hợp lệ";
                    }else{
                        move_uploaded_file($_FILES['img']['tmp_name'], $file);
                        addha($ma_ms, $img);

                        foreach($imgs as $key => $value){
                            if(!empty($value)){
                                move_uploaded_file($files['tmp_name'][$key],$target.$value);
                                addha($ma_ms, $value);
                            }
                        }
                        header("location:index.php?act=suaha&id=$masp");
                    }
                }
            
                include "sanpham/addha.php";
                break;
            
            case "suaha":
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    $sp = loadsp($id);
                    $mau = load_mau_by_product_id($id);
                }
                if($_SERVER['REQUEST_METHOD'] == "POST"){
                    $ma_ha = $_POST['maha'];
                    $target = "../upload/";
                    $file = $target . basename($_FILES['img']['name']);
                    if($_FILES['img']['name'] !== ""){
                        move_uploaded_file($_FILES['img']['tmp_name'], $file);
                        $img = $_FILES['img']['name'];
                        updateha($img, $ma_ha);
                    }
                }
                include "sanpham/listha.php";
                break;
            case "xoaha":
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    delha($id);
                    
                }
                if(isset($_GET['idd'])){
                    $idd = $_GET['idd'];
                    header("location:index.php?act=suaha&id=$idd");
                }
                break;
            case "litskho":
                include "khosp/listsl.php";
                break;
            case "addkho":
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                }

                if(isset($_POST['masl'])){
                    $masl = $_POST['masl'];
                }
                if(isset($_POST['number'])){
                    $number = $_POST['number'];
                }

                if($_SERVER['REQUEST_METHOD'] == "POST"){
                    foreach($masl as $key => $value){
                        updatesl($value, $number[$key]);
                    }
                }
                $sl = loadsl($id);
                $sp = loadsp($id);
                include "khosp/addsl.php";
                break;
            case "listuser":
                $listkh = loadall_kh();
                include "nguoidung/listuser.php";
                break;
            case "suauser":
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    $loadtk = loadtk($id);
                }
                include "nguoidung/updateuser.php";
                break;
            case "updatekh":
                if (isset($_POST['up']) && ($_POST['up'])) {
                    $name = $_POST['nameuser'];
                    $pass = $_POST['pass']; // corrected input name
                    $nameuse = $_POST['accuser'];
                    $email = $_POST['email'];
                    $phone =$_POST['phone'];
                    $adress = $_POST['adress'];
                    $role = $_POST['role'];
                    $id = $_POST['id'];
                    
                    if (!empty($name) && !empty($pass) && !empty($nameuse) && !empty($email) && !empty($phone) && !empty($adress) && !empty($role)) {
                        updatekh($name, $pass, $nameuse, $email, $phone, $adress, $role, $id);
                        $thongBao = "Cập nhật thành công";
                    } else {
                        $thongBao = "Vui lòng nhập đầy đủ thông tin";
                    }
                }
                $listkh = loadall_kh();
                include "nguoidung/listuser.php";
                break;
                
            case "listCom":
                $listbl = loadallbl();
                include "binhluan/listbl.php";
                break;
            case "listVourcher":
                $listvc = loadallvoucher();
                include "voucher/list.php";
                break;

            case "voucher":
                if(isset($_POST['themmoi'])){
                    if(!empty($_POST['tenloai']) && !empty($_POST['giatri']) && !empty($_POST['loaivc'])){
                        $name = $_POST['tenloai'];
                        $vc = loadvoucher($name);
                        if(is_array($vc)){
                            $thongbao = "Voucher Đã có!! Vui lòng Nhập Voucher khác";
                        }else{
                            $giatri = $_POST['giatri'];
                            $voucher = $_POST['loaivc'];
                            $datebd = $_POST['ngaybatdau'];
                            $datekt = $_POST['ngaykethuc'];
                            if($datebd >= $datekt){
                                $thongbao = "Ngày bắt đầu phải nhỏ hơn ngày kết thúc !!!";
                            }else{
                                if($voucher=="Phần trăm" && $giatri >100){
                                    $thongbao= "Giá Trị Phải nhỏ hơn 100";
                                }else{
                                    addVoucher($voucher, $name, $giatri, $datebd, $datekt);
                                    $thongbao = "Thêm Thành Công";
                                }
                            }
                        }
                    }else{
                            $thongbao = "Vui lòng nhập lại";
                        }
                }
                include "voucher/addvoucher.php";
                break;
            case "suavoucher":
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                }
                if($_SERVER['REQUEST_METHOD'] == "POST"){
                    if(!empty($_POST['tenloai']) && !empty($_POST['giatri']) && !empty($_POST['loaivc'])){
                        $id = $_POST['id'];
                        $name = $_POST['tenloai'];
                        $giatri = $_POST['giatri'];
                        $voucher = $_POST['loaivc'];
                        $datebd = $_POST['ngaybatdau'];
                        $datekt = $_POST['ngaykethuc'];
                        updateVoucher($id, $voucher, $name, $giatri, $datebd, $datekt);
                        $thongbao = "Thêm Thành Công";
                    }else{
                        $thongbao = "Vui Lòng nhập lại";
                    }
                }
                $listvc = loadvc($id);
                include "voucher/updateVoucher.php";
                break;
            case "xoavoucher":
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                } 
                deleteVc($id);
                header("location:index.php?act=listVourcher");
                break;
            case 'thongke':
                include "inclusde/thongke.php";
                break;
            case 'doanhthu':
                include "inclusde/doanhthu.php";
                break;
            case 'listdh':
                $listall_dh = loadall_dh();
                include "donhang/list.php";
                break; 
            case 'ctdh':
                include "donhang/ctdhcart.php";
                break;
            case 'cb':
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                }
                $sql = "UPDATE don_hang SET trang_thai = 'Chờ lấy hàng' WHERE ma_dh = $id";
                pdo_execute($sql);
                header("location:index.php?act=listdh");
                break;
            case 'giao':
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                }
                $sql = "UPDATE don_hang SET trang_thai = 'Chờ giao hàng' WHERE ma_dh = $id";
                pdo_execute($sql);
                header("location:index.php?act=listdh");
                break;
            case 'danhan':
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                }
                $sql = "UPDATE don_hang SET trang_thai = 'Đã Nhận' WHERE ma_dh = $id";
                pdo_execute($sql);
                header("location:index.php?act=listdh");
                break;
            case 'huydh':
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    $sql = "SELECT * FROM ct_don_hang WHERE ma_dh = $id";
                    $ct = pdo_query($sql);
                    foreach($ct as $sllp){
                        $idd = $sllp['ma_sp'];
                        $mau = $sllp['ten_mau'];
                        $kt = $sllp['ten_kt'];
                        $number = $sllp['so_luong'];
                        $sqll = "UPDATE so_luong SET so_luong = so_luong + $number WHERE ma_sp = $idd AND ten_ms = '$mau' AND ten_kt = '$kt'";
                        pdo_execute($sqll);
                    }
                    $sql = "UPDATE don_hang SET trang_thai = 'Hủy' WHERE ma_dh = $id";
                    pdo_execute($sql);
                    header("location:index.php?act=listdh");
                }
                break;
            default:
                include "inclusde/container.php";
                break;
        }
    }

    include "inclusde/footer.php";
?>