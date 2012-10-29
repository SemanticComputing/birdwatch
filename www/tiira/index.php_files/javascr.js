/*
 * 20090226 AJL	Paikan haku kartalta ikkunaan venytetty 30 pixeliä tarkkuustietojen vuoksi
 * 20090827 AJL Tuotu omatkaverit-funktio
 * 20100104	AJL	Kieliversion muutokset
 * 20100507 AJL Naytahavis -ikkunan venytys
 * 20101112 AJL Eriytetty iba ja yhdistyskäyttäjien käsittely
 * 20120103 AJL Uusi funktio: naytadokut()
 * 20120108 AJL Muutettu kaikki polkuviittaukset lähtemään www:n rootista.
 * 20120223 AJL haepaikka(): ikkunan korkeutta muutettu.
 * 20120418 AJL laskesumma(): ikkunan leveyttä ja sijaintia muutettu.  
 * 20120507 AJL tilapäisesti vanha kutsu csv_downloadiin. Saa korvata uudella  
 */

function kohdista()
{
document.forms[0].laji.focus();
}

/* kohdistaa kursorin vapaan päivämäärähaun ekaan tekstikenttään kun klikkaa ko. rivin radiobuttonia (advancedhaku.php, yhdistely.php) */
function kohdistapvm()
{
document.forms['paaformi'].paivamaara_a.focus();
}

/* kohdistaa kursorin aikaaluehaun ekaan tekstikenttään kun klikkaa ko. rivin radiobuttonia (advancedhaku.php) */
function kohdistapvm3()
{
document.forms[1].aikaalue1.focus();
}

function naytadokut(havainto_id) {
/* 20120103 AJL	Näytetään havainto_id:n tallenteet
 *
 */
    var url="/tallenteet/naytatallenteet.php?id="+havainto_id;
    var topvar = 20;
    // var leftvar = screen.width - 50;
    var leftvar = 50;
    window.open(url,"nayta_tallenne", "toolbar=no,location=no,directories=no,status=no, menubar=no, scrollbars=yes, resizable=yes,copyhistory=no,width=950, height=800, top="+topvar+", left="+leftvar+" ");
}

function naytahavis(idnum) /* NAYTTAA HAVIKSEN SELAIMESSA*/
{
    var url="/selain/naytahavis.php?id="+idnum;
    var topvar = 150;
    var leftvar = screen.width - 800;
    window.open(url,"uusi_ikkuna", "toolbar=no,location=no,directories=no,status=no, menubar=no, scrollbars=yes, resizable=yes,copyhistory=no,width=650, height=400, top="+topvar+", left="+leftvar+" ");
}

function naytamuokkaus(idnum) 
{
    var url="/yhdistys/naytamuokkaus.php?id="+idnum;
    var topvar = 150;
    var leftvar = screen.width - 800;
    window.open(url,"uusi_ikkuna", "toolbar=no,location=no,directories=no,status=no, menubar=no, scrollbars=yes, resizable=yes,copyhistory=no,width=580, height=400, top="+topvar+", left="+leftvar+" ");
}


function naytahavis2() /*NÄYTTÄÄ HAVIKSEN SELAIMESSA*/
{
 window.close();
}


function kartalle(idnum) /*NÄYTTÄÄ HAVIKSEN KARTALLA*/
{
      var url = "/kartta/kartalle/?bid="+idnum;
      /* var topvar = 150; */
      /* var leftvar = screen.width - 800; */
      window.open(url,"kartalle", "toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, copyhistory=no, width=630, height=600");
}

function kartalle_kaikki(params) /*NÄYTTÄÄ HAVIKSEN KARTALLA*/
{
      var url = "/kartta/kartalle/" + params;
      /* var topvar = 150; */
      /* var leftvar = screen.width - 800; */
      window.open(url,"kartalle", "toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, copyhistory=no, width=750, height=600");
}

function csv_omat(params) /*CSV LUONTI OMISTA HAVAINNOISTA*/
{
      var url = "/csv_omat.php" + params;
      // var url = "../csvdown_param.php" + params;	  
      /* var topvar = 150; */
      /* var leftvar = screen.width - 800; */
      window.open(url,"csv_omat", "toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, copyhistory=no, width=750, height=600");
}

/* hakujen tallennus */
/* TÄTÄ EI NYKYÄÄN KÄYTETÄ
function tallenna_haku(params)
{
      var url = "tallennahaku.php" + params;
      window.open(url,"tallenna_haku", "toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, copyhistory=no, width=750, height=600");	
}
*/

function csv_yhdistys(params) /*CSV LUONTI YHDISTYKSEN HAVAINNOISTA*/
{
      var url = "/yhdistys/logitus.php" + params;
      /* var topvar = 150; */
      /* var leftvar = screen.width - 800; */
      window.open(url,"csv_omat", "toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, copyhistory=no, width=750, height=600");
}
			

function haepaikka() /*PAIKAN HAKU KARTALTA*/
{
      window.open("/kartta/haepaikka/","haepaikka", "toolbar=no, location=no, directories=no, status=yes, menubar=no, scrollbars=yes, resizable=yes, copyhistory=no, width=930, height=620");
}



function poistanimi(idnum,havid,messu)
{
	if(typeof messu == 'undefined') { /* 20091231 AJL tämä siksi, jos sattuu löytymään jostakin */
        messu = 'Poista oma nimi havainnosta';
    }
 var ok = confirm(messu+"?");
 if(ok == true)
       {
	 document.location = "/poistanimi.php?id=" + idnum + "&hav_rek_id=" +havid;
       }
}

function poistahavainto(idnum,havid,messu)
{
	if(typeof messu == 'undefined') { /* 20091231 AJL tämä siksi, jos sattuu löytymään jostakin */
        messu = 'Poista havainto';
    }
 var ok = confirm(messu+"?");
  if(ok == true)
         {
          document.location = "/poistahavainto.php?id=" + idnum + "&hav_rek_id=" +havid;
       }
}

function poistahaku(id,messu)
{
	if(typeof messu == 'undefined') { /* 20091231 AJL tämä siksi, jos sattuu löytymään jostakin */
        messu = 'Poista haku';
    }
 var ok = confirm(messu+"?");
   if(ok == true)
         {
          document.location = "/poistahaku.php?id=" + id;
       }
}

function omatkaverit() /*20090827 AJL*/
{
	ikkuna = window.open("/kaverihaku.php","kaveri", "toolbar=no, location=no, directories=no, status=yes, menubar=no, scrollbars=yes, resizable=yes, copyhistory=no, width=700, height=600");
	ikkuna.moveTo(100,100);
}        

function naytalaji(idnum,laji) /*NÄYTTÄÄ LAJITIEDOT*/
{
      var url = "/taksonomia/naytalaji.php?id="+idnum+"&laji="+laji;
      var topvar = 150;
      var leftvar = screen.width - 900;
window.open(url,"uusi_ikkuna","toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=yes,copyhistory=no,width=850,height=740,top="+topvar+",left="+leftvar+" ");
}

function checkall(formname,checkname,thestate) { /* valitsee ja poistaa kaikki ruksit, yhdistely käyttää */
	var el_collection=eval("document.forms."+formname+"['"+checkname+"']")
	if (!el_collection.length) { /* jos vain yksi hakutulos niin tällä kräkillä hoidetaan */
	   document.getElementById("yhdissele0").checked=thestate;
	}
	for (c=0; c < el_collection.length; c++) el_collection[c].checked=thestate   	
}

function laskesumma() { /* laskee havisten summan, selain+yhdistysselain*/
/*  20120418 AJL Ikkunan sijainti ja koko
 */
	window.open("/havaintojensumma.php","havaintojensumma","toolbar=no,location=no,directories=no, status=yes, menubar=no,scrollbars=yes, resizable=yes,copyhistory=no, width=400, height=90, top=200, left=200");
	// window.open("/havaintojensumma.php","havaintojensumma", "toolbar=no,location=no, directories=no, status=yes, menubar=no, scrollbars=yes,	resizable=yes, copyhistory=no, width=230, height=100");
}
	
function koord_rajaus() { /* KOORDINAATTIEN RAJAUS KARTALTA*/
        window.open("/kartta/koord_rajaus/","haepaikka", "toolbar=no,location=no, directories=no, status=yes, menubar=no, scrollbars=yes,resizable=yes, copyhistory=no, width=900, height=600");
}

function poistakoordinaatit() {
       window.open("/poistakoordinaatit.php","poistakoordinaatit", "toolbar=no, location=no, directories=no, status=yes,	menubar=no, scrollbars=yes, resizable=yes, copyhistory=no,width=900, height=600");
}

function poistayhdistyskayttaja(kayttaja_id,yhdistys_id) {
/* 20101112 AJL */
	 var ok = confirm("Haluatko varmasti poistaa yhdistyskäyttäjäoikeuden?");
   	 if(ok == true) {
	      document.location =
	      "/muutayhdistyskayttajia_execute.php?kayttaja_id=" + kayttaja_id + "&yhdistys_id=" + yhdistys_id;
	 }
}

function poistaibakayttaja(kayttaja_id,yhdistys_id) {
/* 20101112 AJL */
	var ok = confirm("Haluatko varmasti poistaa IBA-käyttäjäoikeuden?");
   	if(ok == true) {
	      document.location =
	      "/muutaibakayttajia_execute.php?kayttaja_id=" + kayttaja_id + "&yhdistys_id=" + yhdistys_id;
	 }
}
