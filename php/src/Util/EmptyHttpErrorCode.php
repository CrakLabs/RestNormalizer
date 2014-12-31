<?php
/**
 * This file is property of crakmedia (http://crakmedia.com)
 * Created by Brice Colucci <bcolucci@crakmedia.com>
 * @copyright 2014 Crakmedia
 */

namespace Crak\Component\RestNormalizer\Util;

use Crak\Component\RestNormalizer\HttpErrorCode;

/**
 * Class EmptyHttpErrorCode
 * @package Crak\Component\RestNormalizer
 * @author bcolucci <bcolucci@crakmedia.com>
 */
class EmptyHttpErrorCode extends HttpErrorCode
{
    public function __construct()
    {
    }

    /**
     * @codeCoverageIgnore trivial
     * @return string
     */
    public function getValue()
    {
        return '';
    }
} 