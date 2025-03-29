<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\parisTextuelle;
use Authorization\IdentityInterface;

/**
 * parisTextuelle policy
 */
class parisTextuellePolicy
{
    /**
     * Check if $user can add parisTextuelle
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\parisTextuelle $parisTextuelle
     * @return bool
     */
    public function canAdd(IdentityInterface $user, parisTextuelle $parisTextuelle)
    {
        return true;
    }

    /**
     * Check if $user can edit parisTextuelle
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\parisTextuelle $parisTextuelle
     * @return bool
     */
    public function canEdit(IdentityInterface $user, parisTextuelle $parisTextuelle)
    {
        return (1 === $user->id|| 4=== $user->id);
    }

    /**
     * Check if $user can delete parisTextuelle
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\parisTextuelle $parisTextuelle
     * @return bool
     */
    public function canDelete(IdentityInterface $user, parisTextuelle $parisTextuelle)
    {
        return (1 === $user->id|| 4=== $user->id);
    }

    /**
     * Check if $user can view parisTextuelle
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\parisTextuelle $parisTextuelle
     * @return bool
     */
    public function canView(IdentityInterface $user, parisTextuelle $parisTextuelle)
    {
        return (1 === $user->id|| 4=== $user->id);
    }
}
