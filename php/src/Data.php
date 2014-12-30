<?php
/**
 * Created by bcolucci <bcolucci@crakmedia.com>
 */

namespace Crak\Component\RestNormalizer;

use Bcol\Component\Type\PositiveInteger;
use Star\Component\Collection\TypedCollection;

/**
 * Class Data
 * @package Crak\Component\RestNormalizer
 * @author bcolucci <bcolucci@crakmedia.com>
 */
class Data implements DataInterface
{
    const CLASS_NAME = __CLASS__;

    /**
     * @var TypedCollection
     */
    private $items;

    /**
     * @param TypedCollection $items
     */
    public function __construct(TypedCollection $items)
    {
        $this->items = $items;
    }

    /**
     * @inheritdoc
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @inheritdoc
     */
    public function getTotalItems()
    {
        return new PositiveInteger($this->items->count());
    }
}