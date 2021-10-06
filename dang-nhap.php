<?php
	include 'connect.php';
	if (isset($_POST['email'])) {
		$email=$_POST['email'];
		$password=$_POST['password'];

		$sql = "SELECT *FROM users WHERE email='$email'";
		$query=mysqli_query($conn,$sql);
		$data=mysqli_fetch_assoc($query);
		$checkEmail=mysqli_num_rows($query);
		if($checkEmail ==1){
			
			$checkPass=password_verify($password, $data['password']);
			if($checkPass){
				//luu vao session
				$_SESSION['user'] = $data;
				header('location: index.php');
			}
			else{
				echo"Sai mật khẩu"; 
			}
		}
		else{
			echo "Email không tồn tại";
		}
	}
	
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA_Compatible" content="IE=edge">
  <meta name="viewport" content="width=device, initial-scale=1">
  <title>Đăng nhập</title>
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
					<legend>Đăng nhập tài khoản</legend>
					
					<div class="form-group">
						<label for="">Email</label>
						<input type="text" class="form-control" id="" placeholder="Nhập email ..." name="email">
						<div class="has-error">
							<span><?php echo(isset($err['email']))?$err['email']:'' ?></span>
						</div>
					</div>
					<div class="form-group">
						<label for="">Mật khẩu</label>
						<input type="password" class="form-control" id="" placeholder="Nhập mật khẩu ..." name="password">
						<div class="has-error">
							<span><?php echo(isset($err['password']))?$err['password']:'' ?></span>
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
