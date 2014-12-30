<?php
/**
 * This file is property of crakmedia (http://crakmedia.com)
 * Created by Brice Colucci <bcolucci@crakmedia.com>
 * @copyright 2014 Crakmedia
 */

namespace Crak\Component\RestNormalizer\Builder;

use Crak\Component\RestNormalizer\Collection\ParameterCollection;
use Crak\Component\RestNormalizer\Exception\ResponseBuilderException;
use Crak\Component\RestNormalizer\ParameterInterface;
use Star\Component\Collection\TypedCollection;

/**
 * Class SuccessResponseBuilder
 * @package Crak\Component\RestNormalizer\Builder
 * @author bcolucci <bcolucci@crakmedia.com>
 */
final class SuccessResponseBuilder extends ResponseBuilder implements SuccessResponseBuilderInterface
{
    //TODO constructor

    /**
     * @param ParameterInterface $parameter
     * @return SuccessResponseBuilderInterface
     */
    public function addParameter(ParameterInterface $parameter)
    {
        // TODO: Implement addParameter() method.
    }

    /**
     * @param ParameterCollection $parameters
     * @return SuccessResponseBuilderInterface
     */
    public function addParameters(ParameterCollection $parameters)
    {
        // TODO: Implement addParameters() method.
    }

    /**
     * @param object $serializableObject
     * @return SuccessResponseBuilderInterface
     */
    public function addItem($serializableObject)
    {
        // TODO: Implement addItem() method.
    }

    /**
     * @param TypedCollection $serializableObjects
     * @return SuccessResponseBuilderInterface
     */
    public function addItems(TypedCollection $serializableObjects)
    {
        // TODO: Implement addItems() method.
    }

    /**
     * @inheritdoc
     * @throws ResponseBuilderException
     */
    public function build()
    {
        //TODO
    }
}