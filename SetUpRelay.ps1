$ip = "172.16.100.2"
$pass ='private'  # SNMP read-write community string
$highThreshold = 500
# http://denkovi.com/Documents/DAEnetIP2-and-peripheral-with-LM35/Current-Version/UserManual.pdf
$snmp = New-Object -ComObject olePrn.OleSNMP
$snmp.Open($ip, $pass,2,3000)

#$snmp.Get('.1.3.6.1.4.1.19865.1.2.3.1.0') # analog input 1 status
#$snmp.Get('.1.3.6.1.4.1.19865.1.2.2.1.0') # digital input 1 status
#$snmp.Set('.1.3.6.1.4.1.19865.1.2.2.0',1) # relee 1 sisse

# x = .1.3.6.1.4.1.19865
# SNMP trap High thresolds
For ($i = 2; $i -lt 17; $i+= 2){
    $snmp.Set(".1.3.6.1.4.1.19865.1.1.122.$i.0",$highThreshold)
}
For ($i = 1; $i -lt 9; $i++){
    $snmp.Set(".1.3.6.1.4.1.19865.1.1.121.$i.0",4)    
}
