        let currentStep = 1;
        const totalSteps = 3;

        function changeStep(direction) {
            const newStep = currentStep + direction;
            if (newStep < 1 || newStep > totalSteps) return;

            document.getElementById('step' + currentStep).classList.remove('active');

            if (direction > 0) {
                const sn = document.getElementById('sn' + currentStep);
                sn.classList.remove('active');
                sn.classList.add('done');
                sn.innerHTML = `<svg style="width:13px;height:13px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>`;
                document.getElementById('fill' + currentStep).style.width = '100%';
                const sl = document.getElementById('sl' + currentStep);
                sl.classList.remove('active');
                sl.classList.add('done');
            } else {
                const sn = document.getElementById('sn' + newStep);
                sn.classList.remove('done');
                sn.classList.add('active');
                sn.textContent = newStep;
                document.getElementById('fill' + newStep).style.width = '0%';
                document.getElementById('sl' + newStep).classList.remove('done');
            }

            currentStep = newStep;
            document.getElementById('step' + currentStep).classList.add('active');
            document.getElementById('sn' + currentStep).classList.add('active');
            document.getElementById('sn' + currentStep).textContent = currentStep;
            document.getElementById('sl' + currentStep).classList.add('active');

            document.getElementById('prevBtn').classList.toggle('hidden', currentStep === 1);
            document.getElementById('nextBtn').classList.toggle('hidden', currentStep === totalSteps);
            document.getElementById('submitBtn').classList.toggle('hidden', currentStep !== totalSteps);

            if (currentStep === 3) populateSummary();
        }

        function populateSummary() {
            const roleVal = document.querySelector('input[name="role_id"]:checked')?.value || '1';
            document.getElementById('sum-type').textContent = roleVal === '1' ? 'Agriculteur' : 'Gestionnaire de Stock';
            document.getElementById('sum-nom').textContent = document.querySelector('input[name="name"]')?.value || '—';
            document.getElementById('sum-user').textContent = document.querySelector('input[name="user_name"]')?.value || '—';
            document.getElementById('sum-email').textContent = document.querySelector('input[name="email"]')?.value || '—';
            const villeEl = document.querySelector('select[name="ville_id"]');
            document.getElementById('sum-ville').textContent = villeEl?.options[villeEl.selectedIndex]?.text || '—';
            const exp = document.querySelector('input[name="annees_experience"]')?.value;
            document.getElementById('sum-exp').textContent = exp ? exp + ' ans' : '—';
            const tarif = document.querySelector('input[name="tarif_horaire"]')?.value;
            document.getElementById('sum-tarif').textContent = tarif ? tarif + ' DH/h' : '—';
            updateDocStatus('diplome', 'doc-diplome');
            updateDocStatus('cin', 'doc-cin');
        }

        function updateDocStatus(inputId, spanId) {
            const input = document.getElementById(inputId);
            const span = document.getElementById(spanId);
            if (input?.files?.length > 0) {
                span.style.color = '#2d7a4f';
                span.style.fontWeight = '600';
                span.innerHTML = `<svg style="width:14px;height:14px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg> Téléchargé`;
            } else {
                span.style.color = '#9ca3af';
                span.style.fontWeight = '400';
                span.innerHTML = `<svg style="width:14px;height:14px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10" stroke-width="2"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01"/></svg> Non téléchargé`;
            }
        }

        function selectType(radio) {
            document.querySelectorAll('.type-card').forEach(c => c.classList.remove('selected'));
            radio.closest('.type-card').classList.add('selected');
        }

        function handleFileChange(input, zoneId, labelId) {
            const zone = document.getElementById(zoneId);
            const lbl = document.getElementById(labelId);
            if (input.files?.length > 0) {
                zone.classList.add('has-file');
                lbl.textContent = '✓ ' + input.files[0].name;
                lbl.style.color = '#2d7a4f';
                lbl.style.fontWeight = '600';
            } else {
                zone.classList.remove('has-file');
                lbl.textContent = 'PDF, JPG ou PNG — Max 2 MB';
                lbl.style.color = '';
                lbl.style.fontWeight = '';
            }
        }

        function togglePassword(inputId) {
            const input = document.getElementById(inputId);
            input.type = input.type === 'password' ? 'text' : 'password';
        }