
# RestNormalizer component

Use this component in order to normalize your Restful API I/O.

- Use the builder-s to create a valid anonymous object to JSON serialize
- Use the parser to create an object which will contain your items

See: http://confluence.crakmedia.lan:8090/display/DEV/Restful+Normalizer

## How to install

     "require": {
       ...
       "crakmedia/rest-normalizer-component": "~1.0"
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

    $builder = ErrorResponseBuilder::create(new ErrorDataBuilder(), '1.2', HttpMethod::GET(), HttpErrorCode::CODE_500());

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

    $builder = SuccessResponseBuilder::create(new SuccessDataBuilder(), '1.2', HttpMethod::GET());

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

    $builder = ResponseBuilder::create('1.2', HttpMethod::GET());
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

    $builder = ResponseBuilder::create('1.2', HttpMethod::GET());

    $programIds = Parameter::create('programIds', [1, 2]);

    $builder
        ->addParameter($programIds)
        ->addError(Error::create('error message 1', 'reason1'))
        ->addError(Error::create('error message 2', 'reason2', 'location2'))
        ->setHttpErrorCode(HttpErrorCode::CODE_402());
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

TODO