<?php
/**
 * This file is property of crakmedia (http://crakmedia.com)
 * Created by Brice Colucci <bcolucci@crakmedia.com>
 * @copyright 2014 Crakmedia
 */

namespace Crak\Component\RestNormalizer;

use Bcol\Component\Type\NonEmptyString;

/**
 * Interface ErrorInterface
 * @package Crak\Component\RestNormalizer
 * @author bcolucci <bcolucci@crakmedia.com>
 */
interface ErrorInterface
{
    const INTERFACE_NAME = __CLASS__;

    /**
     * @return NonEmptyString
     */
    public function getMessage();

    /**
     * @return NonEmptyString
     */
    public function getReason();

    /**
     * @return String
     */
    public function getLocation();
} 
