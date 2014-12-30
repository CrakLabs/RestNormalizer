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
class ErrorDataBuilder
{
    /**
     * @param ResponseInterface $response
     * @param \stdClass $data
     * @throws ResponseBuilderException
     */
    public function build(ResponseInterface $response, \stdClass $data)
    {
        if ($response->getErrors()->count() <= 0) {
            throw new ResponseBuilderException('One error at least is required in order to build a restful error');
        }

        $data->code = $response->getErrorCode()->getValue();
        $data->message = $response->getErrors()->first()->getMessage();

        $data->errors = [];

        /** @var ErrorInterface $error */
        foreach ($response->getErrors() as $error) {
            $errorData = new \stdClass();
            $errorData->message = $error->getMessage();
            $errorData->reason = $error->getReason();
            $data->errors[] = $errorData;
        }
    }
} 