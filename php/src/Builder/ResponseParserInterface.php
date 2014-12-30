<?php
/**
 * This file is property of crakmedia (http://crakmedia.com)
 * Created by Brice Colucci <bcolucci@crakmedia.com>
 * @copyright 2014 Crakmedia
 */

namespace Crak\Component\RestNormalizer\Builder;

use Bcol\Component\Type\String;
use Crak\Component\RestNormalizer\ResponseInterface;

/**
 * Interface ResponseParserInterface
 * @package Crak\Component\RestNormalizer\Builder
 * @author bcolucci <bcolucci@crakmedia.com>
 */
interface ResponseParserInterface
{
    /**
     * @param String $json
     * @return ResponseInterface
     */
    public function parse(String $json);
} 