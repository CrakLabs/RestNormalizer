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
})(error = exports.error || (exports.error = {}));
//# sourceMappingURL=builderror.js.map