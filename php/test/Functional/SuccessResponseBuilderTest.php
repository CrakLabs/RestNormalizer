<?php
/**
 * Created by bcolucci <bcolucci@crakmedia.com>
 */

namespace Crak\Component\RestNormalizer\Test\Functional;

use Crak\Component\RestNormalizer\Builder\Data\SuccessDataBuilder;
use Crak\Component\RestNormalizer\Builder\SuccessResponseBuilder;
use Crak\Component\RestNormalizer\Collection\ParameterCollection;
use Crak\Component\RestNormalizer\HttpMethod;
use Crak\Component\RestNormalizer\Parameter;

/**
 * Class SuccessResponseBuilderTest
 * @package Crak\Component\RestNormalizer\Test\Functional
 * @author bcolucci <bcolucci@crakmedia.com>
 */
class SuccessResponseBuilderTest extends \PHPUnit_Framework_TestCase
{
    public function testShouldThrowErrorIfInvalidItemTypeAdded()
    {
        $this->setExpectedException(
            'Star\Component\Collection\Exception\InvalidArgumentException',
            'The collection only supports adding \stdClass.'
        );

        $builder = SuccessResponseBuilder::create(new SuccessDataBuilder(), '1.2', HttpMethod::GET(), '\stdClass');
        $builder->addItem(42);
    }

    public function testShouldGenerateAValidObjectForJSONSerialization()
    {
        $builder = SuccessResponseBuilder::create(new SuccessDataBuilder(), '1.2', HttpMethod::GET(), '\stdClass');

        $item = new \stdClass();
        $item->test1 = 42;
        $item->test2 = 'yolo';

        $builder
            ->addParameter(Parameter::create('firstName', 'john'))
            ->addItem($item);

        $this->assertSame(
            '{"apiVersion":"1.2","method":"GET","params":{"firstName":"john"},"data":{"items":[{"test1":42,"test2":"yolo"}],"totalItems":1}}',
            json_encode($builder->build())
        );
    }

    public function testShouldAddItemCollection()
    {
        $builder = SuccessResponseBuilder::create(new SuccessDataBuilder(), '1.2', HttpMethod::GET(), '\stdClass');

        $item1 = new \stdClass();
        $item1->id = 42;
        $item1->email = 'blochon.rob@yahoo.ca';

        $item2 = new \stdClass();
        $item2->id = 38;
        $item2->email = 'lara.clette@gmail.com';

        $builder->addItems([$item1, $item2]);

        $this->assertSame(
            '{"apiVersion":"1.2","method":"GET","params":{"firstName":"john","name":"doe"},"data":{"items":[{"id":42,"email":"blochon.rob@yahoo.ca"},{"id":38,"email":"lara.clette@gmail.com"}],"totalItems":2}}',
            json_encode($builder->build())
        );
    }

    public function testShouldAddParameterCollection()
    {
        $builder = SuccessResponseBuilder::create(new SuccessDataBuilder(), '1.2', HttpMethod::GET(), '\stdClass');

        $builder->addParameters(new ParameterCollection(
            [
                Parameter::create('firstName', 'john'),
                Parameter::create('name', 'doe'),
            ]
        ));

        $this->assertSame(
            '{"apiVersion":"1.2","method":"GET","params":{"firstName":"john","name":"doe"},"data":{"items":[],"totalItems":0}}',
            json_encode($builder->build())
        );
    }
} 