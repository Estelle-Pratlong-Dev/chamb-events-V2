// ====================== ÉLÉMENTS DU FORMULAIRE =====================

const form = document.querySelector('#quote');
const choices = Array.from(form.querySelectorAll('input[name="Animations[]"]'));
const animationGroups = Array.from(form.querySelectorAll('.animation-choices details'));
const selectionSummary = document.querySelector('#animation-selection');
const eventSelect = document.querySelector('#event');
const params = new URLSearchParams(window.location.search);

// ====================== PRÉREMPLISSAGE =============================

// Préserve les choix transmis depuis l’accueil ou une fiche du catalogue.
const selectedEvent = params.get('evenement');
if (Array.from(eventSelect.options).some(option => option.value === selectedEvent)) {
  eventSelect.value = selectedEvent;
}

const selectedAnimation = params.get('animation');
if (selectedAnimation) {
  choices.forEach(choice => {
    if (choice.value === selectedAnimation) {
      choice.checked = true;
    }
  });
}

if (params.has('projet')) {
  form.querySelector('textarea[name="Projet"]').value = params.get('projet');
}

// ====================== ACCORDÉON DES ANIMATIONS ===================

// Une seule catégorie ouverte ; les cases restent cochées après fermeture.
// L’événement toggle complète le groupe natif details pour les anciens navigateurs.
animationGroups.forEach(group => {
  group.addEventListener('toggle', () => {
    if (!group.open) return;
    animationGroups.forEach(other => {
      if (other !== group) {
        other.open = false;
      }
    });
  });
});

// Affiche le nombre de choix par catégorie et le récapitulatif commun.
function updateAnimationSelection() {
  const selected = choices.filter(choice => choice.checked);
  selectionSummary.textContent = selected.length
    ? `${selected.length} choix : ${selected.map(choice => choice.value).join(', ')}`
    : 'Aucune animation sélectionnée pour le moment.';

  animationGroups.forEach(group => {
    const summary = group.querySelector('summary');
    const count = group.querySelectorAll('input:checked').length;
    summary.dataset.label ??= summary.textContent.trim();
    summary.textContent = summary.dataset.label + (count ? ` (${count})` : '');
  });
}

choices.forEach(choice => {
  choice.addEventListener('change', updateAnimationSelection);
});
updateAnimationSelection();

// Ouvre la catégorie d’un équipement précoché ou de l’univers demandé.
const preselectedGroup = choices.find(choice => choice.checked)?.closest('details');
const categoryGroup = animationGroups.find(group =>
  group.querySelector('summary').dataset.label === selectedAnimation
);
if (preselectedGroup || categoryGroup) {
  (preselectedGroup || categoryGroup).open = true;
}

// ====================== MESSAGE À OUVRIR DANS LA MESSAGERIE ========

// Prépare un mail : le visiteur doit encore l’envoyer depuis sa messagerie.
form.addEventListener('submit', event => {
  event.preventDefault();
  if (!form.reportValidity()) return;

  const data = new FormData(form);
  const lines = Array.from(data.entries())
    .filter(([key]) => key !== 'Animations[]')
    .map(([key, value]) => key + ' : ' + (value || 'À préciser'));
  const selected = data.getAll('Animations[]');
  lines.push('Animations souhaitées : ' + (selected.length ? selected.join(', ') : 'À définir ensemble'));

  const content = 'CHAMB EVENTS — Demande de devis\n\n' + lines.join('\n\n');
  const recipient = form.dataset.email;
  const subject = encodeURIComponent('CHAMB EVENTS — Demande de devis');
  const body = encodeURIComponent(content.replace(/\n/g, '\r\n'));

  document.querySelector('#form-status').textContent =
    'Votre message est préparé. Envoyez-le depuis votre messagerie. Si rien ne s’ouvre, contactez-nous avec le lien e-mail indiqué sur cette page.';
  window.location.href = `mailto:${recipient}?subject=${subject}&body=${body}`;
});
