<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\Avatar;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;

class AvatarRepository
{


    /**
     * @var User
     * @var Avatar
     */
    private $user;
    private $avatar;

    public function __construct(User $user, Avatar $avatar)
    {
        $this->user = $user;
        $this->avatar = $avatar;
    }

    public function getAll()
    {
        return Avatar::latest()
            ->select('name', 'id')
            ->paginate(5);
    }

    public function getAvatar($id)
    {
        return Avatar::findOrFail($id);
    }


    public function getAvatars(int $userId)
    {
        return Avatar::latest()
            ->where('user_id', $userId)
            ->select('name', 'id')
            ->paginate(5);
    }

    public function createAvatar(string $name, int $user_Id)
    {
        return $this->avatar->newQuery()->create([
            'name' => $name,
            'user_id' => $user_Id
        ]);
    }
}
