<?php 
$bu = "";
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $name = check($_POST['ten_nd']);
    $pass = check($_POST['password']);
    $passWord = check($_POST['password_in']);
    $email = check($_POST['email']);
    $adress = check($_POST['diachi']);
    if(!empty($_POST['ten_nd']) && !empty($_POST['password']) && !empty($_POST['password_in']) && !empty($_POST['email']) && !empty($_POST['diachi'])){
        $check = loadkh($name);
        if(is_array($check)){
            $bu = "Tên Tài Khoản Đã Tồn Tại";
        }else if($passWord != $pass){
            $bu = "Mật Khẩu Không Trùng Khớp";
        }else{
            addkh($name, $pass, $email, $adress);
            if(isset($_SESSION['account']) && isset($_SESSION['password'])){
                session_unset();
                header("location:index.php?act=signup");
            }
            $bu = "Đăng Ký Thành Công";
        }
    }
}
?>
<main class="bg_gray">
		
	<div class="container margin_30">
		<div class="page_header">
			<div class="breadcrumbs">
				<ul>
					<li><a href="#">Home</a></li>
					<li><a href="#">Category</a></li>
					<li>Page active</li>
				</ul>
		</div>
		<h1>Sign In or Create an Account</h1>
	</div>
	<!-- /page_header -->
			<div class="justify-content-centerrr">
				
				<div class="row-products-all">
					<div class="col-xl-6 col-lg-6 col-md-8">
						<div class="box_account">
							<h3 class="new_client">New Client</h3> <small class="float-right pt-2">* Required Fields</small>
							<div class="form_container">
                                <form action="" method="post">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="ten_nd" value="" placeholder="Name">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email"  placeholder="Email*">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="password"  value="" placeholder="Password*">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="password_in"  value="" placeholder="Password*">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="diachi" value="" placeholder="Địa Chỉ">
                                    </div>
                                    
                                    <div class="text-center"><input type="submit" value="Register" class="btn_1 full-width"></div>
                                    <a href="index.php?act=login" class="btn btn-dm">Đăng Nhập</a>
                                </form>    
							</div>
							<!-- /form_container -->
						</div>
						<!-- /box_account -->
					</div>
				</div>
			
		</div>
		<!-- /row -->
		</div>
		<!-- /container -->
	</main>