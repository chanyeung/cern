<?php
class MatchArr{
					//regularExpresion, cURL, resultArr[arrkey][0~N]
	function __construct($pattern, $curlResult){
		$this->pattern = $pattern;
		$this->curlResult = $curlResult;
		$this->matchAll();
	}

	function matchAll(){
		preg_match_all($this->pattern, $this->curlResult, $this->matchArr);
	}

	function getArr($arr){
		$this->arr=$arr;
		foreach ($this->matchArr[1] as $key => $value) {
			$this->arr[$key]=$value;
		}
		return $this->arr;
	}
}
?>
