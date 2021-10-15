@extends('layout.main')


@section('main')
    @php
    $num = 0;
    @endphp
    @foreach ($kategori as $val)
        <?php $num++; ?>
    @endforeach
    <div>
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-6">
                        <h2>kategori</h2>
                    </div>
                    <div class="col-6 d-flex justify-content-end">
                        <a href="/addkategori" class="me-2 btn btn-md btn-primary">Buat Baru</a>
                        @if ($status_ID != 1)
                            <a href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"
                                class="ms-2 btn dropdown-toggle btn-md btn-primary">Tidak Aktif ({{ $num }})</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a href="/kategori" class="dropdown-item"> All</a>
                                </li>
                                <li><a href="/kategori/1" class="dropdown-item"> Aktif</a>
                                </li>
                            </ul>
                        @else
                            <a href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"
                                class="ms-2 btn dropdown-toggle btn-md btn-primary"> Aktif ({{ $num }})</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a href="/kategori" class="dropdown-item"> All</a>
                                </li>
                                <li><a href="/kategori/0" class="dropdown-item"> Tidak Aktif</a>
                                </li>
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table" id="table1">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($kategori)
                            @php
                                $n = 1;
                            @endphp
                            @foreach ($kategori as $val)
                                <tr>
                                    <th scope="row">{{ $n }}</th>
                                    <td>{{ $val->nama }}</td>
                                    <td>{{ $val->deskripsi }}</td>
                                    <td>
                                        @if ($val->status_ID != 1)
                                            <p> Tidak
                                                Aktif</p>
                                        @else
                                            <p> Aktif</p>
                                        @endif
                                    </td>
                                    <td><a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fas fa-sliders-h"></i>
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <li><a class="dropdown-item" href="/detailkategori/{{ $val->id }}"><i
                                                        class="fas fa-info"></i> Detail</a>
                                            </li>
                                            <li><a class="dropdown-item" href="/editkategori/{{ $val->id }}"><i
                                                        class="fas fa-pen"></i> Ubah</a>
                                            </li>
                                            <li>
                                                @if ($val->status_ID == 1)
                                                    <a class="dropdown-item"
                                                        href="/notActivekategori/{{ $val->id }}"><i
                                                            class="fas fa-times"></i> Tidak
                                                        Aktif</a>
                                                @else
                                                    <a class="dropdown-item" href="/Activekategori/{{ $val->id }}"><i
                                                            class="fas fa-check"></i>
                                                        Aktif</a>
                                                @endif
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                <?php $n++; ?>
                            @endforeach
                        @else
                            <p>No kategori</p>
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
