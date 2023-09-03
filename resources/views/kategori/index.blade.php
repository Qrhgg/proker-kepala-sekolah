@extends('layouts.master')

@section('content')



<div class="card shadow mb-4">
    
    <div class="card-header py-3">
        <div class="row">
            <div class="col-md-6">
                <h6 class="m-0 font-weight-bold text-primary">Data  Kategori</h6>
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
                        <th>Nama Kategori</th>
                       
                        <th>Action</th>
                      
                    </tr>
                </thead>
                
                <tbody>
                    @foreach($kategori as $k)
                    <tr>
                     
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $k->nama_kategori }}</td>
                        <td>
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modaledit{{ $k->id }}">
                              <i class="fas fa-edit"></i>
                              </button>

                              <a href="/hapuskategori/{{ $k->id }}" class="btn btn-danger" onclick="return confirm('Yakin Hapus Data ?')"> <i class="fas fa-trash-alt"></i> </a>

                            
                       
                            
                        </td>
                    
                    </tr>
                    
                    @endforeach


                </tbody>
            </table>
        </div>
    </div>
</div>



  
  <!-- Modal Tambah -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel"> Tambah Data Kategori</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        
            <form action="/postkategori" method="POST">
                @csrf

                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Nama Kategori</label>
                  <input type="text" class="form-control" id="exampleInputPassword1" name="nama_kategori">
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


@foreach($kategori as $k)
  <!-- Modal Edit -->
  <div class="modal fade" id="modaledit{{ $k->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel"> Edit Data Kategori</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        
            <form action="/ubahkategori/{{ $k->id }}" method="POST">
                @csrf

                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Nama Kategori</label>
                  <input type="text" class="form-control" id="exampleInputPassword1" name="nama_kategori" value="{{ $k->nama_kategori }}"> 
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

