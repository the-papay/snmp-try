<?php
	$ip = $_POST['name'];
	$port = 80;
	$waitTimeoutInSeconds = 1;
		
	if($fp = fsockopen($ip, $port, $errCode, $errStr, $waitTimeoutInSeconds)) {
		$flag = 1;
	}
	else {
		$flag = 0;
	}
	fclose($fp);
	
	print('<script> var divColor =  '.$flag.' </script>');
	if($flag == 1) {
		$sysDescr = snmpget($ip, 'public', '.1.3.6.1.2.1.1.1.0', 300);
		echo $sysDescr.'<br/>';
		$sysName = snmpget($ip, 'public', '.1.3.6.1.2.1.1.5.0', 300);
		echo $sysName.'<br/>';
		$sysUpTime = snmpget($ip, 'public', '.1.3.6.1.2.1.1.3.0', 300);
		echo $sysUpTime.'<br/>';
		echo $flag.'<br/>';
	}
	else if($flag == '') {
		echo('Не удалось получить данные');	
	}
	else {
		echo('Не удалось получить данные');
	}
	
	//$procLoad = snmpget($ip, 'public', '.1.3.6.1.2.1.25.3.3.1.2', 300);
    //echo $testName;
?>