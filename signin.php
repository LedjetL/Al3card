<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Log In</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous" />
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
    integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
    crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/683b4b40e3.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="signin.css" />
</head>

<body>
<?php

$name = $_POST['name'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];

$conn = new mysqli('localhost','root','','HotelDB');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into customer(name, email, username, password) values(?, ?, ?, ?)");
		$stmt->bind_param("ssss", $name, $email, $username, $password);
		$execval = $stmt->execute();

		$stmt->close();
		$conn->close();
	}

?>
  <div class="container">
    <div class="row">
      <div class="col-8 bg "></div>
      <div class="col-4">
        <h2 class="margin text_acc"><u>Account Login</u></h2>
        <form>
          <div class="form-group">
            <label for="username" class="text">Username:</label>
            <input type="username" class="form-control" id="username" aria-describedby="emailHelp" required />
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1" class="text">Password:</label>
            <input type="password" class="form-control" id="exampleInputPassword1" required />
          </div>

          <button type="submit" class="btn btn-primary gradient btn-lg mt-3x" id="login">
            Sign In
          </button>
        </form>
        <div class="row">
          <div class="col">
            <p class="mt-5 allign">Or Sign Up Using</p>
            <p><span><i class="fab fa-facebook-f ml-3 fa-fb"></i></span>
              <span><i class="fab fa-twitter ml-3 fa-tw"></i></span>
              <span><i class="fab fa-google ml-3 fa-go"></i></span>
            </p>
          </div>
        </div>
      </div>
    </div>
   
  </div>
  <script type="text/javascript" src="signin.js"></script>
</body>

</html>