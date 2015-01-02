/**
 * Created by bcolucci on 1/2/15.
 */
'use strict';
var rest;
(function (rest) {
    var Error = (function () {
        function Error(message, reason, location) {
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
        Error.prototype.getMessage = function () {
            return this.message;
        };
        Error.prototype.getReason = function () {
            return this.reason;
        };
        Error.prototype.getLocation = function () {
            return this.location;
        };
        return Error;
    })();
    rest.Error = Error;
})(rest = exports.rest || (exports.rest = {}));
//# sourceMappingURL=error.js.map