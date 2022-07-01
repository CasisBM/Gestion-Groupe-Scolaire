    
  <?php
    if(isset($_SESSION['etablissement']) && !empty($_SESSION['etablissement']))
    {
      $sqlQuery = new Sql();
      $tblQuery = $sqlQuery->lister("SELECT nom_etablissement FROM etablissements WHERE id_etablissement = '".$_SESSION['etablissement']."'");
      $nomEtablissement = $tblQuery[0]['nom_etablissement'];
    }
    else
    {
      $nomEtablissement = "Nom de l'etablisssement";
    }

  ?>
    <header>
      <div id="search">
        <div id="btn_principal">
          <button id="btn_ecole"><?=$nomEtablissement?></button>
          <button onclick="location.href='index.php?page=choixEtablissement'">Accueil</button>
          <button onclick="location.href='index.php?page=listeProfesseur'" id="btn_prof">
            Professeurs
          </button>
          <button onclick="location.href='index.php?page=listePromotion'">Promotions</button>
          <button onclick="location.href='index.php?page=listeEleve'">Eleves</button>
          <button onclick="location.href='index.php?page=listeSalle'">Salles</button>
        </div>
        <div id="btn_last"><ul>
          <li>
            <button id="btn_admin">
              <div>
                <p>Admin</p>
                <p>Nom</p>
                <p>Prenom</p>
              </div>
            </button>
            <ul>
              <li>
                <button
                  id="btn_profil"
                  onclick="location.href='index.php?page=profile'"
                  id="profil"
                >
                  profil
                </button>
              </li>
              <li>
                <button
                  id="btn_de"
                  onclick="location.href=''"
                  id="déconn"
                >
                  Se déconnecter
                </button>
              </li>
            </ul>
          </li>
        </ul>
        </div>
      </div>
    </header>