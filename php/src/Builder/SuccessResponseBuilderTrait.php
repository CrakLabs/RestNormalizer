<?php
/**
 * This file is property of crakmedia (http://crakmedia.com)
 * Created by Brice Colucci <bcolucci@crakmedia.com>
 * @copyright 2014 Crakmedia
 */

namespace Crak\Component\RestNormalizer\Builder;

use Bcol\Component\Type\NonEmptyString;
use Crak\Component\RestNormalizer\Data;
use Star\Component\Collection\TypedCollection;

/**
 * Class SuccessResponseBuilderTrait
 * @package Crak\Component\RestNormalizer\Builder
 * @author bcolucci <bcolucci@crakmedia.com>
 */
trait SuccessResponseBuilderTrait
{
    /**
     * @var Data
     */
    protected $data;

    /**
     * @param NonEmptyString $itemsType = null
     */
    protected function initSuccessTrait(NonEmptyString $itemsType = null)
    {
        if (!$itemsType) {
            $itemsType = new NonEmptyString('\stdClass');
        }

        $this->data = new Data(new TypedCollection($itemsType->getValue()));
    }

    /**
     * @inheritdoc
     */
    public function addItem($serializableObject)
    {
        $this->data->getItems()->add($serializableObject);
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function addItems(array $serializableObjects)
    {
        foreach ($serializableObjects as $serializableObject) {
            $this->data->getItems()->add($serializableObject);
        }
        return $this;
    }
}