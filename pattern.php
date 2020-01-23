<?php 
	$key = "*";
	$key1 = "#";


	for($i=0;$i<4;$i++)
	{
		for($k=3; $k>= $i+1 ;$k--)
		{
			echo "&nbsp;";
		}
		
		for ($j=1; $j <=$i+1 ; $j++) { 
			if($j%2==0)
			{
				echo $key1;
			}
			else
			{
				echo $key;
			}
			
		}
		echo "<br/>";
	}
	for($i=3;$i>0;$i--)
	{
		for($k=1; $k<=4-$i ;$k++)
		{
			echo "&nbsp;";
		}
		
		for ($j=$i; $j>=1 ; $j--) { 
			if($j%2==0)
			{
				echo $key1;
			}
			else
			{
				echo $key;
			}
			
		}
		echo "<br/>";
	}
?>