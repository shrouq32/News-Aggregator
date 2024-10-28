@extends('layouts.app')

@section('title', 'Welcome - Personalized News Aggregator')

@section('content')
<div class="container">
    <!-- Hero Section -->
    <div class="jumbotron text-center my-5">
        <h1 class="display-4">Welcome to the Personalized News Aggregator</h1>
        <p class="lead">Stay updated with news articles tailored to your interests. Register to customize your feed with topics you care about!</p>
        
        <!-- Call-to-Action Button for Guests -->
        @guest
            <a href="{{ route('register') }}" class="btn btn-primary btn-lg mt-3">Register Now</a>
        @endguest
    </div>
</div>
@endsection
