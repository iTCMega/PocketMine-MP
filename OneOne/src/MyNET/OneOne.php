<?php

namespace MyNET/OneOne;

use pocketmine\plugin\PluginBase;

class OneOne extends PluginBase{
  private $p1 = getPlayer(1);
  private $p2 = getPlayer(2);
  
  private $oneone = $p1 + $p2;
  
  function onEnable(){
    //Don't work
  }
}

