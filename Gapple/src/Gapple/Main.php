<?php

namespace Gapple;

use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use pocketmine\event\Listener;
use pocketmine\Player;
use pocketmine\event\player\PlayerItemConsumeEvent;
use pocketmine\event\player\PlayerItemHeldEvent;
use pocketmine\entity\Effect;
use pocketmine\utils\TextFormat as color;

class Main extends PluginBase implements Listener{
	
	public function onEnable(){
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		$this->getServer()->getLogger()->info(color::YELLOW. "Gapple by MyNET has been enable!");
	}
	public function onTip(PlayerItemHeldEvent $ev){
		if($ev->getPlayer()->getInventory()->getItemInHand()->getId() === 322){
			$ev->getPlayer()->sendTip(color::Yellow. "Eat Gapple!");
		}
	}
	
	public function eat(PlayerItemConsumeEvent $ev){

   	$p=$ev->getPlayer();

   	if($ev->getItem()->getId() === 322){

            $p->addEffect(Effect::getEffect(10)->setAmplifier(3)->setDuration(200)->setVisible(true));
            $p->addEffect(Effect::getEffect(21)->setAmplifier(0)->setDuration(1000)->setVisible(true));
			$p->setMaxHealth(40);

    		}
 	}
 }

