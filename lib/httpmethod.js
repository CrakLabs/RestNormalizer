/**
 * Created by bcolucci on 1/2/15.
 */
'use strict';
var HttpMethod = (function () {
    function HttpMethod(value) {
        this.value = value;
    }
    HttpMethod.prototype.getValue = function () {
        return this.value;
    };
    HttpMethod.getAvailableMethods = function () {
        return [
            HttpMethod.HEAD,
            HttpMethod.GET,
            HttpMethod.POST,
            HttpMethod.PUT,
            HttpMethod.PATCH,
            HttpMethod.DELETE
        ];
    };
    HttpMethod.valueOf = function (value) {
        value = value.trim().toUpperCase();
        var methods = HttpMethod.getAvailableMethods();
        if (methods.indexOf(value) <= 0) {
            return null;
        }
        return new HttpMethod(value);
    };
    HttpMethod.HEAD = 'HEAD';
    HttpMethod.GET = 'GET';
    HttpMethod.POST = 'POST';
    HttpMethod.PUT = 'PUT';
    HttpMethod.PATCH = 'PATCH';
    HttpMethod.DELETE = 'DELETE';
    return HttpMethod;
})();
//# sourceMappingURL=httpmethod.js.map