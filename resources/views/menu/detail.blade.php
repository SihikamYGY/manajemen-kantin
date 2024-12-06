@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                  {{-- Bagian Menu Start--}}
                  <form action="{{route('menu.update', $data->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    {{method_field('PUT')}}
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Nama Menu</label>
                          <input type="text" name="nama_menu" value="{{$data->nama_menu}}" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Kategori</label>
                          <select name="id_kategori" id="" class="form-control">
                            <option value="">-Pilih Kategori-</option>
                            @foreach($cat as $row)
                            <option value="{{$row->id}}">{{$row->nama_kategori}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Harga</label>
                          <input type="number" name="harga" value="{{$data->harga}}" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Stock</label>
                          <input type="number" name="stok" value="{{$data->stok}}" class="form-control">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Gambar</label>
                          <input type="file" name="gambar" value="{{$data->gambar}}" class="form-control">
                        </div>
                      </div>
                    </div>

                    <div class="form-group mt-4 mb-4">
                      <button type="submit" class="btn btn-primary">Update Menu</button>
                    </div>
                  </form>
                  {{-- Bagian Menu End --}}
                </div>

                  
                <div class="card-body mt-4">
                  {{-- Bagian Menu Table Start --}}
                    <div class="table-responsive">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>Nama Menu</th>
                            <td>{{$data->nama_menu}}</td>
                          </tr>
                          <tr>
                            <th>Kategori</th>
                            <td>{{$data->category->nama_kategori}}</td>
                          </tr>
                          <tr>
                            <th>Harga</th>
                            <td>{{$data->harga}}</td>
                          </tr>
                          <tr>
                            <th>Stok</th>
                            <td>{{$data->stok}}</td>
                          </tr>
                          
                        </thead>
                      </table>
                    </div>
                  {{-- Bagian Menu Table End --}}
                </div>
            </div>

            <div class="card mt-3">
              <div class="card-body">
                <img src="{{asset('storage/images/menu/'.$data->gambar)}}" alt="{{$data->nama_menu}}">
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
