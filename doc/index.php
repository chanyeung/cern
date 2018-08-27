<?php
  2 
  3 //mysqli 연결
  4 $conn=mysqli_connect("localhost", "local_user01","pcy621","pcy_db");
  5                 //host, user, password, dbname
  6 
  7 //연결 확인
  8 if(mysqli_connect_errno()){
  9         printf("connect failed : %s\n", mysqli_connect_error());
 10         exit();
 11 }
 12 
 13 if(isset($_GET['user_id'])){
 14         $sql = "select * from study where user_id='{$_GET['user_id']}'";
 15         //echo $sql;
 16         $result=mysqli_query($conn, $sql);
 17         //echo "<br>result=";
 18         //var_dump($result);
 19 
 20         //check mysqli_error
 21         //echo mysqli_error($conn1, $sql);
 22         if($result===false){
 23                 echo mysqli_error($conn);
 24         }
 25 
 26         $row = mysqli_fetch_array($result);
 27         //echo "<br>.\$row.=";
 28         //var_dump($row);
 29 
 30         $user_id=$row['user_id'];
 31         $user_name=$row['user_name'];
 32         $user_job=$row['user_job'];
 33         $user_sex=$row['user_sex'];
 34         $reg_date=$row['reg_date'];
 35         //echo "<br>user_name=";
 36         //var_dump($user_name);
 37 }else{
 38         printf("사용자를 클릭하면 GET방식으로 사용자 정보가 보이도록해야됨.");
 39 }
 40 
 41 $sql="select * from study";
 42 $result=mysqli_query($conn, $sql);
 43 
 44 ?>
 45 
 46 <!DOCTYPE html>
 47 <html>
 48 <head>
 49 <title>찬영사원페이지</title>
 50 <style>
 51 table, tr, td {
 52         border: 1px solid black;
 53         border-collapse: collapse;
 54         padding : 5px;
 55         text-align :left;
 56 }
 57 </style>
 58 </head>
 59 <body>
 60 <h1><a href="second.php">Home</a></h1>
 61 <h2>어서오세요</h2>
 62 
 63 <p class="user_info">
 64 </p>
 65 
 66 <p class="user_list">
 67 <h4>사용자 목록</h4>
 68 <table>
 69 <?php
 70 while($row=mysqli_fetch_array($result)){
 71         $list = $list."<tr><td><li><a href=\"index.php?user_id={$row['user_id'    ]}\">{$row['user_id']}</a></li></td><td>{$row['user_name']}</td><td>{$row['use    r_job']}</td><td>{$row['user_sex']}</td></tr>";
 72 }
 73 echo $list;
 74 echo "user_List=";
 75 var_dump($row);
 76 ?>
 77 </table>
 78 </p>
 79 
 80 <p class="user_form">
 81 <form action="process_create.php" method="POST">
 82 <h4>회원 가입 및 수정 양식</h4>
  <input type="text" name="user_id" width="80%" placeholder="아이디를 입력해주세
    요" value=<?php echo $user_id ?>><br>
 84 <input type="password" name="user_pass" placeholder="비밀번호를 입력해주세요"     ><br>
 85 <input type="text"  name="user_name" placeholder="성명을 입력해주세요" value=<    ?php echo $user_name ?> ><br>
 86 <input type="text" name="user_job" placeholder="직업을 입력해주세요" value=<?p    hp echo $user_job ?>><br>
 87 <label for="male">남성</label>
 88 <input type="radio" name="user_sex" id="male" value="M">
 89 <label for="female">여성</label>
 90 <input type="radio" name="user_sex" id="female" value="F"><br>
 91 <input type="submit" name="submit" value="submit" >
 92 </form>
 93 </p>
 94 
 95 <? php
 96 /*
 97 //close connection
 98 mysqli_close($conn);
 99  */
100 ?>
