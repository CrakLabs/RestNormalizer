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
var rest;
(function (rest) {
    var HttpCode = (function () {
        function HttpCode(value) {
            this.value = value;
        }
        HttpCode.prototype.getValue = function () {
            return this.value;
        };
        HttpCode.valueOf = function (value) {
            if (value >= 100 && value <= 305) {
                return new HttpSuccessCode(value);
            }
            else if (value >= 400 && value <= 505) {
                return new HttpErrorCode(value);
            }
            return new HttpUnknownCode();
        };
        return HttpCode;
    })();
    var HttpUnknownCode = (function (_super) {
        __extends(HttpUnknownCode, _super);
        function HttpUnknownCode() {
            _super.call(this, 0);
        }
        return HttpUnknownCode;
    })(HttpCode);
    var HttpSuccessCode = (function (_super) {
        __extends(HttpSuccessCode, _super);
        function HttpSuccessCode(value) {
            _super.call(this, value);
        }
        HttpSuccessCode.CODE_100 = 100;
        HttpSuccessCode.CODE_101 = 101;
        HttpSuccessCode.CODE_200 = 200;
        HttpSuccessCode.CODE_201 = 201;
        HttpSuccessCode.CODE_202 = 202;
        HttpSuccessCode.CODE_203 = 203;
        HttpSuccessCode.CODE_204 = 204;
        HttpSuccessCode.CODE_205 = 205;
        HttpSuccessCode.CODE_206 = 206;
        HttpSuccessCode.CODE_300 = 300;
        HttpSuccessCode.CODE_301 = 301;
        HttpSuccessCode.CODE_302 = 302;
        HttpSuccessCode.CODE_303 = 303;
        HttpSuccessCode.CODE_304 = 304;
        HttpSuccessCode.CODE_305 = 305;
        return HttpSuccessCode;
    })(HttpCode);
    rest.HttpSuccessCode = HttpSuccessCode;
    var HttpErrorCode = (function (_super) {
        __extends(HttpErrorCode, _super);
        function HttpErrorCode(value) {
            _super.call(this, value);
        }
        HttpErrorCode.CODE_400 = 400;
        HttpErrorCode.CODE_401 = 401;
        HttpErrorCode.CODE_402 = 402;
        HttpErrorCode.CODE_403 = 403;
        HttpErrorCode.CODE_404 = 404;
        HttpErrorCode.CODE_405 = 405;
        HttpErrorCode.CODE_406 = 406;
        HttpErrorCode.CODE_407 = 407;
        HttpErrorCode.CODE_408 = 408;
        HttpErrorCode.CODE_409 = 409;
        HttpErrorCode.CODE_410 = 410;
        HttpErrorCode.CODE_411 = 411;
        HttpErrorCode.CODE_412 = 412;
        HttpErrorCode.CODE_413 = 413;
        HttpErrorCode.CODE_414 = 414;
        HttpErrorCode.CODE_415 = 415;
        HttpErrorCode.CODE_500 = 500;
        HttpErrorCode.CODE_501 = 501;
        HttpErrorCode.CODE_502 = 502;
        HttpErrorCode.CODE_503 = 503;
        HttpErrorCode.CODE_504 = 504;
        HttpErrorCode.CODE_505 = 505;
        return HttpErrorCode;
    })(HttpCode);
    rest.HttpErrorCode = HttpErrorCode;
})(rest = exports.rest || (exports.rest = {}));
//# sourceMappingURL=httpcode.js.map