<?php

namespace Fervo\ValidatedMessage;

use SimpleBus\Message\Bus\Middleware\MessageBusMiddleware;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class ValidatingMiddleware implements MessageBusMiddleware
{
    protected $validator;

    public function __construct(ValidatorInterface $validator)
    {
        $this->validator = $validator;
    }

    public function handle($message, callable $next)
    {
        if ($message instanceof Validated) {
            $violations = $this->validator->validate($message);

            if (count($violations)) {
                throw new ValidationFailedException($message, $violations);
            }
        }

        $next($message);
    }
}
