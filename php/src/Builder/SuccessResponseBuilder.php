<?php
/**
 * This file is property of crakmedia (http://crakmedia.com)
 * Created by Brice Colucci <bcolucci@crakmedia.com>
 * @copyright 2014 Crakmedia
 */

namespace Crak\Component\RestNormalizer\Builder;

use Bcol\Component\Type\Boolean;
use Bcol\Component\Type\NonEmptyString;
use Crak\Component\RestNormalizer\Builder\Data\DataBuilder;
use Crak\Component\RestNormalizer\Collection\ParameterCollection;
use Crak\Component\RestNormalizer\Data;
use Crak\Component\RestNormalizer\DataInterface;
use Crak\Component\RestNormalizer\HttpMethod;
use Crak\Component\RestNormalizer\Response;
use Star\Component\Collection\TypedCollection;

/**
 * Class SuccessResponseBuilder
 * @package Crak\Component\RestNormalizer\Builder
 * @author bcolucci <bcolucci@crakmedia.com>
 */
final class SuccessResponseBuilder extends ResponseBuilder implements SuccessResponseBuilderInterface
{
    const CLASS_NAME = __CLASS__;

    /**
     * @var DataInterface
     */
    private $data;

    /**
     * @param DataBuilder $dataBuilder
     * @param NonEmptyString $apiVersion
     * @param HttpMethod $httpMethod
     * @param NonEmptyString $itemsType
     */
    public function __construct(
        DataBuilder $dataBuilder,
        NonEmptyString $apiVersion,
        HttpMethod $httpMethod,
        NonEmptyString $itemsType
    )
    {
        parent::__construct($dataBuilder, $apiVersion, $httpMethod);

        $this->data = new Data(new TypedCollection($itemsType));
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
    public function addItems(TypedCollection $serializableObjects)
    {
        foreach ($serializableObjects as $serializableObject) {
            $this->data->getItems()->add($serializableObject);
        }
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function build(ParameterCollection $parameters = null)
    {
        $response = new Response(
            $this->getHttpMethod(),
            $this->getApiVersion(),
            new Boolean(false),
            null,
            null,
            $parameters,
            $this->data
        );
        return $this->getDataBuilder()->build($response);
    }
}