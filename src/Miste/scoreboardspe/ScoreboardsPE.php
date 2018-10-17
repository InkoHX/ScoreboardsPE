<?php

declare(strict_types=1);

namespace Miste\scoreboardspe;

use Miste\scoreboardspe\API\ScoreboardStore;
use Miste\scoreboardspe\commands\ScoreboardCommand;
use pocketmine\plugin\PluginBase;

class ScoreboardsPE extends PluginBase
{

    private $scoreboardStore;

    public function onEnable(): void
    {
        $this->getLogger()->info("I have been enabled !");
        $this->getServer()->getPluginManager()->registerEvents(new EventHandler($this), $this);
        $this->getServer()->getCommandMap()->register("scoreboard", new ScoreboardCommand($this, "scoreboard"));
        $this->scoreboardStore = new ScoreboardStore();
    }

    /**
     * @return ScoreboardStore
     */
    public function getStore(): ScoreboardStore
    {
        return $this->scoreboardStore;
    }

    /**
     * @return $this
     */
    public function getPlugin(): self
    {
        return $this;
    }
}