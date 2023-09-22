<?php
require_once __DIR__ . '/Character.php';

/**
 * [Description Orc]
 */
class Orc extends Character{
    private int $damage;

    /**
     * Définir les dommages
     * @param int $damage
     * 
     * @return [type]
     */
    public function setDamage(int $damage){
            $this->damage = $damage;
        }
    /**
     * Récupérer la valeur des dégats
     * @return int
     */
    public function getDamage():int{
        return $this->damage;
    }

    /**
     * méthode magique de la création du personnage Orc
     * @param int $damage
     * @param int $health
     * @param int $rage
     */
    public function __construct(int $health,int $rage){
        parent:: __construct($health, $rage);
        
    }
    public function __toString():string
    {
        return 'L\'Orc a '.$this->getHealth().' points de vie et '.$this->getRage().' point de rage.';
    }
    /**
     * Attribue une valeur random comprise entre 600 et 800 au dégats de l'Orc
     * @return [type]
     */
    public function attack(){
        $this->setDamage(rand(600, 800));
    }
    
}