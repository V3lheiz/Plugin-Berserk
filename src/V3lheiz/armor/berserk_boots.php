<?php
declare(strict_types=1);

namespace V3lheiz\armor;

use pocketmine\item\Armor;
use pocketmine\item\ArmorTypeInfo;
use pocketmine\item\ItemIdentifier;
use pocketmine\inventory\ArmorInventory;
use customiesdevs\customies\item\ItemComponents;
use customiesdevs\customies\item\CreativeInventoryInfo;
use customiesdevs\customies\item\ItemComponentsTrait;
class berserk_boots extends \pocketmine\item\Armor implements \customiesdevs\customies\item\ItemComponents{
	use ItemComponentsTrait {
		getComponents as _getComponents;
	}

	public function __construct(ItemIdentifier $identifier, string $name){
		$this->initComponent("berserk_boots", new CreativeInventoryInfo(CreativeInventoryInfo::CATEGORY_EQUIPMENT, CreativeInventoryInfo::GROUP_BOOTS));
		$this->addComponent(new HandEquippedComponent(false)); // Sesuaikan juga initComponentnya cek tutorial di yt @Renz-Mc
	}

	public function getMaxDurability() : int{
		return 5977; // sesuaikan durabilitynya
	}
	
	public function getAttackPoints() : int{
		return 2; // ini juga
	}


  // sesuaikan terserah kalian
		private static function getArmorInfo(): ArmorTypeInfo{
		return new ArmorTypeInfo(1, 700, ArmorInventory::SLOT_FEET);
		}
}
