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