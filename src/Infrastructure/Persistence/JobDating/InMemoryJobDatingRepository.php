<?php
declare(strict_types=1);

namespace App\Infrastructure\Persistence\JobDating;

use App\Domain\JobDating\JobDating;
use App\Domain\JobDating\JobDatingNotFoundException;
use App\Domain\JobDating\JobDatingRepository;

class InMemoryJobDatingRepository implements JobDatingRepository
{
    /**
     * @var User[]
     */
    private $jobDatings;

    /**
     * InMemoryUserRepository constructor.
     *
     * @param array|null $users
     */
    public function __construct(array $users = null)
    {
        $this->users = $users ?? $this->_load();
    }

    private function _load()
    {
        return [
            1 => new JobDating(1, 'bill.gates', 'Bill', 'Gates'),
            2 => new User(2, 'steve.jobs', 'Steve', 'Jobs'),
            3 => new User(3, 'mark.zuckerberg', 'Mark', 'Zuckerberg'),
            4 => new User(4, 'evan.spiegel', 'Evan', 'Spiegel'),
            5 => new User(5, 'jack.dorsey', 'Jack', 'Dorsey'),
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function findAll(): array
    {
        //request bdd
        //return results
        return array_values($this->users);
    }

    /**
     * {@inheritdoc}
     */
    public function findJobDatingOfId(int $id): JobDating
    {
        if (!isset($this->users[$id])) {
            throw new UserNotFoundException();
        }

        return $this->users[$id];
    }
}
