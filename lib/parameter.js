/**
 * Created by bcolucci on 1/2/15.
 */
'use strict';
var rest;
(function (rest) {
    var Parameter = (function () {
        function Parameter(id, value) {
            this.id = id;
            this.value = value || '';
        }
        Parameter.prototype.getId = function () {
            return this.id;
        };
        Parameter.prototype.getValue = function () {
            return this.value;
        };
        return Parameter;
    })();
    rest.Parameter = Parameter;
})(rest = exports.rest || (exports.rest = {}));
//# sourceMappingURL=parameter.js.map