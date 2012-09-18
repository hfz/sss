<?php
	require_once('browscap.php');
	class GetUserInfo{
		public $browserName;
		public $browserVersion;
		public $osName;
		public $osVersion;
		public $device;
		public $javascript;
		public $applet;
		public $css;
		public $ip;
		public $hostname;
		public $country;
		public $countryCode;
		public $continent;
		public $region;
		public $latitude;
		public $longitude;
		public $IspProvider;

		function __construct(){
			$browser=get_browser_local();
			$this->browserName = $browser->browser;
			$this->browserVersion = $browser->version;
			$this->osName = $browser->platform;
			$this->browserName = $browser->browser;
			if($browser->ismobiledevice == 'true') { $this->device = 'Mobile'; } else { $this->device = 'Desktop'; }
			$this->javascript = $browser->javascript;
			$this->applet = $browser->javaapplets;
			$this->css = 'Css'.$browser->cssversion;
			$this->osVersion = $browser->platform_version;
			$this->breakGeo();
		}
		function getIP(){
			$ip;
			if (getenv("HTTP_CLIENT_IP"))
			$ip = getenv("HTTP_CLIENT_IP");
			else if(getenv("HTTP_X_FORWARDED_FOR"))
			$ip = getenv("HTTP_X_FORWARDED_FOR");
			else if(getenv("REMOTE_ADDR"))
			$ip = getenv("REMOTE_ADDR");
			else
			$ip = "UNKNOWN";
			$this->ip = $ip;
			return $ip;
		}
		function getvisitType(){
			$spiders = array('Googlebot', 'Yammybot', 'Openbot', 'Yahoo', 'Slurp', 'msnbot', 'ia_archiver', 'Lycos', 'Scooter', 'AltaVista', 'Teoma', 'Gigabot', 'Googlebot-Mobile','Feedfetcher-Google','SiteChecker','Sogou web spider','Google','Yahoo','Msn','Bing');
			$agent = $_SERVER['HTTP_USER_AGENT'];
			foreach ($spiders as $spider)
			{
				if(strpos($agent,$spider) !== false)
				{
					return $spider;
				}
			}
			return 'Human Visit';
		}
		function getBrowserName(){
			return $this->browserName;
		}
		function getBrowserVersion(){
			return $this->browserVersion;
		}
		function getOSName(){
			return $this->osName;
		}
		function getOSVersion(){
			return $this->osVersion;
		}
		function getDeviceInfo(){
			return $this->device;
		}
		function javascriptSupport(){
			return $this->javascript;
		}
		function appletSupport(){
			return $this->applet;
		}
		function cssSupport(){
			return $this->css;
		}
		function breakGeo($ip = null){
			$this->getIP();
			$ip = $this->ip;
			if(empty($ip)) return false;
			$curl_init = curl_init();
			curl_setopt($curl_init, CURLOPT_URL, 'http://www.ipaddresslocation.org/ip-address-locator.php');
			curl_setopt($curl_init, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($curl_init, CURLOPT_POST, true);
			curl_setopt($curl_init, CURLOPT_POSTFIELDS, array('ip' => $ip));
			$data = curl_exec($curl_init);
			curl_close($curl_init);
			preg_match_all('/<i>([a-z\s]+)\:<\/i>\s+<b>(.*)<\/b>/im', $data, $matches, PREG_SET_ORDER);
			if(count($matches) == 0) return false;
			$return = array();
			foreach($matches as $info)
			{
				$result[] = $info[2];
			}
			$this->hostname = $result[0];
			$this->country = $result[1];
			$this->countryCode = $result[2];
			$this->continent = $result[3];
			$this->region = $result[4];
			$this->latitude = $result[5];
			$this->longitude = $result[6];
			$this->IspProvider = $result[8];
		}
		function getHostName(){
			if(empty($this->hostname)) { $this->hostname = 'Unknown'; }
			return $this->hostname;
		}
		function getCountry(){
			if(empty($this->country)) { $this->country = 'Unknown'; }
			return $this->country;
		}
		function getCountryCode(){
			if(empty($this->countryCode)) { $this->countryCode = 'Unknown'; }
			return $this->countryCode;
		}
		function getContinent(){
			if(empty($this->continent)) { $this->continent = 'Unknown'; }
			return $this->continent;
		}
		function getRegion(){
			if(empty($this->region)) { $this->region = 'Unknown'; }
			return $this->region;
		}
		function getLatitutde(){
			if(empty($this->latitude)) { $this->latitude = 'Unknown'; }
			return $this->latitude;
		}
		function getLongitude(){
			if(empty($this->longitude)) { $this->longitude = 'Unknown'; }
			return $this->longitude;
		}
		function getIsp(){
			if(empty($this->IspProvider)) { $this->IspProvider = 'Unknown'; }
			return $this->IspProvider;
		}
		function getLocalTime(){
			//$latitude = $this->getLatitutde();
			//$longitude = $this->getLongitude();
			//$timeZone_file = 'http://www.earthtools.org/timezone/'.$latitude.'/'.$longitude;
			//$get_current_time = simplexml_load_file($timeZone_file);
			//$local_time = $get_current_time->localtime;
			//return $local_time;
		}
	}
?>