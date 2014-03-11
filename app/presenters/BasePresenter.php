<?php

namespace App\Presenters;

use Nette,
	App\Model;


/**
 * Base presenter for all application presenters.
 */
abstract class BasePresenter extends Nette\Application\UI\Presenter
{
    /** @var \WebLoader\LoaderFactory @inject */
    public $webLoader;

    /** @return CssLoader */
    protected function createComponentCss()
    {
        $css =  $this->webLoader->createCssLoader('default')
                ->setMedia('screen,projection,tv')
                ->setType(null);
        return $css;
    }

    /** @return CssLoader */
    protected function createComponentCssGrido()
    {
        $css =  $this->webLoader->createCssLoader('grido')
                ->setMedia('screen,projection,tv')
                ->setType(null);
        return $css;
    }
    
    /** @return JavaScriptLoader */
    protected function createComponentJs()
    {
        return $this->webLoader->createJavaScriptLoader('default');
    }
}
