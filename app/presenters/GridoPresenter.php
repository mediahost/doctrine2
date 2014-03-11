<?php

namespace App\Presenters;

/**
 * Example usage of Grido datagrid component with Doctrine 2 datasource.
 * @author Martin Šifra
 */
class GridoPresenter extends BasePresenter
{

    /** @var \App\Components\IGridBookControlFactory @inject */
    public $gridBookControlFactory;

    
    
    ///// Components /////
    
    /*
     * Grid with Books.
     * @return \App\Components\GridBookControl
     */
    protected function createComponentGridBook()
    {
        return $this->gridBookControlFactory->create();
    }
}
