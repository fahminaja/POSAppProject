<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct()
	{
    parent::__construct();
    	$this->load->model('admin_model');
		$this->load->helper('date');
		$this->load->helper('url');
		$this->load->library('session');
  	}

  	public function adminDashboard()
	{
		$tahun = date('Y');
		$day = date('d');
		$bulan = date('m');
		$data['view_name'] = 'adminContent';
		$data['day'] = $this->admin_model->getTransactionDay($day);
		$data['month'] = $this->admin_model->getTransactionMonth($bulan);
		$data['year'] = $this->admin_model->getTransactionYear($tahun);
		$data['income'] = $this->admin_model->getIncomeYear($tahun);
		for ($b=1; $b < 13  ; $b++) { 
			$data['value'][] = $this->admin_model->getIncomeData($b, $tahun);
		}
		for ($b=1; $b < 13  ; $b++) { 
			$data['transaction'][] = $this->admin_model->getTransaction($b, $tahun);
		}
		$this->load->view('admin/template',$data);
	}

	public function skeyword()
	{
		$key = $this->input->post('nama');
		$data['menu'] = $this->admin_model->searchBar($key);
		$data['view_name'] = 'orderMenu';
		$this->load->view('admin/template',$data);
	}

	public function listMenu()
	{
		if ($this->input->post('addMenu')){
		$this->admin_model->addMenu();
		notify('Berhasil Tambah Data','Proses penambahan menu berhasil','success','fas fa-plus-circle','listMenu');
		} elseif ($this->input->post('updateMenu')){
		$this->admin_model->updateMenu();
		notify('Berhasil Ubah Menu','Proses pengubahan menu berhasil','success','fas fa-wrench','listMenu');
		} elseif ($this->input->post('deleteMenu')){
		$this->admin_model->deleteMenu();
		notify('Berhasil Hapus Menu','Proses penghapusan menu berhasil','success','fas fa-trash','listMenu');
		} else{
		//$data['produk'] = $this->admin_model->getSelectedMenu($id);
		$data['menu'] = $this->admin_model->getMenu();
		$data['view_name'] = 'listMenu';
		$this->load->view('admin/template',$data);
		}
	}

	public function deletedMenu()
	{
		if ($this->input->post('restoreMenu')){
		$this->admin_model->restoreMenu();
		notify('Berhasil Restore Menu','Proses restore menu berhasil','success','fas fa-redo-alt','listMenu');
		} else {
		$data['menu'] = $this->admin_model->getDeletedMenu();
		$data['view_name'] = 'deletedMenu';
		$this->load->view('admin/template',$data);
		}
	}

	public function orderMenu()
	{
		//$data['produk'] = $this->admin_model->getSelectedMenu($id);
		$data['menu'] = $this->admin_model->getMenu();
		$data['view_name'] = 'orderMenu';
		$this->load->view('admin/template',$data);
		
	}

	public function detailTransaksi($id)
	{
		//$data['produk'] = $this->admin_model->getSelectedMenu($id);
		$data['detail'] = $this->admin_model->getSelectedDetailTransaksi($id);
		$data['detail1'] = $this->admin_model->getSelectedDetailTransaksi1($id);
		$data['order'] = $this->admin_model->getSelectedOrder($id);
		$data['view_name'] = 'detailTransaksi';
		$this->load->view('admin/template',$data);
	}

	public function listTransaksi()
	{
		//$data['produk'] = $this->admin_model->getSelectedMenu($id);
		$data['detail'] = $this->admin_model->getTransaksi();
		$data['view_name'] = 'listTransaksi';
		$this->load->view('admin/template',$data);
	}

	public function checkOut()
	{
		//$data['produk'] = $this->admin_model->getSelectedMenu($id);
		$data['pesan'] = $this->session->userdata('cart');
		$data['view_name'] = 'checkOut';
		$this->load->view('admin/template',$data);
		
	}

	public function AddtoCart(){
		
		if ($this->input->post('AddtoCart') != null){
			$cart = $this->session->userdata('cart');
			$id  = $this->input->post('id');
			if (!isset($cart)) {
		         $cart[$id] = [
                    'nama_produk' => $this->input->post('nama'),
						'harga' => $this->input->post('harga'),
						'jumlah' => $this->input->post('jumlah')
                ];
				$this->session->set_userdata('cart',$cart);
				redirect(base_url('orderMenu'));
			}
			elseif(isset($cart[$id])){
                $cart[$id]['jumlah']+=$this->input->post('jumlah');
               	$this->session->set_userdata('cart',$cart);
				redirect(base_url('orderMenu'));
            }
            else{
                $cart[$id] = [
                    'nama_produk' => $this->input->post('nama'),
						'harga' => $this->input->post('harga'),
						'jumlah' => $this->input->post('jumlah')
                ];
                $this->session->set_userdata('cart',$cart);
				redirect(base_url('orderMenu'));
            }
			
		}
	}

	public function CekSesi()
	{
		var_dump($this->session->userdata('cart'));
	}

	public function RemoveCart()
	{
		$this->session->unset_userdata('cart');
		redirect(base_url('checkOut'));
	}
	public function removeItem($id)
	{
		if ($id != null) {
            $cart = $this->session->userdata('cart');
            unset($cart[$id]);
           $this->session->set_userdata('cart',$cart);
           redirect(base_url('checkOut'));
        }
	}
	public function SaveCheckOut()
	{
		$cart = $this->session->userdata('cart');
		$nextid = $this->admin_model->getNextId();
		$this->admin_model->insertOrder($nextid);
		foreach ($cart as $id => $order) {
			$id_produk = $id;
			$harga = $order['harga'];
			$jumlah = $order['jumlah'];

			$this->admin_model->insertDetail($nextid,$id_produk,$harga,$jumlah);
		}
		$this->session->unset_userdata('cart');
		redirect(base_url('orderMenu'));
	}
	public function bulan()
	{
		

	}
}