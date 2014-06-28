<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Money_Back_Guarantee extends CI_Controller {

	public function index()
	{
		$catinfo->alias = "money-back-guarantee";
		$cat = $this->m_content_category->load($catinfo->alias);
		
		$info->catid = $cat->id;
		$item = $this->m_content->getItem($info, 1);
		
		$view_data = "";
		$view_data['item'] = $item;
		
		$tmpl_content = "";
		$tmpl_content['meta']['title'] = $item->title;
		$tmpl_content['meta']['keywords'] = $item->meta_key;
		$tmpl_content['meta']['description'] = $item->meta_desc;
		$tmpl_content['content'] = $this->load->view("legal/detail", $view_data, TRUE);
		$this->load->view('layout/tour', $tmpl_content);
	}
}

?>