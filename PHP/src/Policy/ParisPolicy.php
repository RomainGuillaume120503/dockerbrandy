<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\Paris;
use Authorization\IdentityInterface;

/**
 * Paris policy
 */
class ParisPolicy
{
    /**
     * Check if $user can add Paris
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Paris $paris
     * @return bool
     */
    public function canAdd(IdentityInterface $user, Paris $paris)
    {
        return (1 === $user->id|| 4=== $user->id);
    }

    /**
     * Check if $user can edit Paris
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Paris $paris
     * @return bool
     */
    public function canEdit(IdentityInterface $user, Paris $paris)
    {
        return (1 === $user->id|| 4=== $user->id);
    }

    /**
     * Check if $user can delete Paris
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Paris $paris
     * @return bool
     */
    public function canDelete(IdentityInterface $user, Paris $paris)
    {
        return (1 === $user->id|| 4=== $user->id);
    }

    /**
     * Check if $user can view Paris
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Paris $paris
     * @return bool
     */
    public function canView(IdentityInterface $user, Paris $paris)
    {
        return (1 === $user->id|| 4=== $user->id);
    }
    public function canTerminer(IdentityInterface $user, Paris $paris)
    {
        return (1 === $user->id|| 4=== $user->id);
    }
}
