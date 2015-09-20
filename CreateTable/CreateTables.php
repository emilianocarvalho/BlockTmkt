<?php
//ini_set("display_errors","2");
//ERROR_REPORTING(E_ALL);
include_once('../UniversalConnect.php');
class CreateTable
{
	private $tableMaster;
	private $hookup;

	public function __construct()
	{
		/*
		* create table consumidor
		*/
		$this->tableMaster="consumidor";
		$this->hookup=UniversalConnect::doConnect();
		/*
		* Criação inicial da tabela, no Banco definido
		*/
		$drop = "DROP TABLE IF EXISTS $this->tableMaster";

		if($this->hookup->query($drop) === true)
		{
			printf("Old table %s has been dropped.<br/>",$this->tableMaster);
		}

		$sql = "CREATE TABLE IF NOT EXISTS $this->tableMaster (
			cn_id SERIAL,
		 	cn_nome NVARCHAR(60),
		 	cn_email NVARCHAR(150),
		 	cn_telb1 NVARCHAR(14),
			cn_telb2 NVARCHAR(14),
			cn_telb3 NVARCHAR(14),
			cn_telb4 NVARCHAR(14),
		 	cn_bltmk tinyint(4),
			cn_lastip NVARCHAR(45),
			cn_lastlogin datetime,
		  	PRIMARY KEY (cn_id))";

		if($this->hookup->query($sql) === true)
		{
			printf("Table $this->tableMaster has been created successfully.<br/>");
		}
		$this->hookup->close();

		/*
		* create table fornecedor
		*/
		$this->tableMaster="fornecedor";
		$this->hookup=UniversalConnect::doConnect();
		/*
		* Criação inicial da tabela, no Banco definido
		*/
		$drop = "DROP TABLE IF EXISTS $this->tableMaster";

		if($this->hookup->query($drop) === true)
		{
			printf("Old table %s has been dropped.<br/>",$this->tableMaster);
		}

		$sql = "CREATE TABLE IF NOT EXISTS $this->tableMaster (
			fn_id SERIAL,
		 	fn_razao_social NVARCHAR(60),
		 	fn_cnpj NVARCHAR(14),
			fn_email NVARCHAR(150),
			fn_telb4 NVARCHAR(14),
		 	fn_ativo tinyint(4),
			fn_lastip NVARCHAR(45),
			fn_lastlogin datetime,
		  	PRIMARY KEY (fn_id))";

		if($this->hookup->query($sql) === true)
		{
			printf("Table $this->tableMaster has been created successfully.<br/>");
		}
		$this->hookup->close();

	}
}
$worker=new CreateTable();
?>
