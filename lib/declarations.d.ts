/**
 * Created by bcolucci on 1/2/15.
 */

declare class HttpMethod {
  static HEAD : string;
  static GET : string;
  static POST : string;
  static PUT : string;
  static PATCH : string;
  static DELETE : string;
  value : string;

  constructor(value : string);

  getValue() : string;

  static getAvailableMethods() : string[];

  static valueOf(value : string) : HttpMethod;
}

declare class HttpCode {
  value : number;

  constructor(value : number);

  getValue() : number;

  static valueOf(value : number) : HttpCode;
}

declare class HttpUnknownCode extends HttpCode {
  constructor();
}

declare class HttpSuccessCode extends HttpCode {
  static CODE_100 : number;
  static CODE_101 : number;
  static CODE_200 : number;
  static CODE_201 : number;
  static CODE_202 : number;
  static CODE_203 : number;
  static CODE_204 : number;
  static CODE_205 : number;
  static CODE_206 : number;
  static CODE_300 : number;
  static CODE_301 : number;
  static CODE_302 : number;
  static CODE_303 : number;
  static CODE_304 : number;
  static CODE_305 : number;

  constructor(value : number);
}

declare class HttpErrorCode extends HttpCode {
  static CODE_400 : number;
  static CODE_401 : number;
  static CODE_402 : number;
  static CODE_403 : number;
  static CODE_404 : number;
  static CODE_405 : number;
  static CODE_406 : number;
  static CODE_407 : number;
  static CODE_408 : number;
  static CODE_409 : number;
  static CODE_410 : number;
  static CODE_411 : number;
  static CODE_412 : number;
  static CODE_413 : number;
  static CODE_414 : number;
  static CODE_415 : number;
  static CODE_500 : number;
  static CODE_501 : number;
  static CODE_502 : number;
  static CODE_503 : number;
  static CODE_504 : number;
  static CODE_505 : number;

  constructor(value : number);
}

interface Data {
  getItems(): any[];
  getTotalItems(): number;
}

declare class RestError {
  message : string;
  reason : string;
  location : string;

  constructor(message : string, reason : string, location? : string);

  getMessage() : string;

  getReason() : string;

  getLocation() : string;
}

declare class Parameter {
  id : string;
  value : string;

  constructor(id : string, value? : string);

  getId() : string;

  getValue() : string;
}

//
//interface Response {
//  getHttpMethod(): HttpMethod;
//  getParameters(): Parameter[];
//  getApiVersion(): string;
//  isError(): boolean;
//  getHttpErrorCode(): HttpErrorCode;
//  getErrorMessage(): string;
//  getErrors(): RestError[];
//  getData(): Data;
//}
//
//interface ResponseParser {
//  parse(json : string): Response;
//}
//
//interface ResponseBuilder {
//  addParameter(parameter : Parameter):ResponseBuilder;
//  addParameters(parameters : Parameter[]):ResponseBuilder;
//  getParameters():Parameter[];
//  build():any;
//}
//
//interface SuccessResponseBuilder extends ResponseBuilder {
//  addItem(item : any):SuccessResponseBuilder;
//  addItems(items : any[]):SuccessResponseBuilder;
//}
//
//interface ErrorResponseBuilder extends ResponseBuilder {
//  addError(error : RestError):ErrorResponseBuilder;
//  addErrors(errors : RestError[]):ErrorResponseBuilder;
//}
