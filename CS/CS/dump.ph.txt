<html>
<head></head>
<body>
<?php

$myfile = fopen("s.txt", "r") or die("Unable to open file!");


while(!feof($myfile)) 
{
  $str = fgets($myfile);
  $data = explode(":",$str);
  $data2 = explode(" ",$data[0]);

  $sensorno = $data2[1];
  $val = $data[1];
  date_default_timezone_set("Asia/Kolkata");
  $dtime = date("h:i:s:ms");
  
  echo $sensorno." ".$val." ".$dtime."<br/>";
  
  
  // insert into Sensor(sensorno, value, dtime) values(?,?,?);
  
}
fclose($myfile)


?>
</center>
</body>
</html>