<?php
include "connection.php";
$userType = $username = $firstname = $lastname = $email = $gender = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userType = validate($_POST["usertype"]);
    $username = validate($_POST["username"]);
    $firstname = validate($_POST["firstname"]);
    $lastname = validate($_POST["lastname"]);
    $email = validate($_POST["email"]);
    $gender = validate($_POST["gender"]);
    $password = validate($_POST["password"]);

    $sql = "INSERT INTO users (user_type, username, firstname, lastname, email, gender, password) VALUES ('$userType', '$username', '$firstname', '$lastname', '$email', '$gender', '$password')";

    if (mysqli_query($conn, $sql)) {
        echo "User registered successfully.";
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
}


function validate($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Signup Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<div class="container_signup">
    <div class="d-flex justify-content-center h-100">
        <div class="card_signup">
            <div class="card-header">
                <h3>Sign Up</h3>
            </div>
            <div class="card-body_signup">
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="form-group_signup">
                        <label for="usertype">User Type:</label>
                        <select class="form-control" id="usertype" name="usertype">
                            <option value="user">User</option>
                            <option value="admin">Admin</option>
                            <option value="emergency_responder">Emergency Responder</option>
                            <option value="researcher">Researcher</option>
                            <option value="govt_agency">Government Agency</option>
                        </select>
                    </div>                
                    <div class="form-group_signup">
                        <label for="username">Username:</label>
                        <input type="text" class="form-control" id="username" placeholder="Enter username" name="username" required>
                        <span id="usernameValidation"></span> 
                    </div>
                    <div class="form-group_signup">
                        <label for="firstname">First Name:</label>
                        <input type="text" class="form-control" id="firstname" placeholder="Enter first name" name="firstname" required>
                    </div>
                    <div class="form-group_signup">
                        <label for="lastname">Last Name:</label>
                        <input type="text" class="form-control" id="lastname" placeholder="Enter last name" name="lastname" required>
                    </div>
                    <div class="form-group_signup">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
                    </div>
                    <div class="form-group_signup">
                        <label for="gender">Gender:</label>
                        <select class="form-control" id="gender" name="gender" required>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div class="form-group_signup">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Sign Up</button>
                </form>
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-center links">
                    Already have an account? <a href="index.php">Sign In</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function(){
    $('#username').keyup(function(){
        var username = $(this).val();
        if(username !== ''){
            $.ajax({
                url: 'check_username.php',
                type: 'post',
                data: {username: username},
                success: function(response){
                    $('#usernameValidation').html(response);
                }
            });
        }
    });
});
</script>
<!-- Code injected by live-server -->
<script>
	// <![CDATA[  <-- For SVG support
	if ('WebSocket' in window) {
		(function () {
			function refreshCSS() {
				var sheets = [].slice.call(document.getElementsByTagName("link"));
				var head = document.getElementsByTagName("head")[0];
				for (var i = 0; i < sheets.length; ++i) {
					var elem = sheets[i];
					var parent = elem.parentElement || head;
					parent.removeChild(elem);
					var rel = elem.rel;
					if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
						var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
						elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
					}
					parent.appendChild(elem);
				}
			}
			var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
			var address = protocol + window.location.host + window.location.pathname + '/ws';
			var socket = new WebSocket(address);
			socket.onmessage = function (msg) {
				if (msg.data == 'reload') window.location.reload();
				else if (msg.data == 'refreshcss') refreshCSS();
			};
			if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
				console.log('Live reload enabled.');
				sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
			}
		})();
	}
	else {
		console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
	}
	// ]]>
</script>
</body>
</html>

