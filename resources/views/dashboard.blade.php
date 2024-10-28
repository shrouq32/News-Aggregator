@extends('layouts.app')

@section('title', 'Dashboard - Your Personalized News Feed')

@section('content')
<div class="container">
    <h1 class="text-center my-4" style="color: #16423C;">Your Personalized News Feed</h1>

    <!-- Preferences Form -->
    <div class="card mb-5" style="background-color: #f1f8f6; border-color: #16423C;">
        <div class="card-header" style="background-color: #16423C; color: #ffffff;">
            <h3>Select Your Favorite Topics</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('savePreferences') }}">
                @csrf
                <div class="row">
                    @foreach ($topics as $topic)
                        <div class="col-md-4 mb-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="topics[]" value="{{ $topic->id }}"
                                       {{ in_array($topic->id, auth()->user()->preferences->pluck('topic_id')->toArray()) ? 'checked' : '' }}>
                                <label class="form-check-label" style="color: #16423C;">{{ $topic->name }}</label>
                            </div>
                        </div>
                    @endforeach
                </div>
                <button type="submit" class="btn btn-primary mt-3" style="background-color: #16423C; border-color: #16423C;">Save Preferences</button>
            </form>
        </div>
    </div>

    <!-- Articles Section -->
    <h2 class="mb-4" style="color: #16423C;">Latest Articles</h2>
    @if(empty($articles))
        <div class="alert alert-warning" role="alert" style="background-color: #f9e7e7; color: #16423C; border-color: #f5c2c7;">
            No articles found for your selected topics. Please try again later or update your preferences.
        </div>
    @else
        <div class="row">
            @foreach ($articles as $article)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm" style="background-color: #f1f8f6; border-color: #16423C;">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title" style="color: #16423C;">{{ $article['title'] }}</h5>
                            <p class="card-text text-truncate" style="color: #6a6a6a;">{{ $article['description'] }}</p>
                        </div>
                        <div class="card-footer">
                            <a href="{{ $article['url'] }}" target="_blank" class="btn btn-outline-primary w-100" style="color: #16423C; border-color: #16423C;">Read More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
