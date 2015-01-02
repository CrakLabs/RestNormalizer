/**
 * Created by bcolucci on 1/2/15.
 */

module RestNormalizer {

    export function NewError(message:string, reason:string, location?:string):{message:string; reason:string; location:string
    } {
        message = message.trim();
        if (!message.length) {
            throw new Error('Error message is required');
        }

        reason = reason.trim();
        if (!reason.length) {
            throw new Error('Error reason is required');
        }

        location = (location || '').trim();

        return {message: message, reason: reason, location: location};
    }

}