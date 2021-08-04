<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rsa_key {

    public function generate($num1, $num2)
    {
        $p = $this->nextPrime($num1);
        $q = $this->nextPrime($num2);

        // Menghitung Nilai N
        $n = $p * $q;

        // Menghitung Totient m = (p-1)(q-1)
        $m = ($p - 1) * ($q - 1);
        // $m = gmp_mul(gmp_sub$p, 1), gmp_sub($q, 1));
        
        // Mencari Eksponen E, merupakan ko prima dari totient m
        for($e = 2; $e < 100; $e++){
            $gcd = $this->findGcd($e, $m);
            // $gcd = gmp_gcd($e, $m);
            
            if(strval($gcd) == 1){
                break;
            }
        }

        $i = 1;
        do {
            // $res = gmp_div_qr(gmp_add(gmp_mul($m, $i), 1), $e);
            $res = $this->getQr((($m * $i) + 1), $e);
            $i++;
            if($i == 10000){
                break;
            }
        } while(strval($res[1]) != '0');
        $d = $res[0];

        // ====================================================

        return $key_data = array(
            'public' => strval($n).','.strval($e),
            'private' => strval($n).','.strval($d),
        );
    }

    public function encrypt($plaintext, $public_key)
    {   
        $key = explode(',', $public_key);
        $n = $key[0];
        $e = $key[1];   
        $enkripsi = '';

        for($i = 0; $i < strlen($plaintext); $i++){
			$enkripsi .= gmp_strval(gmp_mod(gmp_pow(ord($plaintext[$i]),$e), $n));
			if($i != strlen($plaintext)-1){
				$enkripsi .= '.';
			}
		}

        return $enkripsi;
    }

    public function decrypt($ciphertext, $private_key)
    {
        $key = explode(',', $private_key);
        $n = $key[0];
        $d = $key[1];   
        $deskripsi = '';

        $block = explode('.', $ciphertext);
		foreach($block as $nilai){
			$deskripsi .= chr(gmp_strval(gmp_mod(gmp_pow($nilai, $d), $n)));
		}

        return $deskripsi;
    }

    function isPrime($n)
    {

        if($n <= 1) return false;
        if($n <= 3) return true;

        if($n%2 == 0 || $n%3 == 0) return false;

        for ($i = 5; $i*$i <= $n; $i=$i+6){
            if($n%$i == 0 || $n%($i+2) == 0){
                return false;
            }
        } return true;
    }

	function nextPrime($n) 
    {
        // Check if the $n is alread prime
        if($this->isPrime($n)) return $n;

        if($n < 1) return 2;

        $prime = $n;
        $lock = false;
        while(!$lock) {
            $prime++;
            if($this->isPrime($prime)){
                $lock = true;
            }
        } return $prime;
    }

    function findGcd($x, $y)
    {
        if($y == 0) 
            return $x;
        return $this->findGcd($y, $x%$y);
    }

    function getQR($divisor, $dividend) 
    {
        $quotient = (int)($divisor / $dividend);
        $remainder = $divisor % $dividend;
        return array( $quotient, $remainder );
    }
}
?>

