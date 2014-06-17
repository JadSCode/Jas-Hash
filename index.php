<?php

class Encrypter {


	public function __construct(){
	
	}
	
	public function get_next ($array,$key){
		$array_keys = array_keys($array);

		foreach($array_keys as $keyx => $val){
			if($val == $key) return $array_keys[$keyx+1];
		}
		//return $array_keys[$key];
	}

	
	public function key_data_builder($array = array()){
		if(!count($array)) return false;
		$ret = "";
		foreach($array as $key => $val){
			$ret .= $key.':'.$val.':';
		}
		return $ret;
	}
	
	
	public	 function key_data_extractor($text = ""){
		$explode = explode(':',$text);
		for($i=0;$i<count($explode);$i=$i+2){
			$array[$explode[$i]] = $explode[$i+1];
			
		}
		return $array;
	}
	
	
	public function encrypte($text=""){
		
		$text = array_map('ord',str_split($text));
		//print_r(($text));
		arsort($text);		
		$first_key = null;
		$i=0;
		foreach($text as $key => $val){
			
			if(($first_key && $text[$first_key]-$val >= 10) || !$first_key){
				$first_key = $key;
				$keys[$i] = $val;
				//$vals[$i] = $val;
			}
			$array[$key] = $text[$first_key]-$val;
			$i++;	
		}
		//ksort($array);
		
		return ($this->key_data_builder($keys).implode($array).'-'.(implode("-",array_keys($text))));

	}
	public function decrypte($text=""){
		$pos = strrpos(($text), ':');
		if($pos === false) return false;
		$pos2 = strpos($text,'-');
		$array = str_split(substr($text,$pos+1,$pos2-$pos-1));
		$array_of_keys_sorting = explode('-',substr($text,$pos2+1));
		
		//	arsort($array);	
		$keys = $this->key_data_extractor(substr($text,0,$pos));
		$l=1;
		foreach($keys as $key => $val){
			
			if($l == count($keys)) {
				$next = $key+$l;
			} else {
				$next = $this->get_next($keys,$key);
			}
			$arrayw = array_slice($array, $key, $next-$key, true);

			$j=0;
			foreach($arrayw as $kk => $vv){
				if($j == $next-$key)
					break;
				
				$array[$kk] = abs($keys[$key]-$array[$kk]);
				$j++;
			}
			
			$l++;
			
		}
		
		
		foreach($array_of_keys_sorting as $kw => $vv){
			$new_array[$vv] = $array[$kw];
		}
		
		ksort($new_array);
		return implode(array_map('chr',$new_array));
	}
	
}
echo '<pre>';
$nn = new Encrypter();
//echo $nn->encrypte("xxxxx"); 
print_r($nn->decrypte("0:117:5:105:14:73:15:32:01368001777888000-11-13-2-10-6-15-5-4-1-16-9-14-8-3-0-12-7")); //

?>