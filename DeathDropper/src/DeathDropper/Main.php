<?php

declare(strict_types=1);

namespace DeathDropper;

use pocketmine\Server;
use pocketmine\Player;
use pocketmine\utils\Config;
use pocketmine\event\player\PlayerDeathEvent;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\item\Item;
use pocketmine\network\protocol\AddEntityPacket;
use pocketmine\network\protocol\SetTimePacket;
use pocketmine\network\protocol\TextPacket;
use pocketmine\network\protocol\AddPlayerPacket;
use pocketmine\entity\Entity;

class Main extends PluginBase implements Listener{
    
    public function onEnable(){
		self::$instance = $this;
	    Server::getInstance()->getLogger()->info("DeathDropper Enable!");
        $this->getServer()->getPluginManager()->registerEvents($this,$this);
    }
    
    public function onDeath(PlayerDeathEvent $event){
        $event->setDrops(array(Item::get(322, 0, 1)));
        }
}
