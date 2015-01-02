/**
 * Created by bcolucci on 1/2/15.
 */
'use strict';

export module rest {

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