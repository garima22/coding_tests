<?php 

//LRU Cache
	class Cache{
		private $data, $accessed = array();
		//private $count;

		function setData($key, $value){
			if ($key == ''){
				throw new Exception('The key cannot be an empty string!');
			}
			$count = count($this->data);
			if ($count == 3 && !array_key_exists($key, $this->data)){
				
				$lru = min($this->accessed);
				$temp = array_flip($this->accessed);
				$lru_key = $temp[$lru];
				unset($this->data[$lru_key]);
				//$this->count--;
			}
			$timestamp = strtotime('now');
			$this->data[$key] = $value;
			$this->accessed[$key] = $timestamp;
			//$this->count++;
		}

		function getData($key=''){
			print_r($this->accessed);
			if ($key == ''){
				return $this->data;
			}
			else{
				$timestamp = strtotime('now');
				if (array_key_exists($key, $this->data)){
					$this->accessed[$key] = $timestamp;
					return $this->data[$key];
				}
				return null;
			}
			
		}
	}

	$obj = new Cache();
	try{
		$obj->setData('a','a');	
		sleep(2);
		$obj->setData('b','b');	
		sleep(2);
		$result = $obj->getData('a');
		sleep(2);	
		$obj->setData('b','b');	
		sleep(2);
		$obj->setData('c','c');
		sleep(2);
		$obj->setData('d','d');
		sleep(2);
		$obj->setData('d','d');
		//$result = $obj->getData('e');
			
		
	}
	catch(Exception $e){
		print $e->getMessage();
	}

	$result = $obj->getData();
	print_r($result);
?>