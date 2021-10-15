@extends('layout.main')


@section('main')
    <div>
        <div class="card">
            <div class="card-header">
                <h2>Form Kategori</h2>
            </div>
            <div class="card-body">
                <form action="/addtransaksi" method="POST">
                    @csrf
                    @if ($status == 1)
                        <input value="1" name="status" hidden>
                    @else
                        <input value="0" name="status" hidden>
                    @endif
                    <div class="row">
                        <div class="mb-3 col-sm-3">
                            <label for="kode" class="form-label">Kode</label>
                            <input type="text" class="form-control" id="kode" name="kode" value="WINxxxxxx" disabled>
                        </div>
                        <div class="mb-3 col-sm-3">
                            <label for="date" class="form-label">Tanggal</label>
                            <input type="text" class="form-control" id="date" name="date" value="" disabled>
                        </div>
                        <div class=" col-sm-3 mb-3">
                            <label for="kategori" class="form-label">Kategori</label>
                            <select class="form-select" id="kategori" aria-label="Example select with button addon"
                                name="kategori">
                                <option selected>Select</option>
                                @foreach ($kategori as $kat)
                                    <option value="{{ $kat->id }}">{{ $kat->nama }}</option>
                                @endforeach
                            </select>
                            @error('kategori')
                                <div class="text-danger form-text">Input tidak boleh kosong</div>
                            @enderror
                        </div>
                        <div class=" col-sm-3 mb-3">
                            <label for="dompet" class="form-label">Dompet</label>
                            <select class="form-select" id="dompet" aria-label="Example select with button addon"
                                name="dompet">
                                <option selected>Select</option>
                                @foreach ($dompet as $dom)
                                    <option value="{{ $dom->id }}">{{ $dom->nama }}</option>
                                @endforeach
                            </select>
                            @error('dompet')
                                <div class="text-danger form-text">Input tidak boleh kosong</div>
                            @enderror
                        </div>
                        <div class="mb-3 col-sm-6">
                            <label for="nilai" class="form-label">Nilai</label>
                            <input type="number" class="form-control" id="nilai" name="nilai" min="0">
                        </div>

                        <div class="mb-3 col-sm-12">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea type="text" class="form-control" id="deskripsi" name="deskripsi"></textarea>
                            @error('deskripsi')
                                <div class="text-danger form-text">Input tidak boleh kosong</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        const d = new Date();
        tahun = d.getFullYear();
        bulan = d.getMonth();
        tanggal = d.getDate();
        date = `${tahun}-${bulan}-${tanggal}`
        document.getElementById("date").value = date;
    </script>
@endsection
