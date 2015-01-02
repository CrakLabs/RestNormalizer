/**
 * Created by bcolucci on 1/2/15.
 */
var RestNormalizer;
(function (RestNormalizer) {
    function NewError(message, reason, location) {
        message = message.trim();
        if (!message.length) {
            throw new Error('Error message is required');
        }
        reason = reason.trim();
        if (!reason.length) {
            throw new Error('Error reason is required');
        }
        location = (location || '').trim();
        return { message: message, reason: reason, location: location };
    }
    RestNormalizer.NewError = NewError;
})(RestNormalizer || (RestNormalizer = {}));
//# sourceMappingURL=error.js.map