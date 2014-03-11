<?php

namespace App\Presenters;

/**
 * Example usage of loading data from database by Doctrine 2.
 * @author Martin Šifra
 */
class Doctrine2Presenter extends BasePresenter {
    
    /** @var \Kdyby\Doctrine\EntityManager @inject */
    public $entityManager;
    
    /** @var \App\Model\BookModel @inject */
    public $bookModel;
    
    public function renderDefault()
    {
        //$books = $this->entityManager->getRepository('App\Entities\Book')->findAll();
        $books = $this->bookModel->findAll();
        
        $this->template->books = $books;
        $this->template->count = count($books);
    }
}

