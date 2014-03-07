<?php

namespace App\Presenters;

/**
 * Description of BookPresenter
 *
 * @author Martin
 */
class Doctrine2Presenter extends BasePresenter {
    
    /** @var \Kdyby\Doctrine\EntityManager @inject */
    public $entityManager;
    
    public function renderDefault()
    {
        $this->template->books = $this->entityManager->getRepository('App\Entities\Book')->findAll();
    }
}
