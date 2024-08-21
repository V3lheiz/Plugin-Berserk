<?php

namespace V3lheiz;

use pocketmine\Server;
use pocketmine\player\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\resourcepacks\ZippedResourcePack;
use pocketmine\event\Listener;

use customiesdevs\customies\item\CustomiesItemFactory;

use V3lheiz\item\sword\dragon_slayer;
use V3lheiz\armor\berserk_leggings;
use V3lheiz\armor\berserk_chestplate;
use V3lheiz\armor\berserk_boots;
use V3lheiz\armor\berserk_helmet;

use ReflectionClass;

class Main extends PluginBase implements Listener {

  public function onEnable(): void {
    $this->saveResource("BERSERK.mcpack", true); // sesuaikan nama RS kamu
    $manager = $this->getServer()->getResourcePackManager();
    $pack = new ZippedResourcePack($this->getDataFolder() . "BERSERK.mcpack"); // disini juga sesuaikan 
    $reflection = new ReflectionClass($manager);
    $property = $reflection->getProperty("resourcePacks");
    $property->setAccessible(true);
    $currentResourcePacks = $property->getValue($manager);
    $currentResourcePacks[] = $pack;
    $property->setValue($manager, $currentResourcePacks);
    $property = $reflection->getProperty("uuidList");
    $property->setAccessible(true);
    $currentUUIDPacks = $property->getValue($manager);
    $currentUUIDPacks[strtolower($pack->getPackId())] = $pack;
    $property->setValue($manager, $currentUUIDPacks);
    $property = $reflection->getProperty("serverForceResources");
    $property->setAccessible(true);
    $property->setValue($manager, true);

    $this->getServer()->getPluginManager()->registerEvents($this, $this);

    CustomiesItemFactory::getInstance()->registerItem(dragon_slayer::class, "potomy:dragon_slayer", "Dragon Slayer"); // sesuaikan ini jika anda ingin menambahkan item cukup copas aja registernya tutorialnya di Yt @Renz-Mc
    CustomiesItemFactory::getInstance()->registerItem(berserk_leggings::class, "potomy:berserk_leggings", "Armor Berserk");
    CustomiesItemFactory::getInstance()->registerItem(berserk_chestplate::class, "potomy:berserk_chestplate", "Armor Berserk");
    CustomiesItemFactory::getInstance()->registerItem(berserk_helmet::class, "potomy:berserk_helmet", "Armor Berserk");
    CustomiesItemFactory::getInstance()->registerItem(berserk_boots::class, "potomy:berserk_boots", "Armor Berserk");
  }
}