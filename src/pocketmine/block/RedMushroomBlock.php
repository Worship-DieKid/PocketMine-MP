<?php

/*
 *
 *  ____            _        _   __  __ _                  __  __ ____
 * |  _ \ ___   ___| | _____| |_|  \/  (_)_ __   ___      |  \/  |  _ \
 * | |_) / _ \ / __| |/ / _ \ __| |\/| | | '_ \ / _ \_____| |\/| | |_) |
 * |  __/ (_) | (__|   <  __/ |_| |  | | | | | |  __/_____| |  | |  __/
 * |_|   \___/ \___|_|\_\___|\__|_|  |_|_|_| |_|\___|     |_|  |_|_|
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * @author PocketMine Team
 * @link http://www.pocketmine.net/
 *
 *
*/

declare(strict_types=1);

namespace pocketmine\block;

use pocketmine\item\Item;
use function mt_rand;

class RedMushroomBlock extends Solid{

	protected $id = Block::RED_MUSHROOM_BLOCK;

	/**
	 * @var int
	 * In PC they have blockstate properties for each of the sides (pores/not pores). Unfortunately, we can't support
	 * that because we can't serialize 2^6 combinations into a 4-bit metadata value, so this has to stick with storing
	 * the legacy crap for now.
	 * TODO: change this once proper blockstates are implemented
	 */
	protected $rotationData = 0;

	public function __construct(){

	}

	protected function writeStateToMeta() : int{
		return $this->rotationData;
	}

	public function readStateFromMeta(int $meta) : void{
		$this->rotationData = $meta;
	}

	public function getStateBitmask() : int{
		return 0b1111;
	}

	public function getName() : string{
		return "Red Mushroom Block";
	}

	public function getHardness() : float{
		return 0.2;
	}

	public function getToolType() : int{
		return BlockToolType::TYPE_AXE;
	}

	public function getDropsForCompatibleTool(Item $item) : array{
		return [
			Item::get(Item::RED_MUSHROOM, 0, mt_rand(0, 2))
		];
	}
}
