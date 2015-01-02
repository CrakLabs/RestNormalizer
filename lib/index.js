/**
 * Created by bcolucci on 1/2/15.
 */
'use strict';

var rest;
(function (rest) {
  var modules = require('./modules.json');
  for (var ns in  modules) {
    var lib = require('./' + modules[ns]);
    for (var libAttr in lib) {
      rest[libAttr] = lib[libAttr];
    }
  }
})(rest = exports.rest || (exports.rest = {}));

module.exports = rest;
