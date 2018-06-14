<?php

//////////////////////////////////////////////////////////////
//===========================================================
// softpanel.php
//===========================================================
// SOFTACULOUS 
// Version : 1.0
// Inspired by the DESIRE to be the BEST OF ALL
// ----------------------------------------------------------
// Started by: Alons
// Date:       10th Jan 2009
// Time:       21:00 hrs
// Site:       http://www.softaculous.com/ (SOFTACULOUS)
// ----------------------------------------------------------
// Please Read the Terms of use at http://www.softaculous.com
// ----------------------------------------------------------
//===========================================================
// (c)Softaculous Inc.
//===========================================================
//////////////////////////////////////////////////////////////

if(!defined('SOFTACULOUS')){

	die('Hacking Attempt');

}

// INDEX Files need to be defined as per the Control Panel
$globals['index'] = 'index.php?';
$globals['admin_index'] = 'index.php?';

//Which Panel are you ?
$globals['softpanel'] = 'panelname';

class softpanel{

	var $loaded = 0;
	var $unique;
	var $rawdata = array();
	var $user;
	var $spaceremain;
	var $domainroots;
	var $mysql = array();
	var $theme = array();
	var $env;
	
	function softpanel(){
	
		global $cpanel;
		
		//Some Theme Settings
		$this->theme['softimages'] = 'softimages';// Relative to the accessed URL
		$this->theme['url'] = 'themes';// Relative to the accessed URL
		$this->theme['admin_url'] = 'enduser/themes';// Relative to the accessed URL
		$this->theme['logout'] = '/logout/'; // Relative to the accessed URL
		$this->theme['panel_url'] = '/'; // Relative to the accessed URL
		
		// Are you a Dedicated or Virtual Server
		$this->env = '';
		
		if(defined('SOFTADMIN')) return true;

		//Load the Raw Data
		$this->rawdata = $this->rawdata();
		
		//Load the Data
		$this->user = $this->userdata();
		$this->domainroots = $this->domainroots();
		$this->spaceremain = $this->spaceremain();
		
		//In Cpanel we are using this since further calls need to be accessed again
		$this->loaded = 1;
	
	}
	
	// A unique string to identify the server
	function unique(){
		return '';
	}
	
	// If any raw data is required to be loaded first for the user info
	function rawdata(){
		//return $_CPANEL;
	}
	
	function userdata(){
		global $loaded_scripts, $globals;
	
		$user = array();
		$user['name'] = 'username'; // Username of the account used for MySQL purposes
		$user['displayname'] = 'thedisplayname';// For displaying the actual name
		$user['email'] = 'email@address.com'; // Email of the account
		$user['domain'] = 'domain.com'; // Primary Domain of the account
		$user['homedir'] = '/home/username';// Home Dir of the account
		
		// Softaculous will create a DIRECTORY in this path and files in that DIRECTORY
		// e.g. $this->rawdata['homedir']/.softaculous/files.php
		$user['softdir'] = '/home/username';
		
		//To check whether the user belongs to any ACL plan and load iscripts according to plan (Version 3.4)
		if(file_exists($globals['path'].'/conf/plans.acl')){
			$get_user_plan = unserialize(implode('', file($globals['path'].'/conf/plans.acl')));
			if(!empty($get_user_plan['users'][$user['name']])){
				$temp = unserialize(implode('', file($globals['path'].'/conf/'.$get_user_plan['users'][$user['name']].'.plan')));
				$loaded_scripts = $temp['scripts'];
			}
		}
		
		return $user;
		
	}
	
	// Should return the paths of all domains under this account
	function domainroots(){
		
		$array = array();
		
		//The Default Domain with public_html
		$array['domain.com'] = '/home/username/public_html';
		$array['sub.domain.com'] = '/home/username/public_html/sub'; // E.g. of a sub domain
				
		return $array;
		
	}
	
	//The Host of the Database
	function dbhost($type = 'mysql'){
		return 'localhost'; // If any other host please return that!	
	}
	
	//The Maximum Number of Database
	function maxdb($type = 'mysql'){
		
		return 100000; // The max number of DBs allowed to this user. If a string is given it will be assumed as Unlimited!
	
	}
	
	//List the databases of this user
	function listdbs($type = 'mysql'){
		
		$array = array('username_dbname1' => 'username_dbname1',
						'username_dbname2' => 'username_dbname2',
						// And so on
						);
		
		// If no database is there then please return an empty array!
		
		return $array;
	
	}
	
	//List the MySQL database users
	function listdbusers($type = 'mysql'){
	
		$array = array('username_dbusername1' => 'username_dbusername1',
						'username_dbusername2' => 'username_dbusername2',
						// And so on
						);	
		
		// If no database USERS are there then please return an empty array!
		
		return $array;
	
	}
	
	// Number of dbs used
	// If unlimited return a string
	function dbsused(){		
		return $this->rawdata['currentMysqlDatabases'];
	}
	
	// Return the DBNAME as per the panel
	// e.g if dbname is given and a prefix is required then please give it here
	function dbname($dbname){		
		return $dbname;		
	}
	
	// Return the DBUSERNAME as per the panel
	// e.g if dbusername is given and a prefix is required then please give it here
	function dbuser($dbuser){
		return $dbuser;		
	}
	
	// Check whether the Database Exists
	// Return true if it exists or false it doesnt
	function dbexists($dbname){
		$res = mysql_query("SHOW DATABASES LIKE '$dbname'", $this->conn['conn']);
		if(mysql_num_rows($res) > 0){
			return true;
		}
		return false;
	}
	
	// Check whether the Database Exists
	// Return true if it exists or false it doesnt
	function dbuserexists($dbuser){
		$res = mysql_query("SELECT User FROM mysql.user
							WHERE User = '$dbuser'", $this->conn['conn']);
		if(mysql_num_rows($res) > 0){
			return true;
		}
		return false;
	}
	
	//This will create a Database
	function createdb($dbname, $dbuser, $dbpass, $type = 'mysql'){
	
		// This should create a Database and its user when called
		
		return true;
		
	}
	
	//Delete a Database and user
	function deldb($dbname, $dbuser, $type = 'mysql'){

		// This should delete a Database and its user when called
		
		return true;
	
	}
	
	//Shows the Disk Space Available
	function spaceremain(){
		
		// Note: 1) Should be in BYTES
		//		 2) If it is not numeric then SOFTACULOUS will assume as UNLIMITED space
		
		$space = (1024*1024*1024); // e.g. of a GB
		
		return $space;
		
	}
	
	// Add a CRON JOB
	function addcron($min, $hour, $day, $month, $weekday, $command, $mail = ''){	
		
		return true;
		
	}
	
	// Deletes a CRON JOB as per the command given
	function delcron($command){
	
		return true;
		
	}	
	
	// Lists the installation by users - Dont touch this!
	function listinstallations($users = array(), $scripts_ = array(), $scriptwise = false, $outdated = false, $start = 0, $length = 0){
		global $scripts;
		
		$list = array();
		
		$_scripts = array_keys($scripts_);
		$_scripts = (is_array($_scripts) ? $_scripts : array());
		
		// Load the users list
		$_users = $this->listusers();
		
		if(!empty($users)){
			foreach($_users as $uk => $uv){
				if(!in_array($uk, $users)){
					unset($_users[$uk]);
				}
			}
		}
		
		foreach($_users as $uk => $uv){
			$data = array();
			if(@is_file($uv['softdir'].'/.softaculous/installations.php')){				
				$tmp = parseinsfile($uv['softdir'].'/.softaculous/installations.php');
				$data = _unserialize($tmp);
			}
			
			if(empty($data)){
				$data = array();
			}
			
			// If this user has any installations ONLY then SET
			foreach($data as $dk => $dv){
							
				// Is only OUTDated stuff required ?
				if(!empty($outdated)){				
					// Its uptodate!
					if($dv['ver'] == $scripts[$dv['sid']]['ver']){
						continue;
					}
				}
				
				// If particular script(s) is specified
				if(!empty($_scripts)){
					if(!in_array($dv['sid'], $_scripts)){
						continue;
					}
				}
				
				// Return scriptwise
				if(!empty($scriptwise)){
					$list[$dv['sid']][$uk][$dv['insid']] = $dv;
				}else{
					$list[$uk][$dv['sid']][$dv['insid']] = $dv;
				}
				
			}// End of FOREACH of $data
			
		}// End of FOREACH of $_users
		
		return $list;
		
	}
	
	// Lists the users details
	// $starting is for usernames starting with these characters
	// $limit if specified should return only that number of rows
	function listusers($starting = '', $limit = 0){
		$array['username']['softdir'] = '/path/to/softdir';
		$array['username']['email'] = 'username@domain.com';
		$array['username2']['softdir'] = '/path/to/softdir';		
		$array['username2']['email'] = 'username2@domain.com';
		return $array;
	}
	
	/**
	* Save the installation details of user.
	* @param array $ins It will contain an array of an installation details of the newly installed script by the user.
	* @param string $path It will contain the path where installations details are being stored.
	*/
	function saveinstallations($ins = array(), $path = ''){
		
		// By default it will take $this->user['softdir']. 
		// But if changed and the storage is filesystem than the path will be $path.'/.softaculous/installations.php'
		$path = (empty($path) ? $this->user['softdir'] : $path);
		
		/**
		* Get the old installation details in $data So that we can avoid conflict of the new installation ID with the old one.
		*/
		
		if(empty($ins['insid'])){
			// Now create some random integer for new installations ID
			$tmp = mt_rand(10000,99999);
			$tmp1 = $insid = $ins['sid'];
			
			$insid = $tmp1.'_'.$tmp;
			
			while(true){
				if(!empty($data[$insid])){
					$tmp = mt_rand(10000,99999);
					$insid = $tmp1.'_'.$tmp;
				}else{
					break;	
				}
			}
			
		}else{
			$insid = $ins['insid'];	
		}
		
		$ins['insid'] = $insid;
		
		$data[$insid] = $ins;
		
		/**
		* $data will contain all the installation details and store it where you want to save.
		* e.g $ret = writefile($path.'/.softaculous/installations.php', serialize($data), 1, 0600);
		* Above code wil save it to installation.php
		*/
		
		return $ret;

	}
	
	/**
	 * DELETE the users installations of scripts.
	 * @param        array $insid Script INSTALLATION ID.
	 * @param		 string $path Path where installations of user is being stored.
	 * @return       bool True on success
	 */
	function deleteinstallation($insid, $path = ''){
		
		$path = (empty($path) ? $this->user['softdir'] : $path);
			
		/**
		* Get the old installation details in $data
		*/
		
		if(empty($data)){
			return false;	
		}
		
		unset($data[$insid]);
		
		/**
		* $data will contain all the other installation details and store it where you want to save.
		* e.g $ret = writefile($path.'/.softaculous/installations.php', serialize($data), 1, 0600);
		* Above code wil save it to installation.php
		*/
		
		return $ret;
		
		
	}
	
	/**
	 * Load the backup data from the backups
	 * @param 		 string $key This will be a backup file name without extension.
	 * @param 		 string $softdir Users softdir where backup information will be stored.
	 * @return       array The loaded data
	 */
	function listbackups($key = '', $softdir = ''){
	
		$data = array();
		
		$softdir = (empty($softdir) ? $this->user['softdir'] : $softdir);
		
		// Are we to just return the data of one file ?
		if(!empty($key)){
		
			// Get the backup information in $data which is having key(i.e filename) as $key.
		
		}else{
			
			// Here put the code to get all the backup information of the backups taken by users in $data.
			
		}
		
		return $data;
	
	}
	
	/**
	 * Save a backup's data.
	 * @param 		 String $key This will be a backup file name without extension.
	 * @param 		 Array $data This will contain information about backup created.
	 * @return       bool Must be true for successful and false on failure.
	 */
	function savebackupinfo($key, $data){
	
		// If you are using filesystem to save the information than it will be like 
		// for e.g $this->user['softdir'].'/.softaculous/backups/'
		// Write the data in to file name (i.e $key) with serialized data (i.e. serialize($data))
		
		// And if you want to use database please write your code here but make sure that data will be in serialize form and maintain association with the $key and $data
		
		// Fill up $ret with true or false. Depending upon your actions.
		
		return $ret;
		
	}
	
	
	/**
	 * Delete a backup information.
	 * @param 		 String $key filename of the archive without extension.
	 * @return       bool Must be true for successful and false on failure.
	 */
	function deletebackupinfo($key){
	
		// Delete the file if you are using the file system.
		// E.g @unlink($this->user['softdir'].'/.softaculous/backups/'.$key);
		
		// If you are using database please write your code here to delete the information about backup.
		
		return true;
	}
	
	/**
	 * Saves the users list of installations of Classes.
	 * @param        array $ins The array containing the list of installations
	 * @param        array $path (Optional) If the path is given then $path is used otherwise the users softdir is assumed as the path
	 */
	function saveclassesins($ins = array(), $path = ''){
	
		global $software;
		
		// $software['cid'] will contain the classID.


		// Fill up $ret with true or false. Depending upon your actions.
		
		return $ret;
	
	}
	
	
	/**
	 * Load the users installations of classes.
	 * @param        int $cid (Optional) Class ID. If given only installations of that Class ID is loaded.
	 * @return       array The loaded data
	 */
	function loadclassesins($cid = 0){
	
		// Write your code here to load the classes installation data in $data
		
		// If $cid is give than write the code so that only installation of $cid (i.e. CLASSID) will be returned in $data
			
		return $data;
	
	}
	
	
	/**
	 * DELETE the users installations of classes.
	 * @param        array $cinsid Class INSTALLATION ID.
	 * @return       bool True on success
	 */
	function deleteclassesins($cinsid){
		
		// If you are using the filesystem than just delete the file which contains the infomation of installation of classes.		
		// e.g. @unlink($this->user['softdir'].'/.softaculous/classes/'.$cinsid);
		
		// If you are using database than write your code here to delete the installation information.
		
		// Fill up $ret with true or false. Depending upon your actions.
		
		return $ret;
		
	}
	
	/**
	 * Store the current progress of a process like installation / upgradation / remove etc.
	 *
	 * @param        string $key - The name of the status file that will be created / updated in the .softaculous/status folder.
									If only the $key is given than the value is returned
	 * @param        string $percent (Optional) - The percent to be stored / to be increased or decreased by. e.g. 
											'3' sets the progress to 3 percent. 
											'+3' increases the PROGRESS by 3 percent
											'-3' decreases the PROGRESS by 3 percent
	 * @param        string $val (Optional) - The value to be stored. If the value is NULL, this file will we deleted.
	 * @param        bool $clean (Optional) - If true a check will be performed and all old files will be deleted.  
											Whenever this funtion is called for the first time, this will be true.
	 * @returns 	 bool for success or failure
	 * @returns 	 array If the data was seeked. The first element will be the percent and the second will be the TEXT.
	 */
	function soft_progress($key, $percent = 0, $val = 0, $clean = 0){
		
		//echo $percent.' - '.$val.'<br>';
		
		// Is the .softaculous folder there ? (If you are using file system to store)
		/*
			if(!is_dir($this->user['softdir'].'/.softaculous')){
				return false;
			}
		*/
		
		if(func_num_args() == 1){
			// Get the status in $data if found than 
			return explode('|', $data, 2);
			
			// Else return false.
			
		}
		
		// Create the folder status if not there ! (if you are using file system)
		/*
			if(!is_dir($this->user['softdir'].'/.softaculous/status/')){
				mkdir($this->user['softdir'].'/.softaculous/status/', 0711);
			}
		*/
		// If you are using database write your code here
		
		// Is it the first time ?
		if(empty($GLOBALS['store_progress_called'])){
			$GLOBALS['store_progress_called'] = $clean = true;
		}
		
		// Clean the Log
		if($clean){
			
			// Delete the log of old progress here If any.
		}
		
		// Is the key there ?
		if(empty($key)){
			return false;
		}
		
		if(is_null($val) || is_null($percent)){
			
			// Just delete the status log for finish
			// e.g. @unlink($this->user['softdir'].'/.softaculous/status/'.$key);
		}else{
			if($percent{0} == '+' || $percent{0} == '-'){
				
				// Get the status in $data
				// e.g $data = file_get_contents($this->user['softdir'].'/.softaculous/status/'.$key);
				$cur = explode('|', $data, 0);
				
				$num = (int) substr($percent, 1);
				
				// Are we to add
				if($percent{0} == '+'){
					$percent = $cur[0] + $num;
				// I guess its subtract
				}else{
					$percent = $cur[0] - $num;
				}
				//echo $percent;
			}
			// Now UPDATE the new status for progress
			// E.g writefile($this->user['softdir'].'/.softaculous/status/'.$key, $percent.'|'.$val, 1);
		}
		
		return true;
			
	}
	
}

?>