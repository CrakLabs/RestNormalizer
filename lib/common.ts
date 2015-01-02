/**
 * Created by bcolucci on 1/2/15.
 */
'use strict';

export module common {

  export class Data {
    items : any[];

    constructor(items : any[]) {
      this.items = items;
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
      this.value = value || '';
    }

    getId() : string {
      return this.id;
    }

    getValue() : string {
      return this.value;
    }
  }

}