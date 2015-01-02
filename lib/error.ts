/**
 * Created by bcolucci on 1/2/15.
 */
'use strict';

export module error {

  export class Error {
    message : string;
    reason : string;
    location : string;

    constructor(message : string, reason : string, location? : string) {
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

    getMessage() : string {
      return this.message;
    }

    getReason() : string {
      return this.reason;
    }

    getLocation() : string {
      return this.location;
    }
  }

}