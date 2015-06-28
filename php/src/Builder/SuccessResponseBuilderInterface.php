<?php
/**
 * This file is property of crakmedia (http://crakmedia.com)
 * Created by Brice Colucci <bcolucci@crakmedia.com>
 * @copyright 2014 Crakmedia
 */

namespace Crak\Component\RestNormalizer\Builder;

/**
 * Interface SuccessResponseBuilderInterface
 * @package Crak\Component\RestNormalizer\Builder
 * @author bcolucci <bcolucci@crakmedia.com>
 */
interface SuccessResponseBuilderInterface extends ResponseBuilderInterface
{
    const SUCCESS_BUILDER_INTERFACE_NAME = __CLASS__;

    /**
     * @param mixed $serializableObject
     * @return SuccessResponseBuilderInterface
     */
    public function addItem($serializableObject);

    /**
     * @param $serializableObjects
     * @return SuccessResponseBuilderInterface
     */
    public function addItems(array $serializableObjects);
} 
