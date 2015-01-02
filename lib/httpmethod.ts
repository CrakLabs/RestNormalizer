/**
 * Created by bcolucci on 1/2/15.
 */
'use strict';

class HttpMethod {
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
      HttpMethod.HEAD,
      HttpMethod.GET,
      HttpMethod.POST,
      HttpMethod.PUT,
      HttpMethod.PATCH,
      HttpMethod.DELETE
    ];
  }

  static valueOf(value : string) : HttpMethod {
    value = value.trim().toUpperCase();
    var methods = HttpMethod.getAvailableMethods();
    if (methods.indexOf(value) <= 0) {
      return null;
    }
    return new HttpMethod(value);
  }
}