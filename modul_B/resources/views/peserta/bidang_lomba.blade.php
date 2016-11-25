@extends('layouts.app')

@section('content')
<div class="container">

    @include('layouts.notif')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Data Bidang Lomba</div>
                <div class="panel-body">
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
                                        <?php 

                                            $cek_peserta = DB::table('peserta')->where('id_user','=',Auth::user()->id_user)->get();

                                            // $cek_lomba  = DB::table('registrasi_peserta')->where('id_peserta','=',$cek_peserta[0]->id_peserta)->get();


                                            $cek = DB::table('registrasi_peserta')->where('id_peserta','=',$cek_peserta[0]->id_peserta)->where('id_bidang_lomba','=',$value->id_bidang_lomba)->get()
                                        ?>
                                            @if(count($cek) == 0) 
                                                <?php 
                                                    $cek_cek = DB::table('registrasi_peserta')->where('id_peserta','=',$cek_peserta[0]->id_peserta)->get();
                                                 ?>

                                                 @if(count($cek_cek) == 0)
                                                    <a onclick="return confirm('yakin mendaftar?')" class="btn btn-warning" href="{{ url('peserta/bidang-lomba/daftar/').'/'.$value->id_bidang_lomba }}" >Daftar</a>
                                                 @else
                                                    <a onclick="return confirm('yakin mendaftar?')" class="btn btn-warning disabled" href="{{ url('peserta/bidang-lomba/daftar/').'/'.$value->id_bidang_lomba }}" >Daftar</a>

                                                 @endif
                                            @else
                                                <a onclick="return confirm('yakin membatalkan?')" class="btn btn-danger" href="{{ url('peserta/bidang-lomba/batal/').'/'.$value->id_bidang_lomba }}" >Batal</a>
                                            @endif

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





@endsection
