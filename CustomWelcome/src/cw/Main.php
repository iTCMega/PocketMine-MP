<?php

namespace cw;

use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\utils\TextFormat;
use pocketmine\utils\Config;
use pocketmine\event\player\PlayerJoinEvent;

class Main extends PluginBase implements Listener{
	
	public function onEnable(){
		$this->getLogger()->info(TextFormat::YELLOW. "CustomWelcome v1 by MyNET Enable!");
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		if(!file_exists($this->getDataFolder())) @mkdir($this->getDataFolder());
		    $this->messages = new Config($this->getDataFolder()."messages.yml", CONFIG::YAML, array(
			    "text-1" => " ",
				"text-2" => " ",
				"text-3" => " ",
				"text-4" => " ",
			));
		$this->messages->save();
	}
	
	public function onDisable(){
		$this->getLogger()->info(TextFormat::YELLOW. "CustomWelcome v1 by MyNET Disable!");
	}
	
	public function joinMessage(PlayerJoinEvent $event){
		$player = $event->getPlayer();
		$name = $player->getName();
        $player->sendMessage($this->messages->get("text-1"));
		$player->sendMessage($this->messages->get("text-2"));
		$player->sendMessage($this->messages->get("text-3"));
		$player->sendMessage($this->messages->get("text-4"));
	}
	
	/**
	 * Apply minecraft color codes to a string from our custom ones
	 *
	 * @param string $string
	 * @param string $symbol
	 *
	 * @return string
	 */
	public static function translateColors($string, $symbol = "&") {
		$string = str_replace($symbol . "0", TF::BLACK, $string);
		$string = str_replace($symbol . "1", TF::DARK_BLUE, $string);
		$string = str_replace($symbol . "2", TF::DARK_GREEN, $string);
		$string = str_replace($symbol . "3", TF::DARK_AQUA, $string);
		$string = str_replace($symbol . "4", TF::DARK_RED, $string);
		$string = str_replace($symbol . "5", TF::DARK_PURPLE, $string);
		$string = str_replace($symbol . "6", TF::GOLD, $string);
		$string = str_replace($symbol . "7", TF::GRAY, $string);
		$string = str_replace($symbol . "8", TF::DARK_GRAY, $string);
		$string = str_replace($symbol . "9", TF::BLUE, $string);
		$string = str_replace($symbol . "a", TF::GREEN, $string);
		$string = str_replace($symbol . "b", TF::AQUA, $string);
		$string = str_replace($symbol . "c", TF::RED, $string);
		$string = str_replace($symbol . "d", TF::LIGHT_PURPLE, $string);
		$string = str_replace($symbol . "e", TF::YELLOW, $string);
		$string = str_replace($symbol . "f", TF::WHITE, $string);
		$string = str_replace($symbol . "k", TF::OBFUSCATED, $string);
		$string = str_replace($symbol . "l", TF::BOLD, $string);
		$string = str_replace($symbol . "m", TF::STRIKETHROUGH, $string);
		$string = str_replace($symbol . "n", TF::UNDERLINE, $string);
		$string = str_replace($symbol . "o", TF::ITALIC, $string);
		$string = str_replace($symbol . "r", TF::RESET, $string);
		return $string;
	}
}
