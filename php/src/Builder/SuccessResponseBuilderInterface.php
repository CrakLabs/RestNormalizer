<?php
/**
 * This file is property of crakmedia (http://crakmedia.com)
 * Created by Brice Colucci <bcolucci@crakmedia.com>
 * @copyright 2014 Crakmedia
 */

namespace Crak\Component\RestNormalizer\Builder;

use Crak\Component\RestNormalizer\ParameterInterface;
use Crak\Component\RestNormalizer\Collection\ParameterCollection;
use Star\Component\Collection\TypedCollection;

/**
 * Interface SuccessResponseBuilderInterface
 * @package Crak\Component\RestNormalizer\Builder
 * @author bcolucci <bcolucci@crakmedia.com>
 */
interface SuccessResponseBuilderInterface
{
    /**
     * @param ParameterInterface $parameter
     * @return SuccessResponseBuilderInterface
     */
    public function addParameter(ParameterInterface $parameter);

    /**
     * @param ParameterCollection $parameters
     * @return SuccessResponseBuilderInterface
     */
    public function addParameters(ParameterCollection $parameters);

    /**
     * @param object $serializableObject
     * @return SuccessResponseBuilderInterface
     */
    public function addItem($serializableObject);

    /**
     * @param TypedCollection $serializableObjects
     * @return SuccessResponseBuilderInterface
     */
    public function addItems(TypedCollection $serializableObjects);
} 