<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
</style>
</head>

<body>
<p>
  <?php
$ip		='172.16.100.2';
$pass	='private';
$p5byte=0;
$p3byte=0;
$p6[]=array("","","","","","","","","","");

for ($i=0; $i<8; $i++)
	$p6[$i]=str_replace("INTEGER:"," ",snmpget($ip, $pass, '.1.3.6.1.4.1.19865.1.2.3.'.($i+1).'.0'));

if (isset($_POST['button']) && $p6[0]<10) // $p6[0]<10 no analog input
{
  // set relay
	for ($i=0; $i<8; $i++)
	{
		if(isset($_POST['p5'.($i+1)]))				
			$p5byte = $p5byte | pow(2,$i);
	}
	snmpset($ip, $pass, '.1.3.6.1.4.1.19865.1.2.2.0',"i",$p5byte);	
};


?>
</p>
<p align="center" class="style1">DAEnetIP2  Eight Relay Module PHP DEMO</p>
<p align="center" class="style1"><a href="http://www.denkovi.com/product/57/daenetip2-eight-relay-module-lm35-.html">www.denkovi.com</a></p>
<form id="form1" name="form1" method="post" action="">
  <table width="100%" border="1">
    <tr>      
      <td colspan="3" bgcolor="#CCCCCC"><div align="center">Port P5 (relee)</div></td>
      <td colspan="4" bgcolor="#CCCCCC"><div align="center">Port P6 (Analoog)</div></td>
    </tr>
    <tr>
      <td width="2%" bgcolor="#CCCCCC"><div align="center">1</div></td>
      <td width="22%"><div align="center">P5.1</div></td>
      <td width="8%"><div align="center">
          <label>
          <input name="p51" type="checkbox" id="p51" value="1" <?php if (str_replace("INTEGER:"," ",snmpget($ip, $pass, '.1.3.6.1.4.1.19865.1.2.2.1.0'))=='1') printf('checked=checked')?> />
          </label>
      </div></td>
      <td width="3%" bgcolor="#CCCCCC"><div align="center">1</div></td>
      <td width="14%"><div align="center">P6.1</div></td>
      <td width="5%"><div align="center"><?php printf($p6[0]); ?></div></td>
      <td width="5%"><div align="center"><?php printf(round($p6[0]/4812.8*45.24,4)."V"); ?></div></td>
    </tr>
    <tr>
      <td bgcolor="#CCCCCC"><div align="center">2</div></td>
      <td><div align="center">P5.2</div></td>
      <td><div align="center">
          <label>
          <input type="checkbox" name="p52" id="p52"  <?php if (str_replace("INTEGER:"," ",snmpget($ip, $pass, '.1.3.6.1.4.1.19865.1.2.2.2.0'))=='1') printf('checked=checked')?> />
          </label>
      </div></td>
      <td bgcolor="#CCCCCC"><div align="center">2</div></td>
      <td><div align="center">P6.2</div></td>
      <td><div align="center"><?php printf($p6[1]); ?></div></td>
      <td><div align="center"><?php printf(round($p6[1]/4812.8*45.24,4)."V"); ?></div></td>
    </tr>
    <tr>
      <td bgcolor="#CCCCCC"><div align="center">3</div></td>
      <td><div align="center">P5.3</div></td>
      <td><div align="center">
          <label>
          <input type="checkbox" name="p53" id="p53"  <?php if (str_replace("INTEGER:"," ",snmpget($ip, $pass, '.1.3.6.1.4.1.19865.1.2.2.3.0'))=='1') printf('checked=checked')?>/>
          </label>
      </div></td>
      <td bgcolor="#CCCCCC"><div align="center">3</div></td>
      <td><div align="center">P6.3</div></td>
      <td><div align="center"><?php printf($p6[2]); ?></div></td>
      <td><div align="center"><?php printf(round($p6[2]/4812.8*45.24,4)."V"); ?></div></td>
    </tr>
    <tr>
      <td bgcolor="#CCCCCC"><div align="center">4</div></td>
      <td><div align="center">P5.4</div></td>
      <td><div align="center">
          <label>
          <input type="checkbox" name="p54" id="p54"  <?php if (str_replace("INTEGER:"," ",snmpget($ip, $pass, '.1.3.6.1.4.1.19865.1.2.2.4.0'))=='1') printf('checked=checked')?> />
          </label>
      </div></td>
      <td bgcolor="#CCCCCC"><div align="center">4</div></td>
      <td><div align="center">P6.4</div></td>
      <td><div align="center"><?php printf($p6[3]); ?></div></td>
      <td><div align="center"><?php printf(round($p6[3]/4812.8*45.24,4)."V"); ?></div></td>
    </tr>
    <tr>
      <td bgcolor="#CCCCCC"><div align="center">5</div></td>
      <td><div align="center">P5.5</div></td>
      <td><div align="center">
          <label>
          <input type="checkbox" name="p55" id="p55" <?php if (str_replace("INTEGER:"," ",snmpget($ip, $pass, '.1.3.6.1.4.1.19865.1.2.2.5.0'))=='1') printf('checked=checked')?> />
          </label>
      </div></td>
      <td bgcolor="#CCCCCC"><div align="center">5</div></td>
      <td><div align="center">P6.5</div></td>
      <td><div align="center"><?php printf($p6[4]); ?></div></td>
      <td><div align="center"><?php printf(round($p6[4]/4812.8*45.24,4)."V"); ?></div></td>
    </tr>
    <tr>
      <td bgcolor="#CCCCCC"><div align="center">6</div></td>
      <td><div align="center">P5.6</div></td>
      <td><div align="center">
          <label>
          <input type="checkbox" name="p56" id="p56"  <?php if (str_replace("INTEGER:"," ",snmpget($ip, $pass, '.1.3.6.1.4.1.19865.1.2.2.6.0'))=='1') printf('checked=checked')?>/>
          </label>
      </div></td>
      <td bgcolor="#CCCCCC"><div align="center">6</div></td>
      <td><div align="center">P6.6</div></td>
      <td><div align="center"><?php printf($p6[5]); ?></div></td>
      <td><div align="center"><?php printf(round($p6[5]/4812.8*45.24,4)."V"); ?></div></td>
    </tr>
    <tr>
      <td bgcolor="#CCCCCC"><div align="center">7</div></td>
      <td><div align="center">P5.7</div></td>
      <td><div align="center">
          <label>
          <input type="checkbox" name="p57" id="p57"  <?php if (str_replace("INTEGER:"," ",snmpget($ip, $pass, '.1.3.6.1.4.1.19865.1.2.2.7.0'))=='1') printf('checked=checked')?> />
          </label>
      </div></td>
      <td bgcolor="#CCCCCC"><div align="center">7</div></td>
      <td><div align="center">P6.7</div></td>
      <td><div align="center"><?php printf($p6[6]); ?></div></td>
      <td><div align="center"><?php printf(round($p6[6]/4812.8*45.24,4)."V"); ?></div></td>
    </tr>
    <tr>

      <td bgcolor="#CCCCCC"><div align="center">8</div></td>
      <td><div align="center">P5.8</div></td>
      <td><div align="center">
          <label>
          <input type="checkbox" name="p58" id="p58"   <?php if (str_replace("INTEGER:"," ",snmpget($ip, $pass, '.1.3.6.1.4.1.19865.1.2.2.8.0'))=='1') printf('checked=checked')?> />
          </label>
      </div></td>
      <td bgcolor="#CCCCCC"><div align="center">8</div></td>
      <td><div align="center">P6.8</div></td>
      <td><div align="center"><?php printf($p6[7]); ?></div></td>

      <td><div align="center"><?php printf(round($p6[7]/4812.8*45.24,4)."V"); ?></div></td>
    </tr>
  </table>
  
  
  <label>
  <div align="center">
    <input type="submit" name="button" id="button" value="Set"  />
    <label>
    <input type="submit" name="button2" id="button2" value="Refresh" />
    </label>
  </div>
  </label> `
</form>
</body>
</html>
