<?php
class DataEntry implements IStrategy
//DataEntry.php
{
	private $tableMaster;
	private $dataPack;
	private $hookup;
	private $sql;

	public function algorithm(Array $dataPack)
	{
		$this->dataPack=$dataPack;
		$cn_nomeval=$this->dataPack[0];
		$cn_emailval=$this->dataPack[1];
		$cn_telb1val=$this->dataPack[2];
		$cn_telb2val=$this->dataPack[3];
		$cn_telb3val=$this->dataPack[4];
		$cn_telb4val=$this->dataPack[5];
		$cn_bltmkval=$this->dataPack[6];
		$cn_lastipval=$this->dataPack[7];
		$cn_lastloginval=$this->dataPack[8];

		$this->tableMaster=IStrategy::TABLENOW;
		$this->hookup=UniversalConnect::doConnect();
		$this->sql = "INSERT INTO $this->tableMaster
		(
			cn_nome,
			cn_email,
			cn_telb1,
			cn_telb2,
			cn_telb3,
			cn_telb4,
			cn_bltmk,
			cn_lastip,
			cn_lastlogin
		)
		VALUES
		(
			'$cn_nomeval',
			'$cn_emailval',
			'$cn_telb1val',
			'$cn_telb2val',
			'$cn_telb3val',
			'$cn_telb4val',
			'$cn_bltmkval',
			'$cn_lastipval',
			'$cn_lastloginval'
		)";

		if($this->hookup->query($this->sql))
		{
			printf("Successful data entry for table: $this->tableMaster <br/>");
		}
		elseif ( ($result = $this->hookup->query($this->sql))===false )
		{
  			printf("Invalid query: %s <br/> Whole query: %s <br/>", $this->hookup->error, $this->sql);
  			exit();
		}

		$this->hookup->close();
	}
}
?>
