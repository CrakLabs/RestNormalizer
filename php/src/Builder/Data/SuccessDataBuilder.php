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
 * Class SuccessDataBuilder
 * @package Crak\Component\RestNormalizer\Builder\Data
 * @author bcolucci <bcolucci@crakmedia.com>
 */
class SuccessDataBuilder
{
    /**
     * @param ResponseInterface $response
     * @param \stdClass $data
     * @throws ResponseBuilderException
     */
    public function build(ResponseInterface $response, \stdClass $data)
    {

    }
} 