/**
 * Created by bcolucci on 1/2/15.
 */
'use strict';
var __extends = this.__extends || function (d, b) {
    for (var p in b) if (b.hasOwnProperty(p)) d[p] = b[p];
    function __() { this.constructor = d; }
    __.prototype = b.prototype;
    d.prototype = new __();
};
var error = require('./error');
var common = require('./common');
var builder;
(function (builder) {
    var ResponseBuilder = (function () {
        function ResponseBuilder(apiVersion, httpMethod) {
            this.apiVersion = apiVersion;
            this.httpMethod = httpMethod;
            this.parameters = [];
        }
        ResponseBuilder.prototype.addParameter = function (parameter) {
            this.parameters.push(parameter);
            return this;
        };
        ResponseBuilder.prototype.addParameters = function (parameters) {
            for (var i in parameters) {
                if (!parameters.hasOwnProperty(i)) {
                    continue;
                }
                this.parameters.push(parameters[i]);
            }
            return this;
        };
        ResponseBuilder.prototype.getApiVersion = function () {
            return this.apiVersion;
        };
        ResponseBuilder.prototype.getHttpMethod = function () {
            return this.httpMethod;
        };
        ResponseBuilder.prototype.getParameters = function () {
            return this.parameters;
        };
        ResponseBuilder.prototype.build = function () {
            var data = {
                apiVersion: this.apiVersion,
                method: this.httpMethod.getValue(),
                params: {}
            };
            for (var i in this.parameters) {
                if (!this.parameters.hasOwnProperty(i)) {
                    continue;
                }
                var plainValue = null, values = this.parameters[i].getValues();
                if (values.length === 1) {
                    plainValue = values.shift();
                }
                else if (values.length > 1) {
                    plainValue = values;
                }
                data.params[this.parameters[i].getId()] = plainValue;
            }
            return data;
        };
        return ResponseBuilder;
    })();
    var ErrorResponseBuilder = (function (_super) {
        __extends(ErrorResponseBuilder, _super);
        function ErrorResponseBuilder(apiVersion, httpMethod, httpErrorCode) {
            _super.call(this, apiVersion, httpMethod);
            this.httpErrorCode = httpErrorCode;
            this.errors = [];
        }
        ErrorResponseBuilder.prototype.addError = function (error) {
            this.errors.push(error);
            return this;
        };
        ErrorResponseBuilder.prototype.addErrors = function (errors) {
            for (var i in errors) {
                this.errors.push(errors[i]);
            }
            return this;
        };
        ErrorResponseBuilder.prototype.build = function () {
            if (!this.errors.length) {
                throw new error.error.BuildError('One error at least is required in order to build a restful error');
            }
            var data = _super.prototype.build.call(this);
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
        };
        return ErrorResponseBuilder;
    })(ResponseBuilder);
    var SuccessResponseBuilder = (function (_super) {
        __extends(SuccessResponseBuilder, _super);
        function SuccessResponseBuilder(apiVersion, httpMethod, itemsType) {
            if (itemsType === void 0) { itemsType = null; }
            _super.call(this, apiVersion, httpMethod);
            this.data = new common.common.Data();
            this.itemsType = itemsType;
        }
        SuccessResponseBuilder.prototype.addItem = function (item) {
            if (String.prototype.toString.apply(item) !== '[object Object]') {
                throw new error.error.BuildError('Item must be an object');
            }
            //TODO type validation
            this.data.getItems().push(item);
            return this;
        };
        SuccessResponseBuilder.prototype.addItems = function (items) {
            for (var i in items) {
                this.addItem(items[i]);
            }
            return this;
        };
        SuccessResponseBuilder.prototype.build = function () {
            var data = _super.prototype.build.call(this);
            data.data = {
                items: this.data.getItems(),
                totalItems: this.data.getTotalItems()
            };
            return data;
        };
        return SuccessResponseBuilder;
    })(ResponseBuilder);
})(builder = exports.builder || (exports.builder = {}));
//# sourceMappingURL=builder.js.map