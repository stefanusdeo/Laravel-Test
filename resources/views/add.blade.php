@extends('layout.main')


@section('main')
    <div>
        <div class="card">
            <div class="card-header">
                <h2>Form Dompet</h2>
            </div>
            <div class="card-body">
                <form action="/createDompet" method="POST">
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-sm-6">
                            <label for="exampleInputEmail1" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="nama"
                                aria-describedby="emailHelp">
                            @error('nama')
                                <div class="text-danger form-text">Input tidak boleh kosong</div>
                            @enderror
                        </div>
                        <div class="mb-3 col-sm-6">
                            <label for="exampleInputPassword1" class="form-label">Referensi</label>
                            <input type="number" class="form-control" id="exampleInputPassword1" name="referensi">
                            @error('referensi')
                                <div class="text-danger form-text">Input tidak boleh kosong</div>
                            @enderror
                        </div>
                        <div class="mb-3 col-sm-12">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea type="text" class="form-control" id="deskripsi" name="deskripsi"></textarea>
                            @error('deskripsi')
                                <div class="text-danger form-text">Input tidak boleh kosong</div>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <select class="form-select" id="inputGroupSelect03"
                                aria-label="Example select with button addon" name="status">
                                <option value="1" selected>Aktif</option>
                                <option value="0">Tidak Aktif</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
