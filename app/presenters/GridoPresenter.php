<?php


namespace App\Presenters;

/**
 * Description of Grido
 *
 * @author Martin
 */
class GridoPresenter extends BasePresenter
{
    /** @var \Kdyby\Doctrine\EntityManager @inject */
    public $entityManager;
    
    public function renderDefault()
    {
        
    }
    
    protected function createComponentGrid($name)
    {
        $grid = new \Grido\Grid($this, $name);

        $repository = $this->entityManager->getRepository('\App\Entities\Book');
        $qb = $repository->createQueryBuilder('b') // We need to create query builder with inner join.
                ->addSelect('a')                 // This will produce less SQL queries with prefetch.
                ->innerJoin('b.author', 'a');
        
        $model = new \Grido\DataSources\Doctrine($qb,
            array('firstname' => 'a.firstname', 'surname' => 'a.surname', 'author' => 'a.surname'));      // Map country column to the title of the Country entity
        $grid->model = $model;
        
        $grid->setDefaultPerPage(10)
            ->setPerPageList(array(5, 10, 20, 30, 50, 100));
        

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
