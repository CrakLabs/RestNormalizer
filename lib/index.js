/**
 * Created by bcolucci on 1/2/15.
 */
'use strict';

//var error = require('./error');
//console.log(error);

var rest;
(function (rest) {
  var libs = [
    'error',
    'httpcode',
    'httpmethod',
    'parameter'
  ];
  for (var i in  libs) {
    var lib = require('./' + libs[i]).rest;
    for (var j in lib) {
      rest[j] = lib[j];
    }
  }
})(rest = exports.rest || (exports.rest = {}));

module.exports = rest;
