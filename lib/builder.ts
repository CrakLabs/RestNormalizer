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
      for (var i in parameters) {
        this.parameters.push(parameters[i]);
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

    build() : any {
      var data = {
        apiVersion: this.apiVersion,
        method: this.httpMethod.getValue(),
        params: {}
      };

      for (var i in this.parameters) {
        data.params[this.parameters[i].getId()] = this.parameters[i].getValue();
      }

      return data;
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

    addError(error : common.common.Error) : ErrorResponseBuilder {
      this.errors.push(error);
      return this;
    }

    addErrors(errors : common.common.Error[]) : ErrorResponseBuilder {
      for (var i in errors) {
        this.errors.push(errors[i]);
      }
      return this;
    }

    build() : any {
      if (!this.errors.length) {
        throw new error.error.BuildError('One error at least is required in order to build a restful error');
      }

      var data = super.build();

      data.code = this.httpErrorCode.getValue();
      data.message = this.errors[0].getMessage();

      data.errors = [];
      for (var i in this.errors) {
        data.errors.push({
          message: this.errors[i].getMessage(),
          reason: this.errors[i].getReason(),
          location: this.errors[i].getLocation()
        });
      }

      return data;
    }
  }

  class SuccessResponseBuilder extends ResponseBuilder {
    data : common.common.Data;
    itemsType : string;

    constructor(apiVersion : string, httpMethod : http.http.Method, itemsType : string = null) {
      super(apiVersion, httpMethod);
      this.data = new common.common.Data();
      this.itemsType = itemsType;
    }

    addItem(item : any) : SuccessResponseBuilder {
      if (String.prototype.toString.apply(item) !== '[object Object]') {
        throw new error.error.BuildError('Item must be an object');
      }
      //TODO type validation
      this.data.getItems().push(item);
      return this;
    }

    addItems(items : any[]) : SuccessResponseBuilder {
      for (var i in items) {
        this.addItem(items[i]);
      }
      return this;
    }

    build() : any {
      var data = super.build();

      data.data = {
        items: this.data.getItems(),
        totalItems: this.data.getTotalItems()
      };

      return data;
    }
  }

}