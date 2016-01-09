<?php

  namespace JoinMessage;

  use pocketmine\event\player\PlayerJoinEvent;
  use pocketmine\utils\TextFormat as TF;
  use pocketmine\plugin\PluginBase;
  use pocketmine\event\Listener;

  class Main extends PluginBase implements Listener {

    public function onEnable() {

      if(!(file_exists("JoinMessage/config.txt"))) {

        @mkdir("JoinMessage/", 0777, true);
        touch("JoinMessage/config.txt");
        $this->getServer()->getPluginManager()->registerEvents($this, $this);

      }

    }

    public function onJoin(PlayerJoinEvent $ev) {

      $msg = file_get_contents("JoinMessage/config.txt");
      $player = $ev->getPlayer();
      $player->sendMessage($msg);

   }

  }

?>
