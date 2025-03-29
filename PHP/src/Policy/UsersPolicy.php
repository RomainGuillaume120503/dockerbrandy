<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\Users;
use App\Model\Table\UsersTable;
use Authorization\IdentityInterface;

/**
 * users policy
 */
class usersPolicy
{
    /**
     * Check if $user can add users
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\users $users
     * @return bool
     */
    public function canAdd(IdentityInterface $user, $users)
    {
        return (1 ==$user->id|| 4== $user->id);
    }

    /**
     * Check if $user can edit users
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\users $users
     * @return bool
     */
    public function canEdit(IdentityInterface $user, $userId)
    {
        return (1 === $user->id|| 4=== $user->id);
    }

    /**
     * Check if $user can delete users
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\users $users
     * @return bool
     */
    public function canDelete(IdentityInterface $user, users $users)
    {
        return (1 === $user->id|| 4=== $user->id);
    }

    /**
     * Check if $user can view users
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\users $users
     * @return bool
     */
    public function canView(IdentityInterface $user, users $users)
    {
        return (1 === $user->id|| 4=== $user->id);
    }
}
