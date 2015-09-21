<?php
/* Define o local para Holandês(usar pt_BR para o Português(Brasil) ) */
setlocale (LC_ALL, 'pt_BR');
//Helper class
//SecureData.php
class SecureData
{
	private $changeField;
	/*
	* Fields table consumidor
	*/
	private $cn_nome;
	private $cn_email;
	private $cn_telb1;
	private $cn_telb2;
	private $cn_telb3;
	private $cn_telb4;
	private $cn_bltmk;
	private $cn_lastip;
	private $cn_lastlogin;

	private $disappear;
	private $field;
	private $hookup;
	private $newData;
	private $oldData;
	private $term;
	//$dataPack will be an array
	private $dataPack;

	public function enterData()
	{
		$this->hookup=UniversalConnect::doConnect();
		$this->cn_nome=$this->hookup->real_escape_string($_POST['cn_nome']);
		$this->cn_email=$this->hookup->real_escape_string($_POST['cn_email']);
		$this->cn_telb1=$this->hookup->real_escape_string($_POST['cn_telb1']);
		$this->cn_telb2=$this->hookup->real_escape_string($_POST['cn_telb2']);
		$this->cn_telb3=$this->hookup->real_escape_string($_POST['cn_telb3']);
		$this->cn_telb4=$this->hookup->real_escape_string($_POST['cn_telb4']);
		$this->cn_bltmk=$this->hookup->real_escape_string($_POST['cn_bltmk']);
		//$this->cn_lastip=$this->hookup->real_escape_string($_POST['cn_lastip']);
		//$this->cn_lastlogin=$this->hookup->real_escape_string($_POST['cn_lastlogin']);

		$this->dataPack=array(
			$this->cn_nome,
			$this->cn_email,
			$this->cn_telb1,
			$this->cn_telb2,
			$this->cn_telb3,
			$this->cn_telb4,
			$this->cn_bltmk
			//$this->cn_lastip,
			//$this->cn_lastloginval
		);

		$this->hookup->close();

		$this->retPage();

		//header("location:Consumidor.html");
	}

	public function conductSearch()
	{
		$this->hookup=UniversalConnect::doConnect();
		$this->field=$this->hookup->real_escape_string($_POST['field']);
		$this->term=$this->hookup->real_escape_string($_POST['term']);
		$this->dataPack=array(
			$this->field,
			$this->term
			);
		$this->hookup->close();
		$this->retPage();
	}

	public function makeChange()
	{
		$this->hookup=UniversalConnect::doConnect();
		$this->changeField=$this->hookup->real_escape_string($_POST['update']);
		$this->oldData=$this->hookup->real_escape_string($_POST['old']);
		$this->newData=$this->hookup->real_escape_string($_POST['new']);
		$this->dataPack=array(
			$this->changeField,
			$this->oldData,
			$this->newData
			);
		$this->hookup->close();
		$this->retPage();
	}

	public function removeRecord()
	{
		$this->hookup=UniversalConnect::doConnect();
		$this->disappear=$this->hookup->real_escape_string($_POST['delete']);
		$this->dataPack=array($this->disappear);
		$this->hookup->close();
		$this->retPage();
	}

	//Returns secure data as array to requesting Client
	public function setEntry()
	{
		return $this->dataPack;
	}

	public function retPage()
	{
		/* Do work */
		if(isset($_SERVER['HTTP_REFERER'])){
			header("Location: http://www.srv-tmkt.app/");
			// header("Location: {$_SERVER['HTTP_REFERER']}");
		}	else if(isset($_REQUEST['destination'])){
			header("Location: {$_REQUEST['destination']}");
		}else{
			/* some fallback, maybe redirect to index.php */
		};
		$msg = "realizado";
		return $msg;
	}
}
?>
