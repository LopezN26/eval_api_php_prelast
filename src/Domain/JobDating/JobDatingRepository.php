<?php
declare(strict_types=1);

namespace App\Domain\JobDating;

interface JobDatingRepository
{
    /**
     * @return JobDating[]
     */
    public function findAll(): array;

    /**
     * @param int $id
     * @return User
     * @throws JobDatingNotFoundException
     */
    public function findJobDatingOfId(int $id): JobDating;
}
