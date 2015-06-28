<?php
/**
 * This file is property of crakmedia (http://crakmedia.com)
 * Created by Brice Colucci <bcolucci@crakmedia.com>
 * @copyright 2014 Crakmedia
 */

namespace Crak\Component\RestNormalizer\Builder;

use Crak\Component\RestNormalizer\Collection\ParameterCollection;
use Crak\Component\RestNormalizer\ParameterInterface;

/**
 * Interface ResponseBuilderInterface
 * @package Crak\Component\RestNormalizer\Builder
 * @author bcolucci <bcolucci@crakmedia.com>
 */
interface ResponseBuilderInterface
{
    const INTERFACE_NAME = __CLASS__;

    /**
     * @param ParameterInterface $parameter
     * @return SuccessResponseBuilderInterface
     */
    public function addParameter(ParameterInterface $parameter);

    /**
     * @param ParameterCollection $parameters
     * @return SuccessResponseBuilderInterface
     */
    public function addParameters(ParameterCollection $parameters);

    /**
     * @return ParameterCollection
     */
    public function getParameters();

    /**
     * @return \stdClass
     */
    public function build();
} 
