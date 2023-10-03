<?php

function predictDeliveryStatus($jarak, $berat_barang, $jenis_barang) {
    if ($jarak === 'Jauh') {
        if ($berat_barang === 'Ringan') {
            if ($jenis_barang === 'Pakaian' || $jenis_barang === 'Elektronik') {
                return 'Tepat Waktu';
            } elseif ($jenis_barang === 'Alat Berat') {
                return 'Terlambat';
            }
        } elseif ($berat_barang === 'Sedang') {
            if ($jenis_barang === 'Pakaian' || $jenis_barang === 'Elektronik') {
                return 'Terlambat';
            } elseif ($jenis_barang === 'Alat Berat') {
                return 'Terlambat';
            }
        } elseif ($berat_barang === 'Berat') {
            if ($jenis_barang === 'Pakaian' || $jenis_barang === 'Elektronik') {
                return 'Terlambat';
            }
        }
    } elseif ($jarak === 'Dekat') {
        if ($berat_barang === 'Ringan') {
            if ($jenis_barang === 'Pakaian' || $jenis_barang === 'Elektronik') {
                return 'Tepat Waktu';
            } elseif ($jenis_barang === 'Alat Berat') {
                return 'Terlambat';
            }
        } elseif ($berat_barang === 'Sedang') {
            if ($jenis_barang === 'Pakaian' || $jenis_barang === 'Elektronik') {
                return 'Tepat Waktu';
            } elseif ($jenis_barang === 'Alat Berat') {
                return 'Terlambat';
            }
        } elseif ($berat_barang === 'Berat') {
            if ($jenis_barang === 'Pakaian' || $jenis_barang === 'Elektronik') {
                return 'Terlambat';
            }
        }
    }
    return 'Unknown';
}

// Contoh penggunaan
$jarak = 'Jauh';
$berat_barang = 'Sedang';
$jenis_barang = 'Pakaian';

$delivery_status = predictDeliveryStatus($jarak, $berat_barang, $jenis_barang);
echo "Jarak: $jarak <br> Berat Barang: $berat_barang <br> Jenis Barang: $jenis_barang <br><br>";
echo "Status Pengiriman: $delivery_status";

?>
