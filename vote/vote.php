<?php
$username = "root";
$passwd = "";
$servername="localhost";
$db="voter";
$conn=mysqli_connect($servername,$username,$passwd,$db);
if(!$conn)
{
	die('could not connect'.mysqli_connect_error());
}
else
{
	echo "connected";
}
$input=$_POST['t1'];
echo $input;
$result=mysqli_query($conn,"SELECT * FROM user_data
            WHERE (`mobile` LIKE '%".$input."%')");
if(mysqli_num_rows($result)>0){
            while($index=mysqli_fetch_array($result)){
                echo "<p>".$index['vname']."</p>"."<p>".$index['mobile']."</p>";
		if($index['flag']==0)
		{
			$query=mysqli_query($conn,"UPDATE user_data SET flag=1 WHERE (`mobile` LIKE '%".$input."%')");
			echo "not voted"."<br>";
			/*echo $index['flag']."<br>";*/
			
		}
		else
		{
			echo "Sorry,You have already voted ! You cannot vote !";
           
		}
		/*echo $index['flag']."<br>"*/;
        }
}
else
{
	echo "no results";
}
?>