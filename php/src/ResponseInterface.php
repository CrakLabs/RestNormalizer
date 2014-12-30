<?php
/**
 * This file is property of crakmedia (http://crakmedia.com)
 * Created by Brice Colucci <bcolucci@crakmedia.com>
 * @copyright 2014 Crakmedia
 */

namespace Crak\Component\RestNormalizer;

use Bcol\Component\Type\NonEmptyString;
use Bcol\Component\Type\StrictPositiveInteger;
use Crak\Component\RestNormalizer\Type\ErrorCollection;
use Crak\Component\RestNormalizer\Type\ParameterCollection;

/**
 * Interface ResponseInterface
 * @package Crak\Component\RestNormalizer
 * @author bcolucci <bcolucci@crakmedia.com>
 */
interface ResponseInterface
{
    const INTERFACE_NAME = __CLASS__;

    /**
     * @return HttpCode code
     *
     */
    public function getHttpCode();

    /**
     * @return NonEmptyString
     */
    public function getApiVersion();

    /**
     * @return Boolean
     */
    public function isError();

    /**
     * @return StrictPositiveInteger
     */
    public function getErrorCode();

    /**
     * @return NonEmptyString
     */
    public function getErrorMessage();

    /**
     * @return ErrorCollection
     */
    public function getErrors();

    /**
     * @return ParameterCollection
     */
    public function getParameters();

    /**
     * @return DataInterface
     */
    public function getData();
} 