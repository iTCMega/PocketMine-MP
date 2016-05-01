<?php

namespace KOL;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\utils\Config;
use pocketmine\utils\TextFormat as color;

class Main extends PluginBase implements Listener{
	
	public function onEnable(){
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
		$this->getLogger()->info(color::BLUE. "KingOfTheLadder Activated!");
		if(!file_exists($this->getDataFolder())){
			@mkdir($this->getDataFolder());
		}
		//Config for KingOfTheLadder
		$this->config = new Config($this->getDataFolder() . "config.yml", Config::YAML, array(
		   "max_player" => 6,
		   "wait_player" => 4,
		   "game_time" => 100,
		   "waiting_time" => 10,
		   "end_time" => 100,
		));
	}
}
