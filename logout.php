<?
 
 

if ($handle = opendir('.')) { // เปิดโฟลเดอร์ปัจจุบันเพื่ออ่านไฟล์ เราสามารถเปลี่ยนเป็นโพลเดอร์อื่นได้
    while (false !== ($file = readdir($handle))) {
        if ($file != "." && $file != "..") {
			 
				unlink($file);  // ลบไฟล์
			 
        }
    }
    closedir($handle);
}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>