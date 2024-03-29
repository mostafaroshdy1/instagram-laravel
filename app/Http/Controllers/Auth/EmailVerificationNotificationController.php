<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Jobs\SendEmailNotification;
use App\Notifications\EmailNotification;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EmailVerificationNotificationController extends Controller
{
    /**
     * Send a new email verification notification.
     */
    public function store(Request $request): RedirectResponse
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->intended(route('dashboard', absolute: false));
        }

        // $request->user()->sendEmailVerificationNotification();
        // SendEmailNotification::dispatch();
        $request->user()->notify(new EmailNotification());

        return back()->with('status', 'verification-link-sent');
    }
}
