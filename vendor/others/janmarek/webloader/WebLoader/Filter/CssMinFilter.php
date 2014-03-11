<?php

namespace WebLoader\Filter;

/**
 * CSSmin filter
 *
 * @author Martin Šifra
 * @license MIT
 */
class CssMinFilter
{
	/**
	 * Invoke filter
	 * @param string $code
	 * @param \WebLoader\Compiler $loader
	 * @return string
	 */
	public function __invoke($code)
	{
        return \CssMin::minify($code);
	}

}
