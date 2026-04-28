 function toggleCard(topEl) {
  const card = topEl.closest('.worker-card');
  const docs = card.querySelector('.wc-docs');
  const toggle = topEl.querySelector('.wc-toggle');
  const isOpen = docs.classList.contains('open');

  document.querySelectorAll('.wc-docs.open').forEach(d => {
    d.classList.remove('open');
    d.closest('.worker-card').querySelector('.wc-toggle').classList.remove('open');
  });
  if (!isOpen) {
    docs.classList.add('open');
    toggle.classList.add('open');
  }
}


document.addEventListener('DOMContentLoaded', () => {
    let valueType = document.querySelector('.hiddenType');
    const types = document.querySelectorAll('.btnType');

    types.forEach(type => {
        type.addEventListener('click', (e)=>{        
            valueType.value = e.target.dataset.type;
            console.log("clicked");
        });
    });
});