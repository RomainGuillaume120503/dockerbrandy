<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\parieurTextuelle;
use Authorization\IdentityInterface;

/**
 * parieurTextuelle policy
 */
class parieurTextuellePolicy
{
    /**
     * Check if $user can add parieurTextuelle
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\parieurTextuelle $parieurTextuelle
     * @return bool
     */
    public function canAdd(IdentityInterface $user, parieurTextuelle $parieurTextuelle)
    {
        return true;
    }

    /**
     * Check if $user can edit parieurTextuelle
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\parieurTextuelle $parieurTextuelle
     * @return bool
     */
    public function canEdit(IdentityInterface $user, parieurTextuelle $parieurTextuelle)
    {
        return (1 === $user->id|| 4=== $user->id);
    }

    /**
     * Check if $user can delete parieurTextuelle
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\parieurTextuelle $parieurTextuelle
     * @return bool
     */
    public function canDelete(IdentityInterface $user, parieurTextuelle $parieurTextuelle)
    {
        return (1 === $user->id|| 4=== $user->id);
    }

    /**
     * Check if $user can view parieurTextuelle
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\parieurTextuelle $parieurTextuelle
     * @return bool
     */
    public function canView(IdentityInterface $user, parieurTextuelle $parieurTextuelle)
    {
        return (1 === $user->id|| 4=== $user->id);
    }
}
