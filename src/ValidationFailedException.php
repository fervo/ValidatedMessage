<?php

namespace Fervo\ValidatedMessage;

use Symfony\Component\Validator\ConstraintViolationListInterface;

class ValidationFailedException extends \RuntimeException
{
    protected $violations;
    protected $message;

    public function __construct($message, ConstraintViolationListInterface $violations)
    {
        $this->message = $message;
        $this->violations = $violations;

        parent::__construct($this->__toString());
    }

    public function __toString()
    {
        return sprintf("Message of type %s failed validation\n\n%s", get_class($this->message), (string)$this->violations);
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function getViolations()
    {
        return $this->violations;
    }
}
