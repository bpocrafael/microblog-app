<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use App\Services\ProfileInformationService;
use App\Http\Requests\ProfileInformationStoreRequest;
use Illuminate\Http\RedirectResponse;

class ProfileInformationController extends Controller
{
    protected ProfileInformationService $profileService;

    public function __construct(ProfileInformationService $profileService)
    {
        $this->profileService = $profileService;
    }

    public function create(): View|RedirectResponse
    {
        $user = auth()->user();
        if (!$user) {
            return redirect()->route('login');
        }
        $profileInformation = $this->profileService->getProfileInformation($user);

        return view('user.settings', compact('profileInformation'));
    }

    public function store(ProfileInformationStoreRequest $request): RedirectResponse
    {
        $user = auth()->user();

        if (!$user) {
            return redirect()->route('login');
        }

        $validatedData = $request->validated();

        $profileInformation = $this->profileService->getProfileInformation($user);

        $this->profileService->updateProfileInformation($profileInformation, $validatedData);

        if (!$profileInformation->exists) {
            $this->profileService->createProfileInformation($user, $validatedData);
        }

        return redirect()->route('profileinfo.create')->with('success', 'Profile updated successfully!');
    }

}
