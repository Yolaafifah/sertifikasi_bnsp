@extends('layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Arsip Surat</h1>
        
    </div>
    <h5>Berikut ini adalah surat-surat yang telah terbit dan diarsipkan.</h5>
    <h5>Klik "Lihat" pada kolom aksi untuk menampilkan surat.</h5>
    <br><br>
    <form action="/cari" method="GET">
            Cari Surat: <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search.." name="cari" value="{{ old('cari') }}">
                <button class="btn btn-outline-secondary" type="submit" value='cari'>Cari</button>
            </div>
        </form>
        <div class="row table-responsive">
            <div class="col">
    <table class="table table-hover table-head-fixed" id='tabelsurats'>
        <thead>
        <tr class="bg-secondary">
                <th scope="col">Nomor Surat</th>
                <th scope="col">Kategori</th>
                <th scope="col">Judul</th>
                <th scope="col">Waktu Pengarsipan</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php $no = 0;?>
            @foreach ($surat as $p)
            <?php $no++ ;?>
                <tr>
                    <td>{{ $p->nomor_surat }}</td>
                    <td>{{ $p->kategori }}</td>
                    <td>{{ $p->judul }}</td>
                    <td>{{ $p->updated_at }}</td>
                    <td>
                        <a href="/hapus/{{ $p->id }}">
                            <button class="badge bg-danger border-0" onclick="return confirm('Yakin menghapus data?')">Hapus</button>
                        </a>
                        <a href="{{ url('/download', $p->file) }}" class="badge bg-warning" >Unduh</span></a>
                        <a href="{{ url('/lihat-surat', $p->id) }}" class="badge bg-info">Lihat</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
        </div>
    <a href="/arsipkan-surat">
        <button type="button" class="btn btn-primary">Arsipkan Surat</button>
    </a>
@endsection
