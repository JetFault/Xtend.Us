<?php

function isMonthAnniversary($date_arr) {
	$curr_date = getdate();

	if( (strcmp($curr_date->month, $date_arr->month) == 0) &&
		(strcmp($curr_date->mday, $date_arr->day) == 0) ) {
			return true;
		}
	return false;
}

?>
