@extends('layout.main')


@section('main')
    <div>
        <div class="card">
            <div class="card-header">
                <h2>Form Dompet</h2>
            </div>
            <div class="card-body">
                <form action="{{ url('laporan/') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="input-group input-daterange">
                                <input type="text" name="from_date" id="from_date" readonly class="form-control" />
                                <div class="input-group-addon ms-1 me-1">to</div>
                                <input type="text" name="to_date" id="to_date" readonly class="form-control" />
                            </div>
                        </div>
                        <div class=" col-sm-6 mb-3">
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
                        <div class=" col-sm-6 mb-3">
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
                        <div class="col-md-12 ms-auto">
                            <button type="submit" name="filter" id="filter" class="btn btn-info btn-sm">Filter</button>
                            <button type="reset" name="refresh" id="refresh" class="btn btn-warning btn-sm">Refresh</button>
                        </div>
                    </div>
                </form>
                <table class="table" id="table1">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Kode</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Nilai</th>
                            <th scope="col">Dompet</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $n = 1;
                        ?>
                        @foreach ($transaksi as $val)
                            <tr>
                                <th scope="row">{{ $n }}</th>
                                <td>{{ substr($val->tanggal, 0, 10) }}</td>
                                <td>{{ $val->kode }}</td>
                                <td>{{ $val->deskripsi }}</td>
                                <td>
                                    @php
                                        $kategori = DB::table('kategoris')
                                            ->where('id', $val->Kategori_ID)
                                            ->get();
                                    @endphp
                                    @foreach ($kategori as $kat)
                                        {{ $kat->nama }}
                                    @endforeach
                                </td>
                                <td>
                                    @if ($val->Status_ID == 1)
                                        {{ '(+) ' . $val->nilai }}
                                    @else
                                        {{ '(-) ' . $val->nilai }}

                                    @endif
                                </td>
                                <td>
                                    @php
                                        $kategori = DB::table('dompets')
                                            ->where('id', $val->Dompet_ID)
                                            ->get();
                                    @endphp
                                    @foreach ($kategori as $kat)
                                        {{ $kat->nama }}
                                    @endforeach
                                </td>
                            </tr>
                            <?php $n++; ?>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

@push('jstable')
    <script>
        $(document).ready(function() {
            $('.input-daterange').datepicker({
                todayBtn: 'linked',
                format: 'yyyy-mm-dd',
                autoclose: true
            });
        });
    </script>
@endpush
