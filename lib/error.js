/**
 * Created by bcolucci on 1/2/15.
 */
'use strict';
var RestError = (function () {
    function RestError(message, reason, location) {
        if (!message.length) {
            throw 'Error message required';
        }
        if (!reason.length) {
            throw 'Error reason required';
        }
        this.message = message;
        this.reason = reason;
        this.location = location || '';
    }
    RestError.prototype.getMessage = function () {
        return this.message;
    };
    RestError.prototype.getReason = function () {
        return this.reason;
    };
    RestError.prototype.getLocation = function () {
        return this.location;
    };
    return RestError;
})();
//# sourceMappingURL=error.js.map