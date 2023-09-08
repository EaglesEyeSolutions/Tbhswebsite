<?php
session_start();

        $sem=$_SESSION['sem'];
        $sec=$_SESSION['sec'];
        $exam=$_SESSION['exam'];
        if($exam=='FA1')
        {
        require __DIR__ . '/twilio-php-main/src/Twilio/autoload.php';
        $db= mysqli_connect('localhost','u322949535_eagleseye','EaglesEyeSolutions@2023*','u322949535_tbhs');
        $sql = "select student_id,phone from student_personal   WHERE year='$sem' and section='$sec' and phone<>'Not Mentioned'";
        $result = $db->query($sql);
        while ($row = $result->fetch_assoc())
         {
            $mymarks = array();
            $mysub=array();
            $id=$row["student_id"];
            $s= "select subname,mid1 from student_marks where student_id='$id'";
            $result1 = $db->query($s);
            while ($r = $result1->fetch_assoc())
            {
                $mymarks[]=$r["mid1"];
                $mysub[]=$r["subname"];
            }
            $initialString = "Dear Parent/Guardian,\nWe hope this message finds you well. We wanted to bring to your attention the FA1 academic performance of your child \n".$id."\n";
            $arrayLength = count($mymarks);
            for ($i = 0; $i < $arrayLength; $i++) {
                $initialString .= $mysub[$i].":".$mymarks[$i]."\n";
            }
            $sid ="AC5b18383c99e81d12065a854129d1d363";
            $token = "967a7a43474280de2f9de11c126c3ef6";
            $client = new Twilio\Rest\Client($sid, $token);

        // Use the Client to make requests to the Twilio REST API
            $client->messages->create(
        // The number you'd like to send the message to
            "+91".$row['phone'],
            [
        // A Twilio phone number you purchased at https://console.twilio.com
                "from" => "+19896595242",
        // The body of the text message you'd like to send
                'body' => $initialString
            ]
        );      

         }
        }
        elseif($exam=='FA2')
        {
            require __DIR__ . '/twilio-php-main/src/Twilio/autoload.php';
            $db= mysqli_connect('localhost','id21063604_eaglesuser','+Wb7%OtnX!92ZNJq','id21063604_eagleseyesolution');
            $sql = "select student_id,phone from student_personal   WHERE year='$sem' and section='$sec' and phone<>'Not Mentioned'";
            $result = $db->query($sql);
            while ($row = $result->fetch_assoc())
            {
            $mymarks = array();
            $mysub=array();
            $id=$row["student_id"];
            $s= "select subname,onlinemid1 from student_marks where student_id='$id'";
            $result1 = $db->query($s);
            while ($r = $result1->fetch_assoc())
            {
                $mymarks[]=$r["onlinemid1"];
                $mysub[]=$r["subname"];
            }
            $initialString = "Dear Parent/Guardian,\nWe hope this message finds you well. We wanted to bring to your attention the FA2 cademic performance of your child \n".$id."\n";
            $arrayLength = count($mymarks);
            for ($i = 0; $i < $arrayLength; $i++) {
                $initialString .= $mysub[$i].":".$mymarks[$i]."\n";
            }
            $sid ="AC5b18383c99e81d12065a854129d1d363";
            $token = "967a7a43474280de2f9de11c126c3ef6";
            $client = new Twilio\Rest\Client($sid, $token);

        // Use the Client to make requests to the Twilio REST API
            $client->messages->create(
        // The number you'd like to send the message to
            "+91".$row['phone'],
            [
        // A Twilio phone number you purchased at https://console.twilio.com
                "from" => "+19896595242",
        // The body of the text message you'd like to send
                'body' => $initialString
            ]
          );      

         }
        }
         elseif($exam=='FA3')
        {
            require __DIR__ . '/twilio-php-main/src/Twilio/autoload.php';
            $db= mysqli_connect('localhost','id21063604_eaglesuser','+Wb7%OtnX!92ZNJq','id21063604_eagleseyesolution');
            $sql = "select student_id,phone from student_personal   WHERE year='$sem' and section='$sec' and phone<>'Not Mentioned' ";
            $result = $db->query($sql);
            while ($row = $result->fetch_assoc())
            {
            $mymarks = array();
            $mysub=array();
            $id=$row["student_id"];
            $s= "select subname,mid2 from student_marks where student_id='$id'";
            $result1 = $db->query($s);
            while ($r = $result1->fetch_assoc())
            {
                $mymarks[]=$r["mid2"];
                $mysub[]=$r["subname"];
            }
            $initialString = "Dear Parent/Guardian,\nWe hope this message finds you well. We wanted to bring to your attention the FA3 academic performance of your child \n".$id."\n";
            $arrayLength = count($mymarks);
            for ($i = 0; $i < $arrayLength; $i++) {
                $initialString .= $mysub[$i].":".$mymarks[$i]."\n";
            }
            $sid ="AC5b18383c99e81d12065a854129d1d363";
            $token = "967a7a43474280de2f9de11c126c3ef6";
            $client = new Twilio\Rest\Client($sid, $token);

        // Use the Client to make requests to the Twilio REST API
            $client->messages->create(
        // The number you'd like to send the message to
            "+91".$row['phone'],
            [
        // A Twilio phone number you purchased at https://console.twilio.com
                "from" => "+19896595242",
        // The body of the text message you'd like to send
                'body' => $initialString
            ]
          );      

         }
        }
         elseif($exam=='FA4')
        {
            require __DIR__ . '/twilio-php-main/src/Twilio/autoload.php';
            $db= mysqli_connect('localhost','id21063604_eaglesuser','+Wb7%OtnX!92ZNJq','id21063604_eagleseyesolution');
            $sql = "select student_id,phone from student_personal   WHERE year='$sem' and section='$sec'and phone<>'Not Mentioned'";
            $result = $db->query($sql);
            while ($row = $result->fetch_assoc())
            {
            $mymarks = array();
            $mysub=array();
            $id=$row["student_id"];
            $s= "select subname,onlinemid2 from student_marks where student_id='$id'";
            $result1 = $db->query($s);
            while ($r = $result1->fetch_assoc())
            {
                $mymarks[]=$r["onlinemid2"];
                $mysub[]=$r["subname"];
            }
            $initialString = "Dear Parent/Guardian,\nWe hope this message finds you well. We wanted to bring to your attention the FA4 academic performance of your child \n".$id."\n";
            $arrayLength = count($mymarks);
            for ($i = 0; $i < $arrayLength; $i++) {
                $initialString .= $mysub[$i].":".$mymarks[$i]."\n";
            }
            $sid ="AC5b18383c99e81d12065a854129d1d363";
            $token = "967a7a43474280de2f9de11c126c3ef6";
            $client = new Twilio\Rest\Client($sid, $token);

        // Use the Client to make requests to the Twilio REST API
            $client->messages->create(
        // The number you'd like to send the message to
            "+91".$row['phone'],
            [
        // A Twilio phone number you purchased at https://console.twilio.com
                "from" => "+19896595242",
        // The body of the text message you'd like to send
                'body' => $initialString
            ]
          );      

         }
        }
         elseif($exam=='SA1')
        {
             require __DIR__ . '/twilio-php-main/src/Twilio/autoload.php';
            $db= mysqli_connect('localhost','id21063604_eaglesuser','+Wb7%OtnX!92ZNJq','id21063604_eagleseyesolution');
            $sql = "select student_id,phone from student_personal   WHERE year='$sem' and section='$sec'and phone<>'Not Mentioned'";
            $result = $db->query($sql);
            while ($row = $result->fetch_assoc())
            {
            $mymarks = array();
            $mysub=array();
            $id=$row["student_id"];
           $s= "select subname,external from student_marks where student_id='$id'";
            $result1 = $db->query($s);
            while ($r = $result1->fetch_assoc())
            {
                $mymarks[]=$r["external"];
                $mysub[]=$r["subname"];
            }
            $initialString = "Dear Parent/Guardian,\nWe hope this message finds you well. We wanted to bring to your attention the SA1 academic performance of your child \n".$id."\n";
            $arrayLength = count($mymarks);
            for ($i = 0; $i < $arrayLength; $i++) {
                $initialString .= $mysub[$i].":".$mymarks[$i]."\n";
            }
            $sid ="AC5b18383c99e81d12065a854129d1d363";
            $token = "967a7a43474280de2f9de11c126c3ef6";
            $client = new Twilio\Rest\Client($sid, $token);

        // Use the Client to make requests to the Twilio REST API
            $client->messages->create(
        // The number you'd like to send the message to
            "+91".$row['phone'],
            [
        // A Twilio phone number you purchased at https://console.twilio.com
                "from" => "+19896595242",
        // The body of the text message you'd like to send
                'body' => $initialString
            ]
          );      

         }
        }
         elseif($exam=='SA2')
        {
            require __DIR__ . '/twilio-php-main/src/Twilio/autoload.php';
            $db= mysqli_connect('localhost','id21063604_eaglesuser','+Wb7%OtnX!92ZNJq','id21063604_eagleseyesolution');
            $sql = "select student_id,phone from student_personal   WHERE year='$sem' and section='$sec' and phone<>'Not Mentioned'";
            $result = $db->query($sql);
            while ($row = $result->fetch_assoc())
            {
            $mymarks = array();
            $mysub=array();
            $id=$row["student_id"];
            $s= "select subname,credit from student_marks where student_id='$id'";
            $result1 = $db->query($s);
            while ($r = $result1->fetch_assoc())
            {
                $mymarks[]=$r["credit"];
                $mysub[]=$r["subname"];
            }
            $initialString = "Dear Parent/Guardian,\nWe hope this message finds you well. We wanted to bring to your attention the SA2 academic performance of your child \n".$id."\n";
            $arrayLength = count($mymarks);
            for ($i = 0; $i < $arrayLength; $i++) {
                $initialString .= $mysub[$i].":".$mymarks[$i]."\n";
            }
            $sid ="AC5b18383c99e81d12065a854129d1d363";
            $token = "967a7a43474280de2f9de11c126c3ef6";
            $client = new Twilio\Rest\Client($sid, $token);

        // Use the Client to make requests to the Twilio REST API
            $client->messages->create(
        // The number you'd like to send the message to
            "+91".$row['phone'],
            [
        // A Twilio phone number you purchased at https://console.twilio.com
                "from" => "+19896595242",
        // The body of the text message you'd like to send
                'body' => $initialString
            ]
          );      

         }
        }
         elseif($exam=='SA3')
        {
             require __DIR__ . '/twilio-php-main/src/Twilio/autoload.php';
            $db= mysqli_connect('localhost','id21063604_eaglesuser','+Wb7%OtnX!92ZNJq','id21063604_eagleseyesolution');
            $sql = "select student_id,phone from student_personal   WHERE year='$sem' and section='$sec' and phone<>'Not Mentioned'";
            $result = $db->query($sql);
            while ($row = $result->fetch_assoc())
            {
            $mymarks = array();
            $mysub=array();
            $id=$row["student_id"];
            $s= "select subname,internal from student_marks where student_id='$id'";
            $result1 = $db->query($s);
            while ($r = $result1->fetch_assoc())
            {
                $mymarks[]=$r["internal"];
                $mysub[]=$r["subname"];
            }
            $initialString = "Dear Parent/Guardian,\nWe hope this message finds you well. We wanted to bring to your attention the SA3 academic performance of your child \n".$id."\n";
            $arrayLength = count($mymarks);
            for ($i = 0; $i < $arrayLength; $i++) {
                $initialString .= $mysub[$i].":".$mymarks[$i]."\n";
            }
            $sid ="AC5b18383c99e81d12065a854129d1d363";
            $token = "967a7a43474280de2f9de11c126c3ef6";
            $client = new Twilio\Rest\Client($sid, $token);

        // Use the Client to make requests to the Twilio REST API
            $client->messages->create(
        // The number you'd like to send the message to
            "+91".$row['phone'],
            [
        // A Twilio phone number you purchased at https://console.twilio.com
                "from" => "+19896595242",
        // The body of the text message you'd like to send
                'body' => $initialString
            ]
          );      

         }
        }

	echo "<!DOCTYPE html>";
        echo" <html>";
        echo "<body>";
        echo "<style>
        a{
            text-decaration:None;
            color:red;

        }";
        echo "</style>";
        echo "<link rel='stylesheet' href='style2.css'/>";
        echo "<div class='login-wrapper'>";
        echo "<form  class='form' >";
        echo "subject add successfully";
        echo "<a href='teacher.php'> Go To Menu</a>";
        echo   "</form>";
        echo  "</div>";
        echo "</body>";
        echo "</html>";
         
?>