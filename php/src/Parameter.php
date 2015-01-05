<?php
/**
 * Created by bcolucci <bcolucci@crakmedia.com>
 */

namespace Crak\Component\RestNormalizer;

use Bcol\Component\Type\Collection\StringCollection;
use Bcol\Component\Type\NonEmptyString;
use Bcol\Component\Type\String;

/**
 * Class Parameter
 * @package Crak\Component\RestNormalizer
 * @author bcolucci <bcolucci@crakmedia.com>
 */
class Parameter implements ParameterInterface, \Countable
{
    const CLASS_NAME = __CLASS__;

    /**
     * @var NonEmptyString
     */
    private $id;

    /**
     * @var StringCollection
     */
    private $values;

    /**
     * @param NonEmptyString $id
     * @param StringCollection $values = null
     */
    public function __construct(NonEmptyString $id, StringCollection $values = null)
    {
        $this->id = $id;

        $this->values = $values;
        if (is_null($this->values)) {
            $this->values = new StringCollection();
        }
    }

    /**
     * @param String $value
     * @return ParameterInterface
     */
    public function addValue(String $value)
    {
        $this->values->add($value);
        return $this;
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
    public function getValues()
    {
        return $this->values;
    }

    /**
     * @inheritdoc
     */
    public function count()
    {
        return count($this->values);
    }

    /**
     * @param string $id
     * @param array|string $values = null
     * @return Parameter
     */
    public static function create($id, $values = null)
    {
        if (!is_null($values)) {
            if (!is_array($values)) {
                $values = [$values];
            }
            foreach ($values as &$value) {
                $value = new String((string)$value);
            }
            $values = new StringCollection($values);
        }

        return new self(new NonEmptyString($id), $values);
    }
}