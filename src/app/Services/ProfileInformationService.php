<?php

namespace App\Services;

use App\Models\User;
use App\Models\ProfileInformation;

class ProfileInformationService
{
    /**
    * Get the profile information for a user or create a new ProfileInformation instance if none exists.
    */
    public function getProfileInformation(?User $user): ProfileInformation
    {
        return $user ? $user->profileInformation ?? new ProfileInformation() : new ProfileInformation();
    }
    /**
     * @param array<string, mixed> $data
     */
    public function createProfileInformation(?User $user, array $data): ProfileInformation
    {
        if ($user) {
            $profileInformation = new ProfileInformation($data);
            $user->profileInformation()->save($profileInformation);
            return $profileInformation;
        }

        throw new \InvalidArgumentException("Cannot create profile information without a valid user.");
    }

    /**
     * @param array<string, mixed> $data
     */
    public function updateProfileInformation(ProfileInformation $profileInformation, array $data): void
    {
        $profileInformation->update($data);
    }

}
