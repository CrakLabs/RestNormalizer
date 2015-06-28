<?php
/**
 * This file is property of crakmedia (http://crakmedia.com)
 * Created by Brice Colucci <bcolucci@crakmedia.com>
 * @copyright 2014 Crakmedia
 */

namespace Crak\Component\RestNormalizer\Builder\Data;

use Crak\Component\RestNormalizer\ErrorInterface;
use Crak\Component\RestNormalizer\Exception\ResponseBuilderException;
use Crak\Component\RestNormalizer\ResponseInterface;

/**
 * Class ErrorResponseBuilder
 * @package Crak\Component\RestNormalizer\Builder\Data
 * @author bcolucci <bcolucci@crakmedia.com>
 */
class ErrorDataBuilder implements DataBuilder
{
    const INTERFACE_NAME = __CLASS__;

    use ResponseDataBuilder;

    /**
     * @inheritdoc
     * @throws ResponseBuilderException
     */
    public function build(ResponseInterface $response)
    {
        if ($response->getErrors()->count() <= 0) {
            throw new ResponseBuilderException('One error at least is required in order to build a restful error');
        }

        $data = $this->buildData($response);
        $data->code = $response->getHttpErrorCode()->getValue();
        $data->message = $response->getErrors()->first()->getMessage()->getValue();

        $data->errors = [];

        /** @var ErrorInterface $error */
        foreach ($response->getErrors() as $error) {
            $errorData = new \stdClass();
            $errorData->message = $error->getMessage()->getValue();
            $errorData->reason = $error->getReason()->getValue();
            $errorData->location = $error->getLocation()->getValue();
            $data->errors[] = $errorData;
        }

        return $data;
    }
} 
