<?php
/**
 * This file is property of crakmedia (http://crakmedia.com)
 * Created by Brice Colucci <bcolucci@crakmedia.com>
 * @copyright 2014 Crakmedia
 */

namespace Crak\Component\RestNormalizer;

use Bcol\Component\Type\Boolean;
use Bcol\Component\Type\NonEmptyString;
use Bcol\Component\Type\StrictPositiveInteger;
use Crak\Component\RestNormalizer\Type\ErrorCollection;
use Crak\Component\RestNormalizer\Type\ParameterCollection;

/**
 * Class Response
 * @package Crak\Component\RestNormalizer
 * @author bcolucci <bcolucci@crakmedia.com>
 */
class Response implements ResponseInterface
{
    /**
     * @var HttpCode
     */
    private $httpCode;

    /**
     * @var NonEmptyString
     */
    private $apiVersion;

    /**
     * @var Boolean
     */
    private $isError;

    /**
     * @var StrictPositiveInteger
     */
    private $errorCode;

    /**
     * @var NonEmptyString
     */
    private $errorMessage;

    /**
     * @var ErrorCollection
     */
    private $errors;

    /**
     * @var ParameterCollection
     */
    private $parameters;

    /**
     * @var DataInterface
     */
    private $data;

    /**
     * @param HttpCode $httpCode
     * @param NonEmptyString $apiVersion
     * @param Boolean $isError
     * @param StrictPositiveInteger $errorCode
     * @param NonEmptyString $errorMessage
     * @param ErrorCollection $errors
     * @param ParameterCollection $parameters
     * @param DataInterface $data
     */
    function __construct(
        HttpCode $httpCode,
        NonEmptyString $apiVersion,
        Boolean $isError,
        StrictPositiveInteger $errorCode,
        NonEmptyString $errorMessage,
        ErrorCollection $errors,
        ParameterCollection $parameters,
        DataInterface $data
    )
    {
        $this->httpCode = $httpCode;
        $this->apiVersion = $apiVersion;
        $this->isError = $isError;
        $this->errorCode = $errorCode;
        $this->errorMessage = $errorMessage;
        $this->errors = $errors;
        $this->parameters = $parameters;
        $this->data = $data;
    }

    /**
     * @return NonEmptyString
     */
    public function getApiVersion()
    {
        return $this->apiVersion;
    }

    /**
     * @return DataInterface
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @return StrictPositiveInteger
     */
    public function getErrorCode()
    {
        return $this->errorCode;
    }

    /**
     * @return NonEmptyString
     */
    public function getErrorMessage()
    {
        return $this->errorMessage;
    }

    /**
     * @return ErrorCollection
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * @return HttpCode
     */
    public function getHttpCode()
    {
        return $this->httpCode;
    }

    /**
     * @return boolean
     */
    public function isError()
    {
        return $this->isError;
    }

    /**
     * @return ParameterCollection
     */
    public function getParameters()
    {
        return $this->parameters;
    }
}