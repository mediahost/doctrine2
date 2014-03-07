<?php

namespace App\Model;

class Articles extends \Nette\Object
{
    /** @var \Kdyby\Doctrine\EntityDao */
    private $articles;

    public function __construct(\Kdyby\Doctrine\EntityDao $dao)
    {
        $this->articles = $dao;
//        $this->articles = $em->getDao(\App\Article::getClassName());
    }

    public function findById($id)
    {
        return $this->articles->findOneBy(array('id' => $id));
    }
    
    public function save(\App\Entities\Article $article)
    {
        return $this->articles->save($article);
    }
}