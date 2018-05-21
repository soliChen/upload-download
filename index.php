
<?php

$fileo=$_GET["fileo"];
if($fileo != ""){
   unlink ($fileo);
   echo "<script type='text/javascript'>document.location.href='./index.php';</script>";
}

?>


<?php
    if(!empty($_FILES)){
        if($_FILES["file"]["error"] == 0){
            move_uploaded_file($_FILES["file"]["tmp_name"],$_FILES["file"]["name"]);
            echo "File < ".$_FILES['file']['name']." > upload success!"; 
			echo "<script type='text/javascript'>document.location.href='./index.php';</script>";
        }
    }
?>

<!DOCTYPE NETSCAPE-Bookmark-file-1>
<!-- This is an automatically generated file.
     It will be read and overwritten.
     DO NOT EDIT! -->

<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<!-- charset need to be added between head and title -->
	<title>Upload and Download</title>
	<style type="text/css">
	#a {
	color: #F00;
}
    #b {
	color: #F00;
}
    </style>
</head>

<body>
Files management<br><br>
<form action="" method="post" enctype="multipart/form-data">
<table border="1">
	<tr>
	  <td align="center">
		<font color="red">Files</font>
	  </td>
	  <td colspan="2" align="center">
	    <font color="red">Action ?</font>
	  </td>
	</tr>

<?php 

	$hostdir=dirname(__FILE__);
	//获取本文件目录的文件夹地址
	$filesnames = scandir($hostdir);
	//获取也就是扫描文件夹内的文件及文件夹名存入数组 $filesnames
	foreach ($filesnames as $name) {
		if($name != "." & $name != ".." & $name != "index.php"){
			$url=$name;
			echo "<tr>";
			echo "<td style='background:#D9FFFF' >&nbsp;".$name."&nbsp;</td>";
			echo "<td>&nbsp;<a href=\"".$url."\" title='Also, you can right clickhere, and Save as'>save as</a>&nbsp;</td>";
			echo "<td>&nbsp;<a href='?fileo=".$name."'>delete</a>&nbsp;</td>";
			echo "</tr>";
		}
	}

?>

  <tr><td colspan="3"><br></td></tr>
  <tr>
	<td><input type="file" name="file" /></td>
    <td colspan="2" align="center">
	    <input type="submit" name="submit" value="Upload">
	</td>
  </tr>
  </table>

</form>
</body>
</html>
