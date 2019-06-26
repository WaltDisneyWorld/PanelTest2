<?php

/* vim: set expandtab sw=4 ts=4 sts=4: */
/**
 * hold PhpMyAdmin\Twig\I18nExtension class.
 */

namespace PhpMyAdmin\Twig;

use PhpMyAdmin\Twig\I18n\TokenParserTrans;
use Twig\Extensions\I18nExtension as TwigI18nExtension;
use Twig\TwigFilter;

/**
 * Class I18nExtension.
 */
class I18nExtension extends TwigI18nExtension
{
    /**
     * Returns the token parser instances to add to the existing list.
     *
     * @return \Twig\TokenParser\TokenParserInterface[]
     */
    public function getTokenParsers()
    {
        return array(new TokenParserTrans());
    }

    /**
     * Returns a list of filters to add to the existing list.
     *
     * @return TwigFilter[]
     */
    public function getFilters()
    {
        return array(
             new TwigFilter('trans', '_gettext'),
        );
    }
}
