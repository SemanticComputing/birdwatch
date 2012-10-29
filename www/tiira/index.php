<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"><head>
<title>Tiira</title>
	
<link rel="icon" href="http://tiira.fi/favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="http://tiira.fi/favicon.ico" type="image/x-icon">
<link rel="stylesheet" type="text/css" href="index.php_files/screen-basic.css">
	
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="Content-Script-Type" content="text/javascript">
<meta http-equiv="Content-Style-Type" content="text/css">

</head>

	<body>
	<script language="JavaScript" type="text/javascript" src="index.php_files/javascr.js"></script>
<script type="text/javascript">
<!--
function yhteystiedot(ilmoitus) {
        var answer = confirm(ilmoitus);
        if (answer){
                window.location = "index.php?toiminto=4";
        }	
}

function focus_tunnus() { /* 20100512 AJL */
   document.login.tunnus.focus()
}
-->
</script>		
<div id="header">
<!--<a target="_blank" href="http://www.birdlife.fi/" title="BirdLife Suomi etusivu"><img src="index.php_files/header.jpg" alt="etusivu" border="0"></a>-->
<h1 style="color: white;">TESTILOMAKE</h1>
</div>	
<div id="user">
    <div id="user-logged">
    <p><strong></strong></p>
    <ul>
    <li id="user-info"><a href="http://tiira.fi/index.php?toiminto=4">Omat tiedot</a></li>
    <li id="user-logout"><a href="http://tiira.fi/index.php?logout=1" accesskey="q">Kirjaudu ulos</a></li>
    <li id="user-time">11.7.2012 13:57:44</li>
    </ul>
    </div></div>
<div id="main"><div id="content">    <script language="JavaScript" type="text/javascript" src="index.php_files/ajax_funktiot.js"></script>
	
<script type="text/javascript">
<!--

var lomake = "havaintoilmoituslomake";

function tilalisays(kierros) {
	var ts = document.getElementById('tilaselect'+kierros);
	if(ts.selectedIndex != 0) {
		var teksti = ts.options[ts.selectedIndex].text;
		if(document.getElementById('tila'+kierros).value == '') document.getElementById('tila'+kierros).value=teksti;
		else document.getElementById('tila'+kierros).value+=', '+teksti;
	}
}
function focus_pvm() {
	document.getElementById(lomake).pvm1.focus();
}
function focus_laji() {
       	document.getElementById(lomake).laji.focus();
}
function focus_rivi() {
	document.getElementById(lomake).lukum0.focus();
}
function ohje(otsikko,teksti) {
	if(teksti == '')
	{
	otsikko = 'Ohje';
	teksti = 'Liikuta hiiren osoitinta lomakkeen toimintojen päällä ja saat tähän ohjeita.';
	}
	ohjeteksti = '<i>'+otsikko+'</i><br/><br/>'+teksti;
	document.getElementById("help").innerHTML=ohjeteksti;
	return;
}

function haepaikka() /*PAIKAN HAKU KARTALTA*/
{
	window.open("/kartta/haepaikka/","haepaikka", "toolbar=no, location=no, directories=no, status=yes, menubar=no, scrollbars=yes, resizable=yes, copyhistory=no, width=930, height=620");
}

function haepaikkalista() /*PAIKAN HAKU LISTALTA*/
{
 	window.open("/etsipaikkaikkuna.php","haepaikka", "toolbar=no, location=no, directories=no, status=yes, menubar=no, scrollbars=yes, resizable=yes, copyhistory=no, width=700, height=600");
}

function haepaikkanimella() /*Paikan haku nimistökannoista*/
{
	/* 20110324 AJL */
 	window.open("/etsinimisto.php","haepaikkanimi", "toolbar=no, location=no, directories=no, status=yes, menubar=no, scrollbars=yes, resizable=yes, copyhistory=no, width=700, height=600");
}

function tallenteet() /*Tallenteiden käsittely*/
{
	// 20111117 AJL
    window.open("/tallenteet/tallennelataus.php","tallenteet", "toolbar=no, location=no, directories=no, status=yes, menubar=no, scrollbars=yes, resizable=yes, copyhistory=no, width=950, height=600");
}

function haelaji() /*LAJIN HAKU*/
{
      	window.open("/taksonomia/etsitaksoniikkuna.php","laji", "toolbar=no, location=no, directories=no, status=yes, menubar=no, scrollbars=yes, resizable=yes, copyhistory=no, width=700, height=600");
}

function haekaveri() /*KAVERIN HAKU*/
{
	/* 20090417 AJL */
	/* 20090720 AJL */
    /* window.open("kaverimuokkaus.php?kaverinumerot="+escape(document.havaintoilmoituslomake.kaverinumerot.value),"kaveri", "toolbar=no, location=no, directories=no, status=yes, menubar=no, scrollbars=yes, resizable=yes, copyhistory=no, width=700, height=1000"); */
    window.open("/kaverimuokkaus.php","kaveri", "toolbar=no, location=no, directories=no, status=yes, menubar=no, scrollbars=yes, resizable=yes, copyhistory=no, width=700, height=1000");	
}

/*** siirretty java.src:n 20090827 AJL
*function omatkaverit() **KAVERIN HAKU**
*{
*     window.open("kaverihaku.php","kaveri", "toolbar=no, location=no, directories=no, status=yes, menubar=no, scrollbars=yes, resizable=yes, copyhistory=no, width=700, height=600");
*}
****/
function tyhjennahavainnoijat() {
	document.havaintoilmoituslomake.kaverit.value="";
	/* 20090720 AJL document.havaintoilmoituslomake.kaverinumerot.value=""; */
    KasitteleSessiot('/ajax/poistasessiot.php','kaverit=1',TarkistaVirhe,true);	
    /* 20090710 AJL document.getElementById("tyhjennahavainnoijat").value="1"; */
	/* 20090714 AJL document.getElementById(lomake).submit(); */
}

function tyhjennalinnunpaikka() {	
    /* 20090716 AJL */
	KasitteleSessiot('/ajax/talletasessioon.php','kayta_session=k',TarkistaVirhe,false);
	KasitteleSessiot('/ajax/poistasessiot.php','birdposx=1&birdposy=1&tarkkuus_lintu=1',TarkistaVirhe,true);
    document.getElementById('havaintoilmoituslomake').tarkkuus_lintu.selectedIndex=0;
    document.getElementById('havaintoilmoituslomake').tarkkuus_lintu.disabled=true;
	document.getElementById('havaintoilmoituslomake').birdposition.value='';
    // document.getElementById("tyhjennalinnunpaikka").value="1";
    // document.getElementById(lomake).submit();
}	
	
function sivuvalmis() {
/*
 * 20110303 AJL Jos sivun lataus kesken, ei hyväksytä.
 */
	if (document.getElementById("f-submit") == null) {
		alert('Sivun lataus on kesken!');
		return false;
	} 
	return true;
}

function lisaarivi() {
	if (sivuvalmis() == true) {
		document.getElementById("lisaarivi").value="1";
		document.getElementById(lomake).submit();
	}
}

function poistarivi() {
	if (sivuvalmis() == true) {
		document.getElementById("poistarivi").value="1";
		document.getElementById(lomake).submit();
	}
}
	
function openwin(url) {	
	window.open(url,"ikkuna","toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=yes,copyhistory=yes,width=700,height=768");
}	

function today() {
	rv= "11.7.2012"
	document.havaintoilmoituslomake.pvm1.value=rv;
	document.getElementById(lomake).kello1.focus();
}
	
-->
</script>
	
<form name="havaintoilmoituslomake" method="post" id="havaintoilmoituslomake" action="index.php?toiminto=6">
<!-- aloitetaan lomakkeen luonti  -->
<input name="tiedot" value="2" type="hidden">
<input name="rivit" value="1" type="hidden">
<input name="muokkaa" value="0" type="hidden">
<input name="koontiid" value="" type="hidden">
<input name="eestaaspohja" value="" type="hidden">
<input name="julkinen_tallentaja_id" value="" type="hidden">
<input name="pvmhuom" value="" type="hidden"> <!-- SK lisännyt 2.10.06 -->

<!-- kontrolliparametreja, muutetaan javascriptilla - tjk -->
<input name="lisaarivi" id="lisaarivi" value="" type="hidden">
<input name="poistarivi" id="poistarivi" value="" type="hidden">
<!-- 20090720 AJL <input type="hidden" name="tyhjennahavainnoijat" id="tyhjennahavainnoijat" value=""/> --->
<!-- 20090717 AJL <input type="hidden" name="tyhjennalinnunpaikka" id="tyhjennalinnunpaikka" value=""/> --->
	
<table cellpadding="0" cellspacing="0"> <!-- ylin palkki auki -->
<tbody><tr>
<td class="formheader">Havaintoilmoitus</td>
<td class="formheadertile"><img alt="viiva" src="index.php_files/headertile.gif" border="0"></td>
<td class="formheadertail">&nbsp;</td>
</tr>
</tbody></table> <!-- ylin palkki kiinni -->

<div class="formbody">
<table> <!-- table jossa paikka, pvm, aika ja ohje auki -->
<tbody><tr>
<td width="50%">

<table width="100%">
<!-- 20090304 AJL -->
<tbody><tr>
</tr><tr>
<td></td>
<td></td>
<td></td>
<td></td>
<td align="right" width="100:px"><span class="ilmootsikko" onmouseover="javascript:ohje('Tarkkuus','Valitse pudotusvalikosta havaintopaikan ja havainnotsijan tarkkuus')">Tarkkuus</span></td>
</tr>
<tr>
<td class="left" onmouseover="javascript:ohje('Havaintopaikka','Anna havaintopaikka joko \'Hae paikka kartalta\' tai \'Valitse paikka listalta\' -linkkien avulla.')" valign="top"><span class="ilmootsikko">Havaintopaikka</span></td>
<td valign="top">
<span class="required">*</span>
</td>
<td onmouseover="javascript:ohje('Havaintopaikka','Anna havaintopaikka joko \'Hae paikka kartalta\' tai \'Valitse paikka listalta\' -linkkien avulla.')" width="250"><div class="formdatacell">
<?php 
if (strlen( $_GET['paikka'] ) > 1)
	echo $_GET['paikka'].'<br />';
echo '('.$_GET['lat'].', '.$_GET['lon'].')' 
?>
</div></td>
<!-- 20090304 AJL -->
<td></td>
<td align="right">
<!-- <select name="tarkkuus_havainnoija"  style="width:70px" onchange="javascript:document.getElementById('havaintoilmoituslomake').submit()" onfocus="javascript:ohje('Havainnoijan paikan tarkkuus','Havainnoijan paikan arvioitu tarkkuus metreinä. Valitse listalta tarkkuutta ilmaiseva arvo.')"> -->
<select name="tarkkuus_havainnoija" style="width:70px" onchange="javascript:KasitteleSessiot('ajax/talletasessioon.php','tarkkuus_havainnoija='+document.getElementById('havaintoilmoituslomake').tarkkuus_havainnoija.value,TarkistaVirhe,true)" onfocus="javascript:ohje('Havainnoijan paikan tarkkuus','Havainnoijan paikan arvioitu tarkkuus metreinä. Valitse listalta tarkkuutta ilmaiseva arvo. ')">
<option selected="selected" value="0">&nbsp;</option>
    <option onmouseover="javascript:ohje('Tarkkuus','Havainnoijan paikan arvioitu tarkkuus <50 metriä')" value="1">&lt;50 m	</option>
	    <option onmouseover="javascript:ohje('Tarkkuus','Havainnoijan paikan arvioitu tarkkuus <200 metriä')" value="2">&lt;200 m	</option>
	    <option onmouseover="javascript:ohje('Tarkkuus','Havainnoijan paikan arvioitu tarkkuus <1 kilometri')" value="3">&lt;1 km	</option>
	    <option onmouseover="javascript:ohje('Tarkkuus','Havainnoijan paikan arvioitu tarkkuus <5 kilometriä')" value="4">&lt;5 km	</option>
	    <option onmouseover="javascript:ohje('Tarkkuus','Havainnoijan paikan arvioitu tarkkuus >5 kilometriä')" value="5">&gt;5 km	</option>
	</select>
</td>
</tr>
<tr>
<td class="left" onmouseover="javascript:ohje('Linnun paikka','Anna linnun paikka joko \'Hae paikka kartalta\' tai \'Valitse paikka listalta\' -linkkien avulla. Linnun paikka ei ole pakollinen tieto.')">
<span class="ilmootsikko">Linnun paikka</span></td>
<td>&nbsp;</td>
<td onmouseover="javascript:ohje('Linnun paikka','Anna linnun paikka joko \'Hae paikka kartalta\' tai \'Valitse paikka listalta\' -linkkien avulla. Linnun paikka ei ole pakollinen tieto.')">
<div class="formdatacell">
<!-- 20090717 AJL style="border:none" -->
<input class="formreadonlycell" readonly="readonly" name="birdposition" id="birdposition" type="text">
</div></td>
<td>
<a href="javascript:tyhjennalinnunpaikka()" onmouseover="javascript:ohje('Poista linnun paikka','Poista linnun paikka')"><img alt="poista" src="index.php_files/poista.jpg" title="Poista linnun paikka" height="19" border="0" width="19"></a>
</td>
<!-- 20090304 AJL -->
<td align="right">
<!-- <select name="tarkkuus_lintu"   onchange="javascript:document.getElementById('havaintoilmoituslomake').submit()" onfocus="javascript:ohje('Linnun paikan tarkkuus','Linnun paikan arvioitu tarkkuus metreinä. Valitse listalta tarkkuutta ilmaiseva arvo.')" style="width:70px"> -->
<select name="tarkkuus_lintu" disabled="disabled" onchange="javascript:KasitteleSessiot('ajax/talletasessioon.php','tarkkuus_lintu='+document.getElementById('havaintoilmoituslomake').tarkkuus_lintu.value,TarkistaVirhe,true)" onfocus="javascript:ohje('Linnun paikan tarkkuus','Linnun paikan arvioitu tarkkuus metreinä. Valitse listalta tarkkuutta ilmaiseva arvo. ')" style="width:70px">
<option selected="selected" value="0">&nbsp;</option>
    <option onmouseover="javascript:ohje('Tarkkuus','Linnun paikan arvioitu tarkkuus <10 metriä')" value="1">&lt;10 m	</option>
	    <option onmouseover="javascript:ohje('Tarkkuus','Linnun paikan arvioitu tarkkuus <50 metriä')" value="2">&lt;50 m	</option>
	    <option onmouseover="javascript:ohje('Tarkkuus','Linnun paikan arvioitu tarkkuus <250 metriä')" value="3">&lt;250 m	</option>
	    <option onmouseover="javascript:ohje('Tarkkuus','Linnun paikan arvioitu tarkkuus <500 metriä')" value="4">&lt;500 m	</option>
	    <option onmouseover="javascript:ohje('Tarkkuus','Linnun paikan arvioitu tarkkuus >500 metriä')" value="5">&gt;500 m	</option>
	</select>
</td> 
</tr>
<tr>
<td colspan="5" align="center">
<a href="javascript:haepaikka()" onmouseover="javascript:ohje('Hae paikka <b>k</b>artalta','Klikkaamalla tästä pääset kartalle antamaan havaintopaikan. Näppäinoikotie alt + k (enter)')" accesskey="k"><span class="ilmootsikko">Hae paikka <b>k</b>artalta</span></a>&nbsp;&nbsp;
<a href="javascript:haepaikkalista()" onmouseover="javascript:ohje('Hae paikka l<b>i</b>stalta','Tästä pääset valitsemaan havaintopaikan käyttäen nimettyjä paikkoja. Näppäinoikotie alt + i (enter).')" accesskey="i"><span class="ilmootsikko">Hae paikka l<b>i</b>stalta</span></a>&nbsp;&nbsp;
<a href="javascript:haepaikkanimella()" onmouseover="javascript:ohje('Hae paikka nimellä','Klikkaamalla tästä pääset hakemaan havaintopaikan nimellä. Näppäinoikotie alt + n (enter)')" accesskey="n"><span class="ilmootsikko">Hae paikka <b>n</b>imellä</span></a>
</td>
</tr>
</tbody></table><br>

<table width="100%">
<tbody><tr>
<td>
<label for="pvm1" onmouseover="javascript:ohje('Alkupäivä','Anna havainnon päivämäärä. Esimerkiksi 3.10.2005')">
<!-- Alkupäivä -->
<small>Alkupäivä&nbsp;</small></label>
<!--<span class="ilmootsikko">
<a href="javascript:today()" onmouseover="javascript:ohje('Tänään','Klikkaa tästä päivämääräksi tämä päivä. Näppäinoikotie alt + ä (enter)')" accesskey="ä">T<b>ä</b>nään</a>
</span>-->
<span class="required">*</span></td><td><input name="pvm1" id="pvm1" size="8" maxlength="10" onfocus="javascript:ohje('Alkupäivä','Anna havainnon päivämäärä. Esimerkiksi 3.10.2005')" tabindex="1" type="text" value="<?php echo $_GET['pvm'] ?>">
</td>
<td>
<label for="pvm2" onmouseover="javascript:ohje('Loppupäivä','Anna havainnon loppupäivämäärä. Esimerkiksi 5.10.2005. Jos havainto on vain yhdeltä päivältä niin jätä kenttä tyhjäksi. ')">
<small>Loppupäivä</small></label></td><td><input name="pvm2" id="pvm2" size="8" maxlength="10" onfocus="javascript:ohje('Loppupäivä','Anna havainnon loppupäivämäärä. Esimerkiksi 5.10.2005. Jos havainto on vain yhdeltä päivältä niin jätä kenttä tyhjäksi. ')" tabindex="2" type="text">
</td><td>
<!--<span class="ilmootsikko">-->
<!-- <a href="javascript:today()" onmouseover="javascript:ohje('Tänään','Klikkaa tästä päivämääräksi tämä päivä. Näppäinoikotie alt + ä (enter)')" accesskey="ä">T<b>ä</b>nään</a>-->
<a href="javascript:today()" onmouseover="javascript:ohje('Tänään','Klikkaa tästä päivämääräksi tämä päivä. Näppäinoikotie alt + ä (enter) ')" accesskey="ä"><img alt="tänään" src="index.php_files/yhtakuin92.png" title="Tänään" height="18" border="0" width="18"></a>
<!--</span> -->
</td>
</tr>
<tr>
<td>
<label for="kello1" onmouseover="javascript:ohje('Havainnointiaika','Anna havainnointiaika. Esimerkiksi 9:15 \- 13:30 ')"><small>Havainnointiaika</small></label></td><td>
<input name="kello1" id="kello1" size="3" maxlength="5" onfocus="javascript:ohje('Havainnointiaika','Anna havainnoinnin aloitusaika. Esimerkiksi 9.15 ')" tabindex="3" type="text">&nbsp;&nbsp;&nbsp;&nbsp;-
</td><td>
<input name="kello2" id="kello2" size="3" maxlength="5" onfocus="javascript:	ohje('Havainnointiaika','Anna havainnoinnin lopetusaika. Esimerkiksi 13.30 ')" tabindex="4" type="text">
</td>
</tr>
</tbody></table>
</td> <!-- suljetaan paikka, aika, pvm td -->

<td align="right" valign="top" width="50%"> <!-- alkaa ohje td-->
<div id="help" class="formhelp"><i>Alkupäivä</i><br><br>Anna havainnon päivämäärä. Esimerkiksi 3.10.2005</div>
</td> <!-- ohje td kiinni -->
</tr> <!-- suljetaan paikka, aika, pvm tr -->
</tbody></table> <!-- suljetaan paikka, aika, pvm, ohje table -->
	
<div class="ruler"></div>      	
<table width="100%">
<tbody><tr>
<td width="50%"><label for="laji" onmouseover="javascript:ohje('Laji','Anna lajinimi suomeksi, ruotsiksi, tieteellisellä 3+3 lyhenteellä (esim. anapla) tai tieteellisellä kokonimellä. Voit etsiä lajinimen viereisestä \'Hae laji\'-linkistä.')">
<span class="ilmootsikko">Laji</span> 
<span class="required">*</span></label>&nbsp;
<input name="laji" id="laji" size="30" onfocus="javascript:ohje('Laji','Anna lajinimi suomeksi, ruotsiksi, tieteellisellä 3+3 lyhenteellä (esim. anapla) tai tieteellisellä kokonimellä. Voit etsiä lajinimen viereisestä \'Hae laji\'-linkistä.')" tabindex="5" type="text" value="<?php echo $_GET['laji'] ?>">&nbsp;
<a href="javascript:haelaji()" onmouseover="javascript:ohje('<b>H</b>ae laji','Voit etsiä lajin painamalla tästä. Näppäinoikotie alt + h (enter) ')" accesskey="h"><span class="ilmootsikko"><b>H</b>ae laji</span></a>
</td>

<td align="center">

<label for="salaa_havis" onmouseover="javascript:ohje('Salaa havainto','Salattu havainto ei näy havaintoselaimessa. Salattu havainto näkyy ainoastaan havainnon ilmoittajalle itselleen ja yhdistyksen aluevastaaville. ')">
<span class="ilmootsikko">Salaa havainto</span></label>&nbsp;
<input id="salaa_havis" name="salaa_havis" type="checkbox">
	
</td>
</tr>
</tbody></table><br>

<table class="formtableb">
<tbody><tr>
<th></th>
<th>Lukum<span class="required">*</span></th>
<th>&nbsp;<img alt="Sukupuoli" src="index.php_files/sukupuoli.gif" title="Sukupuoli"></th>
<th>Ikä</th>
<th>Puku</th>
<th>Tila</th>
<th>&nbsp;</th>
<th>Kello	&nbsp;-</th>
<th>Kello	</th>
<th>Lisätietoja</th>
<th>Parvi</th>
<th><img alt="Bongattu" src="index.php_files/bongattu.gif" title="Bongattu"></th>
<th><img alt="Pesintään viittaava havainto" src="index.php_files/pesa.gif" title="Pesintään viittaava havainto"></th>
</tr>

<tr><td></td><td>    <input name="lukum0" size="4" onfocus="javascript:ohje('Lukumäärä','Yksilöiden lukumäärä. Jos ilmoitat parin/pareja eli valitset sukupuoli-valikosta \'pariutuneet\', niin laita yksilömääräksi yksilöiden kokonaismäärä. Esim yhden parin tapauksessa anna määräksi ja sukupuoleksi \'pariutuneet\'.')" tabindex="6" autocomplete="off" type="text">
    </td>
    <td>
    <select name="sex0" size="1" onfocus="javascript:ohje('Sukupuoli','Sukupuoli. k=koiras, n=naaras, pariutuneet=pari/pareja. Esim. jos ilmoitat 5 paria, niin anna lukumääräksi 10 ja sukupuoleksi \'pariutuneet\'.')" tabindex="7">
    <option selected="selected" value="0">&nbsp;</option>
    <option onmouseover="javascript:ohje('Sukupuoli','n           = naaras')" value="n          ">n          </option>
<option onmouseover="javascript:ohje('Sukupuoli','k           = koiras')" value="k          ">k          </option>
<option onmouseover="javascript:ohje('Sukupuoli','pariutuneet = Esimerkiksi yhden pariskunnan tapauksessa merkitään lukumääräksi 2 ja sukupuoleksi pariutuneet.')" value="pariutuneet">pariutuneet</option>
    </select>
    </td>

	<td>
	<select name="ika0" size="1" onfocus="javascript:ohje('Ikä','1kv=ensimmäisen kalenterivuoden lintu, +1kv=vanhempi kuin ensimmäisen kalenterivuoden lintu jne. fl=täysikasvuinen, mutta ikä tuntematon. pm=maastopoikanen, pp=pesäpoikanen.')" tabindex="8">
	<option selected="selected" value="0">&nbsp;</option>
	<option onmouseover="javascript:ohje('Ikä','fl    = Täysikasvuinen, ikä muutoin tuntematon.')" value="fl   ">fl   </option>
<option onmouseover="javascript:ohje('Ikä','pm    = Maastopoikanen. Lintu, joka ei ole pesässä, mutta ei ole vielä saavuttanut täydellistä lentokykyä.')" value="pm   ">pm   </option>
<option onmouseover="javascript:ohje('Ikä','pp    = pesäpoikanen')" value="pp   ">pp   </option>
<option onmouseover="javascript:ohje('Ikä','+1kv  = Vanhempi kuin 1. kalenterivuoden lintu. Eli ei samana vuonna syntynyt.')" value="+1kv ">+1kv </option>
<option onmouseover="javascript:ohje('Ikä','1kv   = Ensimmäisen kalenterivuoden lintu eli  samana vuonna syntynyt.')" value="1kv  ">1kv  </option>
<option onmouseover="javascript:ohje('Ikä','+2kv  = Vanhempi kuin 2. kalenterivuoden lintu.')" value="+2kv ">+2kv </option>
<option onmouseover="javascript:ohje('Ikä','2kv   = Toisen kalenterivuoden lintu eli edellisenä vuonna syntynyt.')" value="2kv  ">2kv  </option>
<option onmouseover="javascript:ohje('Ikä','+3kv  = Vanhempi kuin 3. kalenterivuoden lintu.')" value="+3kv ">+3kv </option>
<option onmouseover="javascript:ohje('Ikä','3kv   = Kolmannen kalenterivuoden lintu.')" value="3kv  ">3kv  </option>
<option onmouseover="javascript:ohje('Ikä','+4kv  = Vanhempi kuin 4. kalenterivuoden lintu.')" value="+4kv ">+4kv </option>
<option onmouseover="javascript:ohje('Ikä','4kv   = Neljännen kalenterivuoden lintu.')" value="4kv  ">4kv  </option>
<option onmouseover="javascript:ohje('Ikä','+5kv  = Vanhempi kuin 5. kalenterivuoden lintu.')" value="+5kv ">+5kv </option>
<option onmouseover="javascript:ohje('Ikä','5kv   = Viidennen kalenterivuoden lintu.')" value="5kv  ">5kv  </option>
<option onmouseover="javascript:ohje('Ikä','+6kv  = Vanhempi kuin 6. kalenterivuoden lintu.')" value="+6kv ">+6kv </option>
<option onmouseover="javascript:ohje('Ikä','6kv   = Kuudennen kalenterivuoden lintu.')" value="6kv  ">6kv  </option>
<option onmouseover="javascript:ohje('Ikä','+7kv  = Vanhempi kuin 7. kalenterivuoden lintu.')" value="+7kv ">+7kv </option>
<option onmouseover="javascript:ohje('Ikä','7kv   = Seitsemännen kalenterivuoden lintu.')" value="7kv  ">7kv  </option>
<option onmouseover="javascript:ohje('Ikä','+8kv  = Vanhempi kuin 8. kalenterivuoden lintu.')" value="+8kv ">+8kv </option>
<option onmouseover="javascript:ohje('Ikä','8kv   = Kahdeksannen kalenterivuoden lintu.')" value="8kv  ">8kv  </option>
	</select>
	</td>

	<td>
	<select name="puku0" size="1" onfocus="javascript:ohje('Puku','Voit antaa linnun puvun.')" tabindex="9">
	<option selected="selected" value="0">&nbsp;</option>
	<option onmouseover="javascript:ohje('Puku','ad         = lintu on puvussa, joka ei enää myöhemmissä sulkimisissa muutu')" value="ad        ">ad        </option>
<option onmouseover="javascript:ohje('Puku','eijp       = muu kuin juhlapuku; käsittää kaikki tp-, vp- ja pep-linnut sekä nuoruuspukuiset (ei naaraita, jos juhlapuku)')" value="eijp      ">eijp      </option>
<option onmouseover="javascript:ohje('Puku','imm        = puvun perusteella ei-sukukypsä lintu')" value="imm       ">imm       </option>
<option onmouseover="javascript:ohje('Puku','jp         = juhlapuku')" value="jp        ">jp        </option>
<option onmouseover="javascript:ohje('Puku','juv        = 1. täydellinen puku')" value="juv       ">juv       </option>
<option onmouseover="javascript:ohje('Puku','n-puk      = naaraspukuinen')" value="n-puk     ">n-puk     </option>
<option onmouseover="javascript:ohje('Puku','pep        = peruspuku (juhlapuvun vastakohta, erityisesti vesilinnuilla)')" value="pep       ">pep       </option>
<option onmouseover="javascript:ohje('Puku','pull       = untuvapoikanen')" value="pull      ">pull      </option>
<option onmouseover="javascript:ohje('Puku','ss         = sulkasatoinen, linnussa näkyy sulkimisen merkkejä')" value="ss        ">ss        </option>
<option onmouseover="javascript:ohje('Puku','subad      = juv- ja ad pukujen välissä oleva mikä tahansa puku')" value="subad     ">subad     </option>
<option onmouseover="javascript:ohje('Puku','tp         = talvipuku (juhlapuvun vastakohta)')" value="tp        ">tp        </option>
<option onmouseover="javascript:ohje('Puku','vp         = vaihtopuku (puvussa on kahden puvun höyheniä tai sulkia tai lintu on kulumassa toisesta puvusta toiseen - periaatteessa molemmissa tapauksissa mistä puvusta tahansa toiseen)')" value="vp        ">vp        </option>
	</select>
	</td>

	<td>
	<input name="tilafoobar0" id="tila0" onfocus="javascript:ohje('Tila','Valitse oikeanpuoleisesta valikosta linnun tila. Voit antaa useammankin tilan. Vain viereisessä valikossa olevat arvot sallitaan.')" type="text">
	</td>
	<td>
	<select id="tilaselect0" name="tila0" size="1" onchange="javascript:tilalisays('0')" onfocus="javascript:ohje('Tila','Valitse tästä valikosta linnun tila. Voit antaa niin monta tilaa kuin haluat.')" tabindex="10">
	<option selected="selected">Valitse:</option>
	<option onmouseover="javascript:ohje('Tila','E          = matkalennossa itään')" value="E         ">E         </option>
<option onmouseover="javascript:ohje('Tila','ENE        = matkalennossa itäkoilliseen')" value="ENE       ">ENE       </option>
<option onmouseover="javascript:ohje('Tila','ESE        = matkalennossa itäkaakkoon')" value="ESE       ">ESE       </option>
<option onmouseover="javascript:ohje('Tila','kiert      = kiertelevä (lintu liikkuu sinne tänne, selvää suuntaa ei todettavissa)')" value="kiert     ">kiert     </option>
<option onmouseover="javascript:ohje('Tila','kontr      = kontrolloitu (aiemmin merkitty lintu tutkittu / käsitelty)')" value="kontr     ">kontr     </option>
<option onmouseover="javascript:ohje('Tila','kuollut    = lintu kuollut')" value="kuollut   ">kuollut   </option>
<option onmouseover="javascript:ohje('Tila','lask       = laskeutuva, saapui')" value="lask      ">lask      </option>
<option onmouseover="javascript:ohje('Tila','m          = muuttava')" value="m         ">m         </option>
<option onmouseover="javascript:ohje('Tila','N          = matkalennossa pohjoiseen')" value="N         ">N         </option>
<option onmouseover="javascript:ohje('Tila','NE         = matkalennossa koilliseen')" value="NE        ">NE        </option>
<option onmouseover="javascript:ohje('Tila','N-E        = matkalennossa sektorilla pohjoinen-itä (pohjoisen ja idän välille)')" value="N-E       ">N-E       </option>
<option onmouseover="javascript:ohje('Tila','NNE        = matkalennossa pohjoiskoilliseen')" value="NNE       ">NNE       </option>
<option onmouseover="javascript:ohje('Tila','NNW        = matkalennossa pohjoisluoteeseen')" value="NNW       ">NNW       </option>
<option onmouseover="javascript:ohje('Tila','nous       = nouseva, lähti')" value="nous      ">nous      </option>
<option onmouseover="javascript:ohje('Tila','NW         = matkalennossa luoteeseen')" value="NW        ">NW        </option>
<option onmouseover="javascript:ohje('Tila','N-W        = matkalennossa sektorilla pohjoinen-länsi (pohjoisen ja lännen välille)')" value="N-W       ">N-W       </option>
<option onmouseover="javascript:ohje('Tila','p          = paikallinen')" value="p         ">p         </option>
<option onmouseover="javascript:ohje('Tila','pysrev     = pysyvä reviiri')" value="pysrev    ">pysrev    </option>
<option onmouseover="javascript:ohje('Tila','pyyd       = pyydystetty')" value="pyyd      ">pyyd      </option>
<option onmouseover="javascript:ohje('Tila','reng       = rengastettu (lintu rengastettu havainnointihetkellä)')" value="reng      ">reng      </option>
<option onmouseover="javascript:ohje('Tila','rev        = reviiri')" value="rev       ">rev       </option>
<option onmouseover="javascript:ohje('Tila','rumm       = tikkojen rummutus')" value="rumm      ">rumm      </option>
<option onmouseover="javascript:ohje('Tila','S          = matkalennossa etelään')" value="S         ">S         </option>
<option onmouseover="javascript:ohje('Tila','SE         = matkalennossa kaakkoon')" value="SE        ">SE        </option>
<option onmouseover="javascript:ohje('Tila','S-E        = matkalennossa sektorilla etelä-itä (etelän ja idän välille)')" value="S-E       ">S-E       </option>
<option onmouseover="javascript:ohje('Tila','SSE        = matkalennossa eteläkaakkoon')" value="SSE       ">SSE       </option>
<option onmouseover="javascript:ohje('Tila','SSW        = matkalennossa etelälounaaseen')" value="SSW       ">SSW       </option>
<option onmouseover="javascript:ohje('Tila','SW         = matkalennossa lounaaseen')" value="SW        ">SW        </option>
<option onmouseover="javascript:ohje('Tila','S-W        = matkalennossa sektorilla etelä-länsi (etelän ja lännen välille)')" value="S-W       ">S-W       </option>
<option onmouseover="javascript:ohje('Tila','var        = varoitteleva lintu')" value="var       ">var       </option>
<option onmouseover="javascript:ohje('Tila','W          = matkalennossa länteen')" value="W         ">W         </option>
<option onmouseover="javascript:ohje('Tila','WNW        = matkalennossa länsiluoteeseen')" value="WNW       ">WNW       </option>
<option onmouseover="javascript:ohje('Tila','WSW        = matkalennossa länsilounaaseen')" value="WSW       ">WSW       </option>
<option onmouseover="javascript:ohje('Tila','yöm        = yömuuttava')" value="yöm       ">yöm       </option>
<option onmouseover="javascript:ohje('Tila','ä          = ääntelevä lintu, ei nähty')" value="ä         ">ä         </option>
<option onmouseover="javascript:ohje('Tila','Ä          = laulava')" value="Ä         ">Ä         </option>
<option onmouseover="javascript:ohje('Tila','än         = ääntelevä lintu, joka nähty.')" value="än        ">än        </option>
<option onmouseover="javascript:ohje('Tila','Än         = laulava lintu joka on nähty')" value="Än        ">Än        </option>
	</select>
	</td>

	<td>
	<input name="klo1_0" size="3" onfocus="javascript:ohje('Havainnon alkamisen kellonaika','Voit antaa havaintoajan muodossa 6:00 tai 6.00. Huom! Havainnointiajan voit antaa yllä oleviin kenttiin.')" tabindex="11" type="text">
	</td>

	<td>
	<input name="klo2_0" size="3" onfocus="javascript:ohje('Havainnon loppumisen kellonaika','Havaintoajan päättyminen muodossa 9:00 tai 9.00.')" tabindex="12" type="text">
	</td>

	<td>
	<input name="lisatietoja0" size="9" onfocus="javascript:ohje('Rivikohtaisia lisätietoja','Tähän voin antaa rivikohtaisia lisätietoja.')" tabindex="13" type="text">
	</td>

	<td>
	<select name="parvi0" size="1" onfocus="javascript:ohje('Parvi','Jos linnut olivat yhdessä parvessa niin valitse tähän jokin numero valikosta. Mikäli kyseessä ei ollut parvi niin jätä kenttä tyhjäksi. Voit liittää eri rivien yksilöitä samaan parveen antamalla niille saman numeron valikosta.')" tabindex="14">
	<option selected="selected" value="0">&nbsp;</option>
	<option value="1">1</option>
	</select></td>

	<td onmouseover="javascript:ohje('Bongattu','Rastita tämä kohta mikäli bongasit toisen löytämän linnun.')" align="center"><input name="bongaus0" type="checkbox"></td>
	<td onmouseover="javascript:ohje('Pesintään viittaava havainto','Rastita tämä kohta mikäli havainto mielestäsi viittaa pesintään. Tätä tietoa käytetään arkojen pesimälajien automaattisessa salaamisessa.')" align="center"><input name="pesinta0" type="checkbox"></td>
	</tr>

	
</tbody></table>
&nbsp;&nbsp;
<a href="javascript:lisaarivi()" onmouseover="javascript:ohje('<b>L</b>isää rivi','Lisää uusi rivi havaintoon. Usean rivin avulla voit erotella esim. eri ikäiset ja pukuiset sekä muuttavat ja paikalliset linnut. Voit liittää eri rivien yksilöt samaksi parveksi antamalla saman numeron \'Parvi\'-kenttään. Näppäinoikotie alt + l (enter).')" accesskey="l">
<span class="ilmootsikko"><b>L</b>isää rivi</span></a>&nbsp;&nbsp;&nbsp;
<a href="javascript:poistarivi()" onmouseover="javascript:ohje('<b>P</b>oista rivi','Poista alin rivi. Näppäinoikotie alt + p (enter)')" accesskey="p">
<span class="ilmootsikko"><b>P</b>oista rivi</span></a><br><br>
<div class="ruler"></div>


<table>
<tbody><tr>
<td class="left">
<label for="havaintolisatietoja" onmouseover="javascript:ohje('Havaintokohtaisia lisätietoja','Anna tähän lisätietoja, jotka koskevat kaikkia ylläolevia havaintorivejä.')">
<span class="ilmootsikko">Lisätietoja</span></label></td>
<td>
&nbsp;<input id="havaintolisatietoja" name="havaintolisatietoja" onfocus="javascript:ohje('Havaintokohtaisia lisätietoja','Anna tähän lisätietoja, jotka koskevat kaikkia ylläolevia havaintorivejä.')" style="width: 530px;" tabindex="15" type="text">&nbsp;
</td>
<td><label for="atlaskoodi" onmouseover="javascript:ohje('Pesimävarmuusindeksi','1 Epätodennäköinen pesintä (<a href=javascript:openwin(\'atlasohje.php\')>indeksi 1</a>) <br/>2-5 Mahdollinen pesintä (<a href=javascript:openwin(\'atlasohje.php#kaksi\')>indeksit 2-5</a>)<br/>6 Todennäköinen pesintä (<a href=javascript:openwin(\'atlasohje.php#kuusi\')>indeksit 6 ja 61-66</a>)<br/>7-8 Varma pesintä (<a href=javascript:openwin(\'atlasohje.php#seitseman\')>indeksit 7-8, 71-75 ja 81-82)</a><br/><br/>')"><span class="ilmootsikko">Pesimävarmuus-<br>indeksi</span></label></td>
<td>
		
<select name="atlaskoodi" id="atlaskoodi" size="1" onclick="javascript:ohje('Pesimävarmuusindeksi','1 Epätodennäköinen pesintä (<a href=javascript:openwin(\'atlasohje.php\')>indeksi 1</a>) <br/>2-5 Mahdollinen pesintä (<a href=javascript:openwin(\'atlasohje.php#kaksi\')>indeksit 2-5</a>)<br/>6 Todennäköinen pesintä (<a href=javascript:openwin(\'atlasohje.php#kuusi\')>indeksit 6 ja 61-66</a>)<br/>7-8 Varma pesintä (<a href=javascript:openwin(\'atlasohje.php#seitseman\')>indeksit 7-8, 71-75 ja 81-82)</a><br/><br/>')" tabindex="16">
		
<option selected="selected" value="0">&nbsp;</option>
		<option onmouseover="javascript:ohje('Pesimävarmuusindeksi','1=Havaittu laji paikallisena pesimäaikaan, mutta lähes varmasti se ei pesi ruudussa. Luokkaan 1 luetaan ruudulla muuttomatkalla useaksi päiväksi pysähtyneet linnut, selvästi pesimättömät kiertelijät tai nuoret linnut, mutta ei ylimuuttavia tai muutolla lyhytaikaisesti lepäileviä lintuja.')" value="1">
			1		</option>
				<option onmouseover="javascript:ohje('Pesimävarmuusindeksi','2=Havaittu yksittäinen lintu kerran (esim. laulava tai soidinääntelevä koiras) lajille sopivassa pesimäympäristössä, ja lajin pesintä ruudussa on mahdollista. Paikalla on joko käyty vain kerran tai lintu on tavattu vain kerran useista käynneistä huolimatta.')" value="2">
			2		</option>
				<option onmouseover="javascript:ohje('Pesimävarmuusindeksi','3=Havaittu pari kerran sopivassa pesimäympäristössä, ja lajin pesintä ruudussa on mahdollista.')" value="3">
			3		</option>
				<option onmouseover="javascript:ohje('Pesimävarmuusindeksi','4=Havaittu laulava, soidinmenoja esittävä tai muuten samalla paikalla (eli pysyvällä reviirillä) oleskeleva koiras eri päivinä.')" value="4">
			4		</option>
				<option onmouseover="javascript:ohje('Pesimävarmuusindeksi','5=Havaittu samalla paikalla oleskeleva naaras tai pari eri päivinä.')" value="5">
			5		</option>
				<option onmouseover="javascript:ohje('Pesimävarmuusindeksi','6=Havaittu todiste todennäköisestä pesinnästä (ks. tarkemmin alaindeksit 61-66).')" value="6">
			6		</option>
				<option onmouseover="javascript:ohje('Pesimävarmuusindeksi','61=Havaittu lintu tai pari käymässä useasti todennäköisellä pesäpaikalla (esim. laskeutuvan säännöllisesti samaan paikkaan ruoikkoon tai saareen).')" value="61">
			61		</option>
				<option onmouseover="javascript:ohje('Pesimävarmuusindeksi','62=Havaittu lintu tai pari rakentamassa pesää (kaivamassa tai hakkaamassa pesäkoloa, kuljettamassa pesänrakennusmateriaalia tms.).')" value="62">
			62		</option>
				<option onmouseover="javascript:ohje('Pesimävarmuusindeksi','63=Havaittu lintu tai pari varoittelemassa, koska pesä tai poikue on ilmeisesti lähistöllä.')" value="63">
			63		</option>
				<option onmouseover="javascript:ohje('Pesimävarmuusindeksi','64=Havaittu lintu tai pari näyttelemässä siipirikkoa tai muulla tavoin houkuttelemassa havainnoijaa pois ilmeisen pesän tai poikueen luota.')" value="64">
			64		</option>
				<option onmouseover="javascript:ohje('Pesimävarmuusindeksi','65=Havaittu lintu tai pari hyökkäilemässä tai muulla tavoin käyttäytymässä uhkaavasti havainnoijaa kohtaan (esim. pöllöt ja tiirat).')" value="65">
			65		</option>
				<option onmouseover="javascript:ohje('Pesimävarmuusindeksi','66=Nähty pesä, jossa samanvuotista rakennusmateriaalia (esim. petolintujen koristellut pesät) tai ravintojätettä; ei kuitenkaan varmaa todistetta munista tai poikasista.')" value="66">
			66		</option>
				<option onmouseover="javascript:ohje('Pesimävarmuusindeksi','7=Havaittu epäsäuora todiste varmasta pesinnästä (ks. tarkemmin alaindeksit 71-75).')" value="7">
			7		</option>
				<option onmouseover="javascript:ohje('Pesimävarmuusindeksi','71=Havaittu epäsuora todiste varmasta pesinnästä: nähty pesä, jossa on pesitty samana vuonna, koska siinä munia tai niiden kuoria, jätteitä poikasista, sulkatuppien &quot;hilsettä&quot;, tms.')" value="71">
			71		</option>
				<option onmouseover="javascript:ohje('Pesimävarmuusindeksi','72=Havaittu epäsuora todiste varmasta pesinnästä: havaittu linnun menevän pesään tai lähtevän pesästä tavalla, joka selvästi viittaa pesimiseen (ei kuitenkaan nähty munia tai poikasia; esim. koloihin tai korkealle pesivät lajit).')" value="72">
			72		</option>
				<option onmouseover="javascript:ohje('Pesimävarmuusindeksi','73=Havaittu epäsuora todiste varmasta pesinnästä: havaittu juuri lentokykyiset poikaset tai untuvikot, jotka voidaan katsoa syntyneiksi ruudun alueella.')" value="73">
			73		</option>
				<option onmouseover="javascript:ohje('Pesimävarmuusindeksi','74=Havaittu epäsuora todiste varmasta pesinnästä: havaittu emo kantamassa ruokaa poikasille tai poikasten ulosteita; pesän voidaan katsoa olevan ruudun alueella.')" value="74">
			74		</option>
				<option onmouseover="javascript:ohje('Pesimävarmuusindeksi','75=Havaittu epäsuora todiste varmasta pesinnästä: nähty pesässä hautova emo.')" value="75">
			75		</option>
				<option onmouseover="javascript:ohje('Pesimävarmuusindeksi','8=Havaittu suora todiste varmasta pesinnästä (ks. tarkemmin alaindeksit 81-82).')" value="8">
			8		</option>
				<option onmouseover="javascript:ohje('Pesimävarmuusindeksi','81=Havaittu suora todiste pesinnästä: kuultu poikasten ääntelevän pesässä (esim. koloihin tai korkealle pesivät lajit).')" value="81">
			81		</option>
				<option onmouseover="javascript:ohje('Pesimävarmuusindeksi','82=Havaittu suora todiste pesinnästä: nähty pesä, jossa munia tai poikasia.')" value="82">
			82		</option>
		</select> <!-- atlasohjeen haku loppuu -->
</td>
</tr>
</tbody></table>
<span class="ilmootsikko">
	&nbsp;<a id="tallennelinkki" name="tallennelinkki" href="javascript:tallenteet()" onmouseover="javascript:ohje('Tall<b>e</b>nteet','Tästä linkistä lisäämään kuvia, kuvalinkki, videolinkki tai äänite.')" accesskey="e">Lisää tall<b>e</b>nne</a>
</span>
	
<div class="ruler"></div>

<table> <!-- havainnoijat alkaa -->
    <tbody><tr>
    <td class="right" valign="top" width="24%"> <!-- 171 -->
    <label for="kaverit" onmouseover="javascript:ohje('Rekisteröityneet havainnoijat','Anna rekisteröityneet havainnoijat viereisestä \'Muokkaa\'-linkistä. Voit etsiä uusia käyttäjiä \'Omat kaverit\'-linkistä.')">
    <span class="ilmootsikko">Rekisteröityneet havainnoijat</span></label>
    </td>
    <td width="57%"> <!-- 400 -->
	<!-- 20090417 AJL -->
    <!-- 20090720 AJL <input type="hidden" name="kaverinumerot" id="kaverinumerot" value="-?=trim($kaverit)?-"/>	-->
	<input readonly="readonly" name="kaverit" id="kaverit" style="width: 99%; color: gray;" value="" type="text">
    </td>
    <td valign="top" width="19%"> <!-- 150 -->
    <a href="javascript:haekaveri()" onmouseover="javascript:ohje('Muokkaa','Lisää rekisteröityneitä käyttäjiä havaintoon. Havainto näkyy tällöin kaikkien havainnoitsijoiden tileillä. Näppäinoikotie alt + s (enter).')" accesskey="s"><span class="ilmootsikko">Li<b>s</b>ää kaveri</span></a>&nbsp;&nbsp;
    <a href="javascript:tyhjennahavainnoijat()" onmouseover="javascript:ohje('Tyhjennä','Poista kaikki rekisteröityneet havainnoijat. Näppäinoikotie alt + t (enter).')" accesskey="t"><span class="ilmootsikko"><b>T</b>yhjennä</span></a>
<!--    <a href="javascript:omatkaverit()" onmouseover="javascript:ohje('Omat kaverit','Etsi uusia rekisteröityneitä käyttäjiä. Näppäinoikotie alt + o (enter).')" accesskey="o"><span class="ilmootsikko">Kaverihaku</span></a> -->
    </td>
    </tr>

<tr>
<td class="right" width="24%">
<label for="julk_kaverit" onmouseover="javascript:ohje('Muut havainnoijat','Muut kuin rekisteröityneet havainnoijat. Anna nimet muodossa \'Matti Meikäläinen, Maija Meikäläinen\' eli pilkulla erotettuna.')">
<span class="ilmootsikko">	
Muut havainnoijat</span>&nbsp;
</label>
</td>
	<!-- EI-REK HAVAINNOIJIEN NIMET ALKAA -->
<td>
<input name="julk_kaverit" id="julk_kaverit" onfocus="javascript:ohje('Muut havainnoijat','Muut kuin rekisteröityneet havainnoijat. Anna nimet muodossa \'Matti Meikäläinen, Maija Meikäläinen\' eli pilkulla erotettuna.')" style="width: 99%;" tabindex="17" type="text">
</td>
	<!-- EI-REK HAVAINNOIJIEN NIMET LOPPUU -->
<td valign="top">
    <a href="javascript:omatkaverit()" onmouseover="javascript:ohje('Omat kaverit','Etsi uusia rekisteröityneitä käyttäjiä. Näppäinoikotie alt + a (enter).')" accesskey="a"><span class="ilmootsikko">K<b>a</b>verihaku</span></a>
    </td>
</tr>
</tbody></table> <!-- havainnoijat loppuu -->
<div class="ruler"></div>

<center>
<!--<span class="submitbutton" onmouseover="javascript:ohje('Lähetä havainto','Ilmoita havainto')"><input name="f-submit" id="f-submit" value="Lähetä havainto" tabindex="18" type="submit"></span>-->
<!--
<span class="resetbutton" onmouseover="javascript:ohje('Tyhjenn&auml; lomake','Ohje...')"><input type="submit" name="lopeta" value="Tyhjenn&auml; lomake" /></span>
-->
</center><br>
</div> <!-- formcontainer -->
</form><br>

<script type="text/javascript">
<!--
ohje('','');
-->
</script>
		<script type="text/javascript">
		<!--
		ohje('','');
		-->
		</script>

		</div><div id="navi">	<div id="nav">
	<h2>Navigointi</h2>
	<a name="navi-a"></a> 
	<div id="normal">
	<ul>
	<li><a href="http://tiira.fi/index.php" id="etusivu">Etusivu</a></li>
	<li class="otsikko"><b>Ilmoita havainto</b>
	<ul>
	<li><a href="http://tiira.fi/index.php?toiminto=6" id="ilmoita">Peruslomake</a></li>
			<li class="noborder"><a href="http://tiira.fi/index.php?toiminto=6&amp;muutto=1" id="ilmoita2">Muuttolomake</a></li>
			</ul>
	</li>
	<li><a href="http://tiira.fi/index.php?toiminto=22">Omat paikat</a></li>
	<li><a href="javascript:omatkaverit()">Omat kaverit</a></li>	<!-- 20090827 AJL -->
    <li><a href="http://tiira.fi/index.php?toiminto=13" id="statistiikka">Tilastoja</a></li>
    <li class="otsikko"><b>Havaintoselain</b>
	<ul>
	<li><a href="http://tiira.fi/index.php?toiminto=8" id="hakukriteerit">Perushaku</a></li>
		<li><a href="http://tiira.fi/index.php?toiminto=29" id="advancedhaku">Laaja haku</a></li>
	<li><a href="http://tiira.fi/index.php?toiminto=55" id="ensihavainnot">Ensihavainnot</a></li>
	<li><a href="http://tiira.fi/index.php?toiminto=53" id="havaintosivut_alue">Ensihavainnot alue</a></li>
		<li><a href="http://tiira.fi/index.php?toiminto=17" id="omat_haut">Omat haut</a></li>
	<li><a href="http://tiira.fi/index.php?toiminto=18" id="admin_haut">Yhdistyshaut</a></li>
	<li><a href="http://tiira.fi/index.php?toiminto=19" id="uber_haut">Valtakunnan haut</a></li>
	<li class="noborder"><a href="http://tiira.fi/index.php?toiminto=48" id="havaintosivut">Havaintosivut</a></li>	
	       	</ul>
	</li>
	<li class="otsikko"><b>Lajinäyttö</b>
	<ul>
	<li><a href="http://tiira.fi/index.php?toiminto=7" id="etsitaksoni">Etsi laji</a></li>
	<li><a href="http://tiira.fi/index.php?toiminto=3" id="lajinaytto">Selaa lajeja</a></li>
	<li class="noborder"><a target="_blank" href="http://tiira.fi/rapot/taksonit.html" id="taksonilinkki">Taksoninimikkeet</a></li> <!-- 20120207 AJL -->
	</ul>
	</li>
        <li><a target="_blank" href="http://www.birdlife.fi/ohjeet/tiira_ohje_fi.pdf" id="ohjeet">Ohjeet</a></li>
	<!-- 20091222 AJL <li><a target="_blank" href="Tiira-bruksanvisning.html" id="svenska">Bruksanvisning</a></li> -->
	<li><a href="http://tiira.fi/index.php?toiminto=44" id="yhdistyskayttajat_nettiin">Yhdistyskäyttäjät</a></li>
	<li><a href="http://www.tiirafoorumi.info/keskustelu/phpBB3/index.php" target="_blank" id="foorumi">Foorumi</a></li>
	</ul>
    </div>
	
    <div id="footer">
    <p>© <a href="http://www.birdlife.fi/" target="_blank">BirdLife Suomi ry</a></p>
    <p>Ongelmia? Palautetta? Kysy  <a href="http://www.tiirafoorumi.info/keskustelu/phpBB3/index.php" target="_blank">foorumilta</a></p>
    </div>
</div>    
</div></div>


</body></html>
