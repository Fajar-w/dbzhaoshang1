<?php
set_time_limit(0);
$timezone="Asia/Shanghai";



$con=mysqli_connect("mysql57","tjgxcn","QE03NRzMH3O6OFpx","tjgxcn");


if($con)
{
   // die ("连接45成功");
}
//mysql_query("SET names UTF8");


header("Content-Type: text/html; charset=utf-8");



   // $result = mysql_query("SELECT tuijian,times,iphone,area,content,ip,realm,username,title,fenlei,combrand FROM `ci` a inner join ci_con b on a.id =b.id WHERE `times` >'$starttime 00:00:00.000000 ' and `times` < '$endtime 00:00:00.000000 ' and `iphone`!='13611606842' and `iphone`!='15692194552' and `iphone`!='13122173359' and realm!='m.gxdsb.com.cn' group by iphone ORDER BY `ci`.`times`  ASC limit 10000000 ");
   // $result = mysql_query("SELECT id ,tuijian,times,iphone,area,content,ip,realm,username,title,fenlei,combrand FROM `ci` WHERE `times` >'$starttime 00:00:00.000000 ' and `times` < '$endtime 00:00:00.000000 ' and `iphone`!='13611606842' and `iphone`!='15692194552' and `iphone`!='13122173359' and realm!='m.gxdsb.com.cn' group by iphone ORDER BY `ci`.`times`  ASC limit 10000000 ");


//echo $area_all;
//exit;

//$area_all2 =" and a.fenlei not like '%".mb_convert_encoding('足浴', "UTF-8", "GBK")."%'";
	$sql ="SELECT object_id,term_id,slug FROM wp_tags WHERE slug ='0'  limit 3000 ";
	
	 $result = mysqli_query($con,$sql);
	while($row=mysqli_fetch_assoc($result)){
		
		$sql2 ="SELECT slug,term_id  FROM wp_terms where taxonomy ='post_tag' and term_id = ".$row['term_id'] ." limit 1";
		//$sql2 ="SELECT * FROM wp_options where option_name= '_taxonomy_meta_".$row['term_id']."' ";
		//echo $sql2;
		//exit;
		 $result2 = mysqli_query($con,$sql2);
		while($row2=mysqli_fetch_assoc($result2)){
				if($row['slug']=='0'){
					$sql33 = "UPDATE wp_tags SET slug='".$row2['slug']."' where term_id=".$row2['term_id'] ;
					mysqli_query($con,$sql33);
				}
					
					
					
			
		
				//
			//
			
		}
		
		
    }
echo "cg";
	//exit;
	


	
  

?>