/*
by Chawit Wiriyakun
*/
class CheckerURL
	{
		public $inurl;
		public function SetUrl($urldata)
		{
			$this->inurl=$urldata;
		}
		public function urlchecker()
		{
			$checked=preg_match("/(^www\.|^https:\/\/|^http:\/\/|^www2\.)/", $this->inurl);
			if($checked>0){
				
				echo  $this->inurl." is url.";
				if($this->IS_deadlink()){
					echo "<br>$this->inurl is link";
					}else{
					echo "<br> $this->inurl is dead link";
				}
				}else{
				echo  $this->inurl." not  url.";
			}
	
		}
		private function IS_deadlink() 
                {
			
			$curlcheker = curl_init();
			curl_setopt( $curlcheker , CURLOPT_URL, $this->inurl);
			curl_setopt( $curlcheker , CURLOPT_HEADER, 1);
			curl_setopt( $curlcheker  , CURLOPT_RETURNTRANSFER, 1);
			curl_setopt( $curlcheker, CURLOPT_SSL_VERIFYPEER, false);
			$returndata= curl_exec( $curlcheker );
			$header = curl_getinfo( $curlcheker );
			curl_close( $curlcheker );
			if(($header['http_code']=="302")||($header['http_code']=="200"))
			{
				return true;
			}
			else
			{
				return false;
			}
			
			
		}
