<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\parieurs;
use Authorization\IdentityInterface;

/**
 * parieurs policy
 */
class parieursPolicy
{
    /**
     * Check if $user can add parieurs
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\parieurs $parieurs
     * @return bool
     */
    public function canAdd(IdentityInterface $user, parieurs $parieurs)
    {
        return true;
    }

    /**
     * Check if $user can edit parieurs
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\parieurs $parieurs
     * @return bool
     */
    public function canEdit(IdentityInterface $user, parieurs $parieurs)
    {
        return (1 === $user->id|| 4=== $user->id);
    }

    /**
     * Check if $user can delete parieurs
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\parieurs $parieurs
     * @return bool
     */
    public function canDelete(IdentityInterface $user, parieurs $parieurs)
    {
        return (1 === $user->id|| 4=== $user->id);
    }

    /**
     * Check if $user can view parieurs
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\parieurs $parieurs
     * @return bool
     */
    public function canView(IdentityInterface $user, parieurs $parieurs)
    {
        return (1 === $user->id|| 4=== $user->id);
    }
}
