/**
 * Created by bcolucci on 1/2/15.
 */
'use strict';

export module error {

  export class ParseError {
    message : string;

    constructor(message : string) {
      this.message = message;
    }
  }

}