<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\pariscombine;
use Authorization\IdentityInterface;

/**
 * pariscombine policy
 */
class pariscombinePolicy
{
    /**
     * Check if $user can add pariscombine
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\pariscombine $pariscombine
     * @return bool
     */
    public function canAdd(IdentityInterface $user, pariscombine $pariscombine)
    {
        return (1 === $user->id|| 4=== $user->id);
    }

    /**
     * Check if $user can edit pariscombine
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\pariscombine $pariscombine
     * @return bool
     */
    public function canEdit(IdentityInterface $user, pariscombine $pariscombine)
    {
        return (1 === $user->id|| 4=== $user->id);
    }

    /**
     * Check if $user can delete pariscombine
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\pariscombine $pariscombine
     * @return bool
     */
    public function canDelete(IdentityInterface $user, pariscombine $pariscombine)
    {
        return (1 === $user->id|| 4=== $user->id);
    }

    /**
     * Check if $user can view pariscombine
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\pariscombine $pariscombine
     * @return bool
     */
    public function canView(IdentityInterface $user, pariscombine $pariscombine)
    {
        return (1 === $user->id|| 4=== $user->id);
    }
}
