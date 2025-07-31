@extends('pengguna.induk')

@section('page-title', 'Detail Post')

@push('styles')
<style>
    .post-detail-card {
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        transition: transform 0.2s ease;
    }
    .post-detail-card:hover {
        transform: translateY(-2px);
    }
    .post-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 2rem;
        text-align: center;
    }
    .post-content {
        padding: 2rem;
        line-height: 1.8;
        font-size: 1.1rem;
    }
    .post-meta {
        background-color: #f8f9fa;
        padding: 1.5rem;
        border-top: 1px solid #dee2e6;
    }
    .meta-item {
        display: flex;
        align-items: center;
        margin-bottom: 0.5rem;
    }
    .meta-item i {
        width: 20px;
        margin-right: 0.5rem;
        color: #6c757d;
    }
    .back-button {
        transition: all 0.3s ease;
    }
    .back-button:hover {
        transform: translateX(-5px);
    }
    .post-id-badge {
        background-color: rgba(255,255,255,0.2);
        padding: 0.25rem 0.75rem;
        border-radius: 50px;
        font-size: 0.875rem;
        margin-bottom: 1rem;
    }
</style>
@endpush

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="user-page-header text-center">
        <div class="container">
            <h1 class="user-page-title">Detail Post</h1>
            <nav class="user-breadcrumb">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.pengguna') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('posts.index') }}">Posts</a></li>
                    <li class="breadcrumb-item active">Detail</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Content Section -->
    <div class="row justify-content-center">
        <div class="col-lg-10 col-xl-8">
            <!-- Back Button -->
            <div class="mb-4">
                <a href="{{ route('posts.index') }}" class="btn btn-outline-primary back-button">
                    <i class="bi bi-arrow-left me-2"></i>
                    Kembali ke Senarai Posts
                </a>
            </div>

            <!-- Post Detail Card -->
            <div class="user-card post-detail-card">
                <!-- Post Header -->
                <div class="post-header">
                    <div class="post-id-badge">
                        Post ID: {{ $post['id'] ?? 'N/A' }}
                    </div>
                    <h2 class="mb-0">{{ $post['title'] ?? 'Tiada Tajuk' }}</h2>
                </div>

                <!-- Post Content -->
                <div class="post-content">
                    <div class="mb-4">
                        <h5 class="text-primary mb-3">
                            <i class="bi bi-file-text me-2"></i>
                            Kandungan Post
                        </h5>
                        <div class="content-text">
                            {!! nl2br(e($post['body'] ?? 'Tiada kandungan tersedia.')) !!}
                        </div>
                    </div>
                </div>

                <!-- Post Meta Information -->
                <div class="post-meta">
                    <h6 class="text-primary mb-3">
                        <i class="bi bi-info-circle me-2"></i>
                        Maklumat Post
                    </h6>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="meta-item">
                                <i class="bi bi-hash"></i>
                                <span><strong>ID Post:</strong> {{ $post['id'] ?? 'N/A' }}</span>
                            </div>
                            <div class="meta-item">
                                <i class="bi bi-person"></i>
                                <span><strong>User ID:</strong> {{ $post['userId'] ?? 'N/A' }}</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="meta-item">
                                <i class="bi bi-type"></i>
                                <span><strong>Panjang Tajuk:</strong> {{ strlen($post['title'] ?? '') }} aksara</span>
                            </div>
                            <div class="meta-item">
                                <i class="bi bi-file-text"></i>
                                <span><strong>Panjang Kandungan:</strong> {{ strlen($post['body'] ?? '') }} aksara</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="text-center mt-4">
                <div class="btn-group" role="group">
                    <a href="{{ route('posts.index') }}" class="btn btn-secondary">
                        <i class="bi bi-list me-2"></i>
                        Senarai Posts
                    </a>
                    <button type="button" class="btn btn-primary" onclick="window.print()">
                        <i class="bi bi-printer me-2"></i>
                        Cetak
                    </button>
                    <button type="button" class="btn btn-success" onclick="sharePost()">
                        <i class="bi bi-share me-2"></i>
                        Kongsi
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
function sharePost() {
    if (navigator.share) {
        navigator.share({
            title: '{{ $post["title"] ?? "Post" }}',
            text: '{{ Str::limit($post["body"] ?? "", 100) }}',
            url: window.location.href
        }).then(() => {
            console.log('Post berjaya dikongsi');
        }).catch((error) => {
            console.log('Ralat semasa berkongsi:', error);
            fallbackShare();
        });
    } else {
        fallbackShare();
    }
}

function fallbackShare() {
    // Fallback untuk browser yang tidak menyokong Web Share API
    const url = window.location.href;
    navigator.clipboard.writeText(url).then(() => {
        alert('Pautan post telah disalin ke clipboard!');
    }).catch(() => {
        // Jika clipboard API tidak tersedia
        const textArea = document.createElement('textarea');
        textArea.value = url;
        document.body.appendChild(textArea);
        textArea.select();
        document.execCommand('copy');
        document.body.removeChild(textArea);
        alert('Pautan post telah disalin ke clipboard!');
    });
}

// Print styling
window.addEventListener('beforeprint', function() {
    document.body.classList.add('printing');
});

window.addEventListener('afterprint', function() {
    document.body.classList.remove('printing');
});
</script>

<style>
@media print {
    .user-page-header,
    .btn-group,
    .back-button {
        display: none !important;
    }

    .post-detail-card {
        box-shadow: none !important;
        border: 1px solid #dee2e6 !important;
    }

    .post-header {
        background: #f8f9fa !important;
        color: #333 !important;
    }
}
</style>
@endpush
