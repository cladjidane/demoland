<?php


$conn = create_connection('localhost',1740);
$arr_sockets = array($conn);
$handshake = false;

while (true)
{
	$changed = $arr_sockets;
	socket_select($changed,$write=NULL,$except=NULL,NULL);
	foreach($changed as $socket)
	{
		echo $socket . " and " . $conn . "\n";
		if($socket == $conn)
		{
			$connection=socket_accept($conn);
			if($connection)
			{
				array_push($arr_sockets,$connection);				
			}
		} else {
			$bytes = @socket_recv($socket,$buffer,2048,0);
			if(!$handshake)
			{
				echo "handshaking\n";
				dohandshake($socket,$buffer);
				sendStockData($socket);
			}
		}
	}
}

function create_connection($host,$port)
{
	$socket = socket_create(AF_INET,SOCK_STREAM,SOL_TCP);
	
	if (!is_resource($socket)) {
		echo 'Unable to create socket: '. socket_strerror(socket_last_error()) . PHP_EOL;
	} else {
		echo "Socket created.\n";
	}
	
	if (!socket_set_option($socket, SOL_SOCKET, SO_REUSEADDR, 1)) {
	    echo 'Unable to set option on socket: '. socket_strerror(socket_last_error()) . PHP_EOL;
	} else {
		echo "Set options on socket.\n";
	}
	
	if (!socket_bind($socket, $host, $port)) {
	    echo 'Unable to bind socket: '. socket_strerror(socket_last_error()) . PHP_EOL;
	} else {
		echo "Socket bound to port $port.\n";
	}
	
	if (!socket_listen($socket,SOMAXCONN)) {
		echo 'Unable to listen on socket: ' . socket_strerror(socket_last_error());
	} else {
		echo "Listening on the socket.\n";
	}
	return $socket;
}	

function dohandshake($socket,$buffer){
  	global $handshake;
	list($resource,$host,$origin) = getheaders($buffer);
	$upgrade  = "HTTP/1.1 101 Web Socket Protocol Handshake\r\n" .
				"Upgrade: WebSocket\r\n" .
				"Connection: Upgrade\r\n" .
				"WebSocket-Origin: " . $origin . "\r\n" .
				"WebSocket-Location: ws://" . $host . $resource . "\r\n" .
				"\r\n";
	socket_write($socket,$upgrade.chr(0),strlen($upgrade.chr(0)));
	$handshake = true;
	return $handshake;
}

function getheaders($req){
  $r=$h=$o=null;
  if(preg_match("/GET (.*) HTTP/"   ,$req,$match)){ $r=$match[1]; }
  if(preg_match("/Host: (.*)\r\n/"  ,$req,$match)){ $h=$match[1]; }
  if(preg_match("/Origin: (.*)\r\n/",$req,$match)){ $o=$match[1]; }
  return array($r,$h,$o);
}

function sendStockData($socket)
{
	echo $socket;
	$stock_price = rand(30,32);	
	while(true)
	{
		socket_write($socket,chr(0).$stock_price.chr(255),strlen(chr(0).$stock_price.chr(255)));
		echo $stock_price . "sent: " . 
		sleep(1);

		// Generate a random number that will represent how much our stock price
		// will change and then make that number a decimal and attach it to the 
		// previous price.
		$stock_offset = rand(-50,50);
		$stock_price = $stock_price + ($stock_offset/100);
//		echo "$stock_price\n";			
	}

}

?>