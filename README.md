# Fibonacci_os

Compute module to implement the Fibonacci Suite written in php.

# goal

Compute all items of the Fibonacci suite, displaying the prime numbers, see https://en.wikipedia.org/wiki/Fibonacci_prime 

# explanation

./Fibo.php will compute all occurences of the Fibonacci suite from F[0] to max possible occurence regarding the OS and architecture on which it runs.

the php module will :

  check the CEC OS/architecture to fix the reference
  
  compute the latest occurence of the suite, ( F[0] := 0; F[1] := 1; F[2] := 2; F[n] := F[n-1] + F[n-2] ).
  
  for each occurence check if the new occurence is a prime number or not.
     
  display the sorted prime values.
  
# comments

  As the suite is rapidly handling big numbers in this example we limited the occurences to 69 as it is the largest number usable before getting an error, this is for :
  
  OS: Linux Ubuntu 22.10 aarch64 
-----------------------------------------------------------
 PHP_INT_SIZE 8 for 64 bit
 PHP_INT_MAX  9223372036854775807
 
 CEC is a raspberry CM4 module CM4008032
