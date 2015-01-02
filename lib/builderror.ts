/**
 * Created by bcolucci on 1/2/15.
 */
'use strict';

export module error {

  export class BuildError {
    message : string;

    constructor(message : string) {
      this.message = message;
    }
  }

}