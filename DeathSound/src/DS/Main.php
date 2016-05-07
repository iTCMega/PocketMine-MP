<?php 

namespace DS;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\utils\TextFormat as color;
use pocketmine\event\player\PlayerDeathEvent;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\utils\Config;
use pocketmine\level\sound\AnvilBreakSound;
use pocketmine\level\sound\AnvilFallSound;
use pocketmine\level\sound\AnvilUseSound;
use pocketmine\level\sound\BatSound;
use pocketmine\level\sound\BlazeShootSound;
use pocketmine\level\sound\ClickSound;
use pocketmine\level\sound\DoorBumpSound;
use pocketmine\level\sound\DoorCrashSound;
use pocketmine\level\sound\DoorSound;
use pocketmine\level\sound\EndermanTeleportSound;
use pocketmine\level\sound\FizzSound;
use pocketmine\level\sound\GenericSound;
use pocketmine\level\sound\GhastShootSound;
use pocketmine\level\sound\GhastSound;
use pocketmine\level\sound\LaunchSound;
use pocketmine\level\sound\PopSound;
use pocketmine\level\sound\ZombieHealSound;
use pocketmine\level\sound\ZombieInfectSound;

class Main extends PluginBase implements Listener{
	
	public function onEnable(){
		$this->saveDefaultConfig();
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		$this->getServer()->getLogger()->info(color::BLUE. "Wow its has been activated!!");
		
	$this->config = new Config($this->getDataFolder() . "config.yml" , Config::YAML, Array(
		"Sound" => "FizzSound",
            ));
            $this->saveResource("config.yml");
	}
	
	public function onDeath(PlayerDeathEvent $event){
		$player = $event->getPlayer();
		$playerTest = $event->getEntity();
		
		$config = $this->config->get("Sound");
		
		$player->getPlayer()->getLevel()->addSound(new $config($playerTest));
	}
}
