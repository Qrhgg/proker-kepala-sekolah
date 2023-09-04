@extends('layouts.master')

@section('content')
    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <div class="row">
                <div class="col-md-6">
                    <h6 class="m-0 font-weight-bold text-primary">Data Program Kerja</h6>
                </div>

                {{-- <div class="col-md-6">
                <button type="button" class="btn btn-primary float-right" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Tambah Data 
                  </button>
            </div> --}}
            </div>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                {{-- <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> --}}
                <table class="table table-bordered" id="example1" width="100%" cellspacing="0">
                    <thead>
                        <th>No</th>
                        <th>Kategori</th>
                        <th>Nama Program Kerja</th>
                        <th>Anggaran</th>
                        <th>Semester</th>
                        <th>Tahun</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </thead>

                    @foreach ($datas as $data)
                        @if ($data->prokers->toArray() != [])
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->nama_kategori }}</td>
                                @foreach ($data->prokers as $item)
                                    <td>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>{{ $item->nama_proker }}</td>
                                <td>{{ $item->anggaran }}</td>
                                <td>{{ $item->semester }}</td>
                                <td>{{ $item->tahun }}</td>
                                {{-- <td>
                            @if ($item->status == 1)
                            <span class="badge text-bg-success">Sudah Dilaporkan</span>
    
                            @elseif($item->status == 2)
                            <span class="badge text-bg-danger">Belum Dilaporkan</span>
    
    
    
                            @endif
    
    
                                </td> --}}

                                <td>

                                    <form action="/update/status/{{ $item->id }}" method="POST">
                                        @csrf
                                        <div class="mb-3">




                                            <select id="id_kategori"
                                                class="form-select {{ $item->status == 2 ? 'bg-danger' : 'bg-success' }} text-white"
                                                name="status" onclick="status">
                                                <option value="2" {{ $item->status == 2 ? 'selected' : '' }}>Belum
                                                    Dilaporkan</option>
                                                <option value="1" {{ $item->status == 1 ? 'selected' : '' }}>Sudah
                                                    Dilaporkan</option>
                                            </select>


                                        </div>






                                </td>

                                <td>


                                    <button type="submit" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                        Perbarui
                                    </button>
                                </td>



                                </form>


                                {{-- <td>
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modaledit{{ $item->id }}" id="btn-edit">
                              <i class="fas fa-edit"></i>
                              </button>

                              <a href="{{ route('proker.delete', $item->id) }}" class="btn btn-danger" onclick="return confirm('Yakin Hapus Data ?')"> <i class="fas fa-trash-alt"></i> </a>
                          </td> --}}
                            </tr>
                            </td>
                        @endforeach

                        </tr>
                    @endif
                    @endforeach




                    </tbody>
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


    @foreach ($prokers as $p)
        <!-- Modal Edit -->
        <div class="modal fade" id="modaledit{{ $p->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
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
                                        <option value="{{ $k->id }}"
                                            {{ $p->id_kategori == $k->id ? 'selected' : '' }}> {{ $k->nama_kategori }}
                                        </option>
                                    @endforeach
                                </select>

                            </div>

                            <div class="mb-3">
                                <label for="nama_proker" class="form-label">Nama Program Kerja</label>
                                <input type="text" class="form-control" id="nama_proker" name="nama_proker"
                                    value="{{ $p->nama_proker }}">
                            </div>

                            <div class="mb-3">
                                <label for="anggaran" class="form-label">Anggaran Dikeluarkan</label>
                                {{-- <input type="number"  class="form-control" id="anggaran" name="anggaran" oninput="formatNumber(ths)"> --}}

                                <input class="form-control" id="anggaran" name="anggaran" oninput="formatNumber(this)"
                                    value="{{ $p->anggaran }}">

                            </div>

                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Semester</label>

                                <select id="namakategori" class="form-select" name="semester">
                                    <option selected>Pilih Semester </option>
                                    <option value="Semester 1" {{ $p->semester = 'Semester 1' ? 'selected' : '' }}>Semester
                                        1 </option>
                                    <option value="Semester 2" {{ $p->semeseter = 'Semester 2' ? ' selected' : '' }}>
                                        Semester 2 </option>
                                </select>

                            </div>

                            <div class="mb-3">
                                <label for="year" class="form-label">Pilih Tahun</label>
                                @php
                                    $oldYear = \Carbon\Carbon::now()
                                        ->subYears(10)
                                        ->format('Y');
                                    $futureYear = \Carbon\Carbon::now()
                                        ->addYears(2)
                                        ->format('Y');
                                @endphp
                                <select id="year" class="form-select" name="tahun">
                                    <option selected>Pilih Tahun </option>
                                    @for ($i = $oldYear; $i < $futureYear; $i++)
                                        <option value="{{ $i }}" {{ $i == $p->tahun ? 'selected' : '' }}>
                                            {{ $i }}</option>
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
    @endforeach
    <script>
        function formatNumber(input) {
            // Hapus semua karakter selain digit
            const value = input.value.replace(/\D/g, '');

            // Format angka dengan tanda koma setiap 3 digit
            input.value = parseFloat(value).toLocaleString('en-US');
        }
    </script>
@endsection
