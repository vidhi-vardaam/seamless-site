<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.index');
})->name('home');

Route::get('/test', function () {
    return view('test');
});

Route::get('/about', function () {
    return view('pages.about');
})->name('about');

Route::get('/features', function () {
    return view('pages.features');
})->name('features');

Route::get('/integrations', function () {
    return view('pages.integrations');
})->name('integrations');

Route::get('/pricing', function () {
    return view('pages.pricing');
})->name('pricing');

Route::get('/faq', function () {
    return view('pages.faq');
})->name('faq');

Route::get('/request-demo', function () {
    return view('pages.request-demo');
})->name('request-demo');

Route::post('/request-demo', function (\Illuminate\Http\Request $request) {
    // Validate the request
    $validated = $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'organization' => 'required|string|max:255',
        'job_title' => 'nullable|string|max:255',
        'message' => 'nullable|string|max:1000',
    ]);

    // Here you can add logic to send email, save to database, etc.
    // For now, just redirect back with success message

    return redirect()->route('request-demo')->with('success', 'Demo request received! We will contact you soon.');
})->name('demo.submit');

Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');

Route::post('/contact', function (\Illuminate\Http\Request $request) {
    $validated = $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'organization' => 'nullable|string|max:255',
        'subject' => 'required|string|max:255',
        'message' => 'required|string|max:2000',
    ]);

    return redirect()->back()->with('success', 'Message sent! We will respond within one business day.');
})->name('contact.submit');

Route::get('/components-demo', function () {
    return view('pages.components-demo');
})->name('components-demo');

Route::get('/404', function () {
    return view('errors.404');
})->name('404');