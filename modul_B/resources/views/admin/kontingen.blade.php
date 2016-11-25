@extends('layouts.app')

@section('content')
<div class="container">

    @include('layouts.notif')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Data Kontingen</div>
                <div class="panel-body">
                    <button class="btn btn-success" data-toggle="modal" data-target="#modal-tambah">Tambah Kontingen</button>
                    <br><br>
                    <table class="table">
                        <thead>
                            <th>No</th>
                            <th>Nama Kontingen</th>
                            <th>Opsi</th>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach($data['kontingen'] as $value)
                                <tr>
                                    <td>{{ $no }}</td>
                                    <td>{{ $value->nama_kontingen }}</td>
                                    <td>
                                        <button class="btn btn-info" data-toggle="modal" data-target="#modal-edit-{{ $value->id_kontingen }}">Edit</button>
                                        <a class="btn btn-danger" href="{{ url('admin/kontingen/delete/').'/'.$value->id_kontingen }}" onclick="return confirm('yakin Menghapus?')">Hapus</a>
                                    </td>
                                </tr>
                                <?php $no++; ?>
                            @endforeach
                        </tbody>
                    </table>                
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modal-tambah" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
        <form class="form-horizontal" method="POST" action="{{ url('admin/kontingen/add') }}">
        {{ csrf_field() }}
            <div class="modal-header">
                <div class="title">Tambah Kontingen</div>
            </div>
            <div class="modal-body">
                    <div class="form-group">
                            <label class="col-md-4 control-label">Nama Kontingen</label>

                            <div class="col-md-6">
                                <input id="nama_kontingen" type="text" class="form-control" name="nama_kontingen" value="">

                            </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success">Simpan</button>
                <button class="btn btn-danger" data-dismiss="modal">Batal</button>
            </div>
        </form>
        </div>
    </div>
</div>

<!-- modal -->
@foreach($data['kontingen'] as $value)

<div class="modal fade" id="modal-edit-{{ $value->id_kontingen }}" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
        <form class="form-horizontal" method="POST" action="{{ url('admin/kontingen/update') }}">
        {{ csrf_field() }}
        <input type="hidden" name="id_kontingen" value="{{  $value->id_kontingen }}">
            <div class="modal-header">
                <div class="title">Edit Kontingen</div>
            </div>
            <div class="modal-body">
                    <div class="form-group">
                            <label class="col-md-4 control-label">Nama Kontingen</label>

                            <div class="col-md-6">
                                <input id="nama_kontingen" type="text" class="form-control" name="nama_kontingen" value="{{ $value->nama_kontingen }}">

                            </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success">Simpan</button>
                <button class="btn btn-danger" data-dismiss="modal">Batal</button>
            </div>
        </form>
        </div>
    </div>
</div>
@endforeach


@endsection
