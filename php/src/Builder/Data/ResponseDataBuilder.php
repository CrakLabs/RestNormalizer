<?php
/**
 * This file is property of crakmedia (http://crakmedia.com)
 * Created by Brice Colucci <bcolucci@crakmedia.com>
 * @copyright 2014 Crakmedia
 */

namespace Crak\Component\RestNormalizer\Builder\Data;

use Crak\Component\RestNormalizer\Exception\ResponseBuilderException;
use Crak\Component\RestNormalizer\ParameterInterface;
use Crak\Component\RestNormalizer\ResponseInterface;

/**
 * Trait ResponseDataBuilder
 * @package Crak\Component\RestNormalizer\Builder\Data
 * @author bcolucci <bcolucci@crakmedia.com>
 */
trait ResponseDataBuilder
{
    /**
     * @param ResponseInterface $response
     * @return \stdClass
     *
     * @throws ResponseBuilderException
     */
    public function buildData(ResponseInterface $response)
    {
        $data = new \stdClass();
        $data->apiVersion = $response->getApiVersion()->getValue();
        $data->method = $response->getHttpMethod()->getValue();

        $data->params = new \stdClass();
        /** @var ParameterInterface $parameter */
        foreach ($response->getParameters() as $parameter) {
            $data->params->{$parameter->getId()} = $parameter->getValue();
        }

        return $data;
    }
} 