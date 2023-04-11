// Éviter la soumission du formulaire si les champs ne sont pas valides
const form = document.querySelector('form');

form.addEventListener('submit', event => {
  event.preventDefault();

  // Parcourir tous les champs du formulaire
  const inputs = form.querySelectorAll('input');
  let formIsValid = true;
  inputs.forEach(input => {
    // Vérifier la longueur de la saisie, sauf si c'est le bouton de soumission
    if (input.type !== 'submit') {
      const error = input.nextSibling;
      if (input.value.length < 3) {
        error.textContent = 'La saisie doit contenir au moins 3 caractères';
        error.style.color = 'red';
        formIsValid = false;
      } else {
        error.textContent = '';
      }
    }

    // Vérifier l'attribut "id" de l'élément input
    if (input.getAttribute('id') === 'Type') {
      const value = input.value.toLowerCase();
      const error = input.nextSibling;
      if (value !== 'advanced' && value !== 'non advanced') {
        error.textContent = 'Le type doit être "Advanced" ou "Non advanced"';
        error.style.color = 'red';
        formIsValid = false;
      } else {
        error.textContent = '';
      }
    }

    // Vérifier si l'input avec l'id "file" contient seulement des lettres
    if (input.getAttribute('id') === 'file') {
      const regex = /^[a-zA-Z ]+$/;
      const error = input.nextSibling;
      if (!regex.test(input.value)) {
        error.textContent = 'Le champ ne doit contenir que des lettres';
        error.style.color = 'red';
        formIsValid = false;
      } else if (/\d/.test(input.value)) {
        error.textContent = 'Le champ ne doit pas contenir de chiffres';
        error.style.color = 'red';
        formIsValid = false;
      } else {
        error.textContent = '';
      }
    }
  });

  if (formIsValid) {
    form.submit();
  }
});

// Vérifier la longueur de la saisie en temps réel
form.addEventListener('input', event => {
  const input = event.target;
  if (input.type !== 'submit') {
    const error = input.nextSibling;
    if (input.value.length < 3) {
      error.textContent = 'La saisie doit contenir au moins 3 caractères';
      error.style.color = 'red';
    } else {
      error.textContent = '';
    }
  }

  // Vérifier l'attribut "id" de l'élément input
  if (input.getAttribute('id') === 'Type') {
    const value = input.value.toLowerCase();
    const error = input.nextSibling;
    if (value !== 'advanced' && value !== 'non advanced') {
      error.textContent = 'Le type doit être "Advanced" ou "Non advanced"';
      error.style.color = 'red';
    } else {
      error.textContent = '';
    }
  }

  // Vérifier si l'input avec l'id "file" contient des nombres
  if (input.getAttribute('id') === 'file') {
    const regex = /\d/;
    const error = input.nextSibling;
    if (regex.test(input.value)) {
      error.textContent = 'Le champ ne doit pas contenir de chiffres';
      error.style.color = 'red';
    } else {
      error.textContent = '';
    }
  }
});
