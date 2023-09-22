<?php
require_once __DIR__ . '/Character.php';

/**
 * [Description Hero]
 */
class Hero extends Character{
    private string $weapon; //Nom de l'arme 
    private int $weaponDamage; // Puissance de l'arme
    private string $shield; //Nom du bouclier
    private int $shieldValue; // Puissance du bouclier

    public function getWeapon():string{
        return $this->weapon;
    }
    public function getWeaponDamage():string{
        return $this->weaponDamage;
    }
    public function getShield():string{
        return $this->shield;
    }
    public function getShieldValue():string{
        return $this->shieldValue;
    }

    /**
     * Défini le nom de l'arme et ses dégats
     * @param string $weapon
     * @param int $weaponDamage
     * 
     * @return [type]
     */
    public function setWeapon(string $weapon,int $weaponDamage){
        $this->weapon = $weapon;
        $this->weaponDamage = $weaponDamage;
    }
    /**
     * Défini le nom de l'armure et sa valeur de protection
     * @param string $shield
     * @param int $shieldValue
     * 
     * @return [type]
     */
    public function setShield(string $shield,int $shieldValue){
        $this->shield = $shield;
        $this->shieldValue = $shieldValue;
    }
    /** Défini l'équipement du personnage, sa santé et rage
     * @param string $weapon
     * @param int $weaponDamage
     * @param string $shield
     * @param int $shieldValue
     * @param int $health
     * @param int $rage
     */
    public function __construct(string $weapon,int $weaponDamage,string $shield,int $shieldValue,int $health,int $rage){
        $this->setWeapon($weapon, $weaponDamage);
        $this->setShield($shield,$shieldValue);
        parent:: __construct($health, $rage);
        
    }
    /**
     * Gère l'attaque de l'Orc
     * @param int $damage
     * @param int $shieldValue
     * 
     * @return [type]
     */
    public function attacked(int $damage,int $shieldValue){
        if ($shieldValue>$damage){
            $wound = 0;
        }
        else{
            $wound =$damage - $shieldValue  ;
            $this->setHealth($this->getHealth() - $wound);
        }
        $this->rage += 30;
        $this->shieldValue -= round($damage/17);
        if ($this->shieldValue <0){
            $this->shieldValue = 0;
        }
    }
    /**
     * Affichage données lié au héro
     * @return string
     */
    public function __toString(): string 
    {
        return 'Le héros a '.$this->health.' points de vie et '.$this->rage.' point de rage. Il a une épee appelé '.$this->weapon.' et qui inflige '.$this->weaponDamage.' point de dégats. Son bouclier '.$this->shield.' lui offre une protection de '.$this->shieldValue.' points.';
    }

}