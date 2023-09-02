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
                        <th>Nama Proker</th>
                        <th>Anggaran</th>
                        <th>Semester</th>
                        <th>Tahun</th>
        
                        <th>Action</th>
                      
                    </tr>
                </thead>
                
                <tbody>
                    @foreach($proker as $p)
                    <tr>
                     
                        <td>{{ $loop->iteration }} </td>
                        <td>{{ $p->id_kategori }} </td>
                        <td> {{ $p->nama_proker }} </td>
                        <td> {{ $p->anggaran }}</td>
                        <td>  {{ $p->semester }}</td>
                        <td> {{ $p->tahun }}</td>
                        <td>
                            {{-- <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modaledit{{ $p->id }}"> --}}
                                Edit 
                              </button>

                              {{-- <a href="/hapuskategori/{{ $k->id }}" class="btn btn-danger" onclick="return confirm('Yakin Hapus Data ?')"> Hapus </a> --}}

                            
                       
                            
                        </td>
                    
                    </tr>
                    
                    @endforeach


                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection