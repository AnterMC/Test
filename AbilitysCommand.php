<?php

namespace zaxelmb\abilitys\command;

use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\player\Player;
use pocketmine\Server;
use pocketmine\utils\TextFormat;
use zaxelmb\abilitys\item\TankItem;
use zaxelmb\abilitys\item\StrengthItem;
use zaxelmb\abilitys\item\InvisibilityItem;
use zaxelmb\abilitys\item\SpeedItem;
use zaxelmb\abilitys\Loader;

class AbilitysCommand extends Command {
    
    private Loader $loader;
    
public function __construct(Loader $loader) {
     
     parent::__construct("abilitys", "Abilitys Command", "/abilitys", ["giveabilitys", "abilitysgive"]);
     $this->setPermission("abilitys.command");
$this->loader = $loader;
    
}

  public function execute(CommandSender $sender, string $commandLabel, array $args): bool {
      
      if(!$sender instanceof Player) {
          $sender->sendMessage(TextFormat::RED . "Use this command in-game");
     return false;
      }
      
      if(!$this->testPermission($sender)) {
          $sender->sendMessage(TextFormat::RED . "You do not have permission to use this command.");
    return false;
      }
      $item = new TankItem($this->loader);
     $sender->getInventory()->addItem($item);
          return true;
  }
}
?>