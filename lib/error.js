/**
 * Created by bcolucci on 1/2/15.
 */
'use strict';
var error;
(function (error) {
    var BuildError = (function () {
        function BuildError(message) {
            this.message = message;
        }
        return BuildError;
    })();
    error.BuildError = BuildError;
    var ParseError = (function () {
        function ParseError(message) {
            this.message = message;
        }
        return ParseError;
    })();
    error.ParseError = ParseError;
})(error = exports.error || (exports.error = {}));
//# sourceMappingURL=error.js.map