<?php
/**
 * This file is property of crakmedia (http://crakmedia.com)
 * Created by Brice Colucci <bcolucci@crakmedia.com>
 * @copyright 2014 Crakmedia
 */

namespace Crak\Component\RestNormalizer\Builder;

use Crak\Component\RestNormalizer\ResponseInterface;

/**
 * Interface ResponseBuilderInterface
 * @package Crak\Component\RestNormalizer\Builder
 * @author bcolucci <bcolucci@crakmedia.com>
 */
interface ResponseBuilderInterface
{
    /**
     * @return ResponseInterface
     */
    public function build();
} 