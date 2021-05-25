<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class RSA_key {

    public function generate($num1, $num2)
    {
        $p = gmp_nextprime($num1);
        $q = gmp_nextprime($num2);

        // Menghitung Nilai N
        $n = gmp_mul($p, $q);

        // Menghitung Totient m = (p-1)(q-1)
        $m = gmp_mul(gmp_sub($p, 1), gmp_sub($q, 1));

        // Mencari Eksponen E, merupakan ko prima dari totient m
        for($e = 2; $e < 100; $e++){
            $gcd = gmp_gcd($e, $m);
            if(gmp_strval($gcd) == 1){
                break;
            }
        }

        $i = 1;
        do {
            $res = gmp_div_qr(gmp_add(gmp_mul($m, $i), 1), $e);
            $i++;
            if($i == 10000){
                break;
            }
        } while(gmp_strval($res[1]) != '0');

        $d = $res[0];
 
        return $key_data = array(
            'public' => gmp_strval($n).'|'.gmp_strval($e),
            'private' => gmp_strval($n).'|'.gmp_strval($d),
        );

    }

    public function encrypt($plaintext, $public_key)
    {   
        $key = explode('|', $public_key);
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
        $key = explode('|', $private_key);
        $n = $key[0];
        $d = $key[1];   
        $deskripsi = '';

        $block = explode('.', $ciphertext);
		foreach($block as $nilai){
			$deskripsi .= chr(gmp_strval(gmp_mod(gmp_pow($nilai, $d), $n)));
		}

        return $deskripsi;
    }
}
?>

