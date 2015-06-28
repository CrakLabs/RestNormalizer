<?php
/**
 * This file is property of crakmedia (http://crakmedia.com)
 * Created by Brice Colucci <bcolucci@crakmedia.com>
 * @copyright 2014 Crakmedia
 */

namespace Crak\Component\RestNormalizer\Parser;

use Crak\Component\RestNormalizer\Data;
use Crak\Component\RestNormalizer\Error;
use Crak\Component\RestNormalizer\Exception\ResponseParserException;
use Crak\Component\RestNormalizer\HttpErrorCode;
use Crak\Component\RestNormalizer\HttpMethod;
use Crak\Component\RestNormalizer\Parameter;
use Crak\Component\RestNormalizer\ParameterInterface;
use Crak\Component\RestNormalizer\Response;
use Crak\Component\RestNormalizer\ResponseInterface;
use Star\Component\Collection\TypedCollection;

/**
 * Class ResponseParser
 * @package Crak\Component\RestNormalizer\Parser
 * @author bcolucci <bcolucci@crakmedia.com>
 */
class ResponseParser implements ResponseParserInterface
{
    const CLASS_NAME = __CLASS__;

    /**
     * @inheritdoc
     */
    public function parse($json)
    {
        $stdObj = json_decode($json);
        $jsonErrorCode = json_last_error();
        if ($jsonErrorCode !== JSON_ERROR_NONE) {
            throw new ResponseParserException('JSON error (' . $jsonErrorCode . ')');
        }

        $isError = isset($stdObj->errors);
        if ($isError) {
            return $this->buildErrorResponse($stdObj);
        }

        return $this->buildSuccessResponse($stdObj);
    }

    /**
     * @param \stdClass $stdObj
     * @return ResponseInterface
     * @throws ResponseParserException
     */
    private function buildErrorResponse(\stdClass $stdObj)
    {
        $errorCode = HttpErrorCode::valueOf((int)$stdObj->code);
        if (is_null($errorCode)) {
            throw new ResponseParserException('Invalid HttpErrorCode: ' . $stdObj->code);
        }
        if (!is_array($stdObj->errors)) {
            throw new ResponseParserException('Error array expected');
        }
        if (!count($stdObj->errors)) {
            throw new ResponseParserException('No error found');
        }

        $errors = [];
        foreach ($stdObj->errors as $error) {
            $errors[] = Error::create($error->message, $error->reason, $error->location);
        }

        return Response::create(
            $this->getHttpMethod($stdObj),
            $stdObj->apiVersion,
            true,
            $errorCode,
            $errors,
            $this->getParameters($stdObj)
        );
    }

    /**
     * @param \stdClass $stdObj
     * @return ResponseInterface
     * @throws ResponseParserException
     */
    private function buildSuccessResponse(\stdClass $stdObj)
    {
        if (!isset($stdObj->data)) {
            throw new ResponseParserException('Data expected');
        }
        if (!is_array($stdObj->data->items)) {
            throw new ResponseParserException('Expected Data>Item array');
        }

        $data = new Data(new TypedCollection('\stdClass', $stdObj->data->items));

        return Response::create(
            $this->getHttpMethod($stdObj),
            $stdObj->apiVersion,
            false,
            null,
            null,
            $this->getParameters($stdObj),
            $data
        );
    }

    /**
     * @param \stdClass $stdObj
     * @return ParameterInterface[]
     * @throws ResponseParserException
     */
    private function getParameters(\stdClass $stdObj)
    {
        $params = [];
        if (!isset($stdObj->params)) {
            throw new ResponseParserException('Parameter array expected');
        }
        foreach ($stdObj->params as $id => $values) {
            if (!is_array($values)) {
                $values = [$values];
            }
            $params[] = Parameter::create($id, $values);
        }
        return $params;
    }

    /**
     * @param \stdClass $stdObj
     * @return HttpMethod
     * @throws ResponseParserException
     */
    private function getHttpMethod(\stdClass $stdObj)
    {
        $method = HttpMethod::valueOf($stdObj->method);
        if (is_null($method)) {
            throw new ResponseParserException('Invalid HttpMethod: ' . $stdObj->method);
        }
        return $method;
    }
}
