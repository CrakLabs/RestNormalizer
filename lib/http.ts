/**
 * Created by bcolucci on 1/2/15.
 */
'use strict';

export module http {

  export class Method {
    static HEAD : string = 'HEAD';
    static GET : string = 'GET';
    static POST : string = 'POST';
    static PUT : string = 'PUT';
    static PATCH : string = 'PATCH';
    static DELETE : string = 'DELETE';

    value : string;

    constructor(value : string) {
      this.value = value;
    }

    public getValue() : string {
      return this.value;
    }

    static getAvailableMethods() : string[] {
      return [
        Method.HEAD,
        Method.GET,
        Method.POST,
        Method.PUT,
        Method.PATCH,
        Method.DELETE
      ];
    }

    static valueOf(value : string) : Method {
      value = value.trim().toUpperCase();
      var methods = Method.getAvailableMethods();
      if (methods.indexOf(value) <= 0) {
        return null;
      }
      return new Method(value);
    }
  }

  class Code {
    value : number;

    constructor(value : number) {
      this.value = value;
    }

    public getValue() : number {
      return this.value;
    }

    static valueOf(value : number) : Code {
      if (value >= 100 && value <= 305) {
        return new HttpSuccessCode(value);
      } else if (value >= 400 && value <= 505) {
        return new HttpErrorCode(value);
      }
      return new HttpUnknownCode();
    }
  }

  class HttpUnknownCode extends Code {
    constructor() {
      super(0);
    }
  }

  export class HttpSuccessCode extends Code {
    static CODE_100 : number = 100;
    static CODE_101 : number = 101;
    static CODE_200 : number = 200;
    static CODE_201 : number = 201;
    static CODE_202 : number = 202;
    static CODE_203 : number = 203;
    static CODE_204 : number = 204;
    static CODE_205 : number = 205;
    static CODE_206 : number = 206;
    static CODE_300 : number = 300;
    static CODE_301 : number = 301;
    static CODE_302 : number = 302;
    static CODE_303 : number = 303;
    static CODE_304 : number = 304;
    static CODE_305 : number = 305;

    constructor(value : number) {
      super(value);
    }
  }

  export class HttpErrorCode extends Code {
    static CODE_400 : number = 400;
    static CODE_401 : number = 401;
    static CODE_402 : number = 402;
    static CODE_403 : number = 403;
    static CODE_404 : number = 404;
    static CODE_405 : number = 405;
    static CODE_406 : number = 406;
    static CODE_407 : number = 407;
    static CODE_408 : number = 408;
    static CODE_409 : number = 409;
    static CODE_410 : number = 410;
    static CODE_411 : number = 411;
    static CODE_412 : number = 412;
    static CODE_413 : number = 413;
    static CODE_414 : number = 414;
    static CODE_415 : number = 415;
    static CODE_500 : number = 500;
    static CODE_501 : number = 501;
    static CODE_502 : number = 502;
    static CODE_503 : number = 503;
    static CODE_504 : number = 504;
    static CODE_505 : number = 505;

    constructor(value : number) {
      super(value);
    }
  }

}