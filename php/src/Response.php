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
use Crak\Component\RestNormalizer\Collection\ErrorCollection;
use Crak\Component\RestNormalizer\Collection\ParameterCollection;

/**
 * Class Response
 * @package Crak\Component\RestNormalizer
 * @author bcolucci <bcolucci@crakmedia.com>
 */
class Response implements ResponseInterface
{
    const CLASS_NAME = __CLASS__;

    /**
     * @var HttpMethod
     */
    private $httpMethod;

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
     * @param HttpMethod $httpMethod
     * @param NonEmptyString $apiVersion
     * @param Boolean $isError
     * @param StrictPositiveInteger $errorCode
     * @param ErrorCollection $errors
     * @param ParameterCollection $parameters
     * @param DataInterface $data
     */
    function __construct(
        HttpMethod $httpMethod,
        NonEmptyString $apiVersion,
        Boolean $isError,
        StrictPositiveInteger $errorCode,
        ErrorCollection $errors,
        ParameterCollection $parameters,
        DataInterface $data
    )
    {
        $this->httpMethod = $httpMethod;
        $this->apiVersion = $apiVersion;
        $this->isError = $isError;
        $this->errorCode = $errorCode;
        $this->errors = $errors;
        $this->parameters = $parameters;
        $this->data = $data;
    }

    /**
     * @inheritdoc
     */
    public function getApiVersion()
    {
        return $this->apiVersion;
    }

    /**
     * @inheritdoc
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @inheritdoc
     */
    public function getErrorCode()
    {
        return $this->errorCode;
    }

    /**
     * @inheritdoc
     */
    public function getErrorMessage()
    {
        if ($this->errors && $this->errors->count() > 0) {
            /** @var Error $firstError */
            $firstError = $this->errors->first();
            return $firstError->getMessage();
        }
        return '';
    }

    /**
     * @inheritdoc
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * @inheritdoc
     */
    public function getHttpMethod()
    {
        return $this->httpMethod;
    }

    /**
     * @inheritdoc
     */
    public function isError()
    {
        return $this->isError;
    }

    /**
     * @inheritdoc
     */
    public function getParameters()
    {
        return $this->parameters;
    }

    /**
     * @param HttpMethod $httpMethod
     * @param string $apiVersion
     * @param boolean $isError
     * @param int|StrictPositiveInteger $errorCode = null
     * @param ErrorInterface[]|ErrorCollection $errors = null
     * @param ParameterInterface[]|ParameterCollection $parameters = null
     * @param DataInterface $data = null
     * @return Response
     */
    public static function create(
        HttpMethod $httpMethod,
        $apiVersion,
        $isError,
        $errorCode = null,
        $errors = null,
        $parameters = null,
        DataInterface $data = null
    )
    {
        if (is_null($errors)) {
            $errors = new ErrorCollection();
        } else if (is_array($errors)) {
            $errors = new ErrorCollection($errors);
        }

        if (is_null($parameters)) {
            $parameters = new ParameterCollection();
        } else if (is_array($errors)) {
            $parameters = new ParameterCollection($parameters);
        }

        return new self(
            $httpMethod,
            new NonEmptyString($apiVersion),
            new Boolean($isError),
            $errorCode ? new StrictPositiveInteger($errorCode) : null,
            $errors,
            $parameters,
            $data ? $data : new Data()
        );
    }
}