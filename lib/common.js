/**
 * Created by bcolucci on 1/2/15.
 */
'use strict';
var common;
(function (common) {
    var Data = (function () {
        function Data(items) {
            this.items = items;
        }
        Data.prototype.getTotalItems = function () {
            return this.items.length;
        };
        return Data;
    })();
    common.Data = Data;
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
    common.Parameter = Parameter;
})(common = exports.common || (exports.common = {}));
//# sourceMappingURL=common.js.map