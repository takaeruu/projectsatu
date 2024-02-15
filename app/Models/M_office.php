<?php

namespace App\Models;

use CodeIgniter\Model;

class M_office extends Model

{
    protected $table = 'user'; // Nama tabel m_office
    protected $primaryKey = 'id_user'; // Primary key dari tabel m_office
    protected $allowedFields = ['foto']; // Kolom-kolom yang diizinkan untuk diisi

	public function tampil($yoga){
     return $this->db->table($yoga)  
     				 ->get()
          			 ->getResult();   

	}
    public function tampil_urut($yoga){
        return $this->db->table($yoga)
            ->orderBy('id_barang', 'DESC') // Menambahkan klausa orderBy untuk mengurutkan berdasarkan ID secara descending
            ->get()
            ->getResult();   
    }
    public function join($tabel1, $tabel2, $on){
     return $this->db->table($tabel1)  
                     ->join($tabel2,$on,'left')
                     ->get()
                     ->getResult();   

    }
     public function join1($tabel1, $tabel2, $on){
     return $this->db->table($tabel1)  
                     ->join($tabel2,$on,'inner')
                     ->get()
                     ->getResult();   

    }
    public function joinWhere($tabel1, $tabel2, $on, $where){
     return $this->db->table($tabel1, $where)  
                     ->join($tabel2,$on,'left')
                     ->get()
                     ->getRow();   

    }
    public function joinWherer($tabel1, $tabel2, $on, $where){
     return $this->db->table($tabel1)  
                     ->join($tabel2,$on,'left')
                     ->getWhere($where)
                     ->getRow();   

    }
	public function tambah($table,$isi){
		return $this->db->table($table)
						->insert($isi);
	}
    public function upload($file){
		 $imageName = $file->getName();
         $file->move(ROOTPATH . 'public/img', $imageName);
	}
	public function hapus($table,$where){
        return $this->db->table($table)
                        ->delete($where);
    }
    public function edit($tabel,$isi,$where){
        return $this->db->table($tabel)
                        ->update($isi,$where);
    }
    public function updatee($tabel,$isi){
        return $this->db->table($tabel)
                        ->update($isi);
    }
    public function getWhere($tabel,$where){
        return $this->db->table($tabel)
                        ->getwhere($where)
                        ->getRow();
    }

    public function tampildesc($table_name, $order_column)
    {
        return $this->orderBy($order_column, 'desc')
                    ->get($table_name)
                    ->getResult();
    }
}