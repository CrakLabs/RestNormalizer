<?php
/**
 * This file is property of crakmedia (http://crakmedia.com)
 * Created by Brice Colucci <bcolucci@crakmedia.com>
 * @copyright 2014 Crakmedia
 */

namespace Crak\Component\RestNormalizer;

/**
 * Interface HttpCode
 * @package Crak\Component\RestNormalizer
 * @author bcolucci <bcolucci@crakmedia.com>
 */
interface HttpCode
{
    const HTTP_CODE_INTERFACE_NAME = __CLASS__;

    /**
     * @return
     */
    public function getValue();
}
