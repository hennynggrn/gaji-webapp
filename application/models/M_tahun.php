<?php
class M_tahun extends CI_Model {

   public function get_tahun($id=NULL)
   {
      if ($id==NULL){
   } else {
      $this->db->where('id_tahun',$id);
   }
   return $this->db->get('tahun');
   }

   public function get_id_tahun($tahun)
   {
      $this->db->where('tahun',$tahun);
      return $this->db->get('tahun');
   }
}