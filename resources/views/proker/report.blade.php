@extends('layouts.master')

@section('content')
    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <div class="row">
                <div class="col-md-6">
                    <h6 class="m-0 font-weight-bold text-primary">Laporan Data Program Kerja</h6>
                </div>

                <div class="col-md-6">
                    <a href="{{ route('print.proker', "?id_kategori=$id_kategori&tahun=$tahun&search=$search") }}"
                        target="_blank" class="btn btn-primary float-right">
                        <i class="fa fa-print"></i></i> Unduh Rekap
                    </a>
                </div>
            </div>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form action="/lapor-proker-kp" method="get">
                    @csrf
                    <div class="row g-3 align-items-center">
                        <div class="col-3">
                            <label for="kategori" class="col-form-label">Pilih Kategori</label>
                            <select id="kategori" class="form-select" name="id_kategori">
                                <option value="{{ null }}"> Semua Kategori </option>
                                @foreach ($kategori as $item)
                                    <option value="{{ $item->id }}" {{ $item->id == $id_kategori ? 'selected' : '' }}>
                                        {{ $item->nama_kategori }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-3">

                            @php
                                $oldYear = \Carbon\Carbon::now()
                                    ->subYears(10)
                                    ->format('Y');
                                $futureYear = \Carbon\Carbon::now()
                                    ->addYears(3)
                                    ->format('Y');
                            @endphp
                            <label for="tahun" class="col-form-label">Pilih Tahun</label>
                            <select id="tahun" class="form-select" name="tahun">
                                <option value="{{ null }}">Semua Tahun </option>
                                @for ($i = $oldYear; $i < $futureYear; $i++)
                                    <option value="{{ $i }}" {{ $i == $tahun ? 'selected' : '' }}>
                                        {{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="col-3">
                            <label for="search" class="col-form-label">Search</label>
                            <input type="search" value="{{ $search }}" class="form-control" name="search"
                                id="search">
                        </div>
                        <div class="col-3">
                            <button type="submit" class="btn btn-primary" style="margin-top:8%">Search</button>
                            </select>
                        </div>
                    </div>
                </form><br>
                <table class="table table-bordered" id="example1" width="100%" cellspacing="0">
                    <thead>
                        <th>No</th>
                        <th>Kategori</th>
                        <th>Nama Program Kerja</th>
                        <th>Anggaran</th>
                        <th>Semester</th>
                        <th>Tahun</th>
                        <th>Status</th>
                    </thead>
                    <tbody>
                        @php
                            $total = 0;
                        @endphp
                        @foreach ($datas as $data)
                            @if ($data->prokers->toArray() != [])
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->nama_kategori }}</td>
                                    @foreach ($data->prokers as $item)
                                        @php
                                            $total += str_replace(',', '', $item->anggaran);
                                        @endphp
                                        <td>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>{{ $item->nama_proker }}</td>
                                    <td>{{ $item->anggaran }}</td>
                                    <td>{{ $item->semester }}</td>
                                    <td>{{ $item->tahun }}</td>
                                    <td>
                                        @if ($item->status == 1)
                                            <span class="badge text-bg-success">Sudah Dilaporkan</span>
                                        @elseif($item->status == 2)
                                            <span class="badge text-bg-danger">Belum Dilaporkan</span>
                                        @endif
                                    </td>
                                </tr>
                                </td>
                            @endforeach

                            </tr>
                        @endif
                        @endforeach
                    </tbody>
                    <tfoot>
                        <th colspan="3"> Total</th>
                        <th>{{ number_format($total) }}</th>
                        <th colspan="3"></th>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>


    {{-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel"> Tambah Data Program Kerja</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        
            <form action="/postproker" method="POST">
                @csrf


                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Nama Kategori</label>

                    <select id="id_kategori" class="form-select" name="id_kategori">

                        <option selected>Pilih Kategori</option>
                        @foreach ($datas as $k)   
                        <option value={{ $k->id  }} > {{ $k->nama_kategori }} </option>
                        @endforeach
                    </select>

                  </div>

                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Nama Program Kerja</label>
                  <input type="text" class="form-control" id="exampleInputPassword1" name="nama_proker">
                </div>

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Anggaran Dikeluarkan</label>
                    <input type="number"  class="form-control" id="anggaran" name="anggaran" oninput="formatNumber(ths)">
                        
                    <input  class="form-control" id="anggaran" name="anggaran" oninput="formatNumber(this)">

                </div>

                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Semester</label>

                    <select id="namakategori" class="form-select" name="semester">
                        <option selected>Pilih Semester </option>
                         <option value="Semester 1">Semester 1 </option>
                         <option value="Semester 2">Semester 2 </option>
                    </select>

                </div>

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Pilih Tanggal</label>
                    <input type="date" class="form-control" id="exampleInputPassword1" name="tahun">
                  </div>
                  
                  <div class="mb-3">
                    <label for="year" class="form-label">Pilih Tahun</label>
                    @php
                            $oldYear = \Carbon\Carbon::now()->subYears(10)->format('Y');
                            $futureYear = \Carbon\Carbon::now()->addYears(2)->format('Y');;
                        @endphp
                    <select id="year" class="form-select" name="tahun">
                        <option selected>Pilih Tahun </option>                          
                        @for ($i = $oldYear; $i < $futureYear; $i++)
                          <option value="{{ $i }}" >{{ $i }}</option>
                        @endfor
                    </select>
                  </div>

        </div>




        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
      </div>
    </div>
  </div> --}}


    {{-- @foreach ($prokers as $p)
    <!-- Modal Edit -->
    <div class="modal fade" id="modaledit{{ $p->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel"> Edit Data Program Kerja</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
          
              <form action="/ubahproker/{{ $p->id }}" method="POST">
                  @csrf

                  <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Nama Kategori</label>

                      <select id="id_kategori" class="form-select" name="id_kategori">

                          <option selected>Pilih Kategori </option>
                          @foreach ($datas as $k)   
                          <option value="{{ $k->id  }}" {{ $p->id_kategori == $k->id ? 'selected' : '' }}> {{ $k->nama_kategori }}  </option>
                          @endforeach
                      </select>

                    </div>

                  <div class="mb-3">
                    <label for="nama_proker" class="form-label">Nama Program Kerja</label>
                    <input type="text" class="form-control" id="nama_proker" name="nama_proker" value="{{ $p->nama_proker }}">
                  </div>

                  <div class="mb-3">
                      <label for="anggaran" class="form-label">Anggaran Dikeluarkan</label>
                      <input type="number"  class="form-control" id="anggaran" name="anggaran" oninput="formatNumber(ths)">
                          
                      <input  class="form-control" id="anggaran" name="anggaran" oninput="formatNumber(this)" value="{{ $p->anggaran }}">

                  </div>

                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Semester</label>

                      <select id="namakategori" class="form-select" name="semester">
                          <option selected>Pilih Semester </option>
                          <option value="Semester 1" {{$p->semester = "Semester 1" ? 'selected' : '' }}>Semester 1 </option>
                          <option value="Semester 2" {{  $p->semeseter = "Semester 2" ? ' selected' : '' }}>Semester 2 </option>
                      </select>

                  </div>

                  <div class="mb-3">
                      <label for="year" class="form-label">Pilih Tahun</label>
                      @php
                              $oldYear = \Carbon\Carbon::now()->subYears(10)->format('Y');
                              $futureYear = \Carbon\Carbon::now()->addYears(2)->format('Y');;
                          @endphp
                      <select id="year" class="form-select" name="tahun">
                          <option selected>Pilih Tahun </option>                          
                          @for ($i = $oldYear; $i < $futureYear; $i++)
                            <option value="{{ $i }}" {{ $i == $p->tahun ? 'selected' : '' }}>{{ $i }}</option>
                          @endfor
                      </select>
                    </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
      </form>
        </div>
      </div>
    </div>
  @endforeach --}}
    <script>
        function formatNumber(input) {
            // Hapus semua karakter selain digit
            const value = input.value.replace(/\D/g, '');

            // Format angka dengan tanda koma setiap 3 digit
            input.value = parseFloat(value).toLocaleString('en-US');
        }
    </script>
@endsection
