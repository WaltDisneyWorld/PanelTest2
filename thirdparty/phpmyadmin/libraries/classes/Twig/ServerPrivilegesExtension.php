<?php

/* vim: set expandtab sw=4 ts=4 sts=4: */
/**
 * hold PhpMyAdmin\Twig\ServerPrivilegesExtension class.
 */

namespace PhpMyAdmin\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

/**
 * Class ServerPrivilegesExtension.
 */
class ServerPrivilegesExtension extends AbstractExtension
{
    /**
     * Returns a list of functions to add to the existing list.
     *
     * @return TwigFunction[]
     */
    public function getFunctions()
    {
        return array(
            new TwigFunction(
                'ServerPrivileges_formatPrivilege',
                'PhpMyAdmin\Server\Privileges::formatPrivilege',
                array('is_safe' => array('html'))
            ),
        );
    }
}
