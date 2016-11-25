@extends('layouts.app')

@section('content')
<div class="container">

    @include('layouts.notif')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Data Bidang Lomba</div>
                <div class="panel-body">
                    <button class="btn btn-success" data-toggle="modal" data-target="#modal-tambah">Tambah Bidang Lomba</button>
                    <br><br>
                    <table class="table">
                        <thead>
                            <th>No</th>
                            <th>Nama Bidang Lomba</th>
                            <th>Opsi</th>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach($data['bidang_lomba'] as $value)
                                <tr>
                                    <td>{{ $no }}</td>
                                    <td>{{ $value->nama_bidang_lomba }}</td>
                                    <td>
                                        <button class="btn btn-info" data-toggle="modal" data-target="#modal-edit-{{ $value->id_bidang_lomba }}">Edit</button>
                                        <a class="btn btn-danger" href="{{ url('admin/bidang-lomba/delete/').'/'.$value->id_bidang_lomba }}" onclick="return confirm('yakin Menghapus?')">Hapus</a>
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
        <form class="form-horizontal" method="POST" action="{{ url('admin/bidang-lomba/add') }}">
        {{ csrf_field() }}
            <div class="modal-header">
                <div class="title">Tambah Bidang Lomba</div>
            </div>
            <div class="modal-body">
                    <div class="form-group">
                            <label class="col-md-4 control-label">Nama Bidang Lomba</label>

                            <div class="col-md-6">
                                <input id="nama_bidang_lomba" type="text" class="form-control" name="nama_bidang_lomba" value="">

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
@foreach($data['bidang_lomba'] as $value)

<div class="modal fade" id="modal-edit-{{ $value->id_bidang_lomba }}" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
        <form class="form-horizontal" method="POST" action="{{ url('admin/bidang-lomba/update') }}">
        {{ csrf_field() }}
        <input type="hidden" name="id_bidang_lomba" value="{{  $value->id_bidang_lomba }}">
            <div class="modal-header">
                <div class="title">Edit Bidang Lomba</div>
            </div>
            <div class="modal-body">
                    <div class="form-group">
                            <label class="col-md-4 control-label">Nama Bidang Lomba</label>

                            <div class="col-md-6">
                                <input id="nama_bidang_lomba" type="text" class="form-control" name="nama_bidang_lomba" value="{{ $value->nama_bidang_lomba }}">

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
