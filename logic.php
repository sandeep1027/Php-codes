<html>
<head>
<script>
function doc(val){
	var old,c,total=0;
	var id=document.getElementById(val).value;
	old=document.getElementById("a"+val).value;
	c=old+"+"+id;
	document.getElementById("a"+val).value=c;
	var cal=Number(old)+Number(id);
	var res = c.split("+");
	document.getElementById(val).value=cal;
	for(var i=0;i<res.length;i++){
		total=Number(total)+Number(res[i]);
	}
   document.getElementById(val).value=total;
}
function show(val){
	 var total="0";
	 document.getElementById("test1").innerHTML=val;
	 old=document.getElementById("a"+val).value;
	 old=old.substr(old.indexOf("") + 1);
	 document.getElementById("test").value=old;
}
 function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
</script>
</head>
<body>
<form action="" method="GET" >
<?php 
 echo '<table><tr>';
 for($i=1;$i<12;$i++){
   for($j=1;$j<12;$j++){
 ?>
  <td>a<?php echo $i; ?><input name="t<?php echo $i; ?>" id="a<?php echo $i.$j; ?>" type='text' style="width:70px;height:50px;margin:10px;padding:10px;font-size:30px" onkeypress="return isNumber(event)" onchange="doc('a<?php echo $i.$j; ?>')" onclick="show('a<?php echo $i.$j; ?>')" onblur="plus('a<?php echo $i.$j; ?>')"/>
  <input type="hidden" id="aa<?php echo $i.$j; ?>" />
  </td>
 <?php
  }
  echo '</tr><tr>';
}

?>
</table>
<br>
<br>
check Reference <span id="test1"></span>
<input type="text" id="test" style="width:300px;height:50px" />
</form>
</body>
</html>