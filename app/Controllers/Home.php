<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\M_office;

use Dompdf\Options;

use Dompdf\Dompdf;
use TCPDF\TCPDF;


class Home extends BaseController
{
	public function dashboard()
	{	
		if(session()->get('id')>0){
		$model = new M_office();
		$where=array('id_user'=>session()->get('id'));

		echo view ('header');
		echo view ('menu');
		echo view('dashboard');
		echo view('footer');
	
		}else{
		return redirect()->to('home/login');
		}
	}

		public function login()

	{
		echo view ('header');
		echo view('login');
		
	}
	public function aksi_login()

	{
		$name = $this->request->getPost('username');
		$pw = $this->request->getPost('password');

		$where = array(

			'username'=>$name,
			'password'=>$pw,
		);
		
		$model = new M_office();
		$check = $model -> getWhere('user',$where);
		
			if ($check>0) {
				session()->set('nama',$check->username);
				session()->set('id',$check->id_user);
				session()->set('level',$check->level);
			return redirect()->to('home/dashboard');
		}else{
			return redirect()->to('home/login');
		

		}
	}
		public function logout()

	{
		session()->destroy();
		return redirect()->to('home/login');
	}
	public function tambah_akun()
	{
		
		$model = new M_office;
		
		$data['yoga'] = $model->tampil('user');
		echo view ('header');
		echo view ('menu');
		echo view('t_akun');
		echo view('footer');
		
		
	}
	public function aksi_t_akun()
	{
		
		$yoga = $this -> request ->getPost('username');
		$leo = $this -> request ->getPost('password');
		$cahya = $this -> request ->getPost('email');


		$darren=array(
			'username'=>$yoga,
			'password'=>$leo,
			'email'=>$cahya,
		);

		$model=new M_office;
		$model->tambah('user',$darren);
		return redirect()->to('home/login');
		
	
		
		}


		public function barang()
	{
		
		$model = new M_office;
		$data['darren'] = $model->tampil('gudang');
		echo view('header');
		echo view('menu');
		echo view('barang',$data); 
		echo view('footer');

		}
		public function print()
		{
			// Memuat autoload.inc.php dari DOMPDF
		   require_once FCPATH . 'vendor/dompdf/autoload.inc.php';
	
			// Pengaturan dan inisialisasi DOMPDF
			$dompdf = new Dompdf();
	
			// Memuat data yang akan digunakan di dalam view
			$model = new M_office();
			$data['darren']=$model->tampil('gudang');

			// Mengambil HTML dari view 'print' dengan data yang telah dimuat
			$html = view('print', $data);
	
			// Memuat HTML ke DOMPDF
			$dompdf->loadHtml($html);
	
			// Pengaturan output PDF
			$dompdf->setPaper('A4', 'portrait');
	
			// Render PDF
			$dompdf->render();
	
			// Output PDF ke browser
			$dompdf->stream('Contoh Print.pdf', array(
				"Attatchment" => false
			));
		}
	public function TambahBarang()
{

	$model = new M_office;
	$data['darren'] = $model->tampil('gudang');
	echo view('header');
	echo view('menu');
	echo view('tambahbarang',$data); 
	echo view('footer');
}

public function aksi_t_barang()
{
	$nama = $this->request->getPost('nama');
	$kode = $this->request->getPost('kode');
		
	$tabel=array(
		'nama_barang'=>$nama,
		'kode_barang'=>$kode,
		'stok'=>'0'

	);

	$model=new M_office;
	$model->tambah('gudang', $tabel);
	return redirect()->to('home/barang');

}

public function editbarang($id)
{

	$model = new M_office;
	$where = array('id_barang' => $id);
	$data['darren'] = $model->getWhere('gudang', $where);
	echo view('header');
	echo view('menu');
	echo view('e_barang',$data); 
	echo view('footer');

}

public function aksieditbarang()
{
	$model = new M_office; 
	$a = $this->request->getPost('nama');
	$b = $this->request->getPost('kode');
	$c = $this->request->getPost('stok');
	$id = $this->request->getPost('id');
	$where = array('id_barang'=>$id);

	$isi = array(
		'nama_barang'=> $a,
		'kode_barang'=> $b,		
		'stok'=> $c,		
	);
	$model->edit('gudang',$isi, $where);
	return redirect()->to('home/barang');
}
public function hapusbarang($id){
	
		$model = new M_office();
		$where = array('id_barang'=>$id);
		$model->hapus('gudang',$where);
		
		return redirect()->to('home/barang');
		
	}
	public function profile()
{
	if(session()->get('level')>0){
		$model = new M_office;
	$where = array('id_user');
	$data['user'] = $model->getWhere('user', $where);

	$where = array('id_user' => session()->get('id'));
	$data['user'] = $model->getWhere('user', $where);
	echo view('header');
	echo view('menu',$data);
	echo view('profile',$data); 
	echo view('footer');
	}else{
		return redirect()->to('home/login');
	}
}

public function e_foto()
{
    if(session()->get('level') > 0){
		
		echo view('header');
		echo view('menu');
		echo view('e_foto'); 
		echo view('footer');
    } else {
        return redirect()->to('home/login');
    }
}

public function aksi_ubah_foto()
{
	if ($this->request->getFile('foto')) {

		$file = $this->request->getFile('foto');
		$newFileName = $file->getRandomName(); 
		$file->move(ROOTPATH . 'public/img', $newFileName);

		$userModel = new M_office(); 
		$userId = array('id_user' => session()->get('id'));
		$userData = ['foto' => $newFileName];
		$userModel->edit('user', $userData,$userId);
		return redirect()->to('home/profile');
	} else {
		return redirect()->to('home/e_foto');

	
}
	}

	public function hapusfoto()
{       
        $userModel = new M_office(); 
        $userData = ['foto' => null];
		$userId = array('id_user' => session()->get('id'));
        $userModel->edit('user', $userData, $userId);
		
        return redirect()->to('home/profile');

}
}