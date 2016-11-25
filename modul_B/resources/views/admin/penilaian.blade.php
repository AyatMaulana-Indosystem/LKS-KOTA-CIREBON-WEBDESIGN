@extends('layouts.app')

@section('content')
<div class="container">

    @include('layouts.notif')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Penilaian</div>
                <div class="panel-body">
                    <!-- <button class="btn btn-success" data-toggle="modal" data-target="#modal-tambah">Tambah Kontingen</button> -->
                    <br><br>
                    <table class="table">
                        <thead>
                            <th>No</th>
                            <th>Nama Peserta</th>
                            <th>Mata Lomba</th>
                            <th>Nilai</th>
                            <th>Keterangan</th>
                            <th>Opsi</th>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach($data['registrasi_peserta'] as $value)
                                <tr>
                                    <td>{{ $no }}</td>
                                    <td>{{ $value->peserta->nama_lengkap }}</td>
                                    <td>
                                        <?php 
                                            $get_lomba = DB::table('bidang_lomba')->where('id_bidang_lomba','=',$value->id_bidang_lomba)->get();

                                            echo $get_lomba[0]->nama_bidang_lomba;
                                         ?>
                                    </td>
                                    <td><span class="badge badge-success">{{ $value->score }}</span></td>
                                    <td>
                                        <?php 

                                            if ($value->keterangan == 1) {
                                                echo 'Emas';
                                            }
                                            elseif($value->keterangan == 2)
                                            {
                                                echo 'Perak';
                                            }
                                            elseif($value->keterangan == 3){
                                                echo 'Perunggu';
                                            }
                                            else{
                                                echo '-';
                                            }

                                         ?>
                                    </td>
                                    <td>
                                        <button class="btn btn-info" data-target="#modal-edit-{{ $value->id_peserta }}" data-toggle="modal">Ubah</button>
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



<!-- modal -->
@foreach($data['registrasi_peserta'] as $value)

<div class="modal fade" id="modal-edit-{{ $value->id_peserta }}" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
        <form class="form-horizontal" method="POST" action="{{ url('admin/penilaian/update') }}">
        {{ csrf_field() }}
        <input type="hidden" name="id_peserta" value="{{  $value->id_peserta }}">
            <div class="modal-header">
                <div class="title">Edit Nilai</div>
            </div>
            <div class="modal-body">
                    <div class="form-group">
                            <label class="col-md-4 control-label">Nilai</label>

                            <div class="col-md-6">
                                <select name="score" class="form-control">
                                    @for($i = 1;$i <= 100; $i++)
                                        <option value="{{ $i }}" <?php if($value->score == $i) { echo 'selected'; }  ;?>  >{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Keterangan</label>
                        <div class="col-md-6">
                            <select name="keterangan" class="form-control">
                                <option value="">-</option>
                                <option value="1" <?php if($value->keterangan == 1) { echo 'selected'; }  ;?>>Emas</option>
                                <option value="2" <?php if($value->keterangan == 2) { echo 'selected'; }  ;?>>Perak</option>
                                <option value="3" <?php if($value->keterangan == 3) { echo 'selected'; }  ;?>>Perunggu</option>
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
@endforeach


@endsection
