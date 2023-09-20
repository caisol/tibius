<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Services extends CI_Controller {

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
	public function details()
	{
		$data=array();
		$last = $this->uri->total_segments();
		$record_num = $this->uri->segment($last);
		$data['last_segment'] = $record_num;
		
		$service_name = $this->uri->segment(2);
		if($service_name == 'data-analytics')
		{
			$data['title'] = "Build Dashboard and Analytics Application";
			$data['service_image'] = "Data-Analyst.png";
			$data['service_image_samll'] = "jb1.png";

			$data['first_heading'] = "Vector Technologies helps present a solution where you’d understand the meaning of your data and how you can use it to accelerate.";
			$data['second_heading'] = "Creating Dashboards, upgrading or implementing analytics applications and help 
                                    
                                     uncover hidden patterns so that you can visually explore your data.";
			$data['third_heading'] = "VT Data Governance team understands how data can be used to tackle critical problems and issues within a Client business process and helps drastically in making important decisions for your Company for it to outshine within the industry while we ensure that best practices and industry standards are followed. We identify the bottle neck points, unhide hidden patterns, provide intelligent reporting and predictive
			analysis,and identify gaps to help improve performance of business process.
			For your Business Intelligence our predictive analysis takes into account Customer segmentation, Risk Assessment, 
			Churn prevention, Sales Forecasting, Market analysis and financial modelling to provide trends and association and predict futre behavior
			
			We have expertise in implementing following applications
			•	Teradata<br>
			•	Tibco<br>
			•	MS Dynamics<br>
			•	Hyperion<br>
			•	ESSBASE";

		}
		if($service_name == 'project-management-services')
		{
			$data['title'] = "Project Management Services";
			$data['service_image'] = "project_managment_header.webp";
			//$data['service_image_samll'] = "project-managem-services.png";
			$data['first_heading'] = "Vector Technologies provide various types of Project Management services when
it comes to integrating systems";
			$data['third_heading'] = "We are API development experts.Following
services are provided:Developmental integration service- Micro services and
TDD approachDevOps as a service ( Jenkins, Splunk logs, branching. )2000-
2005: UX/UI designer2005- 2007: Javascript Developer";
			$data['second_heading'] = "";
			
		}
		if($service_name == 'quality-management-services')
		{
			$data['title'] = "Quality Management Services";
			$data['service_image'] = "quality-banner.jpg";
			$data['service_image_samll'] = "quality.jpg";
			//$data['service_image_samll'] = "project-managem-services.png";
			$data['first_heading'] = "Vector Tech Quality Management team understands the need quality
			product to be released in your production environment.";
			$data['second_heading'] = "Our QMS team will
			plug with your team and will test the required functionality. Consider our
			offshore team as an auxiliary, once attached to your team we will test
			each single functionality as defined per business process.</p>";
			$data['third_heading'] = "We have expertise in documenting Test Plans, Test Cases, Test Steps.
Rely on us to provide on time testing results with proper documentation.";
			
		}
		if($service_name == 'staffing-services')
		{
			$data['title'] = "Staffing Services";
			$data['service_image'] = "staffing_banner.jpg";
			$data['service_image_samll'] = "staffing.png";
			//$data['service_image_samll'] = "project-managem-services.png";
			$data['first_heading'] = "Our expertise are in providing the right resources for your project needs.
Are you tired of getting resumes that do not have the skills that you require
in the candidate profile and proper due-diligence is not done before the
resume came in front of your eyes?";
			$data['second_heading'] = "We are here to help, we don&#39;t want you to spend your quality time
reviewing the resume that you end up deciding that you dont want to set
an interview with that person.";
			$data['third_heading'] = "Our ATS tool is way enhanced, we use MLP and Skills matching between
the Job requisitions and the candidates profile that we provide you. They
will be high quality candidates and we are equipped to provide you the
profiles as per your standard";
			
		}
		if($service_name == 'project-based-solutions')
		{
			$data['title'] = "Development Operation Services";
			$data['service_image'] = "development-banner.png";
			$data['service_image_samll'] = "management-developer-process.png";
			$data['first_heading'] = "Vector Technologies is the helping hand that you can count on. Whether it&#39;s the
start of the project or in the middle that you are looking for help.";
			$data['second_heading'] = "We would love to
help- Our offshore services model can help your organization achieve your
project goals on time";
			$data['third_heading']  ="With Management and Architect level resources provided onsite and a whole
dedicated offshore team to do all the leg work, our model works when you are in
dire need of getting things done.";
			//$data['service_image_samll'] = "project-managem-services.png";
			
			
		}
		if($service_name == 'agile-training-services')
		{
			$data['title'] = "Agile training/Services";
			$data['service_image'] = "agile-training.jpg";
			$data['service_image_samll'] = "agile-icon.jpg";
			//$data['service_image_samll'] = "project-managem-services.png";
			
			
		}
		$data['front_header'] = 'templates/front/front_header';
		$data['service_detail'] = 'templates/front/service_detail';
		$data['services_content'] = 'templates/front/services_content';
		$data['front_footer'] ='templates/front/front_footer';
		$this->template->load('templates/template_front_home', 'front/service_detail',$data);
	}
}
