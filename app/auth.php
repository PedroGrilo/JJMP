<?php
header('Access-Control-Allow-Origin: *');
?>
<?php

require_once "../resources/myip.php";

$ip= getip();

$dbname = "jjmp";
$username = "jjmp";
$pass = "PAP@jjmp2018";
$host = "192.168.1.101";
$servername =$_SERVER['SERVER_NAME'];

$con = new mysqli($host, $username, $pass, $dbname);
if ($con->connect_error) {
  die();
}

if(isset($_POST['emailr']))
{
    $passwordr = $_POST['passwordr'];
    $passwordr = base64_encode($passwordr);
    $passwordr = str_rot13($passwordr);
    $usernamer= $_POST['usernamer'];
    $emailr= $_POST['emailr'];

    $img = "data:image/png;base64,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";

    $checkemail = mysqli_num_rows(mysqli_query($con, "SELECT * FROM `info` WHERE `email`='$emailr'"));

    if($checkemail == 0) {
        $checkuser = mysqli_num_rows(mysqli_query($con, "SELECT * FROM `info` WHERE `nickname`='$usernamer'"));

        if ($checkuser == 0) {
            $insert = mysqli_query($con, "INSERT INTO `info` (`id`, `role`, `nickname`, `pass`, `email`, `photo`, `privatephotograph`) VALUES (NULL, '1', '$usernamer', '$passwordr', '$emailr', '$img', '1');");
            if ($insert){
							
		$sql = "INSERT INTO `logs` (`id`, `username`, `acao`, `ip`, `ultimo_acesso`) VALUES (NULL, '$usernamer', 'Registo efectuado com sucesso na aplicação','$ip', CURRENT_TIMESTAMP);";
								$con->query($sql) ;
                echo "success";
						}else
                echo "error";
        }else if($checkuser != 0)
            echo "Este username ja existe";
    }
    else if($checkemail != 0)
        echo "Este email ja existe";
	
}else if(isset($_POST['user']))
{
    $password = $_POST['password'];
    $password = base64_encode($password);
    $password = str_rot13($password);
    $usernamel= $_POST['user'];
    $login = mysqli_num_rows(mysqli_query($con, "SELECT * FROM `info` WHERE `nickname`='$usernamel' AND `pass`='$password'"));
    if($login != 0){
			
		$sql = "INSERT INTO `logs` (`id`, `username`, `acao`, `ip`, `ultimo_acesso`) VALUES (NULL, '$usernamel', 'Login na aplicação com o username', '$ip', CURRENT_TIMESTAMP);";
								$con->query($sql) ;
        echo "success";
		}else{
			
		$sql = "INSERT INTO `logs` (`id`, `username`, `acao`, `ip`, `ultimo_acesso`) VALUES (NULL, '$usernamel', 'Tentativa de login na aplicação', '$ip', CURRENT_TIMESTAMP);";
								$con->query($sql) ;
        echo "error";
}
}

if(isset($_POST['userimg'])){
    $userimg = $_POST["userimg"];

    $sql = "SELECT photo FROM info WHERE nickname ='$userimg';";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $img = $row['photo'];
            echo $img;
        }
    } else {
        echo "0 results";
    }

}

?>