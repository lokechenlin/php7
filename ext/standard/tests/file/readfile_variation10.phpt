--TEST--
Test readfile() function : variation - various invalid paths
--CREDITS--
Dave Kelsey <d_kelsey@uk.ibm.com>
--SKIPIF--
<?php
if(substr(PHP_OS, 0, 3) == "WIN")
  die("skip Not for Windows");
?>
--FILE--
<?php
/* Prototype  : int readfile(string filename [, bool use_include_path[, resource context]])
 * Description: Output a file or a URL 
 * Source code: ext/standard/file.c
 * Alias to functions: 
 */

echo "*** Testing readfile() : variation ***\n";


/* An array of files */ 
$names_arr = array(
  /* Invalid args */ 
  -1,
  TRUE,
  FALSE,
  NULL,
  "",
  " ",
  "\0",
  array(),

  /* prefix with path separator of a non existing directory*/
  "/no/such/file/dir", 
  "php/php"

);

for( $i=0; $i<count($names_arr); $i++ ) {
  $name = $names_arr[$i];
  echo "-- testing '$name' --\n";  
  readfile($name);
}

echo "\n*** Done ***\n";
?>
--EXPECTF--
*** Testing readfile() : variation ***
-- testing '-1' --

Warning: readfile(-1): failed to open stream: %s in %s on line %d
-- testing '1' --

Warning: readfile(1): failed to open stream: %s in %s on line %d
-- testing '' --

Warning: readfile(): Filename cannot be empty in %s on line %d
-- testing '' --

Warning: readfile(): Filename cannot be empty in %s on line %d
-- testing '' --

Warning: readfile(): Filename cannot be empty in %s on line %d
-- testing ' ' --

Warning: readfile( ): failed to open stream: %s in %s on line %d
-- testing ' ' --

Warning: readfile(): Filename cannot be empty in %s on line %d
-- testing 'Array' --

Warning: readfile() expects parameter 1 to be string, array given in %s on line %d
-- testing '%sdir' --

Warning: readfile(%sdir): failed to open stream: %s in %s on line %d
-- testing '%sphp' --

Warning: readfile(%sphp): failed to open stream: %s in %s on line %d

*** Done ***
