<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body bgcolor="#FFCC99">
      <?php
      include 'MusicXMLReader.php';
      
      session_start();
    $results = $_SESSION['musics'];
    $title = $_GET['movement-title'];
    foreach($results as $result){
        $doc = simplexml_load_string($result);
        $ans = $doc->xpath("//movement-title/text()");
        if($ans[0]==$title){            
            $file = fopen("musichh.xml","w");
             fwrite($file,$result);
            fclose($file);
           
        }
    }
      
      
      $reader=new MusicXMLReader("D:\LilyPond");
     // echo "the ly  path is ".$reader->getLy("D:\my-dear-redeemer-pianovocal.xml");
       
       $path=$_SERVER['DOCUMENT_ROOT']."\musichh.xml";
       $reader->getScoreAndMidi($path);
        $pdfName= basename($path,".xml").".pdf";
        $midiName=basename($path,".xml").".mid";
       echo "<object data=\"".$midiName."\">\n";
       echo "<param name=\"loop\" value=\"10\"/>\n";
       echo "If you're seeing this, you don't have a MIDI player
on your computer.\n";
       echo "<a href=\"".$midiName."\">click here to download</a>\n";
       echo "</object>";
       echo "<p>The score</p>";
    echo "<div id=\"pdf\">";
    echo "<object width=\"800\" height=\"500\" type=\"application/pdf\" data=\"".$pdfName."?#zoom=85&scrollbar=0&toolbar=0&navpanes=0\" id=\"pdf_content\">\n";
    echo  "<p>Insert your error message here, if the PDF cannot be displayed.</p>\n";
    echo "</object>\n";
    echo "</div>"; 
       ?>
       
    </body>
</html>
