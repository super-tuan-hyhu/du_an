<?php
if(isset($_SESSION['account'])){
    $acc = $_SESSION['account'];
  }

  if(isset($_POST['up'])){
    $target = "upload2/";
    $file = $target.basename($_FILES['newavt']['name']);
    
    if($_FILES['newavt']['name'] != ""){
        move_uploaded_file($_FILES['newavt']['tmp_name'], $file);
        $avt = check($_FILES['newavt']['name']); // Consider checking if this function is correct
        $sql = "UPDATE khach_hang SET img = '$avt' WHERE tai_khoan = '$acc'";
        pdo_execute($sql);
    } else {
        $avt = $user['img'];
        $sql = "UPDATE khach_hang SET img = '$avt' WHERE tai_khoan = '$acc'";
        pdo_execute($sql);
    }
    header("location: index.php?act=profile");
}

?>
<main>
<section class="bg-light">
    <div class="container">
        <div class="row">
                    <div class="card-body p-1-9 p-sm-2-3 p-md-6 p-lg-7">
                            <div class="col-lg-6-6 mb-4 mb-lg-0">
                            <div class="avatar-wrapper">
                                <img class="profile-pic" src="upload2/<?php echo $user['img'] ?>" width="100%">
                                <div class="upload-button" for="inputTag">
                                    <i class="fa-solid fa-camera" style="display: block;"></i>
                                    <span id="imageName" style="display: none;"></span>
                                </div>
                                
                            </div>

                                <!-- Form for submitting the uploaded image -->
                                <form action="" method="post" enctype="multipart/form-data" id="avttt" class="form-file-upload">
                                    <input type="file" name="newavt" id="inputTag">
                                    <button type="submit" class="btn btn-primary" name="up">Submit</button>
                                </form>
                                <h2 class="profile-h2"><?php echo $acc?></h2>
                                <?php if($user['vai_tro'] == "admin") :?>
                                <li class="profile-li">
                                    <a href="admin/index.php" class="profile-a">Đăng Nhập admin</a></br>
                                </li >
                                <?php endif ?>
                                <li class="profile-li">
                                    <a href="index.php?act=profile&listpro=thongtin" class="profile-a">Thông Tin Tài Khoản</a></br>
                                </li>
                                <li class="profile-li">
                                    <a href="index.php?act=profile&listpro=lsmh" class="profile-a">Lịch Sử</a></br>
                                </li>
                                <li class="profile-li">
                                    <a href="model/login.php" class="profile-a">Đăng Xuất</a>
                                </li>
                                
                            </div>
                            <?php include "sanpham/chitiettt.php"; ?>
                                
            </div> 
        </div>
    </div>
</section>
</main>