<?php
/**
 * This file is property of crakmedia (http://crakmedia.com)
 * Created by Brice Colucci <bcolucci@crakmedia.com>
 * @copyright 2014 Crakmedia
 */

namespace Crak\Component\RestNormalizer\Builder;

use Crak\Component\RestNormalizer\Collection\ErrorCollection;
use Crak\Component\RestNormalizer\ErrorInterface;
use Crak\Component\RestNormalizer\HttpErrorCode;


/**
 * Class ErrorResponseBuilderTrait
 * @package Crak\Component\RestNormalizer\Builder
 * @author bcolucci <bcolucci@crakmedia.com>
 */
trait ErrorResponseBuilderTrait
{
    /**
     * @var HttpErrorCode
     */
    protected $httpErrorCode;

    /**
     * @var ErrorCollection
     */
    protected $errors;

    /**
     * @param HttpErrorCode $httpErrorCode = null
     */
    protected function initErrorTrait(HttpErrorCode $httpErrorCode = null)
    {
        $this->errors = new ErrorCollection();
        $this->httpErrorCode = $httpErrorCode;
    }

    /**
     * @inheritdoc
     */
    public function addError(ErrorInterface $error)
    {
        $this->errors->add($error);
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function addErrors(ErrorCollection $errors)
    {
        foreach ($errors as $error) {
            $this->errors->add($error);
        }
    }
}