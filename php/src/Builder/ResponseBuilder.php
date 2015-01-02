<?php
/**
 * This file is property of crakmedia (http://crakmedia.com)
 * Created by Brice Colucci <bcolucci@crakmedia.com>
 * @copyright 2014 Crakmedia
 */

namespace Crak\Component\RestNormalizer\Builder;

use Bcol\Component\Type\NonEmptyString;
use Crak\Component\RestNormalizer\Builder\Data\ErrorDataBuilder;
use Crak\Component\RestNormalizer\Builder\Data\ResponseDataBuilder;
use Crak\Component\RestNormalizer\Builder\Data\SuccessDataBuilder;
use Crak\Component\RestNormalizer\Exception\ResponseBuilderException;
use Crak\Component\RestNormalizer\HttpErrorCode;
use Crak\Component\RestNormalizer\HttpMethod;
use Crak\Component\RestNormalizer\Response;

/**
 * Class ResponseBuilder
 * @package Crak\Component\RestNormalizer\Builder
 * @author bcolucci <bcolucci@crakmedia.com>
 */
class ResponseBuilder implements SuccessResponseBuilderInterface, ErrorResponseBuilderInterface
{
    const RESPONSE_BUILDER_CLASS_NAME = __CLASS__;

    use ResponseBuilderTrait;
    use SuccessResponseBuilderTrait;
    use ErrorResponseBuilderTrait;

    /**
     * @param NonEmptyString $apiVersion
     * @param HttpMethod $httpMethod
     * @param NonEmptyString $itemsType = null
     */
    public function __construct(
        NonEmptyString $apiVersion,
        HttpMethod $httpMethod,
        NonEmptyString $itemsType = null
    )
    {
        $this->initBuilder($apiVersion, $httpMethod);
        $this->initSuccessTrait($itemsType);
        $this->initErrorTrait();
    }

    /**
     * @param HttpErrorCode $httpErrorCode
     */
    public function setHttpErrorCode($httpErrorCode)
    {
        if (!$this->httpErrorCode) {
            $this->httpErrorCode = $httpErrorCode;
        }
    }

    /**
     * @inheritdoc
     * @throws ResponseBuilderException
     */
    public function build()
    {
        if ($this->isError()) {

            if (!$this->httpErrorCode) {
                throw new ResponseBuilderException('HttpErrorCode is required for an Error');
            }
            if (!count($this->errors)) {
                throw new ResponseBuilderException('No error found');
            }

            return $this->buildError();
        }

        return $this->buildSuccess();
    }

    /**
     * @return \stdClass
     */
    private function buildError()
    {
        return (new ErrorDataBuilder())
            ->build(
                Response::create(
                    $this->getHttpMethod(),
                    $this->getApiVersion(),
                    true,
                    $this->httpErrorCode,
                    $this->errors,
                    $this->getParameters()
                ));
    }

    /**
     * @return \stdClass
     */
    private function buildSuccess()
    {
        return (new SuccessDataBuilder())
            ->build(
                Response::create(
                    $this->getHttpMethod(),
                    $this->getApiVersion(),
                    false,
                    null,
                    null,
                    $this->getParameters(),
                    $this->data
                ));
    }

    /**
     * @return bool
     */
    public function isError()
    {
        return $this->httpErrorCode || count($this->errors);
    }

    /**
     * @param string $apiVersion
     * @param HttpMethod $httpMethod
     * @param string $itemsType = null
     * @return ResponseBuilder
     */
    public static function create($apiVersion, HttpMethod $httpMethod, $itemsType = null)
    {
        if ($itemsType) {
            $itemsType = new NonEmptyString($itemsType);
        }

        return new self(new NonEmptyString($apiVersion), $httpMethod, $itemsType);
    }
}
