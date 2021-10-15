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
                    <form action="/editkategori" method="POST">
                        @csrf
                        <div class="row">
                            <input name="id" value="{{ $kategori->id }}" hidden>
                            <div class="mb-3 col-sm-6">
                                <label for="exampleInputEmail1" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="nama"
                                    aria-describedby="emailHelp" value="{{ $kategori->nama }}">
                            </div>
                            <div class="mb-3 col-sm-12">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <textarea type="text" class="form-control" id="deskripsi"
                                    name="deskripsi">{{ $kategori->deskripsi }}</textarea>
                            </div>
                            <div class="input-group mb-3">
                                <select class="form-select" id="inputGroupSelect03"
                                    aria-label="Example select with button addon" name="status">
                                    @if ($kategori->status_ID == 1)
                                        <option value="1" selected>Aktif</option>
                                        <option value="0">Tidak Aktif</option>
                                    @else
                                        <option value="0" selected>Tidak Aktif</option>
                                        <option value="1">Aktif</option>
                                    @endif
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection
