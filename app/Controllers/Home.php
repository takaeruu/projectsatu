<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\M_office;

use Dompdf\Options;
use Dompdf\Dompdf;
use TCPDF;


class Home extends BaseController
{
	public function dashboard()
	{	
		if(session()->get('id')>0){
		$model = new M_office();
		
		$where=array('id_user'=>session()->get('id'));
		$data['user'] = $model->getWhere('user', $where);

		echo view ('header');
		echo view ('menu',$data);
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
		$where = array('id_user' => session()->get('id'));
	$data['user'] = $model->getWhere('user', $where);
		echo view ('header');
		echo view ('menu', $data);
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
		if(session()->get('id')>0){
		$model = new M_office;

		$desc['darren'] = $model->tampil('gudang');
		$data['user'] = $model->getWhere('user', $where);
		echo view('header');
		echo view('menu',$data);
		echo view('barang',$desc); 
		echo view('footer');

		$where = array('id_user');
		$data['darren'] = $model->tampil_urut('gudang');

		$where = array('id_user' => session()->get('id'));
		$data['user'] = $model->getWhere('user', $where);

		echo view('header');
		echo view('menu', $data);
		echo view('barang',$data); 
		echo view('footer');
	} else {
        return redirect()->to('home/login');
    }

		}


		public function print()
		{
			if(session()->get('id')>0){
			require_once  FCPATH. 'tcpdf/tcpdf.php';
    	$model = new M_office();
		$data['darren'] = $model->tampil('gudang');

    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

    // Set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Your Name');
    $pdf->SetTitle('Your Title');
    $pdf->SetSubject('Your Subject');
    $pdf->SetKeywords('Your Keywords');
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
    $imagePath = 'https://i.postimg.cc/bYTDFsYg/kop.jpg';
    // Add a page
    $pdf->AddPage();


    // Set some content to print
    $html = view('print', $data); // Ganti 'your_pdf_view' dengan nama view Anda

    $pdf->writeHTML($html, true, false, true, false, '');
    $pdf->Output('Contoh Print.pdf', 'I');
	exit();

		}

} else {
	return redirect()->to('home/login');
}
}


	public function TambahBarang()
{
	if(session()->get('id')>0){
	$model = new M_office;
	$data['darren'] = $model->tampil('gudang');
	$where = array('id_user' => session()->get('id'));
	$data['user'] = $model->getWhere('user', $where);
	echo view('header');
	echo view ('menu', $data);
	echo view('tambahbarang',$data); 
	echo view('footer');
} else {
	return redirect()->to('home/login');
}
}

public function aksi_t_barang()
{
	$nama = $this->request->getPost('nama');
	$kode = $this->request->getPost('kode');
	$stok = $this->request->getPost('stok');
		
	$tabel=array(
		'nama_barang'=>$nama,
		'kode_barang'=>$kode,
		'stok'=>$stok

	);

	$model=new M_office;
	$model->tambah('gudang', $tabel);
	return redirect()->to('home/barang');

}

public function editbarang($id)
{
	if(session()->get('id')>0){
	$model = new M_office;
	$where = array('id_barang' => $id);
	$data['darren'] = $model->getWhere('gudang', $where);
	$where = array('id_user' => session()->get('id'));
	$data['user'] = $model->getWhere('user', $where);

	echo view('header');
	echo view ('menu', $data);
	echo view('e_barang',$data); 
	echo view('footer');
} else {
	return redirect()->to('home/login');
}
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