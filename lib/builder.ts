/**
 * Created by bcolucci on 1/2/15.
 */
'use strict';

import http = require('./http');
import common = require('./common');

export module builder {

  export class ResponseBuilder {
    apiVersion : string;
    httpMethod : http.http.Method;
    parameters : common.common.Parameter;

    constructor(apiVersion : string, httpMethod : http.http.Method) {
    }
  }

}