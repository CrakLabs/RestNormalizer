/**
 * Created by bcolucci on 1/2/15.
 */

interface HttpMethod {
    getValue(): string;
    valueOf(value:string):HttpMethod
}

interface HttpCode {
    getValue(): number;
}

interface Data {
    getItems(): any[];
    getTotalItems(): number;
}

interface Error {
    getMessage(): string;
    getReason(): string;
    getLocation(): string;
}

interface Parameter {
    getId(): string;
    getValue(): string;
}

interface Response {
    getHttpMethod(): HttpMethod;
    getParameters(): Parameter[];
    getApiVersion(): string;
    isError(): boolean;
    getHttpErrorCode(): HttpCode;
    getErrorMessage(): string;
    getErrors(): Error[];
    getData(): Data;
}

interface ResponseParser {
    parse(json:string): Response;
}

interface ResponseBuilder {
    addParameter(parameter:Parameter):ResponseBuilder;
    addParameters(parameters:Parameter[]):ResponseBuilder;
    getParameters():Parameter[];
    build():any;
}

interface SuccessResponseBuilder extends ResponseBuilder {
    addItem(item:any):SuccessResponseBuilder;
    addItems(items:any[]):SuccessResponseBuilder;
}

interface ErrorResponseBuilder extends ResponseBuilder {
    addError(error:Error):ErrorResponseBuilder;
    addErrors(errors:Error[]):ErrorResponseBuilder;
}
