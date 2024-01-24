<?php

/**
 *  ____                           _   _  ___
 * |  _ \ _ __ ___  ___  ___ _ __ | |_| |/ (_)_ __ ___
 * | |_) | '__/ _ \/ __|/ _ \ '_ \| __| ' /| | '_ ` _ \
 * |  __/| | |  __/\__ \  __/ | | | |_| . \| | | | | | |
 * |_|   |_|  \___||___/\___|_| |_|\__|_|\_\_|_| |_| |_|
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * @author  PresentKim (debe3721@gmail.com)
 * @link    https://github.com/PresentKim
 * @license https://www.gnu.org/licenses/lgpl-3.0 LGPL-3.0 License
 *
 *   (\ /)
 *  ( . .) ♥
 *  c(")(")
 *
 * @noinspection PhpUnused
 */

declare(strict_types=1);

namespace kim\present\visualinstantpickup\task;

use pocketmine\entity\Entity;
use pocketmine\item\Item;
use pocketmine\math\Vector3;
use pocketmine\network\mcpe\convert\TypeConverter;
use pocketmine\network\mcpe\protocol\AddItemActorPacket;
use pocketmine\network\mcpe\protocol\RemoveActorPacket;
use pocketmine\network\mcpe\protocol\TakeItemActorPacket;
use pocketmine\network\mcpe\protocol\types\inventory\ItemStackWrapper;
use pocketmine\player\Player;
use pocketmine\scheduler\Task;
use pocketmine\world\Position;

final class PickupTask extends Task{
    private Player $player;
    private Item $item;
    private Position $pos;
    private int $entityRuntimeId;

    /** @var Player[] */
    private array $hasSpawned = [];

    public function __construct(Player $player, Item $item, Position $pos){
        $this->player = $player;
        $this->item = $item;
        $this->pos = $pos;
        $this->entityRuntimeId = Entity::nextRuntimeId();

        $pk = AddItemActorPacket::create(
            $this->entityRuntimeId,
            $this->entityRuntimeId,
            ItemStackWrapper::legacy(TypeConverter::getInstance()->coreItemStackToNet($item)),
            $pos->add(0.5, 0.5, 0.5),
            new Vector3(lcg_value() * 0.2 - 0.1, 0.2, lcg_value() * 0.2 - 0.1),
            [],
            false);
        $chunkX = $pos->getFloorX() >> 4;
        $chunkZ = $pos->getFloorZ() >> 4;
        foreach($pos->getWorld()->getChunkPlayers($chunkX, $chunkZ) as $viewer){
            if(!$viewer->hasReceivedChunk($chunkX, $chunkZ))
                continue;

            $this->hasSpawned[spl_object_id($viewer)] = $viewer;
            $viewer->getNetworkSession()->sendDataPacket($pk);
        }
    }

    public function onRun() : void{
        if(
            $this->player->isClosed() ||
            !$this->player->isConnected() ||
            !empty($this->player->getInventory()->addItem($this->item))
        ){
            $this->pos->getWorld()->dropItem($this->pos, $this->item);
        }

        foreach($this->hasSpawned as $viewer){
            $viewer->getNetworkSession()->sendDataPacket(TakeItemActorPacket::create($this->player->getId(), $this->entityRuntimeId));
            $viewer->getNetworkSession()->sendDataPacket(RemoveActorPacket::create($this->entityRuntimeId));
        }
    }
}