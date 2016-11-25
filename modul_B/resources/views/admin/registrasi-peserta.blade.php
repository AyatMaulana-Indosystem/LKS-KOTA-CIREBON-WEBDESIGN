@extends('layouts.app')

@section('content')
<div class="container">

    @include('layouts.notif')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Data Peserta Belum Terdaftar</div>
                <div class="panel-body">
                    <button class="btn btn-success" data-toggle="modal" data-target="#modal-tambah">Tambah Peserta</button>
                    <br><br>
                    <table class="table">
                        <thead>
                            <th>No</th>
                            <th>Nama peserta</th>
                            <th>Asal</th>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach($data['peserta'] as $value)

                                @if($value->registrasi == null)
                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td>{{ $value->nama_lengkap }}</td>
                                        <td>
                                            <?php 
                                                $get = DB::table('kontingen')->where('id_kontingen','=',$value->id_kontingen)->get();
                                                echo $get[0]->nama_kontingen;
                                             ?>
                                        </td>
                                    </tr>
                                    <?php $no++; ?>
                                @endif
                            @endforeach
                        </tbody>
                    </table>                
                </div>
            </div>
            <br><br><br>
            <div class="panel panel-default">
                <div class="panel-heading">Data Peserta Sudah Terdaftar</div>
                <div class="panel-body">
                    <!-- <button class="btn btn-danger" data-toggle="modal" data-target="#modal-tambah">Hapus Peserta</button> -->
                    <br><br>
                    <table class="table">
                        <thead>
                            <th>No</th>
                            <th>Nama peserta</th>
                            <th>Bidang Lomba</th>
                            <th>Asal</th>
                            <th>Opsih</th>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach($data['peserta_reg'] as $value)

                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td>{{ $value->peserta->nama_lengkap }}</td>
                                        <td>
                                            <?php 
                                                // echo $value->registrasi->id_bidang_lomba;
                                                $bidang = DB::table('bidang_lomba')->where('id_bidang_lomba','=', $value->id_bidang_lomba)->get();
                                                echo $bidang[0]->nama_bidang_lomba;
                                             ?>
                                        </td>
                                        <td>
                                            <?php 
                                                $get = DB::table('kontingen')->where('id_kontingen','=',$value->peserta->id_kontingen)->get();
                                                echo $get[0]->nama_kontingen;
                                             ?>
                                        </td>
                                        <td>
                                            <a onclick="return confirm('yakin menghapus?')" href="{{ url('admin/registrasi-peserta/min/'.$value->id_peserta) }}" class="btn btn-danger">Hapus</a>
                                        </td>
                                    </tr>
                                    <?php $no++; ?>
                            @endforeach
                        </tbody>
                    </table>                
                </div>
            </div>


     



<!-- modal -->
<div class="modal fade" id="modal-tambah" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
        <form class="form-horizontal" method="POST" action="{{ url('admin/registrasi-peserta/plus') }}">
        {{ csrf_field() }}
            <div class="modal-header">
                <div class="title">Tambah Bidang Lomba</div>
            </div>
            <div class="modal-body">
                    <div class="form-group">
                        <label class="col-md-4 control-label">Bidang Lomba</label>

                        <div class="col-md-6">
                             <select name="id_bidang_lomba" class="form-control">
                                 @foreach($data['bidang_lomba'] as $value)
                                        <option value="{{ $value->id_bidang_lomba }}">{{ $value->nama_bidang_lomba }}</option>
                                 @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                            <label class="col-md-4 control-label">Nama Peserta</label>

                            <div class="col-md-6">
                                <select multiple name="id_peserta[]" class="form-control">
                                 @foreach($data['peserta'] as $value)
                                    @if($value->registrasi == null)
                                        <option value="{{ $value->id_peserta }}">{{ $value->nama_lengkap }}</option>
                                    @endif
                                 @endforeach
                                </select>
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
@endsection
