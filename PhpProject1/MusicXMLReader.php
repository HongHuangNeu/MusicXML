<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MusicXMLReader
 *
 * @author Ground
 */
class MusicXMLReader {
    //put your code here
    private $LilypondDir;
    function __construct($LilypondDir)
    {
        $this->LilypondDir=$LilypondDir;
        
    }
    function getLy($pathToXml)
    {
        $pythonDir=$this->LilypondDir."\usr\bin\python";
        $transformDir=$this->LilypondDir."\usr\bin\musicxml2ly.py";
        exec($pythonDir." ".$transformDir."  --midi ".$pathToXml);
       return $newname = str_replace(array(".xml"), ".ly", $pathToXml);
    }
    function getScoreAndMidi($pathToXml)
    {
        $pythonDir=$this->LilypondDir."\usr\bin\python";
        $transformDir=$this->LilypondDir."\usr\bin\musicxml2ly.py";
        exec($pythonDir." ".$transformDir."  --midi ".$pathToXml);
        exec($this->LilypondDir."\usr\bin\lilypond   ".str_replace(array(".xml"), ".ly", $pathToXml));
        
    }
    
}
