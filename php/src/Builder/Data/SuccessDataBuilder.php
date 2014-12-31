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
 * Class SuccessDataBuilder
 * @package Crak\Component\RestNormalizer\Builder\Data
 * @author bcolucci <bcolucci@crakmedia.com>
 */
class SuccessDataBuilder implements DataBuilder
{
    const INTERFACE_NAME = __CLASS__;

    use ResponseDataBuilder;

    /**
     * @inheritdoc
     * @throws ResponseBuilderException
     */
    public function build(ResponseInterface $response)
    {
        $data = $this->buildData($response);

        $data->data = new \stdClass();

        $data->data->items = [];
        foreach ($response->getData()->getItems() as $item) {
            $data->data->items[] = $item;
        }

        $data->data->totalItems = $response->getData()->getTotalItems()->getValue();

        return $data;
    }
} 