<?php
/**
 * This file is property of crakmedia (http://crakmedia.com)
 * Created by Brice Colucci <bcolucci@crakmedia.com>
 * @copyright 2014 Crakmedia
 */

namespace Crak\Component\RestNormalizer\Builder\Data;

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
     * @throws Crak\Component\RestNormalizer\Exception\ResponseBuilderException
     */
    public function buildData(ResponseInterface $response)
    {
        $data = new \stdClass();
        $data->apiVersion = $response->getApiVersion()->getValue();
        $data->method = $response->getHttpMethod()->getValue();

        $data->params = new \stdClass();
        /** @var Crak\Component\RestNormalizer\ParameterInterface $parameter */
        foreach ($response->getParameters() as $parameter) {
            $values = $parameter->getValues();
            $nbValues = count($values);

            $plainValues = null;
            if ($nbValues === 1) {
                $plainValues = $values->first()->getValue();
            } else if ($nbValues > 1) {
                foreach ($values as $value) {
                    $plainValues[] = $value->getValue();
                }
            }

            $data->params->{$parameter->getId()->getValue()} = $plainValues;
        }

        return $data;
    }
} 
