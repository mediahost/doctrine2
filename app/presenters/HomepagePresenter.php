<?php

namespace App\Presenters;

use Nette,
	App\Model;


/**
 * Homepage presenter.
 */
class HomepagePresenter extends BasePresenter
{
    /** @var \App\Model\Articles @inject */
    //public $articles;

    /** @var \Kdyby\Doctrine\EntityManager @inject */
    public $entityManager;


    public function __construct() {
        parent::__construct();
     
    }

    public function renderDefault($id)
	{
//        $books = $this->entityManager->getDao(\App\Entities\Book::getClassName());
//
//        $author = new \App\Entities\Author();
//        $author->firstname = "Jaroslav";
//        $author->surname = "Hašek";
//        $this->entityManager->persist($author);
//        
//        $book = new \App\Entities\Book();
//        $book->title = "Osudy dobrého vojáka Švejka za světové války";
//        $book->author = $author;
//        $book->published = new \Nette\DateTime('1923-01-01');
//        $this->entityManager->persist($book);
//        
//        $books->save($book);
//        $this->entityManager->flush();
        
        //$this->template->books = $this->entityManager->getRepository('App\Entities\Book')->findAll();
        
//        foreach ($this->template->books as $book) {
//            $author = $book->getAuthor();
//            echo $author->getFirstname() . '&nbsp' . $author->getSurname() . ': ';
//            echo $book->title . '<br>';
//        }
	}
}
