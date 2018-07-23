<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <script src="<?= base_url('') ?>assets/vendor/jquery/jquery.min.js"></script>
    <style type="text/css">
    	tr th, tr td {
    		max-height: 80% !important;
    		font-size: 11px;
    	}
    </style>
</head>

<body>
<div>
	<table>
		<tr>
			<td style="align-items: left;">
				<img src="<?= base_url('assets/img/logo1.jpg') ?>" style="width: 40px;align-self: left;">
			</td>
			<td>
				<p><h5>PT. PLN (PERSERO)<br>AREA PALEMBANG</h5></p>
			</td>
		</tr>
	</table>
	<!-- <div class="row">
		<div class="col-sm-1" style="align-items: left;">
			<p>
			<img src="<?= base_url('assets/img/logo1.jpg') ?>" class="img img-thumbnail" width="80px" style="align-self: left;">
		</div>
		<div class="col-sm-10">
			<h4>PT. PLN (PERSERO)</h4>
			<h4>AREA PALEMBANG</h4></p>
		</div>
	</div> -->
	<div class="row" style="padding: 0; margin-top: 0;">
		<div class="col-sm-12" align="center">
			<b><h4>BERITA ACARA PELAKSANAAN VERIFIKASI FISIK <br>
			(PDP IV.II - 001)</h4></b>
			
			<table style="width: 90%; border: 1px solid black;border-collapse: collapse;" border="1" class="table table-bordered" align="center">
				<tbody>
					<tr>
						<td style="text-align: left;">Nama Program</td>
						<td style="text-align: left;">Verifikasi Fisik</td>
					</tr>
					<tr>
						<td  style="text-align: left;">Kantor Distribusi</td>
						<td style="text-align: left;">WS2JB</td>
					</tr>
					<tr>
						<td style="text-align: left;">Area / Rayon</td>
						<td style="text-align: left;">Area Palembang</td>
					</tr>
				</tbody>
			</table>
			<h5>Pada Hari ini <?= $this->tanggal->now() ?> Telah dilaksanakan verifikasi fisik atas pelanggan :</h5>
			<table class="table" style="margin-top: 0;width: 90%;padding-top: -1px;">
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
			<table class="table table-bordered" style="width: 90%;border: 1px solid black;border-collapse: collapse;" border="1">
				<thead>
					<tr>
						<th style="text-align: left; width: 30%;">A. PEMERIKSAAN APP</th>
						<th style="text-align: left; width: 30%;">DATA ASET LAMA</th>
						<th style="text-align: left; width: 30%;">DATA ASET BARU</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Nomor Meter</td>
						<td><?= 1 ?></td>
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
			</table><br>
			<table class="table table-bordered" style="width: 90%; border: 1px solid black;border-collapse: collapse;" border="1">
				<thead>
					<tr>
						<th style="text-align: left; width: 30%;">B. PERALATAN AMR</th>
						<th style="text-align: left; width: 30%;">DATA ASET LAMA</th>
						<th style="text-align: left; width: 30%;">DATA ASET BARU</th>
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
								<?= $this->sim_card_m->get_last_row(['id_pelanggan' => $data->idpel])->nomor ?>	
							<?php endif ?></td>
					</tr>
				</tbody>
			</table><br>
			<table class="table table-bordered" style="width: 90%; border: 1px solid black;border-collapse: collapse;" border="1">
				<thead>
					<tr>
						<td rowspan="8" border="0" style="width: 30%;"><b>C. PENGUKURAN DATA<b></td>
						<td  border="0" style="width: 30%;">Pengukuran Arus Primer</td>
						<td  border="0" style="width: 30%;">Pengukuran Tegangan Rendah</td>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td> &nbsp; </td>
						<td>IR =  AMP</td>
						<td>R - N = <?= $realisasi->tegangan_r ?> VOLT</td>
					</tr>
					<tr>
						<td> &nbsp; </td>
						<td>IS =  AMP</td>
						<td>S - N = <?= $realisasi->tegangan_s ?> VOLT</td>
					</tr>
					<tr>
						<td> &nbsp; </td>
						<td>IT =  AMP</td>
						<td>T - N = <?= $realisasi->tegangan_t ?> VOLT</td>
					</tr>

					<tr>
						<td> &nbsp; </td>
						<td>Pengukuran Arus Sekunder</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td> &nbsp; </td>
						<td>IR = <?= $realisasi->arus_r ?> AMP</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td> &nbsp; </td>
						<td>IS = <?= $realisasi->arus_s ?> AMP</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td> &nbsp; </td>
						<td>IT = <?= $realisasi->arus_t ?> AMP</td>
						<td>&nbsp;</td>
					</tr>
				</tbody>
			</table>
			<br>
			<table class="table table-bordered" style="width: 90% !important; border: 1px solid black;border-collapse: collapse;" border="1">
				<thead>
					<tr>
						<th  style="text-align: left !important;" colspan="2">D .Keterangan</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td style="text-align: left !important; height:80px;width: 50%;"><p>
							<ul>
								<?= ($realisasi->ganti_modem == 1)? "<li>Ganti Modem</li>": ""?>
								<?= ($realisasi->ganti_meter == 1)? "<li>Ganti Meteran</li>": ""?>
								<?= ($realisasi->ganti_sim == 1)? "<li>Ganti SIM Card</li>" : ""?>
								<?= ($realisasi->ganti_pembatas == 1)? "<li>Ganti Pembatas Arus</li>" : ""?>
								<?= ($realisasi->ganti_ct == 1)? "<li>Ganti CT</li>" : ""?>
							</ul>
						</p></td>
						<td style="text-align: left !important; height:80px;width: 50%;"><?= $realisasi->rincian ?></td>
					</tr>
				</tbody>
			</table><br>
			<table width="90%" style="width: 90%; text-align: center; padding-top: 0; margin-top: 0; ">
				<tbody>
					<tr>
						<td>Pelaksana</td>
						<td>Operator AMR</td>
						<td> Disaksikan</td>
					</tr>
					<tr>
						<td><?php $id = $this->target_operasional_m->get_row(['id_to' => $realisasi->id_to])->pegawai;
							echo $this->pegawai_m->get_row(['username' => $id])->nama; ?></td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
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
<script>
	$(document).ready(function() {
    	window.print();                
    });
</script>
</html>