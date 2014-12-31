<?php
/**
 * This file is property of crakmedia (http://crakmedia.com)
 * Created by Brice Colucci <bcolucci@crakmedia.com>
 * @copyright 2014 Crakmedia
 */

namespace Crak\Component\RestNormalizer\Builder;

use Bcol\Component\Type\Boolean;
use Bcol\Component\Type\NonEmptyString;
use Bcol\Component\Type\StrictPositiveInteger;
use Crak\Component\RestNormalizer\Builder\Data\DataBuilder;
use Crak\Component\RestNormalizer\Collection\ErrorCollection;
use Crak\Component\RestNormalizer\Data;
use Crak\Component\RestNormalizer\ErrorInterface;
use Crak\Component\RestNormalizer\Exception\ResponseBuilderException;
use Crak\Component\RestNormalizer\HttpMethod;
use Crak\Component\RestNormalizer\Response;

/**
 * Class ErrorResponseBuilder
 * @package Crak\Component\RestNormalizer\Builder
 * @author bcolucci <bcolucci@crakmedia.com>
 */
final class ErrorResponseBuilder extends ResponseBuilder implements ErrorResponseBuilderInterface
{
    const CLASS_NAME = __CLASS__;

    /**
     * @var StrictPositiveInteger
     */
    private $errorCode;

    /**
     * @var ErrorCollection
     */
    private $errors;

    /**
     * @param DataBuilder $dataBuilder
     * @param NonEmptyString $apiVersion
     * @param HttpMethod $httpMethod
     * @param StrictPositiveInteger $errorCode
     */
    public function __construct(
        DataBuilder $dataBuilder,
        NonEmptyString $apiVersion,
        HttpMethod $httpMethod,
        StrictPositiveInteger $errorCode
    )
    {
        parent::__construct($dataBuilder, $apiVersion, $httpMethod);

        $this->errorCode = $errorCode;
        $this->errors = new ErrorCollection();
    }

    /**
     * @param ErrorInterface $error
     * @return ErrorResponseBuilderInterface
     */
    public function addError(ErrorInterface $error)
    {
        $this->errors->add($error);
        return $this;
    }

    /**
     * @param ErrorCollection $errors
     * @return ErrorResponseBuilderInterface
     */
    public function addErrors(ErrorCollection $errors)
    {
        foreach ($errors as $error) {
            $this->errors->add($error);
        }
    }

    /**
     * @inheritdoc
     * @throws ResponseBuilderException
     */
    public function build()
    {
        $response = new Response(
            $this->getHttpMethod(),
            $this->getApiVersion(),
            new Boolean(true),
            $this->errorCode,
            $this->errors,
            $this->getParameters(),
            new Data()
        );

        return $this->getDataBuilder()->build($response);
    }

    /**
     * @param DataBuilder $dataBuilder
     * @param string $apiVersion
     * @param HttpMethod $httpMethod
     * @param int $errorCode
     * @return ErrorResponseBuilder
     */
    public static function create(DataBuilder $dataBuilder,
                                  $apiVersion,
                                  HttpMethod $httpMethod,
                                  $errorCode)
    {
        return new self(
            $dataBuilder,
            new NonEmptyString($apiVersion),
            $httpMethod,
            new StrictPositiveInteger($errorCode)
        );
    }
}