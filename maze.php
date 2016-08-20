<?php

$maze=array(
  "S...##",
  "#.#...",
  "#.##.#",
  "..#.##",
  "#...##",
  "#.#..G"
);
function print_m($maze){
for($i=0;$i<6;$i++){
 for($j=0;$j<6;$j++){
     echo $maze[$i][$j]."\n";

	}	
	echo "<br>";
}
echo "<br>";
}

function find_path($x,$y){
	global $maze;
 if ( $x < 0 || $x > 6 - 1 || $y < 0 || $y > 6 - 1 ) return FALSE;
 
     if ( $maze[$y][$x] == 'G' ) return TRUE;
	 
	 if ( $maze[$y][$x]!='.' && $maze[$y][$x] != 'S' ) return FALSE;
	 
	 $maze[$y][$x] = '+';
	 
	 if ( find_path($x,$y - 1,$maze) == TRUE ) return TRUE;
	 
	  if ( find_path($x + 1, $y,$maze) == TRUE ) return TRUE;
	  
	  if ( find_path($x, $y + 1,$maze) == TRUE ) return TRUE;
	  
	  if ( find_path($x - 1,$y,$maze) == TRUE ) return TRUE;
	  
	  $maze[$y][$x] = 'x';
	  
	   print_m($maze);
  return FALSE;
  
 
}

function main(){
global $maze;
      print_m($maze);
	  
	  if (find_path(0, 0)==TRUE)
	      echo "Succes<br><br>";
		  else
		  echo "fail<br><br>";
		  
	print_m($maze);
}
main();
 ?>