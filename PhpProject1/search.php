<?php session_start();
            include 'Client.class.php';
            include 'Query.class.php';
            include 'ResultSet.class.php';
            include 'SimpleXMLResultSet.class.php';
            include 'DOMResultSet.class.php';
            ini_set('display_errors', '0');     # don't show any errors...
            error_reporting(E_ALL | E_STRICT);  # ...but do log them
            
                 $clause = "where ";
                    if ($_POST["title"]!="") {
                        $clause .= "contains(\$m/movement-title/text(),\$name)";
                    }
                    else{
                        $clause .= "\$m/movement-title=\$m/movement-title";
                    }
                    if ($_POST["pitch"]!=""){
                        $clause = $clause." and \$m//pitch/step=\$pstep";
                    }
                    if($_POST["sign"]!=""){
                        $clause = $clause." and \$m//sign=\$sign";
                    }
                    if($_POST["beats"]!=""){
                        $clause .= " and \$m//beats=".$_POST["beats"];
                    }
                    if($_POST["beat-type"]!=""){
                        $clause .= " and \$m//beat-type=".$_POST["beat-type"];
                    }
                    if($_POST['lyric']!=""){
                        $clause .= " and contains(\$m//lyric/text/text(),\$lyric)";
                    }
                    $connConfig = array(
                        'protocol'=>'http',
                        'host'=>'localhost',
                        'port'=>'8080',
                        'user'=>'admin',
                        'password'=>'admin',
                        'collection'=>'/exist'
                    );
                    $conn = new \ExistDB\Client($connConfig);
                    
                    $xql = <<<EOXQL
                                for \$m in doc('/db/movie/music.xml')//score-partwise
                                    $clause
                                    return \$m
EOXQL;
                    $stmt = $conn->prepareQuery($xql);
                    $stmt->bindVariable('name', $_POST['title']);
                    $stmt->bindVariable('pstep', $_POST['pitch']);
                    $stmt->bindVariable('sign', $_POST['sign']);
                    $stmt->bindVariable('lyric', $_POST['lyric']);
                  
                    $resultPool = $stmt->execute();
                    $results = $resultPool->getAllResults();
        //            header('Content-type: text/xml');
                  
                    $ans = "";
                    foreach($results as $result)
                    {
                        $doc = new DOMDocument();
                        $doc->loadXML($result);  
//                        $doc->saveXML();
                        $xsl = new DOMDocument();
                        $xsl->load("music.xsl");
                        $proc = new XSLTProcessor();
                        $proc->importStylesheet($xsl);
//                        echo $result;
//                        echo $result;
                        echo ($proc->transformToXml($doc));
                    }
                    $_SESSION['musics'] = $results;
            
            
?>