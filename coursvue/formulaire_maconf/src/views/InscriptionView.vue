<template>
  <div class="home">
    <h1>Inscription pour #MachinChose</h1>
    <form>
      <h4>Qui êtes vous ?</h4>

      <div>
        <fieldset>
          <label for="prenom">Prénom*</label><br>
          <input type="text" id="prenom" v-model="FirstName">
        </fieldset>

        <fieldset>
          <label for="nom">Nom*</label><br>
          <input type="text" name="nom" id="nom" v-model="LastName">
        </fieldset>
      </div>

      <fieldset>
        <label for="email">Email Adress*</label><br>
        <input type="email" name="email" id="email" v-model="Email">
      </fieldset>

      <fieldset>
        <label for="sexe">Sexe</label><br>
        <input type="radio" name="sexe" value="male" v-model="Sexe">
        <label for="male">Je suis un homme</label>
        <input type="radio" name="sexe" value="female" v-model="Sexe">
        <label for="female">Je suis une femme</label>
      </fieldset>

      <fieldset>
        <label for="institution">Institution*</label><br>
        <input type="text" name="institution" id="institution" v-model="Instituation">
      </fieldset>

      <div>
        <fieldset>
          <label for="adresse">Adresse*</label><br>
          <input type="text" name="adresse" id="adresse" v-model="Adresse">
        </fieldset>

        <fieldset>
          <label for="pays">Pays*</label><br>
          <input type="text" name="pays" id="pays" v-model="Pays">
        </fieldset>
      </div>

      <div>
        <fieldset>
          <label for="codepostal">Code Postal*</label><br>
          <input type="text" name="codepostal" id="codepostal" v-model="CodePostal">
        </fieldset>

        <fieldset>
          <label for="ville">Ville*</label><br>
          <input type="text" name="ville" id="ville" v-model="Ville">
        </fieldset>
      </div>

      <div>
        <fieldset>
          <label for="pageWebPerso">Page Web Personnalisé</label><br>
          <input type="text" name="pageWebPerso" id="pageWebPerso" v-model="PageWebPerso">
        </fieldset>

        <fieldset>
          <label for="pageWebInsti">Page Web institution</label><br>
          <input type="text" name="pageWebInsti" id="pageWebInsti" v-model="PageWebInsti">
        </fieldset>
      </div>

      <hr>

      <fieldset>
        <h2>Quelle inscription souhaitez-vous ?</h2>
        <input type="radio" name="inscription" value="etudiant" v-model="InscriptionSouhaite">
        <label for="etudiant">Étudiant (150 eur)</label><br />
        <input type="radio" name="inscription" value="academique" v-model="InscriptionSouhaite">
        <label for="academique">Académique (200 eur)</label><br />
        <input type="radio" name="inscription" value="entreprise" v-model="InscriptionSouhaite">
        <label for="entreprise">Entreprise (300 eur)</label><br />
      </fieldset>

      <hr>

      <fieldset>
        <h2>Quelle hébergement souhaitez-vous ?</h2>
        <input type="radio" name="hebergement" value="avec" v-model="Hebergement">
        <label for="etudiant">Avec réservation (150 eur)</label><br />
        <input type="radio" name="hebergement" value="sans" v-model="Hebergement">
        <label for="etudiant">Sans réservation (0 eur)</label>
      </fieldset>

      <hr>

      <button type="button" @click="ButtonPreInscri()">Pré-valider</button>

      <!-- Modale de confirmation -->
      <div v-if="showModal" class="modal">
        <div class="modal-content">
          <p>Bonjour {{ sexe === 'male' ? 'monsieur' : 'madame' }} {{ FirstName }} {{ LastName }},</p>
          <p>vous avez procédé à une inscription pour la conférence #Maconf2020</p>
          <p>Le détail de votre enregistrement est le suivant:</p>
          <ul>
            <li>Inscription choisie: {{ InscriptionSouhaite }}</li>
            <li>Hébergement choisi: {{ Hebergement }}</li>
          </ul>
          <p>Le montant est de {{ totalAmount }} EUR.</p>
          <p>Un email vous sera envoyé prochainement à cette adresse ({{ Email }}) pour la mise en paiement de votre inscription.</p>
          <p>Merci de consulter votre messagerie et de procéder au règlement de votre inscription.</p>
          <p>En vous remerciant de votre inscription, à très bientôt.</p>
          <button @click="confirm">Confirmer</button>
          <button @click="modify">Modifier les données</button>
        </div>
      </div>

    </form>
  </div>
</template>

<script>

export default {
  name: 'InscriptionView',
  data() {
    return {
      FirstName: '',
      LastName: '',
      Email: '',
      Sexe: '',
      Instituation: '',
      Adresse: '',
      Pays: '',
      CodePostal: '',
      Ville: '',
      PageWebPerso: '',
      PageWebInsti: '',
      InscriptionSouhaite: '',
      Hebergement: ''
    }
  },
  methods: {
    ButtonPreInscri() {
      this.totalAmount = 0;
      if(this.InscriptionSouhaite === 'etudiant') {
        this.totalAmount += 150;
      } else if(this.InscriptionSouhaite === 'academique') {
        this.totalAmount += 200;
      } else if(this.InscriptionSouhaite === 'entreprise') {
        this.totalAmount += 300;
      }

      if(this.Hebergement === 'avec') {
        this.totalAmount += 150;
      }
      
      this.showModal = true;
    },
    confirm() {
      // Traitement pour la confirmation
      this.showModal = false;
      console.log("Inscription confirmée");
    },
    modify() {
      // Traitement pour modifier les données
      this.showModal = false;
      console.log("Modification des données");
    }
  }
}
</script>

<style scoped lang="scss">
h1 {
  text-align: center;
}
form {
  width: 50%;
  margin: 0 auto;
  display: flex;
  flex-wrap: wrap;
  padding: 0 55px;
  box-sizing: border-box;

  hr {
    color: gray;
    width: 100%;
    font-size: 0.1em;
  }
  h4 {
    width:100%;
  }
  fieldset {
    width: 100%; 
    margin: 15px 0;

    border:none;
    input[type='text'], input[type='email'] {
      width: 100%;
      margin: 7px 0;
      border-radius: 7px;
      border: 1px solid gray;
      padding: 7px
    }
    input[type="radio"] {
      padding: 49px;
      margin: 15px;
      accent-color: #587af4;
    }
    #female {
      margin-left: 55px;
    }
    
  }
  button {
    cursor: pointer;
    padding: 10px;
    border-radius: 5px;
    border: none;
    background-color: #007aff;
    color: white;
    margin-top: 25px;
  }
  div {
    width: 100%;
    display: flex;
    fieldset {
      width: 50%;
    }
  }


}
</style>