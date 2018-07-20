<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="<?= base_url('') ?>assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('') ?>assets/vendor/font-awesome/css/font-awesome.min.css">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
    <!-- ICONS -->

    <script src="<?= base_url('') ?>assets/vendor/jquery/jquery.min.js"></script>
  
    <style type="text/css">
        tr th, tr td {text-align: center; padding: 1%;}
    </style>
</head>

<body>
<div id="wrapper">
	<div class="row">
		<div class="col-sm-1" style="align-items: left;">
			<p>
			<img src="<?= base_url('assets/img/logo1.jpg') ?>" class="img img-thumbnail" width="80px" style="align-self: left;">
		</div>
		<div class="col-sm-10">
			<h4>PT. PLN (PERSERO)</h4>
			<h4>AREA PALEMBANG</h4></p>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12" align="center">
			<b><h3>BERITA ACARA PELAKSANAAN VERIFIKASI FISIK <br>
			(PDP IV.II - 001)</h3></b>
			<br>
			<table style="width: 90%" class="table table-bordered">
				<tbody>
					<tr>
						<td>Nama Program</td>
						<td>Verifikasi Fisik</td>
					</tr>
					<tr>
						<td>Kantor Distribusi</td>
						<td>WS2JB</td>
					</tr>
					<tr>
						<td>Area / Rayon</td>
						<td>Area Palembang</td>
					</tr>
				</tbody>
			</table>
			<hr>
			<h4>Pada Hari ini <?= $this->tanggal->now() ?> Telah dilaksanakan verifikasi fisik atas pelanggan :</h4>
			<table class="table" style="width: 90%">
				<tbody>
					<tr>
						<td>Nama</td>
						<td><?= $data->nama ?></td>
						<td>Tarif/Daya</td>
						<td><?= $data->daya ?></td>
					</tr>
					<tr>
						<td>Id Pelanggan</td>
						<td><?= $data->idpel ?></td>
						<td>No Gardu</td>
						<td></td>
					</tr>
					<tr>
						<td>Alamat</td>
						<td><?= $data->alamat ?></td>
						<td>Cluster</td>
						<td><?= $data->nama ?></td>
					</tr>
				</tbody>
			</table>
			<br>
			<table class="table table-bordered" style="width: 90%">
				<thead>
					<tr>
						<th>A. PEMERIKSAAN APP</th>
						<th>DATA ASET LAMA</th>
						<th>DATA ASET BARU</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Nomor Meter</td>
						<td><?= $this->meter_m->get_row(['idpel' => $data->idpel])->id_meter ?></td>
						<td>
							<?php if ($realisasi->ganti_meter == 1): ?>
								<?= $this->meter_m->get_last_row(['idpel' => $data->idpel])->id_meter ?>	
							<?php endif ?>
						</td>
					</tr>
					<tr>
						<td>Merk / Type Meter</td>
						<td><?= $this->meter_m->get_row(['idpel' => $data->idpel])->merk ?> / <?= $this->meter_m->get_row(['idpel' => $data->idpel])->tipe ?> </td>
						<td>
							<?php if ($realisasi->ganti_meter == 1): ?>
								<?= $this->meter_m->get_last_row(['idpel' => $data->idpel])->merk ?> / <?= $this->meter_m->get_last_row(['idpel' => $data->idpel])->tipe ?>	
							<?php endif ?>	
						</td>
					</tr>
					<tr>
						<td>Tahun Pembuatan</td>
						<td><?= $this->meter_m->get_row(['idpel' => $data->idpel])->tahun_buat ?> </td>
						<td><?php if ($realisasi->ganti_meter == 1): ?>
								<?= $this->meter_m->get_last_row(['idpel' => $data->idpel])->tahun_buat ?>	
							<?php endif ?></td>
					</tr>
					<tr>
						<td>Kelas</td>
						<td><?= $this->meter_m->get_row(['idpel' => $data->idpel])->kelas ?> </td>
						<td><?php if ($realisasi->ganti_meter == 1): ?>
								<?= $this->meter_m->get_last_row(['idpel' => $data->idpel])->kelas ?>	
							<?php endif ?></td>
					</tr>
					<tr>
						<td>Stand H(LWBP)</td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td>&nbsp;&nbsp;L (WBP)</td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td>Total</td>
						<td><?= $realisasi->stand_total ?></td>
						<td></td>
					</tr>
					<tr>
						<td>Type Pembatas Arus</td>
						<td><?= $this->pembatas_arus_m->get_row(['id_pelanggan' => $data->idpel])->tipe?></td>
						<td>
							<?php if ($realisasi->ganti_pembatas == 1): ?>
								<?= $this->pembatas_arus_m->get_last_row(['id_pelanggan' => $data->idpel])->tipe ?>	
							<?php endif ?>
						</td>
					</tr>
					<tr>
						<td>Merk Pembatas Arus</td>
						<td><?= $this->pembatas_arus_m->get_row(['id_pelanggan' => $data->idpel])->merk ?> </td>
						<td><?php if ($realisasi->ganti_pembatas == 1): ?>
								<?= $this->pembatas_arus_m->get_last_row(['id_pelanggan' => $data->idpel])->merk ?>	
							<?php endif ?></td>
					</tr>
					<tr>
						<td>Arus</td>
						<td><?= $this->pembatas_arus_m->get_row(['id_pelanggan' => $data->idpel])->arus ?></td>
						<td><?php if ($realisasi->ganti_pembatas == 1): ?>
								<?= $this->pembatas_arus_m->get_last_row(['id_pelanggan' => $data->idpel])->arus ?>	
							<?php endif ?></td>
					</tr>
					<tr>
						<td>Trafo Arus (CT)</td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td>Trafo Tegangan (PT)</td>
						<td><?= $this->ct_m->get_row(['id_pelanggan' => $data->idpel])->jenis ?></td>
						<td><?php if ($realisasi->ganti_ct == 1): ?>
								<?= $this->ct_m->get_last_row(['id_pelanggan' => $data->idpel])->jenis ?>	
							<?php endif ?></td>
					</tr>
					<tr>
						<td>Faktor Kali</td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td>Boc APP</td>
						<td></td>
						<td></td>
					</tr>
				</tbody>
			</table>
			<br><br>
			<table class="table table-bordered" style="width: 90%;">
				<thead>
					<tr>
						<th>B. PERALATAN AMR</th>
						<th>DATA ASET LAMA</th>
						<th>DATA ASET BARU</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Merk / Type Modem</td>
						<td><?= $this->modem_m->get_row(['id_pelanggan' => $data->idpel])->merk ?></td>
						<td><?php if ($realisasi->ganti_modem == 1): ?>
								<?= $this->modem_m->get_last_row(['id_pelanggan' => $data->idpel])->merk ?>	
							<?php endif ?></td>
					</tr>
					<tr>
						<td>No IMEI Modem</td>
						<td><?= $this->modem_m->get_row(['id_pelanggan' => $data->idpel])->imei ?></td>
						<td><?php if ($realisasi->ganti_modem == 1): ?>
								<?= $this->modem_m->get_last_row(['id_pelanggan' => $data->idpel])->imei ?>	
							<?php endif ?></td>
					</tr>
					<tr>
						<td>No Sim Card / Provider</td>
						<td><?= $this->sim_card_m->get_row(['id_pelanggan' => $data->idpel])->nomor ?></td>
						<td><?php if ($realisasi->ganti_modem == 1): ?>
								<?= $this->modem_m->get_last_row(['id_pelanggan' => $data->idpel])->nomor ?>	
							<?php endif ?></td>
					</tr>
				</tbody>
			</table><br><br>
			<table class="table table-bordered" style="width: 90%;">
				<thead>
					<tr>
						<th rowspan="8">C. PENGUKURAN DATA</th>
						<td>Pengukuran Arus Primer</td>
						<td>Pengukuran Tegangan Rendah</td>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td> &nbsp; </td>
						<td>IR = <?= $realisasi->arus_r ?> AMP</td>
						<td>R - N = VOLT</td>
					</tr>
					<tr>
						<td> &nbsp; </td>
						<td>IS = <?= $realisasi->arus_s ?> AMP</td>
						<td>S - N = VOLT</td>
					</tr>
					<tr>
						<td> &nbsp; </td>
						<td>IT = <?= $realisasi->arus_t ?> AMP</td>
						<td>T - N = VOLT</td>
					</tr>

					<tr>
						<td> &nbsp; </td>
						<td>Pengukuran Arus Sekunder</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td> &nbsp; </td>
						<td>IR = <?= $realisasi->tegangan_t ?> AMP</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td> &nbsp; </td>
						<td>IS = <?= $realisasi->tegangan_t ?> AMP</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td> &nbsp; </td>
						<td>IT = <?= $realisasi->tegangan_t ?> AMP</td>
						<td>&nbsp;</td>
					</tr>
				</tbody>
			</table>
			<br><br>
			<table class="table table-bordered" style="width: 90% !important;">
				<thead>
					<tr>
						<th  style="text-align: left !important;">D .Keterangan</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td style="text-align: left !important;"><p>
							<?= $realisasi->kesimpulan ?>
						</p></td>
					</tr>
				</tbody>
			</table>
			<br><br><br>
			<table width="90%" style="width: 90%;">
				<tbody>
					<tr>
						<td colspan="2">Pelaksana</td>
						<td>Operator AMR</td>
						<td> Disaksikan</td>
					</tr>
					<tr>
						<td><?php $id = $this->target_operasional_m->get_row(['id_to' => $realisasi->id_to])->pegawai;
							echo $this->pegawai_m->get_row(['username' => $id])->nama; ?></td>
						<td>&nbsp;</td>
						<td>1. </td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>..................</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>


</div>
	<script src="<?= base_url('') ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!-- <script src="<?= base_url('') ?>assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script> -->
</body>

</html>