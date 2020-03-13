<?php
declare(strict_types=1);

namespace App\Domain\JobDating;

use JsonSerializable;

class JobDating implements JsonSerializable
{
    /**
     * @var int|null
     */
    private $id;

    /**
     * @var User
     */
    private $user1;

    /**
     * @var User
     */
    private $user2;


    /**
     * @param int|null  $id
     * @param User    $user1
     * @param User    $user2
     */
    public function __construct(?int $id, User $user1, User $user2)
    {
        $this->id = $id;
        $this->user1 = $user1;
        $this->user2 = $user2;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return User
     */
    public function getUser1(): User
    {
        return $this->username;
    }

    /**
     * @return User
     */
    public function getUser2(): User
    {
        return $this->firstName;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'user1' => $this->user1,
            'user2' => $this->user2,
        ];
    }
    /**
     * @param object $datas
     * @return bool
     */
    public function update(object $datas): bool
    {
        $response= false;
        foreach ($datas as $k => $v)
        {
            if(!empty($this->{$k}) && $this->{$k} !== $v) {
                $this->{$k} = $v;
                $response = true;
            }
        }
        return $response;
    }
}
