<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use function MongoDB\BSON\toJSON;
use Validator;

class ReminderTagController extends Controller
{
    public function assignTag(Request $request)
    {
        $success = true;
        $message = '';
        $status = 200;

        $validator = Validator::make(
            $request->all(),
            [
                'contact_email' => ['required', 'email', 'exists:users,email'],
            ]
        );
        if ($validator->fails()) {
            $message = $validator->errors()->get('contact_email');
            $success = false;
        }

        $contactEmail = $request->input('contact_email');

        return response()->json([
            'success' => $success,
            'message' => $message
        ], $status);
    }
}
