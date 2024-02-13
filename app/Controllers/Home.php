<?php

namespace App\Controllers;
use Dompdf\Dompdf;
use CodeIgniter\Controller;
use App\Models\M_office;
use Dompdf\Options;

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

	}
	
	

