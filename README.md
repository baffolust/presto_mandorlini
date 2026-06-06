## IMPORTANTE ## 

**Swiper**
---

Dopo il clone è OBBLIGATORIO eseguire:

```bash
npm install
```
per installare _swiper_

Con il comando
```bash
npm run dev
```

viene lanciato anche il comando request swiper


**isRevisor**
---

Tutte le funzioni sono nel Dropdown menu sulla Navbar.
* "Dashboard Revisori" visibile solo a utenti revisori 
* "Diventa un revisore" visibile solo a utenti _non_ revisori
 

 **SCOUT + MEILISEARCH**
 ---

 La versione di laravel che sto utilizzando (v.13) non è compatibile con TNTsearch. Utilizzo MEILISEARCH
 Configurare .env così, ottenendo la chiave 

```bash
SCOUT_DRIVER=meilisearch
MEILISEARCH_HOST=http://127.0.0.1:7700
MEILISEARCH_KEY=
```

 **IMMAGINI**
 ---

 Caricare un'immagine col nome __Image_not_available.png__ nel percorso _storage/app/public/media/img_

  **CROP**
 ---

 Ho inserito un try/catch perché il job andava in errore e non capivo come mai. I log mostravano errori nel filename, con un paio di @dd() ho corretto il metodo handle ed ho risolto.

 Nel componennte  vista _article.byCategory_ è stata lasciato volutamente il metodo _Storage::url($article->images->first()->path)_ perché le card sono diverse ed è esteticamente più carino utilizzare le immagini intere.

  **GOOGLE VISION**
 ---

In attesa di ricevere la chiave __google_credential.json__ ne ho creata una mia su Google API, ma per usufruire del servizio GoogleVision è necessario associare una carta di credito infatti ricevo il messaggio di errore

local.ERROR: {
    "reason": "BILLING_DISABLED",
    "domain": "googleapis.com",}

Il codice dovrebbe però funzionare

  **CARICAMENTO MULTIPLO**
 ---

Caricando immagini multiple, si raggiunge il limite di chiamate API/minuto per utente. Il caricamento è testato e funziona, provate a testarlo con una chiave per una API pro. 
Altrimenti andrebbe cambiata la struttura del codice per utilizzare un solo JOB GoogleVision oer immagine (al momento sono 3 JOB GV per immagine caricata).