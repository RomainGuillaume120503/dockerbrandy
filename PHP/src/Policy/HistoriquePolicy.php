<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\historique;
use Authorization\IdentityInterface;

/**
 * historique policy
 */
class historiquePolicy
{
    /**
     * Check if $user can add historique
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\historique $historique
     * @return bool
     */
    public function canAdd(IdentityInterface $user, historique $historique)
    {
        return (1 === $user->id|| 4=== $user->id);
    }

    /**
     * Check if $user can edit historique
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\historique $historique
     * @return bool
     */
    public function canEdit(IdentityInterface $user, historique $historique)
    {
        return (1 === $user->id|| 4=== $user->id);
    }

    /**
     * Check if $user can delete historique
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\historique $historique
     * @return bool
     */
    public function canDelete(IdentityInterface $user, historique $historique)
    {
        return (1 === $user->id|| 4=== $user->id);
    }

    /**
     * Check if $user can view historique
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\historique $historique
     * @return bool
     */
    public function canView(IdentityInterface $user, historique $historique)
    {
        return (1 === $user->id|| 4=== $user->id);
    }
}
