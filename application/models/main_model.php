<?php 

class Main_model extends CI_Model {
		
	function __construct()
    {
        parent::__construct();
    }
	
	/*** Main ***/
	
	public function home_page()
	{
		// Send Deal
		if($this->input->post('phone') && $this->input->post('field'))
		{
			$this->main->send_deal($this->input->post('dealId'),$this->input->post('phone'),$this->input->post('field'));
		}
	}
	
		public function get_deals($field)
		{
			if(isset($field) && !empty($field))
			{
				$concepts = $this->get_related_concepts($field); // HP Related Concepts
				
				$query = $this->db->query("SELECT * FROM deals WHERE dealTags IN ('".implode("','",$concepts)."')");
				return $query->result();
			}
			else
			{
				$query = $this->db->query("SELECT * FROM deals WHERE dealStatus='active'");
				return $query->result();
			}
		}
		
		public function send_deal($dealId,$phone,$type)
		{
			if(isset($dealId) && !empty($dealId))
			{
				// Get Deals
				$query = $this->db->query("SELECT * FROM deals WHERE dealId='$dealId'");
				$deal = $query->row();
				
				// Text Deal
				$this->send_text($phone,$deal->dealDescription.' at '.$deal->dealProvider,'6463742143');
			}
			else
			{
				// Get Random Deal
				$query = $this->db->query("SELECT * FROM deals WHERE dealType LIKE '%$type%' OR dealTags LIKE '%$type%' ORDER BY RAND() LIMIT 1");
				$deal = $query->row();
			}
		}
		
		public function get_related_concepts($search)
		{
			// API Key
			$apiKey = '4998eb85-bdcf-4663-9839-48a27dffd02d';
			
			// API Call
			$text = str_replace(' ','+',$search);
			$results = json_decode(file_get_contents('https://api.idolondemand.com/1/api/sync/findrelatedconcepts/v1?text='.$text.'&indexes=&apikey='.$apiKey,true));
			
			$data = array();
			
			foreach($results->entities as $row)
			{
				array_push($data,$row->text);
			}
			
			return $data;
		}
		
		public function get_sentiment_analysis($search)
		{
			// API CALL
			$apiKey = '4998eb85-bdcf-4663-9839-48a27dffd02d';
			
			// API Call
			$text = str_replace(' ','+',$search);
			$results = json_decode(file_get_contents('https://api.idolondemand.com/1/api/sync/analyzesentiment/v1?text='.$text.'&apikey='.$apiKey,true));	
			
			$data = $results->positive;
			//$score = $data[0]['score'];
			
			return $data[0]->score;
		}
	
	public function create_page()
	{
		if($this->input->post('create_deal'))
		{
			$message = $this->create_deal();
			
			return $message;
		}
	}
	
		public function create_deal()
		{
			// Get Information
			$dealId = $this->dealId_generator();
			$dealProvider = $this->input->post('provider');
			$dealDescription = $this->input->post('description');
			$dealType = $this->input->post('type');
			
			$dealAddress = preg_replace('/[^ \w]+/', '',$this->input->post('address'));
			$dealCity = preg_replace('/[^ \w]+/', '',$this->input->post('city'));
			$dealState = $this->input->post('state');
			$dealZip = preg_replace('/[^0-9]/','',$this->input->post('zip'));
			
			$coord = $this->get_coordinates($dealAddress,$dealCity,$dealState,$dealZip);
			$dealLat = $coord['lat'];
			$dealLong = $coord['long'];
			
			$dealTags = $this->input->post('tags');
			$dealCreated = date("Y-m-d H:i:s");
			$dealExpires = date("Y-m-d H:i:s",strtotime("+30 days"));
			$dealStatus = 'active';	
			
			// Query Database
			$this->db->query("INSERT INTO deals (dealId, dealProvider, dealDescription, dealType, dealAddress, dealCity, dealState, dealZip, dealLat, dealLong, dealTags, dealCreated, dealExpires, dealStatus) 
			VALUES ('$dealId', '$dealProvider', '$dealDescription', '$dealType', '$dealAddress', '$dealCity', '$dealState', '$dealZip', '$dealLat', '$dealLong', '$dealTags', '$dealCreated', '$dealExpires', '$dealStatus')");
			
			// Return Message
			return "Your deal has been successfully created.";
		}
		
		public function dealId_generator()
		{
			$query = $this->db->query("SELECT * FROM deals ORDER BY dealId DESC LIMIT 1");
			$data = $query->row();
		
			if($query->num_rows() == 0)
			{
				return 1;
			}
			else
			{
				return ($data->dealId + 1);
			}
		}
		
		public function get_coordinates($address,$city,$state,$zip)
		{
			// Location
			$location = str_replace(' ','+',$address.', '.$city.', '.$state.' '.$zip);
			
			// Geolocation (GOOGLE REST API)
			$results = json_decode(file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$location),true);
			
			// Load Data
			$data['lat'] = $results['results'][0]['geometry']['location']['lat'];
			$data['long'] = $results['results'][0]['geometry']['location']['lng'];
			
			return $data;
		}
	
	/*** Functions ***/
	
	public function send_email($to,$subject,$message,$companyName,$companyEmail)
	{
		// Message
		$disclaimer = "<div style='padding-top:5px; border-top:1px solid #777'><small style='font-size:12px; color:#777;'>Please do not reply to this message. This email was sent to <a href='mailto:".$to."'>".$to."</a> by <a href='mailto:".$companyEmail."'>".$companyName."</a></small></div>";
		
		$body = "
			<html>
				<head>
					<title>".$companyName."</title>
				</head>
				<body>
					<p>".$message."<br><br>Sincerely,<br>".$companyName."</p>
					<br><br>".$disclaimer."
				</body>
			</html>
			";	
			
		// Config
		$config['protocol'] = 'mail';
		$config['mailpath'] = '/usr/sbin/sendmail';
		$config['mailtype'] = 'html';
		$config['charset'] = 'iso-8859-1';
		$config['wordwrap'] = TRUE;

		$this->email->initialize($config);
		
		//  Send Message
		$this->email->from($companyEmail,$companyName);
		$this->email->to($to);
		
		$this->email->subject($subject);
		$this->email->message($body);
		
		$this->email->send();
	}
	
	public function send_text($phone,$message,$twilio)
	{
		// Message
		$from = $twilio; // RealExchange: 6466796495
		$to = $phone;

		$response = $this->twilio->sms($from, $to, $message);
	}
}

?>