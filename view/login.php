<?php
$bu = "";
if($_SERVER['REQUEST_METHOD'] == "POST"){
	$account = $_POST['account'];
	$password = $_POST['password'];
	if(!empty($_POST['account']) && !empty($_POST['password'])){
		$checkuser = loadkh($account);
		if(is_array($checkuser)){
			if($password == $checkuser['mat_khau']){
				$_SESSION['account']= $account;
				$_SESSION['password'] = $password;
				header("location:index.php");
			}else{
				$bu = "Sai Mật Khẩu";
			}
		}else{
			$bu = "Tài khoản không tồn tại";
		}

	}else{
			$bu = "Vui lòng nhập tên đăng nhập và mật khẩu";
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
					<li>Login</li>
				</ul>
		</div>
		<h1>Sign In or Create an Account</h1>
	</div>
	<!-- /page_header -->
			<div class="justify-content-centerrr">
				<div class="row-products-all">
					<div class="col-xl-6 col-lg-6 col-md-8">
						<div class="box_account">
							<img src="view/img/products/cut.jpg" alt="" class="fload-start" style="width: 100px;">
							<h3 class="client">Đăng Nhập</h3>
							<div class="form_container">
								<form action="" method="post">
										<div class="form-group">
											<input type="text" class="form-control" name="account"  placeholder="Tên Đăng Nhập">
										</div>
										<div class="form-group">
											<input type="password" class="form-control" name="password" id="password_in" value="" placeholder="Password*">
										</div>
										<div class="groups">
											<div class="clearfix add_bottom_15">
												<input type="checkbox" id="vehicle1" name="vehicle1" value="Bike" class="fload-start">
												<label for="vehicle1"> check password</label><br>
											</div>
											<div class="clearfix add_bottom_15 ">
												<div class="float-end"><a id="forgot" href="index.php?act=signup">Lost Password?</a></div>
											</div>
										</div>
										
										<div class="text-center"><input type="submit" value="Log In" class="btn_1 full-width"></div>
										<p class="forgot-label" style="color:red;"><?php echo $bu ?></p>
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