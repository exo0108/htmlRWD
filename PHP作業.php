<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h插入操作</h 
<?php 
if(!isset($_POST['submit'])){ 
//如果沒有表單提交，顯示一個表單 
?> 
<form action="" method="post"> 
國家：<input type="text" name="country" /> 
動物名稱（英文）：<input type="text" name="animal" /> 
動物名稱（中文）：<input type="text" name="cname" /> 
<input type="submit" name="submit" value="提交表單" /> 
</form> 
<?php 
} 
else 
{ 
//如果提交了表單 
//資料庫連線引數 
$host = "localhost"; 
$user = "root"; 
$pass = "zq"; 
$db = "phpdev"; 
//取得表單中的值，檢查表單中的值是否符合標準，並做適當轉義，防止SQL隱碼攻擊 
$country = empty($_POST['country'])? die("請輸入國家名稱"): 
mysql_escape_string($_POST['country']); 
$animal = empty($_POST['animal'])? die("請輸入英文名"): 
mysql_escape_string($_POST['animal']); 
$cname = empty($_POST['cname'])? die("請輸入中文名"): 
mysql_escape_string($_POST['cname']); 
//開啟資料庫連線 hovertree.com 何問起 
$connection = mysql_connect($host, $user, $pass) or die("Unable to connect!"); 
//選擇資料庫 
mysql_select_db($db) or die("Unable to select database!"); 
//構造一個SQL查詢 
$query = "INSERT INTO symbols(country, animal, cname) VALUE('$country', '$animal', '$cname')"; 
//執行該查詢 
$result = mysql_query($query) or die("Error in query: $query. ".mysql_error()); 
//插入操作成功後，顯示插入記錄的記錄號 
echo "記錄已經插入， mysql_insert_id() = ".mysql_insert_id(); 
//關閉當前資料庫連線 
mysql_close($connection); 
} 
?> 
</body>
</html>