<?php
/**
 * Created by bcolucci <bcolucci@crakmedia.com>
 */

namespace Crak\Component\RestNormalizer;

use Bcol\Component\Type\NonEmptyString;
use Bcol\Component\Type\String;

/**
 * Class Parameter
 * @package Crak\Component\RestNormalizer
 * @author bcolucci <bcolucci@crakmedia.com>
 */
class Parameter implements ParameterInterface
{
    const CLASS_NAME = __CLASS__;

    /**
     * @var NonEmptyString
     */
    private $id;

    /**
     * @var String
     */
    private $value;

    /**
     * @param NonEmptyString $id
     * @param String $value
     */
    public function __construct(NonEmptyString $id, String $value)
    {
        $this->id = $id;
        $this->value = $value;
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function getValue()
    {
        return $this->value;
    }
} 