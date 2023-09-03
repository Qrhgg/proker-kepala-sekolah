@extends('layouts.master')



@section('content')

<div class="card shadow mb-4">
    
    <div class="card-header py-3">
        <div class="row">
            <div class="col-md-6">
                <h6 class="m-0 font-weight-bold text-primary">Data  Kepala Sekolah</h6>
            </div>

            <div class="col-md-6">
                <button type="button" class="btn btn-primary float-right" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Tambah Data 
                  </button>
            </div>
        </div>

        {{-- <h6 class="m-0 font-weight-bold text-primary">Data  Kategori</h6>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Launch demo modal
          </button> --}}
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nip</th>
                        <th>Nama Kepala Sekolah</th>
                        <th>Alamat</th>
                        <th>No Handphone</th>
                        <th>Action</th>
                      
                    </tr>
                </thead>
                
                <tbody>
                    @foreach($kepala_sekolah as $kp)
                    <tr>
                     
                        <td> {{ $loop->iteration }}</td>
                        <td> {{ $kp->nip }} </td>
                        <td> {{ $kp->nama_kepalasekolah }}</td>
                        <td> {{ $kp->alamat }}</td>
                        <td> {{ $kp->no_hp }}</td>
                        <td>
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modaledit{{ $kp->id }}">
                              <i class="fas fa-edit"></i>
                              </button>

                              <a href="/hapuskepalasekolah/{{ $kp->id }}" class="btn btn-danger" onclick="return confirm('Yakin Hapus Data ?')"> <i class="fas fa-trash-alt"></i> </a>

                            
                       
                            
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
          <h1 class="modal-title fs-5" id="exampleModalLabel"> Tambah Data Kepala Sekolah</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        
            <form action="/postkepalasekolah" method="POST">
                @csrf

                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Nip</label>
                  <input type="text" class="form-control" id="exampleInputPassword1" name="nip">
                </div>

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Nama Kepala Sekolah</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="nama_kepalasekolah">
                  </div>
  
                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Alamat</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="alamat">
                  </div>

                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">No Handphone</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="no_hp">
                  </div>

                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
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


  {{-- Modal Edit Kepala sekolah --}}

  @foreach($kepala_sekolah as $kp)

  <div class="modal fade" id="modaledit{{ $kp->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel"> Mengubah Data Kepala Sekolah</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        
            <form action="/ubahkepalasekolah/{{ $kp->id }}" method="POST">
                @csrf

                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Nip</label>
                  <input type="text" class="form-control" id="exampleInputPassword1" name="nip" value={{ $kp->nip }}>
                </div>

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Nama Kepala Sekolah</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="nama_kepalasekolah" value={{ $kp->nama_kepalasekolah }}>
                  </div>
  
                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Alamat</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="alamat" value={{ $kp->alamat }}>
                  </div>

                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">No Handphone</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="no_hp" value={{ $kp->no_hp }}>
                  </div>

                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
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


    
@endsection