/*
 * 20090715 AJL	Uusi tiedosto. Yleiset k�sittelyfunktiot ajax-k�ytt�� varten.
 *				Mallit kopioitu www.ohjelmointiputka.net
 * 20090720 AJL	Uusi funktio: TarkistaJaAsetaHavainnoijat
 */

// Esitell��n muuttuja XMLHTTPRequest-objektille: 
 var Pyynto; 

// Alustetaan Pyynto-muuttuja sopivalla tavalla riippuen k�ytett�v�st� selaimesta: 
function alustaPyynto() 
{ 
    // Jos k�ytett�v� selain on Internet Explorer: 
    if(window.ActiveXObject) { 
        Pyynto = new ActiveXObject("Microsoft.XMLHTTP"); 
    } 
    // Jos k�ytett�v� selain on jokin muu, esim. Mozilla, Opera, Safari: 
    else if(window.XMLHttpRequest) { 
        Pyynto = new XMLHttpRequest(); 
    }
    return Pyynto;	
}

// K�ytet��n POST-muuttujia tiedon v�litt�miseen palvelimelle 
function KasitteleSessiot(koodi,parametri,funktio,async_sync) 
{ 
// parametrit:	koodi 		= palvelimella ajettava koodi
//				parametri 	= kutsussa l�hetett�v�t parametrit
//				funktio 	= tapahtumank�sittelij�
//				async_sync	= asynkrooninen vai synkrooninen ajotapa (=k�yt� true!)

    // Alustetaan ensin Pyynto-muuttuja kutsumalla edell� toteutettua funktiota: 
    alustaPyynto(); 

    // M��ritell��n funktio, joka suoritetaan, kun vastaus palvelimelta on saapunut: 
    // Funktio parametrina. Pyynto.onreadystatechange = kasitteleVastaus; 
    Pyynto.onreadystatechange = funktio; 	

    // K�ytet��n POST-muuttujia tiedon l�hett�miseen asynkronisesti 
    // palvelimelle parametrin mukaiselle skriptille: 
    Pyynto.open("POST", koodi, async_sync); 

    // Asetaan HTTP-otsake kertomaan sis�ll�n tyyppi: 
    Pyynto.setRequestHeader("Content-Type","application/x-www-form-urlencoded"); 
    // L�hetet��n pyynt� palvelimelle: 
    Pyynto.send(parametri); 
}

// Funktio tarkistaa mahdollisen virheen. Muutoin ei tarvita toimia, kun muut tapahtuu palvelimella
function TarkistaVirhe() 
{ 
    // Tarkistetaan, onko pyynt� suoritettu kokonaan: 
    if(Pyynto.readyState == 4) { 
        // Tarkistetaan, onko pyynn�n suoritus onnistunut: 
        if(Pyynto.status == 200) { 
            // Jos kaikki on kunnossa, k�sitell��n saapunut data: 
			; // Ei tehd� mit��n
        } else { 
            alert("Funktion suorituksessa on tapahtunut virhe! [TarkistaVirhe]"); 
        } 
    } 
}

// Funktio tarkistaa mahdollisen virheen ja asettaa ilmoituslomakkeen havainnoitsijat. 
// 20090720 AJL Ei k�ytet�, kun ei toimi, jos seuraava kutsu on window.close. Pyynt�.status=0 aina!?
//				Haetaan nyt synkronisena ja siksi t�t� ei k�ytet�. Pit�isi k�ytt��, jos
//				saadaan toimimaan.
function TarkistaJaAsetaHavainnoijat() 
{
    var win = window.opener;

    // Tarkistetaan, onko pyynt� suoritettu kokonaan: 
    if(Pyynto.readyState == 4) { 
        // Tarkistetaan, onko pyynn�n suoritus onnistunut: 
        if(Pyynto.status == 200) { 
           // Jos kaikki on kunnossa, alustetaan n�yt�t kent�t: 
           win.document.getElementById("havaintoilmoituslomake").kaverit.value=Pyynto.responseText;		   
		   window.close();
        } else { 
            alert("Funktion suorituksessa on tapahtunut virhe! [TarkistaJaAsetaHavainnoijat] "+Pyynto.status); 
        } 
    } 
}

// 20090715 AJL T�m� funktio ei k�yt�ss�. Esimerkki
function kasitteleVastaus() 
{ 
    // Tarkistetaan, onko pyynt� suoritettu kokonaan: 
    if(Pyynto.readyState == 4) { 
        // Tarkistetaan, onko pyynn�n suoritus onnistunut: 
        if(Pyynto.status == 200) { 
            // Jos kaikki on kunnossa, k�sitell��n saapunut data: 
			// document.lomake.rivi.value = 
			alert(Pyynto.responseText);
        } else { 
            alert("Kyselyn suorituksessa on tapahtunut virhe!"); 
        } 
    } 
}

// K�ytet��n POST-muuttujia tiedon v�litt�miseen palvelimelle 
// 20090715 AJL T�m� funktio ei k�yt�ss�. Esimerkki
function suoritaPyynto(koodi,parametri,funktio) 
{ 
    // Alustetaan ensin Pyynto-muuttuja kutsumalla edell� toteutettua funktiota: 
    alustaPyynto(); 
    // M��ritell��n funktio, joka suoritetaan, kun vastaus palvelimelta on saapunut: 
    // Funktio parametrina. Pyynto.onreadystatechange = kasitteleVastaus; 
    Pyynto.onreadystatechange = funktio; 	

    // K�ytet��n POST-muuttujia tiedon l�hett�miseen asynkronisesti 
    // palvelimelle parametrin mukaiselle skriptille: 
    Pyynto.open("POST", koodi, true); 
     
    // Asetaan HTTP-otsake kertomaan sis�ll�n tyyppi: 
    Pyynto.setRequestHeader("Content-Type","application/x-www-form-urlencoded"); 
    // L�hetet��n pyynt� palvelimelle: 
    Pyynto.send(parametri); 
}