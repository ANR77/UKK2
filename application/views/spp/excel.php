<?php
    header("Content-type: application/vnd-ms-excel");  
    header("Content-Disposition: attachment; filename=$title.xls");
    header("Pragma: no-cache");
    header("Expires: 0");
?>
<table>
    <tr>
        <td colspan="3"><strong>Laporan <?= $spp['keterangan'].' '.$spp['tahun'] ?></strong></td>
    </tr>
</table>
<table>
    <tr>
        <td>Kelas</td>
        <td>:</td>
        <td colspan="3"><?= $kelas['kelas_full'] ?></td>
    </tr>
</table>
<table border="1">
    <thead>
        <tr>
            <th>No</th>
            <th>NISN</th>
            <th>NIS</th>
            <th>Nama</th>
            <th>Jumlah Tagihan</th>
            <th>Jumlah Tunggakan</th>
            <th>Jumlah Angsuran</th>
        </tr>
    </thead>
    <tbody>
        <?php for($i=0; $i < count($dataSpp); $i++) { ?>
            <tr>
                <td><?= $i+1 ?></td>
                <td><?= $dataSpp[$i]['nisn'] ?></td>
                <td><?= $dataSpp[$i]['nis'] ?></td>
                <td><?= $dataSpp[$i]['nama'] ?></td>
                <td><?= $dataSpp[$i]['jumlah_tagihan'] ?></td>
                <td><?= $dataSpp[$i]['jumlah_angsuran'] ?></td>
                <td><?= $dataSpp[$i]['jumlah_tanggungan'] ?></td>
            </tr>
        <?php } ?>
        <tr>
            <td colspan="4">Jumlah</td>
            <td><?= $jumlah_tagihan ?></td>
            <td><?= $jumlah_angsuran ?></td>
            <td><?= $jumlah_tanggungan ?></td>
        </tr>
    </tbody>
</table>