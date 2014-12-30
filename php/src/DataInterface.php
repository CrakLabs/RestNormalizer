<?php
/**
 * This file is property of crakmedia (http://crakmedia.com)
 * Created by Brice Colucci <bcolucci@crakmedia.com>
 * @copyright 2014 Crakmedia
 */

namespace Crak\Component\RestNormalizer;

use Bcol\Component\Type\PositiveInteger;
use Star\Component\Collection\TypedCollection;

/**
 * Interface DataInterface
 * @package Crak\Component\RestNormalizer
 * @author bcolucci <bcolucci@crakmedia.com>
 */
interface DataInterface
{
    const INTERFACE_NAME = __CLASS__;

    /**
     * @return TypedCollection
     */
    public function getItems();

    /**
     * @return PositiveInteger
     */
    public function getTotalItems();
} 