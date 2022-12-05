# Fibonacci_os

Compute module to implement the Fibonacci Suite written in php.

# explanation

./Fibo.php will compute all occurences of the Fibonacci suite from F[0] to max possible occurence regarding the OS and architecture on which it runs.

the php module will :

  check the CEC OS/architecture to fix the reference
  compute the latest occurence of the suite, ( F[0] := 0; F[1] := 1; F[2] := 2; F[n] := F[n-1] + F[n-2] ), see also https://en.wikipedia.org/wiki/Fibonacci_prime 
  for each occurence check if the new occurence is a prime number or not 
  start sorting them ascendingly 
    
  display then sorted with unique values.
  
