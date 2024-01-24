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
    private int $itemEntityId;

    public function __construct(
        private Player $player,
        private Item $item,
        private Position $pos
    ){
        $this->itemEntityId = Entity::nextRuntimeId();

        $pos->getWorld()->broadcastPacketToViewers($pos, AddItemActorPacket::create(
            $this->itemEntityId,
            $this->itemEntityId,
            ItemStackWrapper::legacy(TypeConverter::getInstance()->coreItemStackToNet($item)),
            $pos->add(0.5, 0.5, 0.5),
            new Vector3(lcg_value() * 0.2 - 0.1, 0.2, lcg_value() * 0.2 - 0.1),
            [],
            false));
    }

    public function onRun() : void{
        $world = $this->pos->getWorld();
        if(
            $this->player->isClosed() ||
            !$this->player->isConnected() ||
            !empty($this->player->getInventory()->addItem($this->item))
        ){
            $world->dropItem($this->pos, $this->item);
        }

        foreach([
            TakeItemActorPacket::create($this->player->getId(), $this->itemEntityId),
            RemoveActorPacket::create($this->itemEntityId)
        ] as $pk){
            $world->broadcastPacketToViewers($this->pos, $pk);
        }
    }
}