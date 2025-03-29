<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\profs;
use Authorization\IdentityInterface;

/**
 * profs policy
 */
class profsPolicy
{
    /**
     * Check if $user can add profs
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\profs $profs
     * @return bool
     */
    public function canAdd(IdentityInterface $user, profs $profs)
    {
        return (1 === $user->id|| 4=== $user->id);
    }

    /**
     * Check if $user can edit profs
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\profs $profs
     * @return bool
     */
    public function canEdit(IdentityInterface $user, profs $profs)
    {
        return (1 === $user->id|| 4=== $user->id);
    }
    public function canIndex(IdentityInterface $user, profs $profs)
    {
        return (1 === $user->id|| 4=== $user->id);
    }
    /**
     * Check if $user can delete profs
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\profs $profs
     * @return bool
     */
    public function canDelete(IdentityInterface $user, profs $profs)
    {
        return (1 === $user->id|| 4=== $user->id);
    }

    /**
     * Check if $user can view profs
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\profs $profs
     * @return bool
     */
    public function canView(IdentityInterface $user, profs $profs)
    {
        return (1 === $user->id|| 4=== $user->id);
    }
}
