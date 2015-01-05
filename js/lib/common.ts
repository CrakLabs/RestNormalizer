/**
 * Created by bcolucci on 1/2/15.
 */
'use strict';

export module common {

  export class Data {
    items : any[];

    constructor() {
      this.items = [];
    }

    getItems() : any[] {
      return this.items;
    }

    getTotalItems() : number {
      return this.items.length;
    }
  }

  export class Parameter {
    id : string;
    value : string;

    constructor(id : string, value? : string) {
      this.id = id;
      this.value = value || null;
    }

    getId() : string {
      return this.id;
    }

    getValue() : string {
      return this.value;
    }
  }

  export class Error {
    message : string;
    reason : string;
    location : string;

    constructor(message : string, reason : string, location? : string) {
      this.message = (message || '');
      if (!this.message.length) {
        throw 'Error message required';
      }

      this.reason = (reason || '');
      if (!this.reason.length) {
        throw 'Error reason required';
      }

      this.location = location || null;
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