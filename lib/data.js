/**
 * Created by bcolucci on 1/2/15.
 */
'use strict';
var commons;
(function (commons) {
    var Data = (function () {
        function Data(items) {
            this.items = items;
        }
        Data.prototype.getTotalItems = function () {
            return this.items.length;
        };
        return Data;
    })();
    commons.Data = Data;
})(commons = exports.commons || (exports.commons = {}));
//# sourceMappingURL=data.js.map