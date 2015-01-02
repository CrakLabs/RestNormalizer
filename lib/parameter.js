/**
 * Created by bcolucci on 1/2/15.
 */
'use strict';
var commons;
(function (commons) {
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
    commons.Parameter = Parameter;
})(commons = exports.commons || (exports.commons = {}));
//# sourceMappingURL=parameter.js.map