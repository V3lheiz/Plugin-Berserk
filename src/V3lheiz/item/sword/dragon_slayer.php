<?php
declare(strict_types=1);

namespace V3lheiz\item\sword;

use customiesdevs\customies\item\component\HandEquippedComponent;
use customiesdevs\customies\item\CreativeInventoryInfo;
use customiesdevs\customies\item\ItemComponentsTrait;
use pocketmine\item\ItemIdentifier;
use pocketmine\item\ToolTier;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\nbt\tag\ListTag;

class dragon_slayer extends \pocketmine\item\Sword implements \customiesdevs\customies\item\ItemComponents{
	use ItemComponentsTrait {
		getComponents as _getComponents;
	}

	public function __construct(ItemIdentifier $identifier, string $name){
		parent::__construct($identifier, $name, ToolTier::NETHERITE()); // sesuaikan tooltiernya misalnya diamond atau apa
		$this->initComponent("dragon_slayer", new CreativeInventoryInfo(CreativeInventoryInfo::CATEGORY_EQUIPMENT, CreativeInventoryInfo::GROUP_SWORD));
		$this->addComponent(new HandEquippedComponent(true)); // Sesuaikan juga initComponentnya cek tutorial di yt @Renz-Mc
	}

	public function getMaxDurability() : int{
		return 6000; // sesuaikan durabilitynya
	}

	protected function getBaseMiningEfficiency() : float{
		return 12; // sesuaikan juga bila perlu
	}
	
	public function getAttackPoints() : int{
		return 20; // ini juga
	}


  // sesuaikan terserah kalian
	public function getComponents() : CompoundTag{
		$itemData = $this->_getComponents();
		$digger = CompoundTag::create()
			->setByte("use_efficiency", 1);
		$destroy_speeds = new ListTag();
		foreach(
			[
				"minecraft:web",
				"minecraft:bamboo",
				"minecraft:melon_block",
				"minecraft:pumpkin",
				"minecraft:cocoa",
				"minecraft:lit_pumpkin",
				"minecraft:leaves",
				"minecraft:vine",
				"minecraft:hay_block"
			] as $block){
			$destroy_speeds->push(CompoundTag::create()
				->setString("block", $block)
				->setInt("speed", match($block){
					"minecraft:web" => 15,
					"minecraft:bamboo" => 35,
					default => 1
				})
			);
		}
		return $itemData->setTag("components", $itemData->getCompoundTag("components")
			->setTag("minecraft:digger", $digger->setTag("destroy_speeds", $destroy_speeds))
		);
	}
}
