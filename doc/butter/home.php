<?php

//mysqli 연결
$conn=mysqli_connect("localhost", "local_user01","pcy621","pcy_db");
                //host, user, password, dbname

//연결 확인
if(mysqli_connect_errno()){
        printf("connect failed : %s\n", mysqli_connect_error());
        exit();
}

if(isset($_GET['user_id'])){
        $sql = "select * from study where user_id='{$_GET['user_id']}'";
	//echo $sql;
	$result=mysqli_query($conn, $sql);
	//echo "<br>result=";
	//var_dump($result);

	//check mysqli_error
	//echo mysqli_error($conn1, $sql);
	if($result===false){
		echo mysqli_error($conn);
	}

	$row = mysqli_fetch_array($result);
	//echo "<br>.\$row.=";
	//var_dump($row);

	$user_id=$row['user_id'];
    $user_name=$row['user_name'];
	$user_job=$row['user_job'];
	$user_sex=$row['user_sex'];
	$reg_date=$row['reg_date'];
	//echo "<br>user_name=";
	//var_dump($user_name);
}else{
	printf("사용자를 클릭하면 GET방식으로 사용자 정보가 보이도록해야됨.");
}

$sql="select * from study";
$result=mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html>
<head>
<title>찬영사원페이지</title>
<style>
table, tr, td {
	border: 1px solid black;
	border-collapse: collapse;
	padding : 5px;
	text-align :left;
}
</style>
</head>
<body>
<h1><a href="second.php">Home</a></h1>
<h2>어서오세요</h2>

<p class="user_info">
</p>

<p class="user_list">
<h4>사용자 목록</h4>
<table>
<?php
while($row=mysqli_fetch_array($result)){
        $list = $list."<tr><td><li><a href=\"home.php?user_id={$row['user_id']}\">{$row['user_id']}</a></li></td><td>{$row['user_name']}</td><td>{$row['user_job']}</td><td>{$row['user_sex']}</td></tr>";
}
echo $list;
echo "user_List=";
var_dump($row);
?>
</table>
</p>

<p class="user_form">
<form action="create.php" method="POST">
<h4>회원 가입 및 수정 양식</h4>
<input type="text" name="user_id" width="80%" placeholder="아이디를 입력해주세요" value=<?php echo $user_id ?>><br>
<input type="password" name="user_pass" placeholder="비밀번호를 입력해주세요" ><br>
<input type="text"  name="user_name" placeholder="성명을 입력해주세요" value=<?php echo $user_name ?> ><br>
<input type="text" name="user_job" placeholder="직업을 입력해주세요" value=<?php echo $user_job ?>><br>
<label for="male">남성</label>
<input type="radio" name="user_sex" id="male" value="M">
<label for="female">여성</label>
<input type="radio" name="user_sex" id="female" value="F"><br>
<input type="submit" name="submit" value="submit" >
</form>
</p>

<? php
/*
//close connection
mysqli_close($conn);
 */
?>

