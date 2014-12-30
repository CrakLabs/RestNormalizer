<?php
/**
 * This file is property of crakmedia (http://crakmedia.com)
 * Created by Brice Colucci <bcolucci@crakmedia.com>
 * @copyright 2014 Crakmedia
 */

namespace Crak\Component\RestNormalizer\Builder;

use Bcol\Component\Type\NonEmptyString;
use Bcol\Component\Type\StrictPositiveInteger;
use Crak\Component\RestNormalizer\Collection\ErrorCollection;
use Crak\Component\RestNormalizer\ErrorInterface;
use Crak\Component\RestNormalizer\Exception\ResponseBuilderException;
use Crak\Component\RestNormalizer\HttpMethod;

/**
 * Class ErrorResponseBuilder
 * @package Crak\Component\RestNormalizer\Builder
 * @author bcolucci <bcolucci@crakmedia.com>
 */
final class ErrorResponseBuilder extends ResponseBuilder implements ErrorResponseBuilderInterface
{
    /**
     * @var StrictPositiveInteger
     */
    private $errorCode;

    /**
     * @var ErrorCollection
     */
    private $errors;

    /**
     * @param NonEmptyString $apiVersion
     * @param HttpMethod $httpMethod
     * @param StrictPositiveInteger $errorCode
     */
    public function __construct(
        NonEmptyString $apiVersion,
        HttpMethod $httpMethod,
        StrictPositiveInteger $errorCode
    )
    {
        parent::__construct($apiVersion, $httpMethod);

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
        //TODO
    }
}