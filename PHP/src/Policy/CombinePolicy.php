<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\combine;
use Authorization\IdentityInterface;

/**
 * combine policy
 */
class combinePolicy
{
    /**
     * Check if $user can add combine
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\combine $combine
     * @return bool
     */
    public function canAdd(IdentityInterface $user, combine $combine)
    {
        return true;
    }

    /**
     * Check if $user can edit combine
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\combine $combine
     * @return bool
     */
    public function canEdit(IdentityInterface $user, combine $combine)
    {
        return (1 === $user->id|| 4=== $user->id);
    }

    /**
     * Check if $user can delete combine
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\combine $combine
     * @return bool
     */
    public function canDelete(IdentityInterface $user, combine $combine)
    {
        return (1 === $user->id|| 4=== $user->id);
    }

    /**
     * Check if $user can view combine
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\combine $combine
     * @return bool
     */
    public function canView(IdentityInterface $user, combine $combine)
    {
        return (1 === $user->id|| 4=== $user->id);
    }

    public function canTerminer(IdentityInterface $user, combine $combine)
    {
        return (1 === $user->id|| 4=== $user->id);
    }
}
