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
var http;
(function (http) {
    var Method = (function () {
        function Method(value) {
            this.value = value;
        }
        Method.prototype.getValue = function () {
            return this.value;
        };
        Method.getAvailableMethods = function () {
            return [
                Method.HEAD,
                Method.GET,
                Method.POST,
                Method.PUT,
                Method.PATCH,
                Method.DELETE
            ];
        };
        Method.valueOf = function (value) {
            value = value.trim().toUpperCase();
            var methods = Method.getAvailableMethods();
            if (methods.indexOf(value) <= 0) {
                return null;
            }
            return new Method(value);
        };
        Method.HEAD = 'HEAD';
        Method.GET = 'GET';
        Method.POST = 'POST';
        Method.PUT = 'PUT';
        Method.PATCH = 'PATCH';
        Method.DELETE = 'DELETE';
        return Method;
    })();
    http.Method = Method;
    var Code = (function () {
        function Code(value) {
            this.value = value;
        }
        Code.prototype.getValue = function () {
            return this.value;
        };
        Code.valueOf = function (value) {
            if (value >= 100 && value <= 305) {
                return new SuccessCode(value);
            }
            else if (value >= 400 && value <= 505) {
                return new ErrorCode(value);
            }
            return new UnknownCode();
        };
        return Code;
    })();
    var UnknownCode = (function (_super) {
        __extends(UnknownCode, _super);
        function UnknownCode() {
            _super.call(this, 0);
        }
        return UnknownCode;
    })(Code);
    var SuccessCode = (function (_super) {
        __extends(SuccessCode, _super);
        function SuccessCode(value) {
            _super.call(this, value);
        }
        SuccessCode.CODE_100 = 100;
        SuccessCode.CODE_101 = 101;
        SuccessCode.CODE_200 = 200;
        SuccessCode.CODE_201 = 201;
        SuccessCode.CODE_202 = 202;
        SuccessCode.CODE_203 = 203;
        SuccessCode.CODE_204 = 204;
        SuccessCode.CODE_205 = 205;
        SuccessCode.CODE_206 = 206;
        SuccessCode.CODE_300 = 300;
        SuccessCode.CODE_301 = 301;
        SuccessCode.CODE_302 = 302;
        SuccessCode.CODE_303 = 303;
        SuccessCode.CODE_304 = 304;
        SuccessCode.CODE_305 = 305;
        return SuccessCode;
    })(Code);
    http.SuccessCode = SuccessCode;
    var ErrorCode = (function (_super) {
        __extends(ErrorCode, _super);
        function ErrorCode(value) {
            _super.call(this, value);
        }
        ErrorCode.CODE_400 = 400;
        ErrorCode.CODE_401 = 401;
        ErrorCode.CODE_402 = 402;
        ErrorCode.CODE_403 = 403;
        ErrorCode.CODE_404 = 404;
        ErrorCode.CODE_405 = 405;
        ErrorCode.CODE_406 = 406;
        ErrorCode.CODE_407 = 407;
        ErrorCode.CODE_408 = 408;
        ErrorCode.CODE_409 = 409;
        ErrorCode.CODE_410 = 410;
        ErrorCode.CODE_411 = 411;
        ErrorCode.CODE_412 = 412;
        ErrorCode.CODE_413 = 413;
        ErrorCode.CODE_414 = 414;
        ErrorCode.CODE_415 = 415;
        ErrorCode.CODE_500 = 500;
        ErrorCode.CODE_501 = 501;
        ErrorCode.CODE_502 = 502;
        ErrorCode.CODE_503 = 503;
        ErrorCode.CODE_504 = 504;
        ErrorCode.CODE_505 = 505;
        return ErrorCode;
    })(Code);
    http.ErrorCode = ErrorCode;
})(http = exports.http || (exports.http = {}));
//# sourceMappingURL=http.js.map