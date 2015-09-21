<?php

/* Define o local para Holandês(usar pt_BR para o Português(Brasil) ) */
setlocale (LC_ALL, 'pt_BR');

class Context
{
  private $strategy;
  private $dataPack;

  public function __construct(IStrategy $strategy)
  {
    $this->strategy = $strategy;
  }

  public function algorithm(Array $dataPack)
  {
    $this->dataPack=$dataPack;
    $this->strategy->algorithm($this->dataPack);
  }
}
?>
