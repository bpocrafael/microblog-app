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

            $this->profileService->updateProfileInformation($profileInformation, $validatedData);

            if (!$profileInformation->exists) {
                $this->profileService->createProfileInformation($user, $validatedData);
            }


            DB::commit();

            return redirect()->route('profileinfo.create')->with('success', 'Profile updated successfully!');
        } catch (Exception $e) {

            DB::rollBack();

            return redirect()->route('error')->with('error', 'An error occurred while updating the profile.');
        }
    }

}
