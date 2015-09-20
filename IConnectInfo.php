<?php
//Filename: IConnectInfo.php
//Substitute your connect info
interface IConnectInfo
{
	const HOST ="localhost";
	const UNAME ="root";
	const PW = "inttecdb";
	const DBNAME = "dbtmkt";

	public function doConnect();
}

?>
