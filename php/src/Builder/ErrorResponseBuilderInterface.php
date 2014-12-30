<?php
/**
 * This file is property of crakmedia (http://crakmedia.com)
 * Created by Brice Colucci <bcolucci@crakmedia.com>
 * @copyright 2014 Crakmedia
 */

namespace Crak\Component\RestNormalizer\Builder;

use Crak\Component\RestNormalizer\ErrorInterface;
use Crak\Component\RestNormalizer\Type\ErrorCollection;

/**
 * Interface ErrorResponseBuilderInterface
 * @package Crak\Component\RestNormalizer\Builder
 * @author bcolucci <bcolucci@crakmedia.com>
 */
interface ErrorResponseBuilderInterface extends ResponseBuilderInterface
{
    /**
     * @param ErrorInterface $error
     * @return ErrorResponseBuilderInterface
     */
    public function addError(ErrorInterface $error);

    /**
     * @param ErrorCollection $errors
     * @return ErrorResponseBuilderInterface
     */
    public function addErrors(ErrorCollection $errors);
} 