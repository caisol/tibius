<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jobs extends CI_Model {

	function __construct() {
		//$this->load->library('email');
		$this->_CID = $this->session->userdata('candidate_id');
		if(!$this->_CID || $this->_CID == 0)
		{
			redirect('login'); 
		}
	}
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function matching_jobs($data=false)
	{
		$this->db->select('name');
		$this->db->distinct();
		$query_candidate_skills = $this->db->order_by('id', 'DESC')->get_where(DB.'skills',array('cid'=>$this->_CID));
		$candidateSkills= $query_candidate_skills->result();
		$matching_jobs=array();
		
		if(isset($candidateSkills) && !empty($candidateSkills))
		{
			$prev_jobs=array();
			$matching_jobs=array();
			foreach($candidateSkills as $key=>$val)
			{
				/*d($prev_jobs);
			 $jobs_not_in="''";
			 if(!empty($prev_jobs))
			 {
				 $jobs_not_in = implode(',',$prev_jobs);
			 }*/
			 $query_job_skills = $this->db->query("SELECT s.* FROM ".DB."skills s LEFT JOIN ".DB."jobs j ON j.id=s.jid WHERE s.cid IS NULL AND s.`name` = '".$val->name."' AND j.status=1");
			
  //echo "SELECT * FROM ".DB."skills WHERE cid IS NULL AND `name` = '".$val->name."' AND jid NOT IN (".$jobs_not_in.") ";
  $jobSkills = $query_job_skills->result();
  
				//$query_job_skills = $this->db->order_by('id', 'DESC')->get_where(DB.'skills',array('cid'=>NULL,'name'=>$val->name,'jid'));$this->db->group_by('jid');
				
				//$jobSkills= $query_job_skills->result();d($jobSkills);
				/*foreach($jobSkills as $k=>$v)
				{
					$prev_jobs[] = $v->jid;
				}*/
				if(isset($jobSkills) && !empty($jobSkills))
				{
					$matching_jobs[]  = $jobSkills;
				}
				
			}
		}
		
		$total_jobs=array();
		$same_job=array();
		$tmp_jobs = array();
		foreach($matching_jobs as $key=>$val)
		{
			if(is_array($val))
			{
				foreach($val as $k=>$v)
				{
					if(!in_array($v->jid,$same_job))
					{
						
						$same_job[] = $v->jid;
						$total_jobs[] = $v->id;
						$tmp_jobs[] = $v->jid;
						
					}
				}
			}
		}
		
		if($data)
		{
			if(isset($tmp_jobs) && !empty($tmp_jobs))
			{
				$jobids = implode(",",$tmp_jobs);
			}
			else
			{
				$jobids = 0;
			}
			
			$query_job = $this->db->query("SELECT * FROM ".DB."jobs WHERE id IN (".$jobids.") ");
					
		  //echo "SELECT * FROM ".DB."skills WHERE cid IS NULL AND `name` = '".$val->name."' AND jid NOT IN (".$jobs_not_in.") ";
			return $query_job->result();
		}
		else
		{
			return $total_jobs;
		}
		
	}
	
	function applied_jobs($limit=0)
	{
		if(isset($limit) && $limit>0)
		{
			$limit_str = " LIMIT ".$limit;
		}
		else
		{
			$limit_str="";
		}
		$query_applied_jobs = $this->db->query('SELECT j.title,j.salary,j.id,aj.cid,aj.created_at,j.type,j.location,j.company,fj.status
		FROM vc_applied_jobs aj LEFT JOIN  vc_jobs j  ON  aj.jid=j.id
		LEFT JOIN vc_favourite_jobs fj ON (aj.jid=fj.jid)
		WHERE aj.cid='.$this->_CID.' AND j.status=1 ORDER BY aj.id DESC '.$limit_str);
				
		return $jobApplied= $query_applied_jobs->result();
	}
	function favourite_jobs($limit=0)
	{
		if(isset($limit) && $limit>0)
		{
			$limit_str = " LIMIT ".$limit;
		}
		else
		{
			$limit_str="";
		}
		$query_applied_jobs = $this->db->query('SELECT j.title,j.salary,j.id,aj.cid,aj.created_at,j.type,j.location,j.company FROM vc_favourite_jobs aj LEFT JOIN  vc_jobs j  ON  aj.jid=j.id WHERE aj.cid='.$this->_CID.' AND aj.status=1 AND j.status=1 ORDER BY aj.id DESC '.$limit_str);
				
		return $jobApplied= $query_applied_jobs->result();
	}
	
	
	
}
