<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"  xml:lang="en" lang="en">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<head>

<title>snmp test page</title>
<link rel="stylesheet" type="text/css" href="css/main.css"/>
</head>
<script type="text/javascript" src="script/jquery-3.1.1.js"></script>
<body>
    <div id="mainForm">
    
    <form method="post" id="inputIp" action="javascript:void(null);" onsubmit="call()">
        Input IP <input id="name" name="name" value="" type="text" /><input value="check" type="submit" />
    </form>
    
    <script type="text/javascript" language="javascript">
	

	function call()
    {
		var txt = document.getElementById('name').value;
		if(txt == '') {
			$("#snmp_info").text('Вы забыли ввести ip-адрес!').css("background-color","#DC801A");
			return false;
		}   

        var msg = $("#inputIp").serialize();
            $.ajax({
                type: 'POST',
                url:"php/main.php",
                data: msg,
                success: function(data) {
                    $("#snmp_info").html(data);
                },
                error: function(xhr, str) {
                    alert('nothing, sir ' + xhr.responseCode);
                }
            });
		setTimeout(colorIt, 3000);
    }
    </script>
    </div>
    <!-- Форма отправки данных с помощью ajax на определённый div -->
    <div id="snmp_info">
    <?php
		include(php/main.php);
    ?>
    
    <script type="text/javascript">
    //Начальное состояние ячейки
    $("#snmp_info").text('ip-адрес не введён').css("background-color","#33F");
	//var divColor = '<?php echo $flag ?>'; 
    function colorIt()
	{
		alert(divColor);
		if (divColor == false) {
            $("#snmp_info").css("background-color","#C00");
        }
		else if(divColor == undefined) {
			$("#snmp_info").css("background-color","#C00");
		}
    //Если переменная содержит какое-то значение, то ячейка окрашивается в зелёный
        else {
            $("div#snmp_info").css("background-color","#0F0");
        }			
	}
	//smarty шаблонизатор callback дождаться ответа If с двумя условиями, если ошибка статус кода
    </script>
    </div>
    
    <div id="ip_config">
    Здесь выводится подробная информация о введённом адресе
    </div>
</body>
</html>