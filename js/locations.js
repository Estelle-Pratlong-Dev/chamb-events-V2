// ====================== DONNÉES DU CATALOGUE =======================

const photoDialog = document.querySelector('#photo-dialog');
const information = document.querySelector('#rental-information');
const dataUrl = new URL('../data/locations.json', document.currentScript.src);
const catalogue = document.querySelector('.photo') ? fetch(dataUrl).then(response => {
  if (!response.ok) throw new Error('Catalogue indisponible');
  return response.json();
}).catch(() => null) : Promise.resolve(null);
let openedPhoto = null;

// ====================== PHOTOS ET FICHES DÉTAILLÉES ================

// Ignore une réponse tardive si une autre fiche a été ouverte entre-temps.
document.querySelectorAll('.photo, .gallery-photo').forEach(button => {
  button.addEventListener('click', async () => {
    openedPhoto = button;
    const image = document.querySelector('#large-photo');
    image.hidden = !button.dataset.src;
    if (button.dataset.src) image.src = button.dataset.src;
    else image.removeAttribute('src');
    image.alt = button.dataset.title;
    document.querySelector('#photo-caption').textContent = button.dataset.title;
    information.replaceChildren();
    photoDialog.showModal();
    if (button.dataset.index === undefined) return;
    const records = await catalogue;
    if (openedPhoto !== button || !photoDialog.open) return;
    const item = records?.[Number(button.dataset.index)];
    if (item) {
      if (item.description) {
        const description = document.createElement('p');
        description.textContent = item.description;
        information.append(description);
      }
      const facts = document.createElement('dl');
      facts.className = 'rental-facts';
      const values = [
        ['Âge conseillé', item.age ? `${item.age} ans et +` : null],
        ['Nombre de joueurs max.', item.capacity],
        ['Hauteur', item.height], ['Largeur', item.width], ['Longueur', item.length],
        ['Tarif de départ', item.price ? `À partir de ${item.price} € HT` : null]
      ];
      values.forEach(([label, value]) => {
        if (value === undefined || value === null) return;
        const wrapper = document.createElement('div');
        const term = document.createElement('dt');
        const definition = document.createElement('dd');
        term.textContent = label;
        definition.textContent = value;
        wrapper.append(term, definition);
        facts.append(wrapper);
      });
      information.append(facts);
      if (item.price) {
        const note = document.createElement('p');
        note.className = 'rental-price-note';
        note.textContent =
          'Le tarif final dépend de la distance, des conditions et de la difficulté d’installation, ' +
          'de la durée de la prestation et des besoins spécifiques de votre événement. ' +
          'Un devis personnalisé précise le montant de la prestation.';
        information.append(note);
      }
    }
    const contact = document.createElement('a');
    contact.className = 'button';
    contact.href = 'contact.php?animation=' + encodeURIComponent(button.dataset.title);
    contact.textContent = 'Demander un devis';
    information.append(contact);
  });
});
// ====================== FILTRES DES LOCATIONS ======================

document.querySelectorAll('[data-filter]').forEach(button => {
  button.addEventListener('click', () => {
    document.querySelectorAll('[data-filter]').forEach(other => {
      other.classList.toggle('active', other === button);
      other.setAttribute('aria-pressed', String(other === button));
    });
    document.querySelectorAll('.photo').forEach(card => {
      card.hidden = button.dataset.filter !== 'Tous' && card.dataset.category !== button.dataset.filter;
    });
  });
});
