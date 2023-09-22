<?php
/**
 * [Description Character]
 */
class Character{
    
    public int $health;
    public int $rage;

    /**
     * Méthode magique de Construction du personnage
     * @param int $health
     * @param int $rage
     */
    public function __construct(int $health,int $rage){
        $this->setHealth($health);
        $this->setRage($rage);
    }

    /**
     *  récupère la santé d'un personnage
     * @return int
     */
    public function getHealth():int{
        return $this->health;
    }

    /**
     * récupère la rage d'un personnage
     * @return int
     */
    public function getRage():int{
        return $this->rage;
    }

    /**
     * défini la santé d'un personnage
     * @param int $health
     * 
     * @return [type]
     */
    public function setHealth(int $health){
        $this->health = $health;
    }

    /**
     * défini la rage d'un personnage
     * @param int $rage
     * 
     * @return [type]
     */
    public function setRage(int $rage){
        $this->rage = $rage;
    }
    
}

