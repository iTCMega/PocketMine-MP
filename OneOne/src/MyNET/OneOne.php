<?php

namespace MyNET/OneOne;

use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use pocketmine\level\Level;

class OneOne extends PluginBase{
  
  public $one;
  private $arena;
  
  public function onEnable(){
  }
  
  public function getServer(){
    return Server::getInstance();
  }
  
  public function checkArena($arena){
    if($this->ArenaExists == $this->getServer()->getLevelByName($arena)){
      $this->one = $arena;
    }
    
    
  }
  
}

