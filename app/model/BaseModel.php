<?php

namespace App\Model;

class BaseModel extends \Nette\Object
{
    /** @var \Kdyby\Doctrine\EntityDao */
    protected $dao;

    public function __construct(\Kdyby\Doctrine\EntityDao $dao)
    {
        $this->dao = $dao;
    }

    public function findById($id)
    {
        return $this->dao->findOneBy(array('id' => $id));
    }
    
    public function save(\Kdyby\Doctrine\Entities\IdentifiedEntity $article)
    {
        return $this->dao->save($article);
    }
    
    public function findAll()
    {
        return $this->dao->findAll();
    }
}