<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Services\ProfileInformationService;
use App\Http\Requests\ProfileInformationStoreRequest;

class ProfileInformationController extends Controller
{
    public const DESTINATION_PATH = 'public/images';
    protected ProfileInformationService $profileService;

    public function __construct(ProfileInformationService $profileService)
    {
        $this->profileService = $profileService;
    }

    /**
     * Create a newly information.
    */
    public function create(): View|RedirectResponse
    {
        $user = auth()->user();

        $profileInformation = $this->profileService->getProfileInformation($user);

        return view('user.settings', compact('profileInformation'));
    }

    /**
     * Store and Update information.
    */
    public function store(ProfileInformationStoreRequest $request): RedirectResponse
    {
        try {
            DB::beginTransaction();

            $user = auth()->user();
            $validatedData = $request->validated();
            $profileInformation = $this->profileService->getProfileInformation($user);

            if ($request->hasFile('profile_pic')) {
                $images = $request->file('profile_pic');

                if (is_array($images)) {
                    foreach ($images as $image) {
                        $image_name = $image->getClientOriginalName();
                        $image->storeAs(self::DESTINATION_PATH, $image_name);
                    }
                } elseif ($images instanceof \Illuminate\Http\UploadedFile) {
                    $image_name = $images->getClientOriginalName();
                    $images->storeAs(self::DESTINATION_PATH, $image_name);
                }

                if (isset($image_name)) {
                    $validatedData['image'] = $image_name;
                }
            }

            $this->profileService->updateProfileInformation($profileInformation, $validatedData);

            if (!$profileInformation->exists) {
                $this->profileService->createProfileInformation($user, $validatedData);
            }

            DB::commit();

            return redirect()->route('profileinfo.create')->with('success', 'Profile updated successfully!');
        } catch (Exception $e) {

            DB::rollBack();

            return redirect()->route('profile-info.create')->with('error', 'An error occurred while updating the profile.');
        }
    }

    /**
     * Delete the user's profile picture.
     */
    public function deleteProfilePicture(): RedirectResponse
    {
        $user = auth()->user();
        $isDeleted = $this->profileService->deleteProfilePicture($user);

        if ($isDeleted) {
            return redirect()->route('profile-info.create');
        }
        return redirect()->route('profile-info.create')->with('error', 'Unable to delete profile picture.');
    }
}
