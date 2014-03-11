<?php

namespace App\Components;

use Nette\Application\UI\Control;

/**
 * Example usage of Grido datagrid like a Control.
 *
 * @author Martin
 */
class GridBookControl extends Control
{
    
    /** @var \Kdyby\Doctrine\EntityManager */
    public $em;

    public function __construct(\Kdyby\Doctrine\EntityManager $em) {
        $this->em = $em; 
    }
    
    public function render()
    {
        $template = $this->template;
        $template->setFile(__DIR__ . '/GridBookControl.latte');
        $template->render();
    }
    
    protected function createComponentDatagrid($name)
    {
        $grid = new \Grido\Grid($this, $name);

        //// Datasource ////
        $repository = $this->em->getRepository('\App\Entities\Book');
        $qb = $repository->createQueryBuilder('b')
                ->addSelect('a') // This will produce less SQL queries with prefetch.
                ->innerJoin('b.author', 'a');
        
        $model = new \Grido\DataSources\Doctrine($qb, array( // Map grido columns to the Author entity
            'firstname' => 'a.firstname',
            'surname' => 'a.surname',
            'author' => 'a.surname'
        ));
        $grid->model = $model;
        
        $grid->setDefaultPerPage(10)
            ->setPerPageList(array(5, 10, 20, 30, 50, 100));
        $grid->setDefaultSort(array('title' => 'ASC'));
        
        //// Columns ////
        $grid->addColumnText('id', 'ID');
        
        $grid->addColumnText('title', 'Title')
            ->setSortable()
            ->setFilterText()
                ->setSuggestion();
        
        $grid->addColumnDate('published', 'Published')
            ->setDateFormat('Y')
            ->setSortable();
        
        $grid->addColumnText('author', 'Author')
            ->setCustomRender(function($item){
                return $item->author->surname . ',&nbsp;' . $item->author->firstname;
            })
            ->setSortable()
            ->setFilterText()
                ->setSuggestion();
    }
}
