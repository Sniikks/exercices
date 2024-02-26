<template>
  <div class="inscription-container">
    <h1>Inscription pour #MaConf2020</h1>
    <div class="form-section">
      <h2>Qui êtes vous ?</h2>
      <form @submit.prevent="submitForm">
        <div class="form-row">
          <div class="form-field">
            <label for="prenom">Prénom*</label>
            <input type="text" id="prenom" v-model="form.prenom" required>
          </div>
          <div class="form-field">
            <label for="nom">Nom*</label>
            <input type="text" id="nom" v-model="form.nom" required>
          </div>
        </div>
        <div class="form-row">
          <div class="form-field full-width">
            <label for="email">Email address*</label>
            <input type="email" id="email" v-model="form.email" required>
          </div>
        </div>
        <div class="form-row">
          <div class="radio-group">
            <h3>Sexe</h3>
            <input type="radio" id="homme" value="homme" v-model="form.sexe">
            <label for="homme">Je suis un homme</label>
            <input type="radio" id="femme" value="femme" v-model="form.sexe">
            <label for="femme">Je suis une femme</label>
          </div>
        </div>
        <div class="form-section">
          <div class="form-row">
            <div class="form-field">
              <label for="institution">Institution*</label>
              <input type="text" id="institution" v-model="form.institution" required>
            </div>
            <div class="form-field">
              <label for="pays">Pays*</label>
              <input type="text" id="pays" v-model="form.pays" required>
            </div>
          </div>
          <div class="form-row">
            <div class="form-field">
              <label for="adresse">Adresse*</label>
              <input type="text" id="adresse" v-model="form.adresse" required>
            </div>
            <div class="form-field">
              <label for="ville">Ville*</label>
              <input type="text" id="ville" v-model="form.ville" required>
            </div>
          </div>
          <div class="form-row">
            <div class="form-field">
              <label for="code-postal">Code postal*</label>
              <input type="text" id="code-postal" v-model="form.codePostal" required>
            </div>
            <div class="form-field">
              <label for="page-web-personnelle">Page web personnelle</label>
              <input type="url" id="page-web-personnelle" v-model="form.pageWebPersonnelle">
            </div>
          </div>
          <div class="form-row">
            <div class="form-field full-width">
              <label for="page-web-institution">Page web institution</label>
              <input type="url" id="page-web-institution" v-model="form.pageWebInstitution">
            </div>
          </div>
        </div>      
  <div class="form-section">
    <h2>Quelle inscription souhaitez-vous ?</h2>
    <div class="radio-group">
      <input type="radio" id="etudiant" value="etudiant" v-model="form.typeInscription">
      <label for="etudiant">Étudiant (150 EUR)</label>
    </div>
    <div class="radio-group">
      <input type="radio" id="academique" value="academique" v-model="form.typeInscription">
      <label for="academique">Académique (200 EUR)</label>
    </div>
    <div class="radio-group">
      <input type="radio" id="entreprise" value="entreprise" v-model="form.typeInscription">
      <label for="entreprise">Entreprise (300 EUR)</label>
    </div>
  </div>

  <div class="form-section">
    <h2>Quel hébergement souhaitez-vous ?</h2>
    <div class="radio-group">
      <input type="radio" id="avec-reservation" value="avec" v-model="form.hebergement">
      <label for="avec-reservation">Avec réservation (150 EUR)</label>
    </div>
    <div class="radio-group">
      <input type="radio" id="sans-reservation" value="sans" v-model="form.hebergement">
      <label for="sans-reservation">Sans réservation (0 EUR)</label>
    </div>
  </div>

  <button type="submit" class="submit-button">Pré-valider</button>
      </form>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      form: {
        prenom: '',
        nom: '',
        email: '',
        sexe: '',
      }
    };
  },
  methods: {
    submitForm() {
      // Logique de soumission du formulaire
      console.log(this.form);
    }
  }
};
</script>

<style>
.inscription-container {
  max-width: 720px;
  margin: 0 auto;
  padding: 20px;
  font-family: 'Arial', sans-serif;
  background-color: #fff;
  color: #333;
}

h1 {
  font-size: 24px;
  text-align: center;
  margin-bottom: 30px;
}

.form-section h2 {
  font-size: 18px;
  margin-bottom: 20px;
  padding-bottom: 5px;
  border-bottom: 2px solid #eee;
}

.form-row {
  display: flex;
  flex-wrap: wrap;
  gap: 20px;
  margin-bottom: 10px;
}

.form-field {
  display: flex;
  flex-direction: column;
  flex-basis: calc(50% - 20px);
}

.form-field.half-width {
  flex: 1;
}

.form-field.full-width {
  flex: 0 0 100%;
}

.form-field label {
  font-size: 16px;
  margin-bottom: 5px;
}

.form-field input[type="text"],
.form-field input[type="email"],
.form-field input[type="url"] {
  padding: 10px;
  font-size: 14px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

.radio-group {
  display: flex;
  align-items: center;
  flex-wrap: wrap;
}

.radio-group label {
  font-size: 14px;
  margin-right: 15px;
  white-space: nowrap;
}

.radio-group input[type="radio"] {
  margin-right: 5px;
}

.submit-button {
  width: 18%;
  padding: 8px 20px;
  font-size: 16px;
  background-color: #007bff;
  color: white;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.submit-button:hover {
  background-color: #0056b3;
}

/* Media Query for smaller screens */
@media (max-width: 768px) {
  .form-row {
    flex-direction: column;
  }

  .form-field {
    flex-basis: 100%;
  }
}
</style>
