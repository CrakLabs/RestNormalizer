/**
 * Created by bcolucci on 1/2/15.
 */
'use strict';

import http = require('./httpcode');

export module builder {

  export class ErrorResponseBuilder {
    httpErrorCode : http.http.HttpErrorCode;

    constructor() {
    }
  }

}