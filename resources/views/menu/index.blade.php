@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                  {{-- Bagian Menu Start--}}
                  <form action="{{route('menu.store')}}" method="post">
                    @csrf
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Nama Menu</label>
                          <input type="text" name="nama_menu" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Kategori</label>
                          <select name="id_kategori" id="" class="form-control">
                            <option value="">-Pilih Kategori-</option>
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Harga</label>
                          <input type="text" name="harga" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Stock</label>
                          <input type="text" name="stok" class="form-control">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Gambar</label>
                          <input type="file" name="gambar" class="form-control">
                        </div>
                      </div>
                    </div>

                    <div class="form-group mt-4 mb-4">
                      <button type="submit" class="btn btn-primary">Tambah Kategori</button>
                    </div>
                  </form>
                  {{-- Bagian Menu End --}}
                </div>

                  
                <div class="card-body mt-4">
                  {{-- Bagian Menu Table Start --}}
                    <div class="table-responsive">
                      <table class="table table-hover">
                        <thead>
                          {{-- <th>Gambar</th> --}}
                          <th>Nama Menu</th>
                          <th>Kategori</th>
                          <th>Harga</th>
                          <th>Stock</th>
                        </thead>
                        <tbody>
                          @foreach ($data as $item)
                          <tr>
                            <td>{{$item->nama_menu}}</td>
                            <td>{{$item->id_kategori}}</td>
                            <td>{{$item->harga}}</td>
                            <td>{{$item->stok}}</td>
                            <td>
                              <form action="{{route('menus.destroy', $item->id)}}" method="post">
                                @csrf
                                {{method_field('delete')}}

                                <button type="submit" class="btn btn-danger">Hapus</button>
                                <a href="{{route('menus.show', $item->id)}}" class="btn btn-info">Detail</a>
                              </form>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  {{-- Bagian Menu Table End --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
