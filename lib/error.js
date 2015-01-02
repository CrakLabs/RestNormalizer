/**
 * Created by bcolucci on 1/2/15.
 */
'use strict';
var error;
(function (error) {
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
    error.Error = Error;
})(error = exports.error || (exports.error = {}));
//# sourceMappingURL=error.js.map