<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aplikasi extends MY_Controller {
	public function index($info = ''){
		$data = $this->db->order_by('judul')->get('data')->result();
		$this->twig->display('aplikasi/beranda', compact('data', 'info'));
	}

	public function tambah($info = ''){
		if (!$_POST){
			$this->twig->display('aplikasi/tambah', compact('info'));
		} else {
			$data = (object) $this->input->post();
			$data->gambar = '';
			$this->upload->initialize(array(
				'upload_path' => './aset/gambar',
				'allowed_types' => 'gif|jpg|png|jpeg',
				'encrypt_name' => TRUE
			));
			if ($this->upload->do_upload('gambar')){
				$data->gambar = $this->upload->data()['file_name'];
			}
			$this->db->insert('data', $data);
			redirect(site_url() . 'tambah/berhasil');
		}
	}

	public function hapus($id){
		$gambar = $this->db->where('id', $id)->get('data')->result()[0]->gambar;
		$this->db->delete('data', compact('id'));
		unlink('./aset/gambar/' . $gambar);
		redirect(site_url() . 'selesai');
	}
}
