<?php

class LaporanModel extends CI_Model
{
    public function kunjungan_poliklinik($tahun)
    {
        // query ambil data kunjungan
		$this->db->query('
			SELECT p.nama_poliklinik, YEAR ( pd.tgl_berobat ) AS tahun, 
			MONTH ( pd.tgl_berobat ) AS bulan,
			COUNT(*) AS jumlah_kunjungan 
		FROM
			tbl_pendaftaran pd
			JOIN tbl_poliklinik p ON pd.id_poliklinik = p.id_poliklinik 
		GROUP BY p.nama_poliklinik,
		tahun, bulan  ORDER BY tahun, bulan, p.nama_poliklinik')->result_array();
    }
}
