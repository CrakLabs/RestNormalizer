<?php
/**
 * This file is property of crakmedia (http://crakmedia.com)
 *
 * PHP Version 5.4
 * 
 * @copyright 2015 Crakmedia
 */

namespace Crak\Component\RestNormalizer\Test\Functional\Silex\Provider\Fixtures;

/**
 * Class TestObject
 *
 * @package  Crak\Component\RestNormalizer\Test\Functional\Silex\Provider\Fixtures
 * @author   Christophe Rosello <crosello@crakmedia.com> 
 */
class TestObject 
{
    const CLASS_NAME = __CLASS__;

    public function getProperty()
    {
        return 'value';
    }
} 