<?php

class ifExistData{
  public $table;

  function __construct($table){
    $this->table = $table;
  }

  public function Validate($table) {

    $this->tableMaster=$table;
    $this->hookup=UniversalConnect::doConnect();
    $this->dataPack=$dataPack;
    $field=$this->dataPack[0];
    $term=$this->dataPack[1];
    $this->sql = "SELECT * FROM $this->tableMaster WHERE $field='$term'";
    //Conditional statement in MySQL query for data output
    if ($result = $this->hookup->query($this->sql))
    {
      echo "<link rel='stylesheet' href='main.css'>";
      echo "<table>";
      while($row=mysqli_fetch_row($result))
      {
        echo "<tr>";
        foreach($row as $cell)
        {
          echo "<td>$cell</td>";
        }
        echo "</tr>";
      }
      echo "</table>";
      $result->close();
    }
    $this->hookup->close();
  }

}

// cria uma instância chamada $cliente
$cliente = new Pessoa("Fábio Moraes", 34);

echo "O nome do cliente é: " . $cliente->nome . "<br>";
echo "A idade do cliente é: " . $cliente->idade;
?>
