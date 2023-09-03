@extends('layouts.master')

@section('content')

<div class="card shadow mb-4">
    
    <div class="card-header py-3">
        <div class="row">
            <div class="col-md-6">
                <h6 class="m-0 font-weight-bold text-primary">Data  Program Kerja</h6>
            </div>

            <div class="col-md-6">
                <button type="button" class="btn btn-primary float-right" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Tambah Data 
                  </button>
            </div>
        </div>

    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th>Nama Proker</th>
                        <th>Anggaran Dikeluarkan</th>
                        <th>Semester</th>
                        <th>Tahun</th>
        
                        <th>Action</th>
                      
                    </tr>
                </thead>
                
                <tbody>
                    @foreach($proker as $p)
                    <tr>
                     
                        <td>{{ $loop->iteration }} </td>
                        <td>{{ $p->kategori->nama_kategori }} </td>
                        <td> {{ $p->nama_proker }} </td>
                        <td>Rp. {{ $p->anggaran }}</td>
                        <td>  {{ $p->semester }}</td>
                        <td> {{ $p->tahun->format('Y') }}</td>
                        <td>
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modaledit{{ $p->id }}">
                                <i class="fas fa-edit"></i>
                              </button>

                              <a href="/hapusproker/{{ $p->id }}" class="btn btn-danger" onclick="return confirm('Yakin Hapus Data ?')"> <i class="fas fa-trash-alt"></i></a>

                            
                       
                            
                        </td>
                    
                    </tr>
                    
                    @endforeach


                </tbody>
            </table>
        </div>
    </div>
</div>


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        @foreach($kategori as $k)   
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
                    {{-- <input type="number"  class="form-control" id="anggaran" name="anggaran" oninput="formatNumber(ths)"> --}}
                        
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


        </div>




        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
      </div>
    </div>
  </div>


  @foreach($proker as $p)
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
                        @foreach($kategori as $k)   
                        <option value={{ $k->id  }} {{ $p->id_kategori == $k->id ? 'selected' : '' }}> {{ $k->nama_kategori }}  </option>
                        @endforeach
                    </select>

                  </div>

                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Nama Program Kerja</label>
                  <input type="text" class="form-control" id="exampleInputPassword1" name="nama_proker" value={{ $p->nama_proker }}>
                </div>

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Anggaran Dikeluarkan</label>
                    {{-- <input type="number"  class="form-control" id="anggaran" name="anggaran" oninput="formatNumber(ths)"> --}}
                        
                    <input  class="form-control" id="anggaran" name="anggaran" oninput="formatNumber(this)" value={{ $p->anggaran }}>

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
                    <label for="exampleInputPassword1" class="form-label">Pilih Tanggal</label>
                    <input type="date" class="form-control" id="exampleInputPassword1" name="tahun" value={{ $p->tahun }}>
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