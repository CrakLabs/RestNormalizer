<?php
/**
 * Created by bcolucci <bcolucci@crakmedia.com>
 */

namespace Crak\Component\RestNormalizer;

use Bcol\Component\Type\Collection\StringCollection;
use Bcol\Component\Type\NonEmptyString;
use Bcol\Component\Type\String;

/**
 * Class ParameterComposite
 * @package Crak\Component\RestNormalizer
 * @author bcolucci <bcolucci@crakmedia.com>
 */
class ParameterComposite implements ParameterInterface, \Countable
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
     * @return ParameterComposite
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
    public function getValue()
    {
        $values = [];
        foreach($this->values as $value){
            $values[] = $value->getValue();
        }

        return new String(json_encode($values));
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
     * @param array $values = null
     * @return ParameterComposite
     */
    public static function create($id, array $values = null)
    {
        if (!is_null($values)) {
            foreach ($values as &$value) {
                $value = new String($value);
            }
            $values = new StringCollection($values);
        }

        return new self(new NonEmptyString($id), $values);
    }
}