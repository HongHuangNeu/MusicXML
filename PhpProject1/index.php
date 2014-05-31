<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php session_start();?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>First</title>
        <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script>
      $(function () {
        $('form').bind('submit', function () {
          $.ajax({
            type: 'post',
            url: 'search.php',
            data: $('form').serialize(),
            success: function (data) {
              $('#result').html(data);
              //alert(data);
            }
          });
          return false;
        });
      });
    </script>
    </head>
    <body bgcolor="#FFCC99">
        <?php
       
        
        ini_set('display_errors', '0');     # don't show any errors...
error_reporting(E_ALL | E_STRICT);
        ?>
    <h2 style="font-family:verdana;color:#99CC33"align="center">Music Search Enginee</h2>
    <h3 style="font-family:verdana;color:#99CC33"align="center">Web application with PHP Exist API</h3>
        <hr>
        <h4 align="center">Please filter your search criteria:</h4>
        <form>
         Movement   Title contains: <input type="text" name="title">
            pitch step: <select name="pitch">
            <option> </option> 
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
            <option value="D">D</option>
            <option value="E">E</option>
            <option value="F">F</option>
            <option value="G">G</option>
            </select>
            sign: <select name="sign">
            <option> </option> 
            <option value="G">G</option>
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
            <option value="D">D</option>
            <option value="E">E</option>
            <option value="F">F</option>
            </select>
            beats:<select name="beats">
            <option> </option> 
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            </select>
            beat-type<select name="beat-type">
            <option> </option> 
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            </select>
            lyric <input type="text" name="lyric">
            
        <br><br><br>
        <input type ="submit" style="width:120px;height:40px;font-size:20px;">
        </form>
        <p>Songs: <span id="result"></span></p>
    </body>
</html>
