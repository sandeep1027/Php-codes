<?php

//database connection details
$connect = mysql_connect('localhost','root','toor');

if (!$connect) {
die('Could not connect to MySQL: ' . mysql_error());
}

//your database name
$cid =mysql_select_db('csv',$connect);



// Name of your CSV file
$csv_file =$_FILES["file_import_box"]["tmp_name"];  


if (($getfile = fopen($csv_file, "r")) !== FALSE) {
         $data = fgetcsv($getfile, 1000, ",");
    while (($data = fgetcsv($getfile, 1000, ",")) !== FALSE) {
       $num = count($data);
        for ($c=0; $c < $num; $c++) {
            $result = $data;
        	$str = implode(",", $result);
        	$slice = explode(",", $str);
        
			$col1 = $slice[0];
            $col2 = $slice[1];
            $col3 = $slice[2];
			// SQL Query to insert data into DataBase
			$query = "INSERT INTO csvtbl(ID,name,city)
VALUES('".$col1."','".$col2."','".$col3."')";
$s=mysql_query($query, $connect );
			
        }
    }
}
echo "File data successfully imported to database!!";
mysql_close($connect);
?>
<form   enctype="multipart/form-data" method="post" >
<input type="file" name="file_import_box"><input type="submit" name="Box_submit" value="Import">
</form>