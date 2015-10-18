<?php

namespace Fervo\ValidatedMessage;

use Symfony\Component\Validator\ConstraintViolationListInterface;

class ValidationFailedException extends \RuntimeException
{
    protected $violations;
    protected $violatingMessage;

    public function __construct($violatingMessage, ConstraintViolationListInterface $violations)
    {
        $this->violatingMessage = $violatingMessage;
        $this->violations = $violations;

        parent::__construct($this->__toString());
    }

    public function __toString()
    {
        return sprintf("Message of type %s failed validation\n\n%s", get_class($this->violatingMessage), (string)$this->violations);
    }

    public function getViolatingMessage()
    {
        return $this->violatingMessage;
    }

    public function getViolations()
    {
        return $this->violations;
    }
}
