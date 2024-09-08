<?php

namespace zaxelmb\abilitys;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\Server;
use pocketmine\command\Command;
use zaxelmb\abilitys\item\TankItem;
use zaxelmb\abilitys\item\SpeedItem;
use zaxelmb\abilitys\item\StrengthItem;
use zaxelmb\abilitys\item\InvisibilityItem;
use zaxelmb\abilitys\command\AbilitysCommand;

class Loader extends PluginBase {
    
    public function onEnable(): void {
        $this->getLogger()->info("Abilitys plugin enabled made by zAxelMB.");
        $this->getServer()->getPluginManager()->registerEvents(new StrengthItem($this), $this);
        $this->getServer()->getPluginManager()->registerEvents(new TankItem($this), $this);
        $this->getServer()->getCommandMap()->register("abilitys", new AbilitysCommand($this));
}
    
    public function onDisable(): void {
        $this->getLogger()->info("Abilitys plugin disabled.");
    }
}
?>