<?php
/**
 * This file is property of crakmedia (http://crakmedia.com)
 * Created by Brice Colucci <bcolucci@crakmedia.com>
 * @copyright 2014 Crakmedia
 */

namespace Crak\Component\RestNormalizer\Type;

use Crak\Component\RestNormalizer\ErrorInterface;
use Star\Component\Collection\TypedCollection;

/**
 * Class ErrorCollection
 * @package Crak\Component\RestNormalizer\Type
 * @author bcolucci <bcolucci@crakmedia.com>
 */
class ErrorCollection extends TypedCollection
{
    const CLASS_NAME = __CLASS__;

    /**
     * @param array $errors = []
     */
    public function __construct(array $errors = [])
    {
        parent::__construct(ErrorInterface::INTERFACE_NAME, $errors);
    }
} 