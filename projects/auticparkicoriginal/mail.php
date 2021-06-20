<?php


$informations = json_decode($_POST['infos']);
$times = json_decode($_POST['times']);
$total = json_decode($_POST['total']);

if(is_array($times)) {
    $type = $times[0]->type;
    $year = $times[0]->year;
    $month = $times[0]->month + 1;
    $date = $times[0]->date;
    $hours = $times[0]->hours;
    $minutes = $times[0]->minutes;
    $seconds = $times[0]->seconds;
    $day = $times[0]->day;
} elseif(is_array($informations)) {
    $type = $informations[0]->type;
    $id = $informations[0]->id;
    $price = $informations[0]->price;

    $startYear = $informations[0]->startYear;
    $startMonth = $informations[0]->startMonth + 1;
    $startDate = $informations[0]->startDate;
    $startHours = $informations[0]->startHours;
    $startMinutes = $informations[0]->startMinutes;
    $startSeconds = $informations[0]->startSeconds;

    $endYear = $informations[0]->endYear;
    $endMonth = $informations[0]->endMonth + 1;
    $endDate = $informations[0]->endDate;
    $endHours = $informations[0]->endHours;
    $endMinutes = $informations[0]->endMinutes;
    $endSeconds = $informations[0]->endSeconds;

    $hours = $informations[0]->hours;
    $minutes = $informations[0]->minutes;
    $seconds = $informations[0]->seconds;

    
} else {
    $type = $total[0]->type;
    $sum = $total[0]->sum;

    $year = $total[0]->year;
    $month = $total[0]->month + 1;
    $day = $total[0]->date;
}

if($type === "Vožnja") {
    if($startHours < 10) {
        $startHours = '0' . $startHours;
    }
    if($startMinutes < 10) {
        $startMinutes = '0' . $startMinutes;
    }
    if($startSeconds < 10) {
        $startSeconds = '0' . $startSeconds;
    }

    if($endHours < 10) {
        $endHours = '0' . $endHours;
    }
    if($endMinutes < 10) {
        $endMinutes = '0' . $endMinutes;
    }
    if($endSeconds < 10) {
        $endSeconds = '0' . $endSeconds;
    }
    
    if($startMonth < 10) {
        $startMonth = '0' . $startMonth;
    }
    if($startDate < 10) {
        $startDate = '0' . $startDate;
    }
    if($endMonth < 10) {
        $endMonth = '0' . $endMonth;
    }
    if($endDate < 10) {
        $endDate = '0' . $endDate;
    }

    if($id == 12) {
        $vehicle = "Robot &mdash; ";
        $id = 1;
    } elseif ($id == 13) {
        $vehicle = "Robot &mdash; ";
        $id = 2;
    } elseif ($id == 15) {
        $vehicle = "Robot &mdash; ";
        $id = 3;
    } else {
        $vehicle = "Autic &mdash; ";
    }

    if ($id == 16) {
        $vehicle = "Motor &mdash; ";
        $id = 1;
    }
    
    if ($id == 17) {
        $vehicle = "Motor &mdash; ";
        $id = 2;
    }

    if ($id == 18) {
        $vehicle = "Motor &mdash; ";
        $id = 3;
    }
    
    if ($id == 19) {
        $vehicle = "Motor &mdash; ";
        $id = 4;
    }
    
    $html = '
        <table cellpadding="20px" style="border-collapse: collapse;">
            <thead>
                <tr style="border-bottom: 1px solid #000000;"><th>Vozilo</th>
                <th>Trajanje vožnje</th>
                <th>Cena</th></tr>
            </thead>
            <tbody>
                <tr style="border-top: 1px solid #000000;"><td>' . $vehicle . $id . '</td>
                <td>' . $hours . ':' . $minutes . ':' . $seconds . '</td>
                <td>' . $price . ' RSD</td></tr>
            </tbody>
        </table>
    ';
} elseif($type === "Aplikacija") {
    if($hours < 10) {
        $hours = '0' . $hours;
    }
    if($minutes < 10) {
        $minutes = '0' . $minutes;
    }
    if($seconds < 10) {
        $seconds = '0' . $seconds;
    }
    if($month < 10) {
        $month = '0' . strval($month);
    } else {
        $month = $month;
    }
    if($date < 10) {
        $date = '0' . strval($date);
    } else {
        $date = $date;
    }
    
    $html = 'Aplikacija je pokrenuta.<br><br>
             Vreme:<br><strong> ' . $day . ' &mdash; ' . $year . '/' . $month . '/' . $date . ' &mdash; ' . $hours . ':' . $minutes . ':' . $seconds . '</strong>';
} elseif($type === "Saldo") {
    if($month < 10) {
        $month = '0' . $month;
    }
    if($day < 10) {
        $day = '0' . $day;
    }
    $html = 'Ukupan iznos za ' . $year . '/' . $month . '/' . $day . ' je: <strong>'. $sum . ' RSD</strong>';
    // $html = 'U prilogu je poslat saldo.';
    
	
	// $filename = $year . '-' . $month . '-' . $day . '.txt';
    // $file = fopen($filename, 'w');
    // $txt = 'Ukupan iznos za ' . $year . '/' . $month . '/' . $day . ' je: '. $sum . ' RSD';
    // fwrite($file, $txt);
    // fclose();
    
    // $zip = new ZipArchive();

    // $res = $zip->open('saldo.zip', ZipArchive::CREATE);
    // if ($res === TRUE) {
    //     $zip->addFile($filename, $filename);
    //     $zip->setEncryptionName($filename, ZipArchive::EM_AES_256, 'auticparkic');
    // }
    
    // $zip->close();

}

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);
$mail->CharSet = "UTF-8";

try {
    //Server settings
    $mail->SMTPDebug = 2;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'auticparkicstadion@gmail.com';                     // SMTP username auticparkicstadion@gmail.com
    $mail->Password   = 'alemilan';                               // SMTP password 
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('auticparkicstadion@gmail.com', 'AUTIĆ PARKIĆ');         // --- auticparkicstadion@gmail.com

    if($type === "Saldo") {
        $mail->addAddress('saldoauticparkic@gmail.com', 'AUTIĆ PARKIĆ'); // saldoauticparkic@gmail.com
    } else {
        $mail->addAddress('auticparkicstadion@gmail.com', 'AUTIĆ PARKIĆ');     // Add a recipient --- auticparkicstadion@gmail.com
    }

    $body = $html;

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $type;

    $mail->Body    = $body;
    $mail->AltBody = strip_tags($body);

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
    
