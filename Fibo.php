#!/usr/bin/php
<?php
  function getDist( $attrib ) {
    if (strtolower(substr(PHP_OS, 0, 5)) === 'linux')
    {
      $vars = array();
      $files = glob('/etc/*-release');

      foreach ($files as $file)
      {
        $lines = array_filter(array_map(function($line) {

            // split value from key
            $parts = explode('=', $line);

            // makes sure that "useless" lines are ignored (together with array_filter)
            if (count($parts) !== 2) return false;

            // remove quotes, if the value is quoted
            $parts[1] = str_replace(array('"', "'"), '', $parts[1]);
            return $parts;

        }, file($file)));

        foreach ($lines as $line)
            $vars[$line[0]] = $line[1];
      }
      return rtrim($vars[$attrib]);
    } 
  }

  function check_prime ( $verif ) {
	  $racine=round(sqrt($verif),0);
	  $exi=0;
	  foreach (range(2, $racine) as $m) {
		  if (( $verif / $m )  == ( round ($verif / $m,0)) and ($verif !=2 )) {
			  # dividable integer numbers are not prime";
			  $exi=1;
		  }  else {
			  if ( $m >= $racine ) {
			      return "prime";
			      $exi=1;
		          }
		  }
		  if ( $exi == 1 ) {
		     return "";
		     break;
		  }
	  }
  }
  echo "===========================================================\n";
  $begin=microtime(true);
  $begindate=date("Y-m-d H:i:s",$begin);     
  echo "begin $begindate\n";
  echo "-----------------------------------------------------------\n";
  $Dist=getDist('PRETTY_NAME');
  $OS = PHP_OS;
  $arch = php_uname('m');
  printf ("OS: %s %s %s \n", $OS,$Dist, $arch);
  echo "-----------------------------------------------------------\n";
  $maxByte = PHP_INT_SIZE;
  if ( $maxByte == 4 ) {
      echo " PHP_INT_SIZE $maxByte for 32 bit\n";
  }
  if ( $maxByte == 8 ) {
      echo " PHP_INT_SIZE $maxByte for 64 bit\n";
  }
  $int = PHP_INT_MAX;
  echo " PHP_INT_MAX  $int\n";
  echo "-----------------------------------------------------------\n";
  echo "              |1  1  1  0  0  0 |\n";
  echo "              |8--5--2--9--6--3-|\n";
  $num=69;
  $n=1;
  $moins2=1;
  $courant=0;
  printf ("      F[%03s] : %18s %10s  \n", $n , $courant ,"prime");
  $n=$n+1;
  $moins1=1;
  printf ("      F[%03s] : %18s %10s  \n", $n , $courant ,"prime");
  foreach (range(3, $num) as $n) {
      $courant=$moins1+$moins2;
      $isPrime=check_prime($courant);
      if ( $isPrime == "prime" ) {
         printf ("      F[%03s] : %18s %10s  \n", $n , $courant ,$isPrime);
      } else {
         printf ("      F[%03s] : %18s %10s  \n", $n , $courant ,$isPrime);
      }
      $moins2=$moins1;
      $moins1=$courant;
  }
  echo "              |1  1  1  0  0  0 |\n";
  echo "              |8--5--2--9--6--3-|\n";
  echo "-----------------------------------------------------------\n";
  echo "courant : $courant ";
  $end=microtime(true);
  $enddate=date("Y-m-d H:i:s",$end);     
  $elapse=$end-$begin;
  printf (" begin %s \n",$begindate);
  printf (" end   %s elapse %.5f seconds \n",$enddate,$elapse);
  echo "===========================================================\n";
?>
