<?php

class MotCle
{

    private $id;
    private $motCle;

    /**
     * MotCle constructor.
     * @param $motCle
     */
    public function __construct($motCle)
    {
        $this->motCle = $motCle;
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getMotCle()
    {
        return $this->motCle;
    }

    /**
     * @param mixed $motCle
     */
    public function setMotCle($motCle)
    {
        $this->motCle = $motCle;
    }


}