<?php

	class GalleryModel extends CI_Model
	{
		function index(){

		}

		function get_gallery_cat(){
			$this->db->select('adi_gallery_cat.*, adi_user.name')
					->from('adi_gallery_cat')
					->join('adi_user', 'adi_gallery_cat.post_by = adi_user.id');
			$cat_gal = $this->db->get()->result();
			return $cat_gal;
		}

		function get_cat_by_id($id){
			$katagori = $this->db->select('*')
								->from('adi_gallery_cat')
								->where('id', $id);
			$katagori = $katagori->get()->row();
			return $katagori;
		}

		function get_gallery(){
			$this->db->select('adi_gallery.*, adi_user.name, adi_gallery_cat.title_eng as katagori')
					->from('adi_gallery')
					->join('adi_user', 'adi_gallery.post_by = adi_user.id')
					->join('adi_gallery_cat', 'adi_gallery.id_cat = adi_gallery_cat.id');
			$gallery = $this->db->get()->result();
			return $gallery;
		}

		function get_gallery_by_id($id){
			$gallery = $this->db->select('adi_gallery.*, adi_gallery_cat.title_eng as katagori')
								->from('adi_gallery')
								->join('adi_gallery_cat', 'adi_gallery.id_cat = adi_gallery_cat.id')
								->where('adi_gallery.id', $id);
			$gallery = $gallery->get()->row();
			return $gallery;
		}

	}