<?xml version="1.0" encoding="UTF-8"?>

<!--
    Document   : moviestyle.xsl
    Created on : 2014年5月28日, 下午8:26
    Author     : crazydog
    Description:
        Purpose of transformation follows.
-->

<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:output method="html"/>

    <!-- TODO customize transformation rules 
         syntax recommendation http://www.w3.org/TR/xslt 
    -->
    <xsl:template match="score-partwise">
        <br/><xsl:apply-templates select="movement-title"/><br/>
    </xsl:template>
    <xsl:template match="movement-title">
        <xsl:element name="a">
             <xsl:attribute name="href">displayMusic.php?movement-title=<xsl:value-of select="."/></xsl:attribute>
              <xsl:value-of select="."/>
        </xsl:element>
    </xsl:template>
</xsl:stylesheet>
