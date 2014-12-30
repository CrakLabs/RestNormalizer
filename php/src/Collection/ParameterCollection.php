<?php
/**
 * This file is property of crakmedia (http://crakmedia.com)
 * Created by Brice Colucci <bcolucci@crakmedia.com>
 * @copyright 2014 Crakmedia
 */

namespace Crak\Component\RestNormalizer\Collection;

use Crak\Component\RestNormalizer\ParameterInterface;
use Star\Component\Collection\TypedCollection;

/**
 * Class ParameterCollection
 * @package Crak\Component\RestNormalizer\Collection
 * @author bcolucci <bcolucci@crakmedia.com>
 */
class ParameterCollection extends TypedCollection
{
    const CLASS_NAME = __CLASS__;

    /**
     * @param array $parameters = []
     */
    public function __construct(array $parameters = [])
    {
        parent::__construct(ParameterInterface::INTERFACE_NAME, $parameters);
    }
} 