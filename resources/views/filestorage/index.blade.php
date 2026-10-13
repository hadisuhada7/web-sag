@extends('shared.master')

@section('content')
    <section class="space-ptb background-sidoagung">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 pb-lg-0">
                    <div class="section-title mb-3 pt-2">
                        <h2 class="text-white">File Storage</h2>
                    </div>
                    <p class="text-white">
                        Daftar aplikasi Android (APK) yang dapat diunduh.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="space-ptb">
        <div class="container">
            <div class="table-responsive">
                <table class="table table-bordered table-hover bg-white">
                    <thead>
                        <tr>
                            <th style="width: 6%;">No</th>
                            <th>Nama Aplikasi</th>
                            <th style="width: 12%;">Versi</th>
                            <th style="width: 18%;">Tanggal Release</th>
                            <th style="width: 18%;">Download</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($list as $i => $apk)
                            <tr>
                                <td>{{ $i + 1 }}</td>
                                <td>{{ $apk->app_name }}</td>
                                <td>{{ $apk->version }}</td>
                                <td>{{ $apk->release_date->format('d-m-Y') }}</td>
                                <td>
                                    <a href="{{ route('file-storage.download', ['id' => $apk->id]) }}"
                                        class="btn btn-sm btn-primary" download>
                                        <i class="fa fa-download"></i> Download APK
                                        <small>({{ $apk->readable_size }})</small>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">Belum ada file yang tersedia.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
