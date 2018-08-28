<?php
//var_dump($_POST)
$conn=mysqli_connect("localhost", "local_user01","pcy621","pcy_db");

//echo $_POST['user_id'];
$sql = "select * from study where user_id=\"".$_POST['user_id']."\"";
echo $sql;
$result = mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);
var_dump($row['user_id']);

if(isset($_POST)){
	printf("제출버튼 눌렀어요?, 포스팅 조건문 진입 성공");

	if($row['user_id']==$_POST['user_id']){
//		echo "디비에 업데이트, 갱신";
                $sql = "update study set user_pass=?, user_name=?, user_job=?    , user_sex=? where user_id=?;";

	}else{
//		echo "디비에 인서트,추가";
     		$sql = "insert into study(user_pass, user_name, user_job,user_sex,user_id) values(?,?,?,?,?)";
	}
        // ? are used as placeholders for the values. next we should prepare the statement using mysqli_prepare
        $stmt = mysqli_prepare($conn, $sql);

        //start binding the input variables to the prepared statement.
        //"parameters","retrun
        // integer->i,
        // double ->d,
        // string ->s,
        // blob   ->b
    //user_pass encript
    include 'encript.php';
    $encrPass = Encrypt($_POST['user_pass']);
	$stmt->bind_param("sssss", $encrPass, $_POST['user_name'], $_POST['user_job'], $_POST['user_sex'],$_POST['user_id']);

	if($stmp){
		echo 'insert sql command failㅜㅜ';
	}

        //finally execute the prepared statements(This is where the actual insertion takes place)
        $stmt->execute();

	mysqli_close(conn);
    //redirect
	header("Location: http://210.121.151.98/butter/home.php");
}
?>
