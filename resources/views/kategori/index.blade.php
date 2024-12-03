@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                  <form action="{{route('categories.store')}}" method="post">
                    @csrf
                    <div class="form-group mt-3">
                      <label class="form-label">Nama Kategori Snack</label>
                      <input type="text" name="nama_kategori" id="" class="form-control">
                    </div>
                    {{-- <div class="form-group mt-3">
                      <label class="form-label">Icon Kategori Snack</label>
                      <input type="file" name="icon" id="" class="form-control">
                    </div> --}}
                    <div class="form-group mt-4 mb-4">
                      <button type="submit" class="btn btn-primary">Tambah Kategori</button>
                    </div>
                  </form>
                </div>

                <div class="card-body mt-4">
                    <div class="table-responsive">
                      <table class="table table-hover">
                        <thead>
                          <th>Nama Kategori</th>
                          <th>Pilihan</th>
                        </thead>
                        <tbody>
                          @foreach ($data as $item)
                          <tr>
                            <td>{{$item->nama_kategori}}</td>
                            <td>
                              <form action="{{route('categories.destroy', $item->id)}}" method="post">
                                @csrf
                                {{method_field('delete')}}

                                <button type="submit" class="btn btn-danger">Hapus</button>
                                <a href="{{route('categories.show', $item->id)}}" class="btn btn-info">Detail</a>
                              </form>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
