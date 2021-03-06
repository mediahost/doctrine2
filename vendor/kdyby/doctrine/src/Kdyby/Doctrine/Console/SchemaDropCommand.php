<?php

/**
 * This file is part of the Kdyby (http://www.kdyby.org)
 *
 * Copyright (c) 2008 Filip Procházka (filip@prochazka.su)
 *
 * For the full copyright and license information, please view the file license.txt that was distributed with this source code.
 */

namespace Kdyby\Doctrine\Console;

use Doctrine;
use Doctrine\ORM\Tools\SchemaTool;
use Kdyby;
use Nette;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;



/**
 * @author Filip Procházka <filip@prochazka.su>
 */
class SchemaDropCommand extends Doctrine\ORM\Tools\Console\Command\SchemaTool\DropCommand
{

	/**
	 * @var \Nette\Caching\IStorage
	 */
	private $cacheStorage;



	public function __construct(Nette\Caching\IStorage $cacheStorage)
	{
		parent::__construct();
		$this->cacheStorage = $cacheStorage;
	}



	/**
	 * {@inheritdoc}
	 */
	protected function initialize(InputInterface $input, OutputInterface $output)
	{
		parent::initialize($input, $output);
		$this->cacheStorage->clean(array(Nette\Caching\Cache::ALL => TRUE));
	}



	/**
	 * {@inheritdoc}
	 */
	protected function executeSchemaCommand(InputInterface $input, OutputInterface $output, SchemaTool $schemaTool, array $metadatas)
	{
		return parent::executeSchemaCommand($input, new ColoredSqlOutput($output), $schemaTool, $metadatas);
	}

}
