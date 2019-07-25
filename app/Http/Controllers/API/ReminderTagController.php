<?php

namespace App\Http\Controllers\API;

use App\Http\Helpers\InfusionsoftHelper;
use App\Http\Helpers\ModuleReminderTagHelper;
use App\Http\Utility\InfusionsoftContact;
use App\ModuleReminderTag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Log;
use Throwable;
use Validator;

class ReminderTagController extends Controller
{

    public function assignTag(
        Request $request,
        InfusionsoftHelper $infusionsoftHelper,
        ModuleReminderTagHelper $moduleReminderTagHelper
    ) {
        $validator = Validator::make(
            $request->all(),
            [
                'contact_email' => ['required', 'email', 'exists:users,email'],
            ]
        );
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->get('contact_email')
            ]);
        }

        $contactEmail = $request->input('contact_email');

        try {
            $contactDetails = $infusionsoftHelper->getContact($contactEmail);
            if (!$contactDetails['_Products']) {
                $message = 'Contact has no courses';
                if (!$contactDetails) {
                    $message = 'An error had occur talking with Infusionsoft API or the contact does not exist';
                }
                return response()->json([
                    'success' => false,
                    'message' => $message
                ]);
            }

            $tagId = $moduleReminderTagHelper->getNextTagId($contactEmail, $contactDetails['_Products']);
            $response = $infusionsoftHelper->addTag($contactDetails['Id'], $tagId);

            $message = 'Reminder ' . ModuleReminderTag::find($tagId)->name . ' was set tot contact';
            if (!$response) {
                $message = 'Tag already assigned';
            }
            return response()->json([
                'success' => true,
                'message' => $message
            ]);
        } catch (Throwable $exception) {
            Log::error($exception->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'An error had occur please try again later.'
            ]);
        }
    }
}
