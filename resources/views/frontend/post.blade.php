@extends('layouts.app')
@section('title')
{{ $post->title }}
@endsection
@section('styles')
<style>
        :root {
            --blog-dark: #111111;
            --blog-body: #292929;
            --blog-bg: #fbfbfb;
        }
        body {
            font-family: 'Georgia', serif;
            color: var(--blog-body);
            background-color: var(--blog-bg);
            line-height: 1.8;
        }
        .sans-serif-font {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
        }
        .article-title {
            font-size: 2.75rem;
            line-height: 1.2;
            color: var(--blog-dark);
        }
        .article-content p {
            font-size: 1.2rem;
            margin-bottom: 1.75rem;
        }
        .blockquote-custom {
            border-left: 4px solid var(--blog-dark);
            padding-left: 1.5rem;
            font-style: italic;
            font-size: 1.35rem;
            color: #444;
            margin: 2.5rem 0;
        }
        .author-img {
            width: 48px;
            height: 48px;
            object-fit: cover;
        }
        .sticky-share-bar {
            position: sticky;
            top: 7rem;
        }
    </style>
@endsection
@section('content')
<div class="container my-5">
        <div class="row justify-content-center">

            <!-- Article Header (Full Width Focused) -->
            <div class="col-lg-10 col-xl-8 text-center mb-5">
                <nav class="sans-serif-font mb-3" aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center mb-0 text-uppercase small fw-bold tracking-wider">
                        <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-primary">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $post->tag->name }}</li>
                    </ol>
                </nav>
                <h1 class="article-title fw-bold mb-4">{{ $post->title }}</h1>
                <p class="lead text-muted fs-5 sans-serif-font mb-4">{{ $post->content }}.</p>

                <!-- Author & Meta Box -->
                <div class="d-flex align-items-center justify-content-center gap-3 sans-serif-font border-top border-bottom py-3 mt-4">
                    <img src="{{ asset('storage/users/' . $post->user->avatar) }}" class="rounded-circle author-img" alt="{{ $post->user->name }}">
                    <div class="text-start">
                        <p class="mb-0 fw-bold text-dark">{{ $post->user->name }}</p>
                        <small class="text-muted">Published {{ $post->created_at->format('M ,d, Y') }} • 6 min read</small>
                    </div>
                </div>
            </div>

            <!-- Feature Image -->
            <div class="col-12 mb-5">
                <figure class="figure w-100">
                    <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid rounded-3 w-100" alt="Minimalist interior architecture">
                    <figcaption class="figure-caption text-center mt-2 sans-serif-font italic">Photography by Studio Nord, featuring the Stockholm Eco-Pavilion project.</figcaption>
                </figure>
            </div>

            <!-- Dynamic Post Split Structure -->
            <div class="col-lg-12">
                <div class="row justify-content-center position-relative">

                    <!-- Left Sidebar Sticky Share Options (Desktop) -->
                    <div class="col-xl-2 d-none d-xl-block">
                        <div class="sticky-share-bar text-center sans-serif-font pt-2">
                            <span class="text-uppercase small fw-bold text-muted d-block mb-3">Share</span>
                            <div class="d-flex flex-column gap-3 align-items-center">
                                <a href="#" class="btn btn-light btn-sm rounded-circle shadow-sm border p-2" style="width:40px; height:40px;"><i class="bi bi-twitter-x"></i></a>
                                <a href="#" class="btn btn-light btn-sm rounded-circle shadow-sm border p-2" style="width:40px; height:40px;"><i class="bi bi-facebook text-primary"></i></a>
                                <a href="#" class="btn btn-light btn-sm rounded-circle shadow-sm border p-2" style="width:40px; height:40px;"><i class="bi bi-linkedin text-info"></i></a>
                                <a href="#" class="btn btn-light btn-sm rounded-circle shadow-sm border p-2" style="width:40px; height:40px;"><i class="bi bi-bookmark"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Center Body Text Column -->
                    <div class="col-md-10 col-lg-8 col-xl-7 article-content">

                        <!-- Footer Tags -->
                        <div class="mt-5 pt-3 border-top sans-serif-font">
                            <div class="d-flex flex-wrap gap-2 align-items-center">
                                <span class="fw-bold text-muted small text-uppercase me-2">Tags:</span>
                                <a href="#" class="badge bg-light text-dark border text-decoration-none px-3 py-2 rounded-pill">Architecture</a>
                                <a href="#" class="badge bg-light text-dark border text-decoration-none px-3 py-2 rounded-pill">Sustainability</a>
                                <a href="#" class="badge bg-light text-dark border text-decoration-none px-3 py-2 rounded-pill">Design Philosophy</a>
                            </div>
                        </div>

                        <!-- Author Author Bio Section Below Post -->
                        <div class="card border-0 bg-light p-4 my-5 rounded-3 sans-serif-font">
                            <div class="d-flex flex-column flex-sm-row align-items-center align-items-sm-start text-center text-sm-start gap-3">
                                <img src="http://127.0.0.1:8000/storge/avatars/qEdrFdBKujk1jCrJEmbBljWGzkhNHijmYxYjcA4p.png" class="rounded-circle author-img" alt="{{ $post->user->profile->profile_picture }}">
                                <div>
                                    <h5 class="fw-bold text-dark mb-1">About {{ $post->user->name }}</h5>
                                    <p class="text-muted small mb-0">Elena is a senior architectural critic and clean design strategist based out of Copenhagen. Her ongoing research tracks the physical intersection between biophilic structural framing and urban nervous systems.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Comments Section -->
                        <div class="comments-section mt-5 pt-4 border-top sans-serif-font">
                            <h4 class="fw-bold text-dark mb-4">Discussion (2)</h4>

                            <!-- Comment Entry Input -->
                            <form class="mb-4" method="post" action="{{ route('comments.store', $post->title) }}">
                                @csrf
                                <div class="mb-3">
                                    <textarea name="content" class="form-control" rows="3" placeholder="Join the discussion..."></textarea>
                                </div>
                                <input type="hidden" name="post_id" value="{{ $post->id }}">
                                <button type="submit" class="btn btn-dark btn-sm px-4 rounded-pill">Post Comment</button>
                            </form>

                            <!-- Comment List Elements -->
                             @foreach($post->comments as $comment)
                            <div class="d-flex gap-3 mb-4">
                                <div class="bg-secondary text-white rounded-circle d-flex align-items-center justify-content-center fw-bold" style="width:40px; height:40px; shrink:0; flex-shrink: 0;">AM</div>
                                <div>
                                    <div class="bg-light p-3 rounded-3">
                                        <div class="d-flex align-items-center justify-content-between mb-1">
                                            <span class="fw-bold text-dark small">{{ $comment->user->name }}</span>
                                            <span class="text-muted extra-small" style="font-size:0.75rem">{{ $comment->created_at->diffForHumans() }}  </span>
                                        </div>
                                        <p class="text-muted small mb-0">{{ $comment->content }}</p>
                                    </div>
                                    <div class="mt-2 ms-2">
                                        <a href="#" class="text-decoration-none small text-muted me-3"><i class="bi bi-hand-thumbs-up"></i> Like</a>
                                        <a href="#" class="text-decoration-none small text-muted me-3"><i class="bi bi-hand-thumbs-down"></i> Dislike</a>
                                        <a href="#" class="text-decoration-none small text-muted"><i class="bi bi-reply"></i> Reply</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach


                        </div>


                    </div>
                </div>
            </div>

        </div>
    </div>


@endsection
