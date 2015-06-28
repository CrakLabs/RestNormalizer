<?php
/**
 * This file is property of crakmedia (http://crakmedia.com)
 * Created by Brice Colucci <bcolucci@crakmedia.com>
 * @copyright 2014 Crakmedia
 */

namespace Crak\Component\RestNormalizer\Builder\Data;

use Crak\Component\RestNormalizer\ResponseInterface;

/**
 * Class SuccessDataBuilder
 * @package Crak\Component\RestNormalizer\Builder\Data
 * @author bcolucci <bcolucci@crakmedia.com>
 */
interface DataBuilder
{
    const BUILDER_INTERFACE_NAME = __CLASS__;

    /**
     * @param ResponseInterface $response
     * @return \stdClass
     */
    public function build(ResponseInterface $response);
} 
