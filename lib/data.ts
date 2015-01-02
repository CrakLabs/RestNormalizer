/**
 * Created by bcolucci on 1/2/15.
 */
'use strict';

export module commons {

  export class Data {
    items : any[];

    constructor(items : any[]) {
      this.items = items;
    }

    getTotalItems() : number {
      return this.items.length;
    }
  }

}