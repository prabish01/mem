@extends('layouts.frontend')

@section('content')
<div class="container mx-auto px-4 py-16">
    <h1 class="text-4xl font-bold text-center mb-8">404 - Page Not Found</h1>
    <p class="text-center text-gray-600 mb-8">The resource you're looking for could not be found.</p>
    <div class="text-center">
        <a href="{{ url('/') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-lg">
            Return to Homepage
        </a>
    </div>
</div>
@endsection