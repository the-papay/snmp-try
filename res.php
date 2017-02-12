<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<title>snmp test page</title>
<link rel="stylesheet" type="text/css" href="css/main.css"/>
</head>
<script type="text/javascript" src="script/jquery-3.1.1.js"></script>
<body>
<div id="snmp_info">
<p>
<?php
$ip = '127.0.0.1';
$sysDescr = snmpget($ip, 'public', '.1.3.6.1.2.1.1.1.0', 300);
echo $sysDescr.'<br/>';
$sysName = snmpget($ip, 'public', '.1.3.6.1.2.1.1.5.0', 300);
echo $sysName.'<br/>';
$sysUpTime = snmpget($ip, 'public', '.1.3.6.1.2.1.1.3.0', 300);
echo "system uptime is: "; echo $sysUpTime.'<br/>';

//$procLoad = snmpget($ip, 'public', '.1.3.6.1.2.1.25.3.3.1.2', 300);
//$testName = snmpwalk($ip, 'public', 500);
//echo $testName;
?>
</p>
</div>

<div id="ip_config">
<script type="text/javascript">
var sysNameJS = '<? echo $sysName ?>';
if (!(sysNameJS == 0) ) {
	$(document).ready(function() {
        $("div#ip_config").css("background-color","#0F0")
    });	
document.write(sysNameJS);
}
else {
	$(document).ready(function() {
        $("#ip_config").css("background-color","#C00")
    });
document.write("Устройство не отвечает на запрос");
}
</script>
</div>
</body>
</html>