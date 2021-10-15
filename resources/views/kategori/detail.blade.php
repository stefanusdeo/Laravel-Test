@extends('layout.main')


@section('main')
    <div>
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-6">
                        <h2>Detail Kategori</h2>
                    </div>
                    <div class="col-6 d-flex justify-content-end">
                        <button onclick="history.back()" class="btn btn-md btn-secondary"><i class="fas fa-undo"></i>
                            Back</button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="mb-3 col-sm-6">
                            <label for="exampleInputEmail1" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="nama"
                                aria-describedby="emailHelp" value="{{ $kategori->nama }}" disabled>
                        </div>
                        <div class="mb-3 col-sm-12">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea type="text" class="form-control" id="deskripsi" disabled
                                name="deskripsi">{{ $kategori->deskripsi }}</textarea>
                        </div>
                        <div class="input-group mb-3">
                            @if ($kategori->status_ID == 1)
                                <p>Status: Aktif</p>
                            @else
                                <p>Status: Tidak Aktif</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
