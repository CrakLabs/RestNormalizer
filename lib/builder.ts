/**
 * Created by bcolucci on 1/2/15.
 */
'use strict';

import error = require('./error');
import http = require('./http');
import common = require('./common');

export module builder {

  class ResponseBuilder {
    apiVersion : string;
    httpMethod : http.http.Method;
    parameters : common.common.Parameter[];

    constructor(apiVersion : string, httpMethod : http.http.Method) {
      this.apiVersion = apiVersion;
      this.httpMethod = httpMethod;
      this.parameters = [];
    }

    addParameter(parameter : common.common.Parameter) : ResponseBuilder {
      this.parameters.push(parameter);
      return this;
    }

    addParameters(parameters : common.common.Parameter[]) : ResponseBuilder {
      for (var p in parameters) {
        this.parameters.push(parameters[p]);
      }
      return this;
    }

    getApiVersion() : string {
      return this.apiVersion;
    }

    getHttpMethod() : http.http.Method {
      return this.httpMethod;
    }

    getParameters() : common.common.Parameter[] {
      return this.parameters;
    }
  }

  class ErrorResponseBuilder extends ResponseBuilder {
    httpErrorCode : http.http.ErrorCode;
    errors : common.common.Error[];

    constructor(apiVersion : string, httpMethod : http.http.Method, httpErrorCode : http.http.ErrorCode) {
      super(apiVersion, httpMethod);
      this.httpErrorCode = httpErrorCode;
      this.errors = [];
    }
  }

}