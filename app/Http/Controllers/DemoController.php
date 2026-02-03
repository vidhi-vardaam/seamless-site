<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class DemoController extends Controller
{
    /**
     * Display the request demo page
     */
    public function index()
    {
        return view('request-demo');
    }

    /**
     * Handle demo request submission
     */
    public function submit(Request $request)
    {
        // Validate the form data
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'organization' => 'required|string|max:255',
            'job_title' => 'nullable|string|max:255',
            'message' => 'nullable|string|max:5000',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = $validator->validated();

        // Optional: Send email notification
        try {
            // Uncomment and configure when ready to send emails
            /*
            Mail::send('emails.demo-request', $data, function($message) use ($data) {
                $message->to('hello@seamless.org')
                    ->subject('New Demo Request from ' . $data['organization']);
                $message->replyTo($data['email'], $data['first_name'] . ' ' . $data['last_name']);
            });
            */

            // Optional: Store in database
            // DemoRequest::create($data);

            // For AJAX requests
            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Demo request submitted successfully!'
                ]);
            }

            // For regular form submissions
            return redirect()->back()->with('success', true);

        } catch (\Exception $e) {
            // Log the error
            \Log::error('Demo request submission error: ' . $e->getMessage());

            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'There was an error submitting your request. Please try again.'
                ], 500);
            }

            return redirect()->back()
                ->with('error', 'There was an error submitting your request. Please try again.')
                ->withInput();
        }
    }
}
