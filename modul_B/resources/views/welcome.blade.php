@extends('layouts.app')
@section('content')
<?php

$data['bidang_lomba'] = App\bidang_lomba::all();
$data['kontingen'] = App\kontingen::all();
// foreach ($data['bidang_lomba'] as $key => $value) {
//     $data['']
// }
?>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Peraih Medali Setiap Kontinge</div>
                <div class="panel-body">
                    <table class="table">
                        <tbody>
                        <tr>
                            <th>No</th>
                            <th>Kontingen</th>
                            <th>Medali Emas</th>
                            <th>Medali Perak</th>
                            <th>Medali Perunggu</th>
                            <th>Jumlah Medali</th>
                        </tr>
                        
                        <?php $nmr = 1; ?>
                        @foreach($data['kontingen'] as $val)
                            <tr>
                                <td>{{ $nmr }}</td>
                                <td>{{ $val->nama_kontingen }}</td>
                                <td>
                                    <?php 
                                        $emas = DB::select("SELECT * FROM `registrasi_peserta` JOIN peserta ON registrasi_peserta.id_peserta = peserta.id_peserta JOIN kontingen ON peserta.id_kontingen = kontingen.id_kontingen HAVING kontingen.id_kontingen = '".$val->id_kontingen."' AND registrasi_peserta.keterangan = 1");
                                        $emas = count($emas);
                                        echo $emas;
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                        $perak = DB::select("SELECT * FROM `registrasi_peserta` JOIN peserta ON registrasi_peserta.id_peserta = peserta.id_peserta JOIN kontingen ON peserta.id_kontingen = kontingen.id_kontingen HAVING kontingen.id_kontingen = '".$val->id_kontingen."' AND registrasi_peserta.keterangan = 2");
                                        $perak = count($perak);
                                        echo $perak;
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                        $perunggu = DB::select("SELECT * FROM `registrasi_peserta` JOIN peserta ON registrasi_peserta.id_peserta = peserta.id_peserta JOIN kontingen ON peserta.id_kontingen = kontingen.id_kontingen HAVING kontingen.id_kontingen = '".$val->id_kontingen."' AND registrasi_peserta.keterangan = 3");
                                        $perunggu = count($perunggu);
                                        echo $perunggu;
                                    ?>
                                </td>
                                <td>{{ $emas+$perak+$perunggu }}</td>
                            </tr>
                            <?php $nmr++; ?>
                        @endforeach

                        
                    </tbody>
                </table>                </div>
            </div>
            @foreach($data['bidang_lomba'] as $key => $value)
            <div class="panel panel-default">
                <div class="panel-heading">{{ $value->nama_bidang_lomba }}</div>
                <div class="panel-body">
                    <?php
                    $get_skor = App\registrasi_peserta::where('id_bidang_lomba','=',$value->id_bidang_lomba)->orderBy('score','DESC')->limit(3)->get();
                    ?>
                    <table class="table">
                        <tbody>
                            <tr>
                                <th>Nama Lengkap</th>
                                <th>Kontingen</th>
                                <th>Posisi</th>
                                <th>Score</th>
                            </tr>
                            <?php $i = 1; ?>
                            @foreach($get_skor as $value2 )
                            <tr>
                                <td>
                                    <?php
                                    $get_peserta = App\peserta::where('id_peserta','=',$value2->id_peserta)->get();
                                    echo $get_peserta[0]->nama_lengkap;
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    $get_kontingen = App\kontingen::where('id_kontingen','=',$get_peserta[0]->id_kontingen)->get();
                                    echo $get_kontingen[0]->nama_kontingen;
                                    ?>
                                </td>
                                <td>
                                    Juara {{ $i }}
                                </td>
                                <td>
                                    {{ $value2->score }}
                                </td>
                            </tr>
                            <?php $i++; ?>
                            @endforeach
                            <?php unset($i); ?>
                        </tbody>
                    </table>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection