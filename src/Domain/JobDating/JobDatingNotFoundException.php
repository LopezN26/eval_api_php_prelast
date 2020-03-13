<?php
declare(strict_types=1);

namespace App\Domain\JobDating;

use App\Domain\DomainException\DomainRecordNotFoundException;

class UserNotFoundException extends DomainRecordNotFoundException
{
    public $message = 'The job dating you requested does not exist.';
}
