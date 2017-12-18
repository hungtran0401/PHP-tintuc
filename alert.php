<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	Logout thành công.Trở về trang chủ sau <input type="text" style="width:12px;border: none;" id="txtbox"> giây.

	<script>
		//tạo ra 1 con số
		var number=10;
		function demNguoc() {
			//trừ con số đi 1 

			number=number - 1;
			if(number!=0){
				//đưa kq ra ngoài
				document.getElementById('txtbox').value=number;
				//sau 1 giây chạy lại hàm
				setTimeout('demNguoc()',1000);
			}else{
				window.location.href="index.php";
			}
		}

		demNguoc();
		


	</script>
</body>
</html>