<?php
    require_once('mysql_connect.php');
	require 'phpmailer/PHPMailerAutoload.php';
	require 'credentials.php';
	
	date_default_timezone_set("Asia/Manila");
    $q = "SELECT * FROM ccsfif.Reminders WHERE active=1;";
    $qr = mysqli_query($dbc, $q);
    $data = "";
    while($row=mysqli_fetch_array($qr,MYSQLI_ASSOC)){
        $data .= date('d/m/Y H:i:s').': Checking Reminder: '.$row['title']." ".$row['description']." ".$row['date']." ".$row['interval']."\n";
		$idReminders = $row['idReminders'];
		
		$title = $row['title'];
		$description = $row['description'];
		
		$today = date('Y-m-d');
		$lastReminderSentDate = $row['lastReminderSent'];
		
		
		$date1 = date_create($lastReminderSentDate);
		$date2 = date_create($today);
		$diff = date_diff($date1, $date2);
		
		//echo $diff->format('%r%d days')."\n";
		//echo $diff->format('%r%m months')."\n";
		//echo $diff->format('%r%y years')."\n";
		$day = $diff->format('%r%d');
		$month = $diff->format('%r%m');
		$year = $diff->format('%r%y');
		
		if($row['Assignto'] != 7){
			$positionID = $row['Assignto'] - 1;
			$q1 = "SELECT * FROM ccsfif.faculty WHERE POSITION_ID = 'P000$positionID';";
		}
		else{
			$q1 = "SELECT * FROM ccsfif.faculty";
		}
		
		$qr1 = mysqli_query($dbc, $q1);
		
		$updateReminder = 0;
		
		if($row['interval'] == "Does not repeat" && $row['reminderSent'] == 0){
			echo 'Sending: '.$row['title']."\n";
			while($row1=mysqli_fetch_array($qr1,MYSQLI_ASSOC)){
				sendEmail($row1['email'], $title, $description);
			}
			$updateReminder = 1;
		}
		else if($row['interval'] == "Daily" && $day >= 0){
			echo 'Sending: '.$row['title']."\n";
			while($row1=mysqli_fetch_array($qr1,MYSQLI_ASSOC)){
				sendEmail($row1['email'], $title, $description);
			}
			$updateReminder = 1;
		}
		else if($row['interval'] == "Weekly" && ($day%7) == 0){
			echo 'Sending: '.$row['title']."\n";
			while($row1=mysqli_fetch_array($qr1,MYSQLI_ASSOC)){
				sendEmail($row1['email'], $title, $description);
			}
			$updateReminder = 1;
		}
		else if($row['interval'] == "Monthly" && $day == 0 && $month >= 0){
			echo 'Sending: '.$row['title']."\n";
			while($row1=mysqli_fetch_array($qr1,MYSQLI_ASSOC)){
				sendEmail($row1['email'], $title, $description);
			}
			$updateReminder = 1;
		}
		else if($row['interval'] == "BiAnnually" && $day == 0 && ($month%6) == 0){
			echo 'Sending: '.$row['title']."\n";
			while($row1=mysqli_fetch_array($qr1,MYSQLI_ASSOC)){
				sendEmail($row1['email'], $title, $description);
			}
			$updateReminder = 1;
		}
		else if($row['interval'] == "Annually" && $day == 0 && $month == 0 && $year >= 0){
			echo 'Sending: '.$row['title']."\n";
			while($row1=mysqli_fetch_array($qr1,MYSQLI_ASSOC)){
				sendEmail($row1['email'], $title, $description);
			}
			$updateReminder = 1;
		}
		
		if($updateReminder == 1){
			$updateQuery = "UPDATE `ccsfif`.`reminders` SET `reminderSent`='1', `lastReminderSent`='$today' WHERE `idReminders`='$idReminders';";
			$qUpdate = mysqli_query($dbc, $updateQuery);
			
			$data .= date('d/m/Y H:i:s').': Reminder: '.$row['title']." sent"."\n";
		}
    }
		
    $file = dirname(__FILE__) . '/output.txt';
    $data .= "script run ended " . date('d/m/Y H:i:s') . "\n";
    file_put_contents($file, $data, FILE_APPEND);
	
	//sendEmail('kirstenmiranda14@gmail.com', 'OCCR deadline', 'Please Submit');
	
	function sendEmail($emailaddress, $title, $description) {

		$mail = new PHPMailer;

		//$mail->SMTPDebug = 4;                               // Enable verbose debug output

		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->SMTPOptions = array(
			'ssl' => array(
				'verify_peer' => false,
				'verify_peer_name' => false,
				'allow_self_signed' => true
			)
		);
		$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Username =  EMAIL;                 // SMTP username
		$mail->Password = PASS;                           // SMTP password
		$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 587;                                    // TCP port to connect to

		$mail->setFrom(EMAIL, 'DLSU CCS ACCREDITATION MANAGEMENT SYSTEM');
		$mail->addAddress($emailaddress);     // Add a recipient

		$mail->addReplyTo(EMAIL);

		//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
		$mail->isHTML(true);                                  // Set email format to HTML

		$mail->Subject = "Reminder: $title";
		$mail->Body    = $description;
		$mail->AltBody = $description;

		if(!$mail->send()) {
			echo 'Message could not be sent.';
			echo 'Mailer Error: ' . $mail->ErrorInfo . "\n";
		} else {
			echo "Message has been sent to ". $emailaddress . "\n";
		}
	}
	
?>