  <?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_model extends CI_Model{
  public function __construct(){
    $this->load->database();
  }

  public function addMenu()
  {
    $data = array(
      'nama' => $this->input->post('nama'),
      'kategori' => $this->input->post('kategori'),
      'harga' => $this->input->post('harga')
     );
     $this->db->insert('produk',$data);
  }

  public function getIncomeData($bulan, $tahun) {
    $this->db->select('*, sum(total) as total');
    $this->db->from('order');
    $this->db->where(
      [
        "month(tgl_order)" => $bulan,  
        "year(tgl_order)" => $tahun  
      ]
    );
    $query = $this->db->get();
    return $query->row()->total;    
  }

  public function getTransaction($bulan, $tahun) {
    $this->db->select('*, count(id) as id');
    $this->db->from('order');
    $this->db->where(
      [
        "month(tgl_order)" => $bulan,  
        "year(tgl_order)" => $tahun  
      ]
    );
    $query = $this->db->get();
    return $query->row()->id;    
  }

  public function getIncomeYear($tahun) {
    $this->db->select('*, sum(total) as total');
    $this->db->from('order');
    $this->db->where(
      [  
        "year(tgl_order)" => $tahun  
      ]
    );
    $query = $this->db->get();
    return $query->row()->total;    
  }  

  public function getTransactionDay($day) {
    $this->db->select('*, count(id) as id');
    $this->db->from('order');
    $this->db->where(
      [  
        "day(tgl_order)" => $day  
      ]
    );
    $query = $this->db->get();
    return $query->row()->id;    
  }    

  public function getTransactionMonth($month) {
    $this->db->select('*, count(id) as id');
    $this->db->from('order');
    $this->db->where(
      [  
        "month(tgl_order)" => $month 
      ]
    );
    $query = $this->db->get();
    return $query->row()->id;    
  }  

  public function getTransactionYear($year) {
    $this->db->select('*, count(id) as id');
    $this->db->from('order');
    $this->db->where(
      [  
        "year(tgl_order)" => $year
      ]
    );
    $query = $this->db->get();
    return $query->row()->id;    
  }  

  public function updateMenu()
  {
    $where = array('id' => $this->input->post('id'));
    $data = array(
      'nama' => $this->input->post('nama'),
      'kategori' => $this->input->post('kategori'),
      'harga' => $this->input->post('harga')
     );
     $this->db->where($where);
     $this->db->update('produk',$data);
  }

  public function deleteMenu()
  {
    $where = array('id' => $this->input->post('id'));
    $data = array(
      'status' => '0'
     );
     $this->db->where($where);
     $this->db->update('produk',$data);
  }

  public function restoreMenu()
  {
    $where = array('id' => $this->input->post('id'));
    $data = array(
      'status' => '1'
     );
     $this->db->where($where);
     $this->db->update('produk',$data);
  }

  public function getMenu()
  {

    $where = array('status' => 1 );
    $query = $this->db->get_where('produk',$where);
    return $query->result();
  }

    public function getDeletedMenu()
  {

    $where = array('status' => 0 );
    $query = $this->db->get_where('produk',$where);
    return $query->result();
  }

  public function getDetailTransaksi()
  {
    $query = $this->db->get('view_transaksi');
    return $query->result();
  }

  public function getSelectedDetailTransaksi($id)
  {
    $where = array(
      'id_order'=>$id
     );
    $query = $this->db->get_where('view_transaksi',$where);
    return $query->row();
  }

  public function orderMonth($bulan)
  {
    $where = array("DATE_FORMAT(tgl_order,'%m')" => $bulan );
    $query = $this->db->get_where('order',$where);
    return $query->row();
  }

  public function getSelectedDetailTransaksi1($id)
  {
    $where = array(
      'id_order'=>$id
     );
    $query = $this->db->get_where('view_transaksi',$where);
    return $query->result();
  }

  public function getSelectedOrder($id)
  {
    $where = array('id' => $id );
    $query = $this->db->get_where('order',$where);
    return $query->row();
  }

  public function getTransaksi()
  {
    $query = $this->db->get('order');
    return $query->result();
  }

  public function getNextId()
  {
    $this->db->select_max('id', 'max');
    $query = $this->db->get('order');
    if ($query->num_rows() == 0) {
      return 1;
    }
    return $query->row()->max+1;
  }
  public function insertOrder($id)
  {
    $data = array(
      'id'=> $id,
      'nama_pembeli' => $this->input->post('nama_pembeli'),
      'bayar' => $this->input->post('bayar'),
      'kembali' => $this->input->post('kembali'),
      'total' => $this->input->post('total')
     );
     $this->db->insert('order',$data);
  }
  public function insertDetail($id,$id_produk,$harga,$jumlah)
  {
    $data = array(
      'id_order'=> $id,
      'id_produk' => $id_produk,
      'harga' => $harga,
      'jumlah' => $jumlah
     );
     $this->db->insert('transaksi',$data);
  }

  public function searchBar($key)
  {
    $this->db->like('nama',$key);
    $query = $this->db->get('produk');
    return $query->result();
  }
}
?>