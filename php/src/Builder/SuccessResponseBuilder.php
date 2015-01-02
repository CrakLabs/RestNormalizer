<?php
/**
 * This file is property of crakmedia (http://crakmedia.com)
 * Created by Brice Colucci <bcolucci@crakmedia.com>
 * @copyright 2014 Crakmedia
 */

namespace Crak\Component\RestNormalizer\Builder;

use Bcol\Component\Type\NonEmptyString;
use Crak\Component\RestNormalizer\Builder\Data\SuccessDataBuilder;
use Crak\Component\RestNormalizer\HttpMethod;
use Crak\Component\RestNormalizer\Response;

/**
 * Class SuccessResponseBuilder
 * @package Crak\Component\RestNormalizer\Builder
 * @author bcolucci <bcolucci@crakmedia.com>
 */
final class SuccessResponseBuilder extends AbstractResponseBuilder implements SuccessResponseBuilderInterface
{
    const CLASS_NAME = __CLASS__;

    use SuccessResponseBuilderTrait;

    /**
     * @param SuccessDataBuilder $dataBuilder
     * @param NonEmptyString $apiVersion
     * @param HttpMethod $httpMethod
     * @param NonEmptyString $itemsType = null
     */
    public function __construct(
        SuccessDataBuilder $dataBuilder,
        NonEmptyString $apiVersion,
        HttpMethod $httpMethod,
        NonEmptyString $itemsType = null
    )
    {
        parent::__construct($dataBuilder, $apiVersion, $httpMethod);
        $this->initSuccessTrait($itemsType);
    }

    /**
     * @inheritdoc
     */
    public function build()
    {
        $response = Response::create(
            $this->getHttpMethod(),
            $this->getApiVersion(),
            false,
            null,
            null,
            $this->getParameters(),
            $this->data
        );
        return $this->getDataBuilder()->build($response);
    }

    /**
     * @param SuccessDataBuilder $dataBuilder
     * @param string $apiVersion
     * @param HttpMethod $httpMethod
     * @param string $itemsType
     * @return SuccessResponseBuilder
     */
    public static function create(
        SuccessDataBuilder $dataBuilder,
        $apiVersion,
        HttpMethod $httpMethod,
        $itemsType = null
    )
    {
        if ($itemsType) {
            $itemsType = new NonEmptyString($itemsType);
        }

        return new self(
            $dataBuilder,
            new NonEmptyString($apiVersion),
            $httpMethod,
            $itemsType
        );
    }
}
