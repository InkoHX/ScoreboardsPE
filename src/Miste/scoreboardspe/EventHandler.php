<?php

declare(strict_types=1);

namespace Miste\scoreboardspe;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerQuitEvent;

class EventHandler implements Listener
{

    /** @var ScoreboardsPE */
    private $plugin;

    public function __construct(ScoreboardsPE $plugin)
    {
        $this->plugin = $plugin;
    }

    /*
    public function onPlayerJoinEvent(PlayerJoinEvent $event)
    {
        $scoreboard = new Scoreboard($this->plugin, "Miste", ScoreboardAction::CREATE);
        $scoreboard->create(ScoreboardDisplaySlot::SIDEBAR, ScoreboardSort::DESCENDING);
        $scoreboard->addDisplay($event->getPlayer());
        for ($i = 1; $i <= 15; $i++) {
            $scoreboard->setLine($event->getPlayer(), $i, "line$i");
        }
    }
    */ //TODO: ここ必要ないと思ったからコメント化してます。

    public function onQuitEvent(PlayerQuitEvent $event)
    {
        $this->plugin->getStore()->removePotentialViewer($event->getPlayer()->getName());
    }
}