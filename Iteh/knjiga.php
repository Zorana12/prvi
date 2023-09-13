<?php 

class Knjiga {

	private $idKnjiga;
	private $naslov;
	private $zanr;
	private $godinaIzdavanja;
	private $autor;

	
	public function __construct()
	{
		
	}
	
	public function ubaciKnjige($data,$db){
		
		if($data['naslov'] === '' || $data['zanr'] === '' || $data['godina_izdavanja'] === ''){
		$poruka = 'Polja moraju biti popunjena';
		
		}
		
		$save = $db->insert('knjiga', $data);
		if($save){
			$this -> poruka = 'Uspesno ste uneli knjigu';
		}else{
			$this -> poruka = 'Neuspesno! Probajte ponovo';
		}
	}
	
	public function getPoruka(){
		
		return $this -> poruka;
	}

}


?>