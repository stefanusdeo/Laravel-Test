@extends('layout.main')


@section('main')
    <div>
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-6">
                        <h2>Dompet</h2>
                    </div>
                    <div class="col-6 d-flex justify-content-end">
                        <a href="/addDompet" class="btn btn-md btn-primary">Buat Baru</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Referensi</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($dompet)
                            @php
                                $n = 1;
                            @endphp
                            @foreach ($dompet as $val)
                                <tr>
                                    <th scope="row">{{ $n }}</th>
                                    <td>{{ $val->nama }}</td>
                                    <td>{{ $val->referensi }}</td>
                                    <td>{{ $val->deskripsi }}</td>
                                    <td>
                                        @if ($val->status != 1)
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
                                            <li><a class="dropdown-item" href="/detailDompet/{{ $val->id }}"><i
                                                        class="fas fa-info"></i> Detail</a>
                                            </li>
                                            <li><a class="dropdown-item" href="/editDompet/{{ $val->id }}"><i
                                                        class="fas fa-pen"></i> Ubah</a>
                                            </li>
                                            <li>
                                                @if ($val->status == 1)
                                                    <a class="dropdown-item" href="/notActiveDompet/{{ $val->id }}"><i
                                                            class="fas fa-times"></i> Tidak
                                                        Aktif</a>
                                                @else
                                                    <a class="dropdown-item" href="/ActiveDompet/{{ $val->id }}"><i
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
                            <p>No Dompet</p>
                        @endif

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
