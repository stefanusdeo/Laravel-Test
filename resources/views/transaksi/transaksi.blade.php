@extends('layout.main')


@section('main')
    @php
    $num = 0;
    @endphp
    @foreach ($transaksi as $val)
        <?php $num++; ?>
    @endforeach
    <div>
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-6">
                        @if ($status == 1)
                            <h2>Transaksi Masuk</h2>
                        @else
                            <h2>Transaksi Keluar</h2>
                        @endif
                    </div>
                    <div class="col-6 d-flex justify-content-end">
                        @if ($status == 1)
                            <a href="/addtransaksi/1" class="me-2 btn btn-md btn-primary">Buat Baru</a>
                        @else
                            <a href="/addtransaksi/2" class="me-2 btn btn-md btn-primary">Buat Baru</a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="card-body">
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
                        @if ($transaksi)
                            @php
                                $n = 1;
                            @endphp
                            @foreach ($transaksi as $val)
                                <tr>
                                    <th scope="row">{{ $n }}</th>
                                    <td>{{ substr($val->tanggal, 0, 10) }}</td>
                                    <td>
                                        {{ $val->kode }}
                                    </td>
                                    <td>
                                        {{ $val->deskripsi }}
                                    </td>
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
                        @else
                            <p>No transaksi</p>
                        @endif

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('jstable')
    <script>
        $(document).ready(function() {
            $('#table1').DataTable();
        });
    </script>
@endpush
