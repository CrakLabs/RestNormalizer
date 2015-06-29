
# RestNormalizer component

Use this component in order to normalize your Restful API I/O.

- Use the builder-s to create a valid anonymous object to JSON serialize
- Use the parser to create an object which will contain your items

[![Minimum PHP Version](http://img.shields.io/badge/php-%3E%3D%205.4-8892BF.svg)](https://php.net/)
[![Build Status](https://travis-ci.org/CrakLabs/rest-normalizer.svg)](https://travis-ci.org/CrakLabs/rest-normalizer)
[![Coverage Status](https://coveralls.io/repos/CrakLabs/rest-normalizer/badge.svg?branch=master)](https://coveralls.io/r/CrakLabs/rest-normalizer?branch=master)
[![SensioLabs Insight](https://img.shields.io/sensiolabs/i/5998393e-29ea-48f8-8e7e-b19e86daa2db.svg)](https://insight.sensiolabs.com/projects/5998393e-29ea-48f8-8e7e-b19e86daa2db)
[![License](https://img.shields.io/packagist/l/craklabs/rest-normalizer.svg)](https://packagist.org/packages/craklabs/rest-normalizer)

## How to install

     "require": {
       ...
       "craklabs/rest-normalizer": "~2.0"
       ...
     }

## How to use the PHP component

There are three builders :

- An ErrorResponseBuilder on which you can error-s
- A SuccessResponseBuilder on which you can add item-s
- A ResponseBuilder on which you can add both, at choice, error-s or item-s and which
will create an error or a success depending of parameters

All response builder can have parameter-s and must have:

- The API version (ex: '1.2')
- The HTTP method (HEAD, GET, POST, PUT, PATCH or DELETE)

### Example of ErrorResponseBuilder usage

    $builder = ErrorResponseBuilder::create(new ErrorDataBuilder(), '1.2', HttpMethod::get(), HttpErrorCode::code500());

    $builder
        ->addParameter(Parameter::create('firstName', 'john'))
        ->addError(Error::create('error message', 'ErrorType'));

    json_encode($builder->build());
    /* will produce:
    {
       "apiVersion":"1.2",
       "method":"GET",
       "params":{
          "firstName":"john"
       },
       "code":500,
       "message":"error message",
       "errors":[
          {
             "message":"error message",
             "reason":"ErrorType",
             "location":""
          }
       ]
    }
    */

### Example of SuccessResponseBuilder usage

    $builder = SuccessResponseBuilder::create(new SuccessDataBuilder(), '1.2', HttpMethod::get());

    $item = new \stdClass();
    $item->test1 = 42;
    $item->test2 = 'yolo';

    $builder
        ->addParameter(Parameter::create('firstName', 'john'))
        ->addItem($item);

    json_encode($builder->build());
    /* will produce:
    {
       "apiVersion":"1.2",
       "method":"GET",
       "params":{
          "firstName":"john"
       },
       "data":{
          "items":[
             {
                "test1":42,
                "test2":"yolo"
             }
          ],
          "totalItems":1
       }
    }
        */

### Example of ResponseBuilder usage

In the case below, the builder will generate a success response because no error has been added.

    $item = new \stdClass();
    $item->firstname = 'john';

    $builder = ResponseBuilder::create('1.2', HttpMethod::get());
    $builder
        ->addParameter(Parameter::create('id', '42'))
        ->addItem($item);

    json_encode($builder->build());
    /* will produce:
    {
       "apiVersion":"1.2",
       "method":"GET",
       "params":{
          "id":"42"
       },
       "data":{
          "items":[
             {
                "firstname":"john"
             }
          ],
          "totalItems":1
       }
    }
    */

In the case below, the builder will generate an error response.

**CAUTION : In order to make an error response, you MUST set an HTTP error code and, at least, add one error**

    $item = new \stdClass();
    $item->firstname = 'john';

    $builder = ResponseBuilder::create('1.2', HttpMethod::get());

    $programIds = Parameter::create('programIds', [1, 2]);

    $builder
        ->addParameter($programIds)
        ->addError(Error::create('error message 1', 'reason1'))
        ->addError(Error::create('error message 2', 'reason2', 'location2'))
        ->setHttpErrorCode(HttpErrorCode::code402());
    /* will produce:
    {
       "apiVersion":"1.2",
       "method":"GET",
       "params":{
          "programIds":["1","2"]
       },
       "code":402,
       "message":"error message 1",
       "errors":[
          {
             "message":"error message 1",
             "reason":"reason1",
             "location":""
          },
          {
             "message":"error message 2",
             "reason":"reason2",
             "location":"location2"
          }
       ]
    }
    */

### How to parse a Restful JSON

    $json = '
    {
       "apiVersion":"1.2",
       "method":"GET",
       "params":{
          "id":"42"
       },
       "code":500,
       "message":"e1",
       "errors":[
          {
             "message":"e1",
             "reason":"ErrorType",
             "location":"l1"
          },
          {
             "message":"e2",
             "reason":"ErrorType",
             "location":""
          }
       ]
    }';

    $response = (new ResponseParser())->parse($json);

## How to JavaScript component

    var rest = require('./js/rest');
    /*
        error
            BuildError
            ParseError

        http
            Method
                getAvailableMethods
                valueOf
                HEAD
                GET
                POST
                PUT
                PATCH
                DELETE

            Code
                valueOf

            SuccessCode
                valueOf
                isValidCode

            ErrorCode
                valueOf
                isValidCode

        common
            Data
            Parameter
            Error

        builder
            ResponseBuilder
            ErrorResponseBuilder
            SuccessResponseBuilder
    */

    var successBuilder = new rest.builder.SuccessResponseBuilder('1.2', http.Method.GET());
        successBuilder
            .addParameter(new common.Parameter('ids', 1, 2).addValue(3))
            .addItem({field: 36})
            .addItem({field: 42})
            .addItems([
              {field: 1},
              {field: 2}
            ]);

    JSON.stringify(successBuilder.build());
    /* will produce:
    {
       "apiVersion":"1.2",
       "method":"GET",
       "params":{
          "ids":[1,2,3]
       },
       "data":{
          "items":[
             {"field":36},
             {"field":42},
             {"field":1},
             {"field":2}
          ],
          "totalItems":4
       }
    }
    */

    var errorBuilder = new builder.ErrorResponseBuilder('1.2', http.Method.GET(), 400);
    errorBuilder
        .addParameter(new common.Parameter('ids', 1, 2).addValue(3))
        .addParameters([
          new common.Parameter('name', 'john'),
          new common.Parameter('age', 42)
        ])
        .addError(new common.Error('m1', 'r1', 'l1'))
        .addErrors([
          new common.Error('m2', 'r2', 'l2'),
          new common.Error('m3', 'r3', 'l3')
        ]);

    JSON.stringify(successBuilder.build());
    /* will produce:
    {
       "apiVersion":"1.2",
       "method":"GET",
       "params":{
          "ids":[1,2,3],
          "name":"john",
          "age":42
       },
       "code":400,
       "message":"m1",
       "errors":[
          {"message":"m1","reason":"r1","location":"l1"},
          {"message":"m2","reason":"r2","location":"l2"},
          {"message":"m3","reason":"r3","location":"l3"}
       ]
    }
    */
