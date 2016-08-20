<?php 
 $num=18;
 $row=3;
 $tot_num_diff=$num/$row;
 //removing any number after decimal points
 $tot_ex=explode(".",$tot_num_diff);
 //check if its multiple of row or not
 $check_=$num%$row;
 //if not multiple add one to $tot_ex
 if($check_!=0)
	 $tot_ex[0]+=1;
 //create new variable to store the final row
$new_tot=$tot_ex[0];
 
for($i=0;$i<$num;$i++){
	 echo $i.",";
	 $new_tot--;
	 if($new_tot==0){
		 echo "row ends here<br />";
		$new_tot= $tot_ex[0];
	 }
}
?>