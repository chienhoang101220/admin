<?php
	include 'connect.php';

	$err=[];

	if(isset($_POST['name'])){
		$name=$_POST['name'];
		$email=$_POST['email'];
		$password=$_POST['password'];
		$rpassword=$_POST['rpassword'];

		if(empty($name)){
			$err['name']='Bạn chưa nhập tên';
		}
		if(empty($email)){
			$err['email']='Bạn chưa nhập email';
		}
		if(empty($password)){
			$err['password']='Bạn chưa nhập password';
		}
		if($password != $rpassword){
			$err['rpassword']='Mật khẩu không trùng khớp!';
		}
		//var_dump(empty($err));
		if (empty($err)){
			$pass=password_hash($password, PASSWORD_DEFAULT);
			// var_dump($pass);
			// die();
			$sql="INSERT INTO users(name,email,password) VALUES('$name','$email','$pass')";
			$query=mysqli_query($conn,$sql);
			if($query){
				header('location: dang-nhap.php');
			}
		}
		// 

		
	}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA_Compatible" content="IE=edge">
  <meta name="viewport" content="width=device, initial-scale=1">
  <title>Đăng ký</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  <style>
  	.has-error{
  		color: red;
  	}
  </style>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				
				<form action="" method="POST" role="form">
					<legend>Đăng ký tài khoản</legend>
					<div class="form-group">
						<label for="">Tên người dùng</label>
						<input type="text" class="form-control" id="" placeholder="" name="name">
						<div class="has-error">
							<span><?php echo(isset($err['name']))?$err['name']:'' ?></span>
						</div>
					</div>
					<div class="form-group">
						<label for="">Email</label>
						<input type="text" class="form-control" id="" placeholder="" name="email">
						<div class="has-error">
							<span><?php echo(isset($err['email']))?$err['email']:'' ?></span>
						</div>
					</div>
					<div class="form-group">
						<label for="">Mật khẩu</label>
						<input type="password" class="form-control" id="" placeholder="" name="password">
						<div class="has-error">
							<span><?php echo(isset($err['password']))?$err['password']:'' ?></span>
						</div>
					</div>
					<div class="form-group">
						<label for="">Xác thực mật khẩu</label>
						<input type="password" class="form-control" id="" placeholder="" name="rpassword">
						<div class="has-error">
							<span><?php echo(isset($err['rpassword']))?$err['rpassword']:'' ?></span>
						</div>
					</div>
					<button type="submit" class="btn btn-primary"> Submit</button>
				</form>
			</div>
		</div>
	</div>
  <script src="//code.jquery.com/jquery.js"></script>
  <script type="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>
</html>
