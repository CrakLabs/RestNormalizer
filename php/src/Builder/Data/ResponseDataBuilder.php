<?php
/**
 * This file is property of crakmedia (http://crakmedia.com)
 * Created by Brice Colucci <bcolucci@crakmedia.com>
 * @copyright 2014 Crakmedia
 */

namespace Crak\Component\RestNormalizer\Builder\Data;

use Crak\Component\RestNormalizer\Exception\ResponseBuilderException;
use Crak\Component\RestNormalizer\ResponseInterface;

/**
 * Class ResponseDataBuilder
 * @package Crak\Component\RestNormalizer\Builder\Data
 * @author bcolucci <bcolucci@crakmedia.com>
 */
class ResponseDataBuilder
{
    /**
     * @var SuccessDataBuilder
     */
    private $successDataBuilder;

    /**
     * @var ErrorDataBuilder
     */
    private $errorDataBuilder;

    /**
     * @param SuccessDataBuilder $successDataBuilder
     * @param ErrorDataBuilder $errorDataBuilder
     */
    public function __construct(SuccessDataBuilder $successDataBuilder, ErrorDataBuilder $errorDataBuilder)
    {
        $this->successDataBuilder = $successDataBuilder;
        $this->errorDataBuilder = $errorDataBuilder;
    }

    /**
     * @param ResponseInterface $response
     * @return \stdClass
     *
     * @throws ResponseBuilderException
     */
    public function build(ResponseInterface $response)
    {
        $data = new \stdClass();
        $data->apiVersion = $response->getApiVersion()->getValue();
        $data->method = $response->getHttpMethod()->getValue();

        if ($response->isError()) {
            $this->errorDataBuilder->build($response, $data);
        } else {
            $this->successDataBuilder->build($response, $data);
        }

        return $data;
    }
} 