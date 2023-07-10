<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>{{$title}}</title>

        <style>
            @page { size: A4 }
          
            h3 {
                font-weight: bold;
                text-align: center;
                font-size: 16px;
                line-height: inherit;
                font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				color: #555;
            }
          
            .table {
                border-collapse: collapse;
                width: 100%;
                font-size: 10pt;
                line-height: inherit;
                font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				color: #555;
            }
          
            .table th {
                padding: 1px 1px;
                border:1px solid #000000;
            }
          
            .table td {
                padding: 1px 1px;
                border:1px solid #000000;
            }
          
            .text-center {
                text-align: center;
            }
        </style>
		<style>
			.invoice-box {
				max-width: 800px;
				margin: auto;
				padding: 1px;
				border: 1px solid #eee;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
				font-size: 12px;
				line-height: 8px;
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				color: #555;
			}

			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
			}

			.invoice-box table td {
				padding: 1px;
				vertical-align: top;
			}

			.invoice-box table tr td:nth-child(2) {
				text-align: left;
			}

			.invoice-box table tr.top table td {
				padding-bottom: 1px;
			}

			.invoice-box table tr.top table td.title {
				font-size: 45px;
				line-height: 45px;
				color: #333;
			}

			.invoice-box table tr.information table td {
				padding-bottom: 1px;
			}

			.invoice-box table tr.heading td {
				background: #eee;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
			}

			.invoice-box table tr.details td {
				padding-bottom: 1px;
			}

			.invoice-box table tr.item td {
				border-bottom: 1px solid #eee;
			}

			.invoice-box table tr.item.last td {
				border-bottom: none;
			}

			.invoice-box table tr.total td:nth-child(2) {
				border-top: 2px solid #eee;
				font-weight: bold;
			}

			@media only screen and (max-width: 600px) {
				.invoice-box table tr.top table td {
					width: 100%;
					display: block;
					text-align: center;
				}

				.invoice-box table tr.information table td {
					width: 100%;
					display: block;
					text-align: center;
				}
			}

			/** RTL **/
			.invoice-box.rtl {
				direction: rtl;
				font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
			}

			.invoice-box.rtl table {
				text-align: left;
			}

			.invoice-box.rtl table tr td:nth-child(2) {
				text-align: left;
			}
		</style>
	</head>

	<body>
        <section>
            <div class="invoice-box">
                <table cellpadding="0" cellspacing="0">
                    <tr class="top">
                        <td colspan="2">
                            <table>
                                <tr>
                                    <td width="340PX">
                                        {{-- <img src="https://www.sparksuite.com/images/logo.png" style="width: 100%; max-width: 300px" /> --}}
                                    </td>
                                    <td>
                                        PERATURAN BADAN KEPEGAWAIAN NEGARA
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        {{-- <img src="https://www.sparksuite.com/images/logo.png" style="width: 100%; max-width: 300px" /> --}}
                                    </td>
                                    <td>
                                        REPUBLIK INDONESIA
                                    </td>
                                <tr>
                                <tr>
                                    <td>
                                        {{-- <img src="https://www.sparksuite.com/images/logo.png" style="width: 100%; max-width: 300px" /> --}}
                                    </td>
                                    <td>
                                        NOMOR 24 TAHUN 2017
                                    </td>
                                <tr>
                                <tr>
                                    <td>
                                        {{-- <img src="https://www.sparksuite.com/images/logo.png" style="width: 100%; max-width: 300px" /> --}}
                                    </td>
                                    <td>
                                        TENTANG
                                    </td>
                                <tr>
                                <tr>
                                    <td>
                                        {{-- <img src="https://www.sparksuite.com/images/logo.png" style="width: 100%; max-width: 300px" /> --}}
                                    </td>
                                    <td>
                                        TATA CARA PEMBERIAN CUTI PEGAWAI NEGERI SIPIL
                                    </td>
                                <tr>
                            </table>
                            <table>
                                <tr>
                                    <td width="460PX">
                                    </td>
                                    <td>
                                        Subang ...................................
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                    </td>
                                    <td>
                                        Kepada
                                    </td>
                                <tr>
                                <tr>
                                    <td>
                                    </td>
                                    <td>
                                        Yth.
                                    </td>
                                <tr>
                                <tr>
                                    <td>
                                    </td>
                                    <td>
                                        di ...............................................
                                    </td>
                                <tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
        </section>

        <section class="sheet padding-10mm" style="margin-top: -10px;">
            <div style="text-align: center;">
                <p style="font-size: 10pt;"><strong>FORMULIR PERMINTAAN DAN PEMBERIAN CUTI</strong></p>
            </div>

            <div>
                <table class="table" style="width: 100%; border: #424141 1px solid;">
                    <tr>
                        <th colspan="4" style="text-align: left; border-left: 0;">I. DATA PEGAWAI</th>
                    </tr>
                    <tr>
                        <td >Nama</td>
                        <td >{{$detail->nama}}</td>
                        <td >NIP</td>
                        <td >{{$detail->nip}}</td>
                    </tr>
                    <tr>
                        <td >Jabatan</td>
                        <td >{{$detail->jabatan}}</td>
                        <td >Masa Kerja</td>
                        <td >{{$detail->masa_kerja}}</td>
                    </tr>
                    <tr>
                        <td >Unit Kerja</td>
                        <td colspan="3" >{{$detail->unit_kerja}} POLITEKNIK NEGERI SUBANG</td>
                    </tr>
                </table>
            </div>
      
            <div style="margin-top: 10px;">
                <table class="table" style="width: 100%; border: #424141 1px solid;">
                    <tr>
                        <th colspan="4" style="text-align: left; border-left: 0;">II. JENIS CUTI YANG DIAMBIL **</th>
                    </tr>
                    <tr>
                        <td >1. Cuti Tahunan</td>
                        <td >@if($detail->jenis_cuti === 'Cuti Tahunan') Ya @endif</td>
                        <td >2. Cuti Besar</td>
                        <td >@if($detail->jenis_cuti === 'Cuti Besar') Ya @endif</td>
                    </tr>
                    <tr>
                        <td >3. Cuti Sakit</td>
                        <td >@if($detail->jenis_cuti === 'Cuti Sakit') Ya @endif</td>
                        <td >4. Cuti Melahirkan</td>
                        <td >@if($detail->jenis_cuti === 'Cuti Melahirkan') Ya @endif</td>
                    </tr>
                    <tr>
                        <td >5. Cuti Karena Alasan Penting</td>
                        <td >@if($detail->jenis_cuti === 'Cuti Karena Alasan Penting') Ya @endif</td>
                        <td >6. Cuti di Luar Tanggungan Negara</td>
                        <td >@if($detail->jenis_cuti === 'Cuti di Luar Tanggungan Negara') Ya @endif</td>
                    </tr>
                </table>
            </div>

            <div style="margin-top: 10px;">
                <table class="table" style="width: 100%; border: #424141 1px solid;">
                    <tr>
                        <th style="text-align: left; border-left: 0;">III. ALASAN CUTIL</th>
                    </tr>
                    <tr>
                        <td >{{$detail->alasan_cuti}}</td>
                    </tr>
                </table>
            </div>

            <div style="margin-top: 10px;">
                <table class="table" style="width: 100%; border: #424141 1px solid;">
                    <tr>
                        <th colspan="6" style="text-align: left; border-left: 0;">IV. LAMANYA CUTI</th>
                    </tr>
                    <tr>
                        <td >Selama</td>
                        <td >{{$detail->lama_cuti}} (<span @if($detail->jenis_waktu !== 'hari') style="text-decoration: line-through;" @endif>hari</span>/<span @if($detail->jenis_waktu !== 'bulan') style="text-decoration: line-through;" @endif>bulan</span>/<span @if($detail->jenis_waktu !== 'tahun') style="text-decoration: line-through;" @endif>tahun</span>)*</td>
                        <td >Mulai Tanggal</td>
                        <td >{{$detail->mulai_tanggal}}</td>
                        <td >s.d</td>
                        <td >{{$detail->akhir_tanggal}}</td>
                    </tr>
                </table>
            </div>

            <div style="margin-top: 10px;">
                <table class="table" style="width: 100%; border: #424141 1px solid;">
                    <tr>
                        <th colspan="5" style="text-align: left; border-left: 0;">V. CATATAN CUTI ***</th>
                    </tr>
                    <tr>
                        <td colspan="3" >1. CUTI TAHUNAN</td>
                        <td >2. CUTI BESAR</td>
                        <td >{{$detail->cuti_besar}}</td>
                    </tr>
                    <tr>
                        <td >Tahun</td>
                        <td >Sisa</td>
                        <td >Keterangan</td>
                        <td >3. CUTI SAKIT</td>
                        <td >{{$detail->cuti_sakit}}</td>
                    </tr>
                    <tr>
                        <td >N-2</td>
                        <td >{{$detail->cuti_n_2}}</td>
                        <td >{{$detail->keterangan_n_2}}</td>
                        <td >4. CUTI MELAHIRKAN</td>
                        <td >{{$detail->cuti_melahirkan}}</td>
                    </tr>
                    <tr>
                        <td >N-1</td>
                        <td >{{$detail->cuti_n_1}}</td>
                        <td >{{$detail->keterangan_n_1}}</td>
                        <td >5. CUTI KARENA ALASAN PENTING</td>
                        <td >{{$detail->cuti_karena_alasan_penting}}</td>
                    </tr>
                    <tr>
                        <td >N</td>
                        <td >{{$detail->cuti_n}}</td>
                        <td >{{$detail->keterangan_n}}</td>
                        <td >6. CUTI DI LUAR TANGGUNGAN NEGARA</td>
                        <td >{{$detail->cuti_diluar_tanggungan_negara}}</td>
                    </tr>
                </table>
            </div>

            <div style="margin-top: 10px;">
                <table class="table" style="width: 100%; border: #424141 1px solid;">
                    <tr>
                        <th colspan="3" style="text-align: left; border-left: 0;">VI. ALAMAT SELAMA MENJALANKAN CUTI</th>
                    </tr>
                    <tr>
                        <td width="420px" rowspan="2" >{{$detail->alamat_selama_cuti}}</td>
                        <td >TELP</td>
                        <td >{{$detail->nomor_telepon}}</td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: center; border-top: 1px solid #424141; border-bottom: 1px solid #424141; border-left: 1px solid #424141;">
                            Hormat saya,
                            <br>
                            @if ($detail->nip !== null)
                                <img src="https://sistem-kepegawaian.elearningpolsub.com/tanda_tangan/{{$detail->tanda_tangan_pegawai }}" width="29%" alt="">
                            @endif
                            <br>
                            ( {{$detail->nama}} ) <br>
                            NIP {{$detail->nip}}
                        </td>
                    </tr>
                </table>
            </div>

            <div style="margin-top: 10px;">
                <table class="table" style="width: 100%; border-top: #424141 1px solid; border-right: #424141 1px solid;">
                    <tr>
                        <th colspan="4" style="text-align: left; border-left: 1px solid #424141;">VII. PERTIMBANGAN ATASAN LANGSUNG **</th>
                    </tr>
                    <tr>
                        <td width="80px" >DISETUJUI</td>
                        <td >PERUBAHAN ****</td>
                        <td >DITANGGUHKAN ****</td>
                        <td width="276px" >TIDAK DISETUJUI ****</td>
                    </tr>
                    <tr>
                        <td >@if($detail->pertimbangan_ketua_jurusan === 'DISETUJUI')Ya. @endif</td>
                        <td >@if($detail->pertimbangan_ketua_jurusan === 'PERUBAHAN')Ya. {{$detail->alasan_pertimbangan_ketua_jurusan}}@endif</td>
                        <td >@if($detail->pertimbangan_ketua_jurusan === 'DITANGGUHKAN')Ya. {{$detail->alasan_pertimbangan_ketua_jurusan}}@endif</td>
                        <td >@if($detail->pertimbangan_ketua_jurusan === 'TIDAK DISETUJUI')Ya. {{$detail->alasan_pertimbangan_ketua_jurusan}}@endif</td>
                    </tr>
                    <tr>
                        <td colspan="3" style="text-align: left; border-left: 0px solid; border-bottom: 0px solid;"></td>
                        <td style="text-align: center; border-top: 1px solid #424141; border-bottom: 1px solid #424141; border-left: 1px solid #424141;">
                            Hormat saya,
                            <br>
                            @if ($detail->ketua_jurusan !== null)
                                <img src="https://sistem-kepegawaian.elearningpolsub.com/tanda_tangan/{{$detail->tanda_tangan_kajur }}" width="29%" alt="">
                            @endif
                            <br>
                            ( @if($detail->ketua_jurusan === null) .............................................. @else {{$detail->ketua_jurusan}} @endif ) <br>
                            NIP @if($detail->nip_ketua_jurusan === null) .............................................. @else {{$detail->nip_ketua_jurusan}} @endif
                        </td>
                    </tr>
                </table>
            </div>

            <div style="margin-top: 80px;">
                <table class="table" style="width: 100%; border-top: #424141 1px solid; border-right: #424141 1px solid;">
                    <tr>
                        <th colspan="4" style="text-align: left; border-left: 1px solid #424141;">VIII. KEPUTUSAN PEJABAT YANG BERWENANG MEMBERIIKAN CUTI **</th>
                    </tr>
                    <tr>
                        <td width="80px" >DISETUJUI</td>
                        <td >PERUBAHAN ****</td>
                        <td >DITANGGUHKAN ****</td>
                        <td width="276px" >TIDAK DISETUJUI ****</td>
                    </tr>
                    <tr>
                        <td >@if($detail->keputusan_wakil_direktur === 'DISETUJUI')Ya. @endif</td>
                        <td >@if($detail->keputusan_wakil_direktur === 'PERUBAHAN')Ya. {{$detail->alasan_keputusan_wakil_direktur}}@endif</td>
                        <td >@if($detail->keputusan_wakil_direktur === 'DITANGGUHKAN')Ya. {{$detail->alasan_keputusan_wakil_direktur}}@endif</td>
                        <td >@if($detail->keputusan_wakil_direktur === 'TIDAK DISETUJUI')Ya. {{$detail->alasan_keputusan_wakil_direktur}}@endif</td>
                    </tr>
                    <tr>
                        <td colspan="3" style="text-align: left; border-left: 0px solid; border-bottom: 0px solid;"></td>
                        <td style="text-align: center; border-top: 1px solid #424141; border-bottom: 1px solid #424141; border-left: 1px solid #424141;">
                            Hormat saya,
                            <br>
                            @if ($detail->wakil_direktur !== null)
                                <img src="https://sistem-kepegawaian.elearningpolsub.com/tanda_tangan/{{$detail->tanda_tangan_wadir }}" width="29%" alt="">
                            @endif
                            <br>
                            ( @if($detail->wakil_direktur === null) .............................................. @else {{$detail->wakil_direktur}} @endif ) <br>
                            NIP NIP @if($detail->nip_wakil_direktur === null) .............................................. @else {{$detail->nip_wakil_direktur}} @endif
                        </td>
                    </tr>
                </table>
            </div>
        </section>
	</body>
</html>