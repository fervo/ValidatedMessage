# ValidatedMessage
Automatic message validation for SimpleBus

## How to use
Tag your message with the `Fervo\ValidatedMessage\Validated` marker interface. All messages tagged with the interface will be validated by the Symfony validator passed to the constructor of the ValidatingMiddleware.
