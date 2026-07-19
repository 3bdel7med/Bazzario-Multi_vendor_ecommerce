@extends('layouts.app')
@section('title')
Blog
@endsection
@section('styles')
    <style>
        :root {
            --blog-dark: #111111;
            --blog-muted: #6c757d;
        }
        body {
            font-family: 'Georgia', serif;
            color: var(--blog-dark);
            background-color: #fbfbfb;
        }
        .sans-serif-font {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
        }
        .featured-hero {
            background-size: cover;
            background-position: center;
            min-height: 450px;
            border-radius: 12px;
        }
        .hover-shadow:hover {
            transform: translateY(-4px);
            transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
            box-shadow: 0 1rem 3rem rgba(0,0,0,.125)!important;
        }
        .blog-card-img {
            height: 220px;
            object-fit: cover;
        }
        .sticky-sidebar {
            position: sticky;
            top: 5.5rem;
        }
    </style>
@endsection
@section('content')
    <!-- Main Content Container -->
    <main class="container my-5">

        <!-- Featured Hero Post -->
        <div class="p-4 p-md-5 mb-5 text-white rounded bg-dark featured-hero d-flex align-items-end" style="background-image: linear-gradient(to bottom, rgba(0,0,0,0.1), rgba(0,0,0,0.85)), url('https://picsum.photos/id/48/1200/600');">
            <div class="col-lg-7 px-0">
                <span class="badge bg-primary mb-3 sans-serif-font text-uppercase px-3 py-2 rounded-pill">Featured Piece</span>
                <h1 class="display-4 fw-bold italic mb-3">The Architectural Renaissance of Minimalist Spaces</h1>
                <p class="lead my-3">Exploring how contemporary designers are stripping down modern residential hubs to elevate mental clarity and environmental sustainability.</p>
                <p class="lead mb-0 sans-serif-font"><a href="#" class="text-white fw-bold text-decoration-none">Continue reading <i class="bi bi-arrow-right ms-1"></i></a></p>
            </div>
        </div>

        <div class="row g-5">
            <!-- Left Column: Blog Posts Grid -->
            <div class="col-lg-8">
                <h3 class="pb-4 mb-4 border-bottom sans-serif-font fw-bold">
                    Latest Perspectives
                </h3>

                <div class="row g-4">
                    @foreach ($posts as $post)


                    <!-- Article 1 -->
                     <a href="{{ route('posts.show',$post->id) }}">
                    <div class="col-md-6" >
                        <article class="card h-100 border-0 bg-transparent hover-shadow rounded-3 overflow-hidden p-2">
                            <img src="{{ asset('storage/' . $post->image ) }}" class="card-img-top blog-card-img rounded-3" alt="{{ $post->title }}">
                            <div class="card-body px-1 pt-3 pb-0 d-flex flex-column">
                                <span class="text-primary text-uppercase sans-serif-font fw-semibold small mb-2 d-inline-block">{{ $post->tag->name }}</span>
                                <h4 class="card-title fw-bold mb-2">{{ $post->title }}</h4>
                                <p class="card-text text-muted small flex-grow-1">{{ $post->content }}.</p>
                                <div class="d-flex align-items-center mt-3 pt-2 sans-serif-font border-top text-muted small">
                                    <span class="fw-semibold text-dark">{{ $post->user->name }}</span>
                                    <span class="mx-2">•</span>
                                    <span>{{ $post->created_at }}</span>
                                </div>
                            </div>
                        </article>
                    </div>
                    </a>
                       @endforeach
                </div>

                <!-- Pagination Component -->
              {{ $posts->links() }}
            </div>

            <!-- Right Column: Sidebar Widgets -->
            <div class="col-lg-4">
                <div class="sticky-sidebar pt-2">

                    <!-- Profile / Bio Card Widget -->
                    <div class="p-4 mb-4 bg-white border rounded-3 sans-serif-font">
                        <h4 class="fw-bold mb-3 fs-5">About The Journal</h4>
                        <p class="text-muted small mb-0">We curate independent analysis at the intersection of design, technology paradigms, and modern culture. Updated weekly by a collaborative collective of global creatives.</p>
                    </div>

                    <!-- Trending Section Widget -->
                    <div class="p-4 mb-4 bg-white border rounded-3">
                        <h4 class="fw-bold mb-4 fs-5 sans-serif-font">Trending Now</h4>
                        <ol class="list-unstyled mb-0 d-flex flex-column gap-3">
                            <li>
                                <a class="d-flex align-items-start text-decoration-none text-dark" href="#">
                                    <span class="fs-4 fw-bold text-muted lh-1 me-3">01</span>
                                    <div>
                                        <h6 class="fw-bold mb-1">Building Your Personal Local LLM Base Station</h6>
                                        <small class="text-muted sans-serif-font">5 min read</small>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a class="d-flex align-items-start text-decoration-none text-dark" href="#">
                                    <span class="fs-4 fw-bold text-muted lh-1 me-3">02</span>
                                    <div>
                                        <h6 class="fw-bold mb-1">Typography Trends Decoded for 2027</h6>
                                        <small class="text-muted sans-serif-font">8 min read</small>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a class="d-flex align-items-start text-decoration-none text-dark" href="#">
                                    <span class="fs-4 fw-bold text-muted lh-1 me-3">03</span>
                                    <div>
                                        <h6 class="fw-bold mb-1">How Remote Teams Fight Digital Fatigue</h6>
                                        <small class="text-muted sans-serif-font">4 min read</small>
                                    </div>
                                </a>
                            </li>
                        </ol>
                    </div>

                    <!-- Newsletter Form Widget -->
                    <div class="p-4 mb-4 bg-dark text-white border rounded-3 sans-serif-font">
                        <h4 class="fw-bold mb-2 fs-5">Weekly Briefing</h4>
                        <p class="text-light opacity-75 small">Get the most impactful insights delivered straight to your inbox without noise.</p>
                        <form class="mt-3">
                            <div class="mb-2">
                                <input type="email" class="form-placeholder form-control form-control-sm border-0 rounded-2 bg-secondary bg-opacity-25 text-white" placeholder="you@example.com" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm w-100 rounded-2">Subscribe Now</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </main>
@endsection
