/**
 * Created by bcolucci on 1/2/15.
 */
'use strict';
var error;
(function (error) {
    var ParseError = (function () {
        function ParseError(message) {
            this.message = message;
        }
        return ParseError;
    })();
    error.ParseError = ParseError;
})(error = exports.error || (exports.error = {}));
//# sourceMappingURL=parseerror.js.map