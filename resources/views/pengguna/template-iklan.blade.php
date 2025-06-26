@extends('pengguna.induk')

@section('page-title', 'Cari Kerja')

@push('styles')
<style>
    .search-section {
        background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
        color: white;
        padding: 3rem 0;
        margin-bottom: 2rem;
        border-radius: 0 0 30px 30px;
        box-shadow: 0 10px 30px rgba(40, 167, 69, 0.3);
        animation: fadeInDown 0.8s ease-out;
    }
    
    .search-title {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 1rem;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
    }
    
    .search-subtitle {
        font-size: 1.2rem;
        opacity: 0.9;
        margin-bottom: 2rem;
    }
    
    .search-form {
        background: rgba(255,255,255,0.1);
        border-radius: 20px;
        padding: 1.5rem;
        backdrop-filter: blur(10px);
    }
    
    .search-input {
        border: 2px solid rgba(255,255,255,0.3);
        border-radius: 15px;
        padding: 1rem 1.5rem;
        background: rgba(255,255,255,0.9);
        font-size: 1.1rem;
        transition: all 0.3s ease;
    }
    
    .search-input:focus {
        border-color: white;
        box-shadow: 0 0 0 0.2rem rgba(255,255,255,0.25);
        background: white;
    }
    
    .search-btn {
        background: linear-gradient(135deg, #fd7e14, #ffc107);
        border: none;
        border-radius: 15px;
        padding: 1rem 2rem;
        font-weight: 600;
        color: white;
        transition: all 0.3s ease;
        box-shadow: 0 5px 15px rgba(253, 126, 20, 0.4);
    }
    
    .search-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(253, 126, 20, 0.6);
        color: white;
    }
    
    .filter-section {
        background: white;
        border-radius: 15px;
        padding: 1.5rem;
        margin-bottom: 2rem;
        box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        animation: fadeInUp 0.8s ease-out;
    }
    
    .filter-title {
        color: #28a745;
        font-weight: 600;
        margin-bottom: 1rem;
    }
    
    .filter-btn {
        background: #f8f9fa;
        border: 2px solid #e9ecef;
        border-radius: 25px;
        padding: 0.5rem 1rem;
        margin: 0.25rem;
        color: #6c757d;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-block;
        font-size: 0.9rem;
    }
    
    .filter-btn:hover,
    .filter-btn.active {
        background: linear-gradient(135deg, #28a745, #20c997);
        border-color: #28a745;
        color: white;
        transform: translateY(-1px);
    }
    
    .jobs-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
    }
    
    .job-card {
        background: white;
        border-radius: 20px;
        padding: 1.5rem;
        box-shadow: 0 8px 25px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
        border: none;
        position: relative;
        overflow: hidden;
        animation: fadeInUp 0.8s ease-out;
    }
    
    .job-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #28a745, #20c997);
    }
    
    .job-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 40px rgba(0,0,0,0.15);
    }
    
    .job-header {
        display: flex;
        align-items: flex-start;
        margin-bottom: 1rem;
    }
    
    .job-logo {
        width: 60px;
        height: 60px;
        border-radius: 15px;
        background: linear-gradient(135deg, #28a745, #20c997);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.5rem;
        margin-right: 1rem;
        flex-shrink: 0;
    }
    
    .job-info h5 {
        color: #2c3e50;
        font-weight: 700;
        margin-bottom: 0.25rem;
        font-size: 1.2rem;
    }
    
    .job-company {
        color: #28a745;
        font-weight: 600;
        margin-bottom: 0.5rem;
    }
    
    .job-location {
        color: #6c757d;
        font-size: 0.9rem;
        display: flex;
        align-items: center;
    }
    
    .job-location i {
        margin-right: 0.5rem;
    }
    
    .job-description {
        color: #495057;
        font-size: 0.95rem;
        line-height: 1.6;
        margin-bottom: 1rem;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    
    .job-tags {
        margin-bottom: 1rem;
    }
    
    .job-tag {
        background: #e8f5e8;
        color: #28a745;
        padding: 0.25rem 0.75rem;
        border-radius: 15px;
        font-size: 0.8rem;
        font-weight: 500;
        margin-right: 0.5rem;
        margin-bottom: 0.5rem;
        display: inline-block;
    }
    
    .job-footer {
        display: flex;
        justify-content: between;
        align-items: center;
        padding-top: 1rem;
        border-top: 1px solid #e9ecef;
    }
    
    .job-salary {
        color: #28a745;
        font-weight: 700;
        font-size: 1.1rem;
    }
    
    .job-date {
        color: #6c757d;
        font-size: 0.85rem;
        margin-left: auto;
    }
    
    .job-actions {
        margin-top: 1rem;
        display: flex;
        gap: 0.5rem;
    }
    
    .btn-apply {
        background: linear-gradient(135deg, #28a745, #20c997);
        border: none;
        border-radius: 12px;
        padding: 0.75rem 1.5rem;
        color: white;
        font-weight: 600;
        transition: all 0.3s ease;
        flex: 1;
        text-decoration: none;
        text-align: center;
        display: inline-block;
        cursor: pointer;
    }
    
    .btn-apply:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(40, 167, 69, 0.4);
        color: white;
    }
    
    .btn-save {
        background: #f8f9fa;
        border: 2px solid #e9ecef;
        border-radius: 12px;
        padding: 0.75rem;
        color: #6c757d;
        transition: all 0.3s ease;
        width: 50px;
        text-align: center;
    }
    
    .btn-save:hover {
        background: #28a745;
        border-color: #28a745;
        color: white;
        transform: translateY(-2px);
    }
    
    .no-jobs {
        text-align: center;
        padding: 3rem;
        color: #6c757d;
    }
    
    .no-jobs i {
        font-size: 4rem;
        margin-bottom: 1rem;
        opacity: 0.5;
    }
    
    .pagination-wrapper {
        display: flex;
        justify-content: center;
        margin-top: 2rem;
    }
    
    .job-status {
        position: absolute;
        top: 1rem;
        right: 1rem;
        background: #28a745;
        color: white;
        padding: 0.25rem 0.75rem;
        border-radius: 15px;
        font-size: 0.8rem;
        font-weight: 600;
    }
    
    .job-status.urgent {
        background: #dc3545;
        animation: pulse 2s infinite;
    }
    
    .job-status.featured {
        background: #fd7e14;
    }
    
    /* Modal Styles */
    .modal-content {
        border-radius: 20px;
        border: none;
        box-shadow: 0 20px 60px rgba(0,0,0,0.2);
    }
    
    .modal-header {
        background: linear-gradient(135deg, #28a745, #20c997);
        color: white;
        border-radius: 20px 20px 0 0;
        border-bottom: none;
        padding: 1.5rem;
    }
    
    .modal-title {
        font-weight: 700;
        font-size: 1.3rem;
    }
    
    .btn-close {
        filter: brightness(0) invert(1);
    }
    
    .modal-body {
        padding: 2rem;
    }
    
    .job-details {
        background: #f8f9fa;
        border-radius: 15px;
        padding: 1.5rem;
        margin-bottom: 1.5rem;
    }
    
    .job-details h6 {
        color: #28a745;
        font-weight: 600;
        margin-bottom: 0.5rem;
    }
    
    .job-details p {
        margin-bottom: 0.5rem;
        color: #495057;
    }
    
    .confirmation-text {
        color: #6c757d;
        font-size: 1rem;
        line-height: 1.6;
        margin-bottom: 1.5rem;
    }
    
    .modal-footer {
        border-top: none;
        padding: 0 2rem 2rem;
    }
    
    .btn-confirm {
        background: linear-gradient(135deg, #28a745, #20c997);
        border: none;
        border-radius: 12px;
        padding: 0.75rem 2rem;
        color: white;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    
    .btn-confirm:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(40, 167, 69, 0.4);
        color: white;
    }
    
    .btn-cancel {
        background: #6c757d;
        border: none;
        border-radius: 12px;
        padding: 0.75rem 2rem;
        color: white;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    
    .btn-cancel:hover {
        background: #5a6268;
        color: white;
    }
    
    @keyframes pulse {
        0% { transform: scale(1); }
        50% { transform: scale(1.05); }
        100% { transform: scale(1); }
    }
    
    @keyframes fadeInDown {
        from {
            opacity: 0;
            transform: translateY(-30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    @media (max-width: 768px) {
        .jobs-grid {
            grid-template-columns: 1fr;
        }
        
        .search-title {
            font-size: 2rem;
        }
        
        .job-header {
            flex-direction: column;
            text-align: center;
        }
        
        .job-logo {
            margin: 0 auto 1rem;
        }
        
        .job-actions {
            flex-direction: column;
        }
    }
</style>
@endpush

@section('content')
<!-- Search Section -->
<div class="search-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h1 class="search-title">Cari Peluang Kerja Terbaik</h1>
                <p class="search-subtitle">Temui jawatan yang sesuai dengan kemahiran dan minat anda</p>
                
                <form class="search-form" method="GET" action="{{ route('jobs.index') }}">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <input type="text" class="form-control search-input" name="keyword" 
                                   placeholder="Cari jawatan..." value="{{ request('keyword') }}">
                        </div>
                        <div class="col-md-3">
                            <select class="form-control search-input" name="lokasi">
                                <option value="">Semua Lokasi</option>
                                <option value="Kuala Lumpur" {{ request('lokasi') == 'Kuala Lumpur' ? 'selected' : '' }}>Kuala Lumpur</option>
                                <option value="Selangor" {{ request('lokasi') == 'Selangor' ? 'selected' : '' }}>Selangor</option>
                                <option value="Penang" {{ request('lokasi') == 'Penang' ? 'selected' : '' }}>Penang</option>
                                <option value="Johor" {{ request('lokasi') == 'Johor' ? 'selected' : '' }}>Johor</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select class="form-control search-input" name="kategori">
                                <option value="">Semua Kategori</option>
                                <option value="IT" {{ request('kategori') == 'IT' ? 'selected' : '' }}>Teknologi Maklumat</option>
                                <option value="Marketing" {{ request('kategori') == 'Marketing' ? 'selected' : '' }}>Pemasaran</option>
                                <option value="Finance" {{ request('kategori') == 'Finance' ? 'selected' : '' }}>Kewangan</option>
                                <option value="HR" {{ request('kategori') == 'HR' ? 'selected' : '' }}>Sumber Manusia</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn search-btn w-100">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Filter Section -->
<div class="container">
    <div class="filter-section">
        <h6 class="filter-title"><i class="bi bi-funnel me-2"></i>Tapis Mengikut:</h6>
        <div class="d-flex flex-wrap">
            <a href="{{ route('jobs.index') }}" class="filter-btn {{ !request()->hasAny(['jenis', 'gaji', 'pengalaman']) ? 'active' : '' }}">
                Semua
            </a>
            <a href="{{ route('jobs.index', ['jenis' => 'full-time']) }}" class="filter-btn {{ request('jenis') == 'full-time' ? 'active' : '' }}">
                Sepenuh Masa
            </a>
            <a href="{{ route('jobs.index', ['jenis' => 'part-time']) }}" class="filter-btn {{ request('jenis') == 'part-time' ? 'active' : '' }}">
                Separuh Masa
            </a>
            <a href="{{ route('jobs.index', ['jenis' => 'contract']) }}" class="filter-btn {{ request('jenis') == 'contract' ? 'active' : '' }}">
                Kontrak
            </a>
            <a href="{{ route('jobs.index', ['jenis' => 'remote']) }}" class="filter-btn {{ request('jenis') == 'remote' ? 'active' : '' }}">
                Kerja Dari Rumah
            </a>
            <a href="{{ route('jobs.index', ['gaji' => 'high']) }}" class="filter-btn {{ request('gaji') == 'high' ? 'active' : '' }}">
                Gaji Tinggi
            </a>
            <a href="{{ route('jobs.index', ['pengalaman' => 'fresh']) }}" class="filter-btn {{ request('pengalaman') == 'fresh' ? 'active' : '' }}">
                Fresh Graduate
            </a>
        </div>
    </div>
</div>

<!-- Jobs Grid -->
<div class="container">
    @if(isset($senaraiJobs) && $senaraiJobs->count() > 0)
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="mb-0">{{ $senaraiJobs->total() }} jawatan ditemui</h5>
            <div class="dropdown">
                <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                    <i class="bi bi-sort-down me-1"></i>Susun
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('jobs.index', ['sort' => 'latest']) }}">Terkini</a></li>
                    <li><a class="dropdown-item" href="{{ route('jobs.index', ['sort' => 'salary_high']) }}">Gaji Tertinggi</a></li>
                    <li><a class="dropdown-item" href="{{ route('jobs.index', ['sort' => 'salary_low']) }}">Gaji Terendah</a></li>
                    <li><a class="dropdown-item" href="{{ route('jobs.index', ['sort' => 'company']) }}">Nama Syarikat</a></li>
                </ul>
            </div>
        </div>
        
        <div class="jobs-grid">
            @foreach($senaraiJobs as $job)
                <div class="job-card">
                    @if($job->is_urgent ?? false)
                        <div class="job-status urgent">SEGERA</div>
                    @elseif($job->is_featured ?? false)
                        <div class="job-status featured">PILIHAN</div>
                    @else
                        <div class="job-status">BARU</div>
                    @endif
                    
                    <div class="job-header">
                        <div class="job-logo">
                            @if($job->company_logo ?? false)
                                <img src="{{ $job->company_logo }}" alt="{{ $job->company_name ?? 'Company' }}" class="w-100 h-100 object-fit-cover rounded">
                            @else
                                <i class="bi bi-building"></i>
                            @endif
                        </div>
                        <div class="job-info flex-grow-1">
                            <h5>{{ $job->title ?? $job->nama_jawatan ?? 'Jawatan Tidak Dinyatakan' }}</h5>
                            <div class="job-company">{{ $job->company_name ?? $job->syarikat ?? 'Syarikat Tidak Dinyatakan' }}</div>
                            <div class="job-location">
                                <i class="bi bi-geo-alt"></i>
                                {{ $job->location ?? $job->lokasi ?? 'Lokasi Tidak Dinyatakan' }}
                            </div>
                        </div>
                    </div>
                    
                    <div class="job-description">
                        {{ $job->description ?? $job->deskripsi ?? 'Tiada deskripsi tersedia untuk jawatan ini.' }}
                    </div>
                    
                    <div class="job-tags">
                        @if($job->job_type ?? $job->jenis_kerja ?? false)
                            <span class="job-tag">{{ $job->job_type ?? $job->jenis_kerja }}</span>
                        @endif
                        @if($job->experience_level ?? $job->tahap_pengalaman ?? false)
                            <span class="job-tag">{{ $job->experience_level ?? $job->tahap_pengalaman }}</span>
                        @endif
                        @if($job->category ?? $job->kategori ?? false)
                            <span class="job-tag">{{ $job->category ?? $job->kategori }}</span>
                        @endif
                    </div>
                    
                    <div class="job-footer">
                        <div class="job-salary">
                            @if($job->salary_min ?? $job->gaji_min ?? false)
                                RM {{ number_format($job->salary_min ?? $job->gaji_min) }}
                                @if($job->salary_max ?? $job->gaji_max ?? false)
                                    - RM {{ number_format($job->salary_max ?? $job->gaji_max) }}
                                @endif
                            @else
                                Gaji Boleh Dirunding
                            @endif
                        </div>
                        <div class="job-date">
                            <i class="bi bi-clock me-1"></i>
                            {{ $job->created_at ? $job->created_at->diffForHumans() : 'Baru-baru ini' }}
                        </div>
                    </div>
                    
                    <div class="job-actions">
                        @if(isset($senaraiPermohonan) && in_array($job->id, $senaraiPermohonan))
                            <button type="button" class="btn-apply" disabled style="background: #6c757d; cursor: not-allowed;">
                                <i class="bi bi-check-circle me-1"></i>Telah Dimohon
                            </button>
                        @else
                            <button type="button" class="btn-apply" data-bs-toggle="modal" data-bs-target="#applyModal" 
                                    onclick="setJobData({{ $job->id ?? 1 }}, '{{ $job->title ?? $job->nama_jawatan ?? 'Jawatan Tidak Dinyatakan' }}', '{{ $job->company_name ?? $job->syarikat ?? 'Syarikat Tidak Dinyatakan' }}', '{{ $job->location ?? $job->lokasi ?? 'Lokasi Tidak Dinyatakan' }}')">
                                <i class="bi bi-send me-1"></i>Mohon Sekarang
                            </button>
                        @endif
                        <button class="btn-save" onclick="saveJob({{ $job->id ?? 1 }})" title="Simpan Jawatan">
                            <i class="bi bi-bookmark"></i>
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
        
        <!-- Pagination -->
        <div class="pagination-wrapper">
            {{ $senaraiJobs->links() }}
        </div>
    @else
        <div class="no-jobs">
            <i class="bi bi-search"></i>
            <h4>Tiada Jawatan Ditemui</h4>
            <p>Maaf, tiada jawatan yang sepadan dengan kriteria carian anda.</p>
            <a href="{{ route('jobs.index') }}" class="user-btn-gradient">
                <i class="bi bi-arrow-left me-1"></i>Kembali ke Semua Jawatan
            </a>
        </div>
    @endif
</div>

<!-- Apply Confirmation Modal -->
<div class="modal fade" id="applyModal" tabindex="-1" aria-labelledby="applyModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="applyModalLabel">
                    <i class="bi bi-send me-2"></i>Pengesahan Permohonan Jawatan
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="job-details">
                    <h6><i class="bi bi-briefcase me-2"></i>Maklumat Jawatan</h6>
                    <p><strong>Jawatan:</strong> <span id="modalJobTitle">-</span></p>
                    <p><strong>Syarikat:</strong> <span id="modalCompany">-</span></p>
                    <p><strong>Lokasi:</strong> <span id="modalLocation">-</span></p>
                </div>
                
                <div class="confirmation-text">
                    <p><i class="bi bi-info-circle me-2 text-primary"></i>Anda akan memohon untuk jawatan ini. Pastikan maklumat profil anda adalah terkini sebelum memohon.</p>
                    <p><strong>Adakah anda pasti untuk meneruskan permohonan?</strong></p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">
                    <i class="bi bi-x-circle me-1"></i>Batal
                </button>
                <button type="button" class="btn btn-confirm" onclick="confirmApplication()">
                    <i class="bi bi-check-circle me-1"></i>Ya, Mohon Sekarang
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    let selectedJobId = null;
    
    function setJobData(jobId, jobTitle, company, location) {
        selectedJobId = jobId;
        document.getElementById('modalJobTitle').textContent = jobTitle;
        document.getElementById('modalCompany').textContent = company;
        document.getElementById('modalLocation').textContent = location;
    }
    
    function confirmApplication() {
        if (selectedJobId) {
            // Redirect to apply page using route name
            window.location.href = `{{ route('jobs.apply', '') }}/${selectedJobId}`;
        }
    }
    
    function saveJob(jobId) {
        // AJAX call to save job using route name
        fetch(`/pengguna/jobs/${jobId}/save`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Update button state
                event.target.innerHTML = '<i class="bi bi-bookmark-fill"></i>';
                event.target.style.background = '#28a745';
                event.target.style.color = 'white';
                
                // Show success message
                showAlert('Jawatan berjaya disimpan!', 'success');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showAlert('Ralat menyimpan jawatan. Sila cuba lagi.', 'error');
        });
    }
    
    function showAlert(message, type) {
        const alertDiv = document.createElement('div');
        alertDiv.className = `alert alert-${type === 'success' ? 'success' : 'danger'} alert-dismissible fade show position-fixed`;
        alertDiv.style.top = '20px';
        alertDiv.style.right = '20px';
        alertDiv.style.zIndex = '9999';
        alertDiv.innerHTML = `
            <i class="bi bi-${type === 'success' ? 'check-circle' : 'exclamation-triangle'} me-2"></i>${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        `;
        
        document.body.appendChild(alertDiv);
        
        // Auto remove after 3 seconds
        setTimeout(() => {
            if (alertDiv.parentNode) {
                alertDiv.parentNode.removeChild(alertDiv);
            }
        }, 3000);
    }
    
    // Smooth scroll for filter buttons
    document.querySelectorAll('.filter-btn').forEach(btn => {
        btn.addEventListener('click', function(e) {
            if (this.getAttribute('href').includes('#')) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth' });
                }
            }
        });
    });
</script>
@endpush