<?php 
include("config.php");

$eQ = "select * from elections where Election_status = 0 or Election_status = 1";
$eQ_ob = mysql_query($eQ,$con);

// Return details of the student of the specified id
	function getStData($sid,$con) {
		$stu_ob = mysql_query("select * from users where id = '$sid';",$con);
		if($stu_ob)
			return mysql_fetch_array($stu_ob);
		else 
			return false;
	}
#return the uid of winner based of gender
function get_gender_uid($cand_uid,$gender,$con) {
	$studata = getStData($cand_uid,$con);
	if ($studata['Gender'] == $gender)
		return True;	
	else 
		return False;
}


#Set the male and female winners uids in Result table
function set_result_table($eid,$con) {	

	$getQ = "select * from candidate where Elections_id = $eid order by Votes DESC";# Get the candidate details in decending order to find the winners
	$getob = mysql_query($getQ,$con);
	if($getob){
		while($cand_data = mysql_fetch_array($getob)) {
			if(isset($m_win_uid) and isset($f_win_uid)) { #if we got both winner break the loop
	
				$inQ = "insert into result values ($eid,$m_win_uid,$f_win_uid)";
				mysql_query($inQ,$con);
				break;
			}
			$cand_uid = $cand_data['User_id'];
			$cand_id = $cand_data['id'];
			 #Get the winnner student details
			if(!isset($m_win_uid)) { #Until the male winner id hasn't retrived		
				if(get_gender_uid($cand_uid,'Male',$con)){
					$m_win_uid = $cand_id;
					continue;#if male winner uid is got,then go to the next iteration to fine female winner
				}				
			}		
			if(!isset($f_win_uid)) { #Until the female winner id hasn't retrived
				if(get_gender_uid($cand_uid,'Female',$con)){
					$f_win_uid = $cand_id;
					continue;#if female winner uid is got,then go to the next iteration to fine male winner
				} 
			}
		}
	}


} 

#Remove election
function ele_rmv($eid,$con){
mysql_query("delete from elections where id = $eid;",$con);
}

#Check if there are candidates from both side else cancel the election 
function check_rmv($eid,$con) {
	$get_candQ = "select * from candidate where Elections_id = $eid";
	$get_candob = mysql_query($get_candQ,$con);
	if(mysql_num_rows($get_candob) > 1){
		while($data = mysql_fetch_array($get_candob)) {
			if(isset($m) and isset($f)) {
				break;
			}
			if(get_gender_uid($data['User_id'],'Male',$con)){
				$m= $data['id'];
				continue;
			}
			if(get_gender_uid($data['User_id'],'Female',$con)){
				$f= $data['id'];
				continue;
			}
		}
		if(!isset($m) or !isset($f)) {
			ele_rmv($eid,$con); #cancel election due to lack of candidates from one gender
			return True;
		}
		else 
			return False;
	}
	else {
		ele_rmv($eid,$con); #cancel election due to lack of candidates
		return True;
	}
	return False;
} 



//set_result_table(34,$con);
while($data = mysql_fetch_array($eQ_ob)) {
	$eid = $data['id'];
	

	#If the end time and date is past the current date and time
	#If election is in declared stat
	if( $data['Election_status'] == 0 ) { 

		#If current date is past or equal to election starting date
		if($data['Start_date'] <= date('Y-m-d')) { 

			#If current time is past or equal to election starting time
			if($data['Start_time'] <= date('H:i:s')){ 	 

				#Change the election status to ongoing
				if (check_rmv($eid,$con))
					break;
				mysql_query("update elections set Election_status = 1 where id = '$eid';",$con); 
			}
		}
	}
	#If election is in ongoing stat
	if( $data['Election_status'] == 1 ) { 

		#If current date is past or equal to election ending date
		if($data['End_date'] <= date('Y-m-d')) {

			#If current time is past or equal to election starting time
			if($data['End_time'] <= date('H:i:s')){ 

				#Change the election status to ongoing
				mysql_query("update elections set Election_status = 2 where id = '$eid';",$con);
				set_result_table($eid,$con); 
			}
		}

	}

}	
?>