<?php
namespace Tmkhoa\Assignment\Entity;

/**
 * Class AbstractEntity
 * @package Tmkhoa\Assignment
 */
abstract class AbstractEntity
{
    /** @var string */
    private $id;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return AbstractEntity
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
}
