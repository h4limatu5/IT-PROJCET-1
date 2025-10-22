 @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Mitra Kerja Sama</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        @forelse(\App\Models\Perusahaan::with('prodis')->get() as $perusahaan)
                        <div class="col-md-6 mb-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-3">
                                        @if($perusahaan->logo)
                                            <img src="{{ asset('storage/' . $perusahaan->logo) }}" alt="Logo {{ $perusahaan->nama_perusahaan }}" class="me-3" style="width: 60px; height: 60px; object-fit: cover; border-radius: 8px;">
                                        @else
                                            <div class="bg-secondary text-white d-flex align-items-center justify-content-center me-3" style="width: 60px; height: 60px; border-radius: 8px; font-size: 24px;">
                                                {{ substr($perusahaan->nama_perusahaan, 0, 1) }}
                                            </div>
                                        @endif
                                        <div>
                                            <h5 class="card-title mb-1">{{ $perusahaan->nama_perusahaan }}</h5>
                                            <p class="text-muted mb-0">{{ $perusahaan->provinsi ?? 'Indonesia' }}</p>
                                        </div>
                                    </div>
                                    <p class="card-text">{{ Str::limit($perusahaan->alamat, 100) }}</p>
                                    <div class="mb-3">
                                        <strong>Program Studi:</strong>
                                        <div class="mt-1">
                                            @foreach($perusahaan->prodis as $prodi)
                                                <span class="badge bg-primary me-1">{{ $prodi->nama_prodi }}</span>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <small class="text-muted">
                                                <i class="fas fa-phone"></i> {{ $perusahaan->telepon }}
                                            </small>
                                        </div>
                                        <div class="col-6">
                                            <small class="text-muted">
                                                <i class="fas fa-envelope"></i> {{ $perusahaan->email }}
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="col-md-12">
                            <div class="text-center py-5">
                                <h4>Belum ada data mitra</h4>
                                <p>Silakan tambahkan perusahaan mitra terlebih dahulu.</p>
                            </div>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
