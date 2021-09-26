<?php
    /**
    * Calculate the approximate area of the polygon were it projected onto
    *     the earth.  Note that this area will be positive if ring is oriented
    *     clockwise, otherwise it will be negative.
    *
    * Reference:
    * Robert. G. Chamberlain and William H. Duquette, "Some Algorithms for
    *     Polygons on a Sphere", JPL Publication 07-03, Jet Propulsion
    *     Laboratory, Pasadena, CA, June 2007 http://trs-new.jpl.nasa.gov/dspace/handle/2014/40409
    *
    * Returns:
    * {float} The approximate signed geodesic area of the polygon in square
    *     kilometers.
    */


function ringArea( $coords ) {
    $RADIUS = 6378137;
    $p1 = null;
    $p2 = null;
    $p3 = null;
    $lowerIndex = null;
    $middleIndex = null;
    $upperIndex = null;
    $i = null;
    $total = 0;
    $coordsLength = count( $coords );
    if ( $coordsLength > 2 ) {
    	for ( $i = 0;  $i < $coordsLength;  $i++ ) {
    		if ( $i === $coordsLength - 2 ) {
    			// i = N-2
    			$lowerIndex = $coordsLength - 2;
    			$middleIndex = $coordsLength - 1;
    			$upperIndex = 0;
    		} else
    		if ( $i === $coordsLength - 1 ) {
    			// i = N-1
    			$lowerIndex = $coordsLength - 1;
    			$middleIndex = 0;
    			$upperIndex = 1;
    		} else {
    
    			// i = 0 to N-3
    			$lowerIndex = $i;
    			$middleIndex = $i + 1;
    			$upperIndex = $i + 2;
    		}
    		$p1 = $coords[ $lowerIndex ];
    		$p2 = $coords[ $middleIndex ];
    		$p3 = $coords[ $upperIndex ];
    		$total += ( rad( $p3[ 0 ] ) - rad( $p1[ 0 ] ) ) * sin( rad( $p2[ 1 ] ) );
    	}
    	$total = ( $total * $RADIUS * $RADIUS ) / 2;
    }
    //return the total area in SQ KMS and abs will remove the minus (from numbers) 
    return abs($total) / 1000000;
}

//helper for ringArea function
function rad( $num ) {
    return ( $num * M_PI ) / 180;
}
?>
