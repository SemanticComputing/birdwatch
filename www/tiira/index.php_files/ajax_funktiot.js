/*
 * 20090715 AJL	Uusi tiedosto. Yleiset käsittelyfunktiot ajax-käyttöä varten.
 *				Mallit kopioitu www.ohjelmointiputka.net
 * 20090720 AJL	Uusi funktio: TarkistaJaAsetaHavainnoijat
 */

// Esitellään muuttuja XMLHTTPRequest-objektille: 
 var Pyynto; 

// Alustetaan Pyynto-muuttuja sopivalla tavalla riippuen käytettävästä selaimesta: 
function alustaPyynto() 
{ 
    // Jos käytettävä selain on Internet Explorer: 
    if(window.ActiveXObject) { 
        Pyynto = new ActiveXObject("Microsoft.XMLHTTP"); 
    } 
    // Jos käytettävä selain on jokin muu, esim. Mozilla, Opera, Safari: 
    else if(window.XMLHttpRequest) { 
        Pyynto = new XMLHttpRequest(); 
    }
    return Pyynto;	
}

// Käytetään POST-muuttujia tiedon välittämiseen palvelimelle 
function KasitteleSessiot(koodi,parametri,funktio,async_sync) 
{ 
// parametrit:	koodi 		= palvelimella ajettava koodi
//				parametri 	= kutsussa lähetettävät parametrit
//				funktio 	= tapahtumankäsittelijä
//				async_sync	= asynkrooninen vai synkrooninen ajotapa (=käytä true!)

    // Alustetaan ensin Pyynto-muuttuja kutsumalla edellä toteutettua funktiota: 
    alustaPyynto(); 

    // Määritellään funktio, joka suoritetaan, kun vastaus palvelimelta on saapunut: 
    // Funktio parametrina. Pyynto.onreadystatechange = kasitteleVastaus; 
    Pyynto.onreadystatechange = funktio; 	

    // Käytetään POST-muuttujia tiedon lähettämiseen asynkronisesti 
    // palvelimelle parametrin mukaiselle skriptille: 
    Pyynto.open("POST", koodi, async_sync); 

    // Asetaan HTTP-otsake kertomaan sisällön tyyppi: 
    Pyynto.setRequestHeader("Content-Type","application/x-www-form-urlencoded"); 
    // Lähetetään pyyntö palvelimelle: 
    Pyynto.send(parametri); 
}

// Funktio tarkistaa mahdollisen virheen. Muutoin ei tarvita toimia, kun muut tapahtuu palvelimella
function TarkistaVirhe() 
{ 
    // Tarkistetaan, onko pyyntö suoritettu kokonaan: 
    if(Pyynto.readyState == 4) { 
        // Tarkistetaan, onko pyynnön suoritus onnistunut: 
        if(Pyynto.status == 200) { 
            // Jos kaikki on kunnossa, käsitellään saapunut data: 
			; // Ei tehdä mitään
        } else { 
            alert("Funktion suorituksessa on tapahtunut virhe! [TarkistaVirhe]"); 
        } 
    } 
}

// Funktio tarkistaa mahdollisen virheen ja asettaa ilmoituslomakkeen havainnoitsijat. 
// 20090720 AJL Ei käytetä, kun ei toimi, jos seuraava kutsu on window.close. Pyyntö.status=0 aina!?
//				Haetaan nyt synkronisena ja siksi tätä ei käytetä. Pitäisi käyttää, jos
//				saadaan toimimaan.
function TarkistaJaAsetaHavainnoijat() 
{
    var win = window.opener;

    // Tarkistetaan, onko pyyntö suoritettu kokonaan: 
    if(Pyynto.readyState == 4) { 
        // Tarkistetaan, onko pyynnön suoritus onnistunut: 
        if(Pyynto.status == 200) { 
           // Jos kaikki on kunnossa, alustetaan näytöt kentät: 
           win.document.getElementById("havaintoilmoituslomake").kaverit.value=Pyynto.responseText;		   
		   window.close();
        } else { 
            alert("Funktion suorituksessa on tapahtunut virhe! [TarkistaJaAsetaHavainnoijat] "+Pyynto.status); 
        } 
    } 
}

// 20090715 AJL Tämä funktio ei käytössä. Esimerkki
function kasitteleVastaus() 
{ 
    // Tarkistetaan, onko pyyntö suoritettu kokonaan: 
    if(Pyynto.readyState == 4) { 
        // Tarkistetaan, onko pyynnön suoritus onnistunut: 
        if(Pyynto.status == 200) { 
            // Jos kaikki on kunnossa, käsitellään saapunut data: 
			// document.lomake.rivi.value = 
			alert(Pyynto.responseText);
        } else { 
            alert("Kyselyn suorituksessa on tapahtunut virhe!"); 
        } 
    } 
}

// Käytetään POST-muuttujia tiedon välittämiseen palvelimelle 
// 20090715 AJL Tämä funktio ei käytössä. Esimerkki
function suoritaPyynto(koodi,parametri,funktio) 
{ 
    // Alustetaan ensin Pyynto-muuttuja kutsumalla edellä toteutettua funktiota: 
    alustaPyynto(); 
    // Määritellään funktio, joka suoritetaan, kun vastaus palvelimelta on saapunut: 
    // Funktio parametrina. Pyynto.onreadystatechange = kasitteleVastaus; 
    Pyynto.onreadystatechange = funktio; 	

    // Käytetään POST-muuttujia tiedon lähettämiseen asynkronisesti 
    // palvelimelle parametrin mukaiselle skriptille: 
    Pyynto.open("POST", koodi, true); 
     
    // Asetaan HTTP-otsake kertomaan sisällön tyyppi: 
    Pyynto.setRequestHeader("Content-Type","application/x-www-form-urlencoded"); 
    // Lähetetään pyyntö palvelimelle: 
    Pyynto.send(parametri); 
}