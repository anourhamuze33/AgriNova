<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription Professionnel - AgriNova</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .inner-soft-shadow {
            box-shadow: inset 0 2px 6px rgba(0, 0, 0, 0.08);
        }

        input:focus,
        select:focus,
        textarea:focus {
            box-shadow: 0 0 0 3px rgba(76, 163, 113, 0.3);
        }

        /* Step circles */
        .step-circle {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 14px;
            background: #d1fae5;
            color: #065f46;
            border: 2px solid #2b8a53;
            transition: all 0.3s ease;
            flex-shrink: 0;
        }

        .step-circle.active {
            background: linear-gradient(135deg, #0c5e3d, #3ab37b);
            color: white;
            border-color: #0c5e3d;
            box-shadow: 0 4px 14px rgba(12, 94, 61, 0.35);
        }

        .step-circle.completed {
            background: #10b981;
            color: white;
            border-color: #059669;
        }

        /* Step content hidden by default */
        .step-content {
            display: none;
        }

        .step-content.active {
            display: block;
        }

        /* Upload zone */
        .upload-zone label {
            transition: all 0.2s ease;
        }

        .upload-zone.has-file label {
            border-color: #10b981 !important;
            background: linear-gradient(135deg, #f0fdf4, #ecfdf5) !important;
        }

        /* Role / type card */
        .type-card {
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .type-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(16, 185, 129, 0.2);
        }

        .type-card.selected {
            border-color: #10b981 !important;
            background: linear-gradient(135deg, #f0fdf4, #ecfdf5) !important;
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.2);
        }

        .type-card input[type="radio"] {
            display: none;
        }

        .type-checkmark {
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .type-card.selected .type-checkmark {
            opacity: 1;
        }

        /* Progress bar */
        .progress-line {
            height: 4px;
            background: #d1fae5;
            border-radius: 4px;
            flex: 1;
            margin: 0 8px;
            overflow: hidden;
        }

        .progress-fill {
            height: 100%;
            background: linear-gradient(90deg, #0c5e3d, #3ab37b);
            border-radius: 4px;
            width: 0%;
            transition: width 0.5s ease;
        }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center p-4 py-10">
    <div
        class="max-w-2xl w-full bg-[#f0f9f6] rounded-[2.5rem] shadow-[0_10px_25px_rgba(0,0,0,0.15),0_4px_6px_rgba(0,0,0,0.1)] overflow-hidden">

        <!-- Header — matches main style -->
        <div class="bg-gradient-to-r from-[#0c5e3d] to-[#3ab37b] p-6 border-b-[2px] border-[#9ee6b8]">
            <div class="flex flex-row items-center justify-between gap-4">
                <div class="flex items-center gap-4">
                    <div
                        class="w-16 h-16 bg-white rounded-full flex items-center justify-center shadow-inner border-[3px] border-[#4ca371]">
                        <!-- Leaf icon placeholder (replace with your plant1.png) -->
                        <svg class="w-9 h-9 text-[#0c5e3d] opacity-90" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                d="M5 3s1 9 7 11c2 .7 4 .5 6-.5M5 3c0 0 9 1 11 7 .7 2 .5 4-.5 6M5 3l14 14" />
                        </svg>
                    </div>
                    <div class="flex flex-col">
                        <h1 class="text-2xl font-bold text-white tracking-wide">Inscription Professionnel</h1>
                        <p class="text-emerald-100/90 text-xs font-medium">Rejoignez notre réseau agricole professionnel
                        </p>
                    </div>
                </div>
                <a href="/login"
                    class="text-emerald-100 hover:text-white text-sm font-medium transition flex items-center gap-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                    </svg>
                    Déjà inscrit ?
                </a>
            </div>
        </div>

        <!-- Progress Steps -->
        <div class="px-8 pt-6 pb-2">
            <div class="flex items-center">
                <!-- Step 1 -->
                <div class="flex flex-col items-center gap-1">
                    <div class="step-circle active" id="step1-circle">1</div>
                    <span class="text-[10px] font-semibold text-[#0c5e3d]" id="step1-label">Informations</span>
                </div>
                <div class="progress-line">
                    <div class="progress-fill" id="fill1"></div>
                </div>
                <!-- Step 2 -->
                <div class="flex flex-col items-center gap-1">
                    <div class="step-circle" id="step2-circle">2</div>
                    <span class="text-[10px] font-semibold text-gray-400" id="step2-label">Documents</span>
                </div>
                <div class="progress-line">
                    <div class="progress-fill" id="fill2"></div>
                </div>
                <!-- Step 3 -->
                <div class="flex flex-col items-center gap-1">
                    <div class="step-circle" id="step3-circle">3</div>
                    <span class="text-[10px] font-semibold text-gray-400" id="step3-label">Révision</span>
                </div>
            </div>
        </div>

        <!-- Form -->
        <form action="{{route('register')}}" method="POST" enctype="multipart/form-data" id="registrationForm"
            class="p-6 pt-4 space-y-0">
            @csrf
            <!-- ═══════════════ STEP 1 ═══════════════ -->
            <div class="step-content active" id="step1">
                <p
                    class="text-[#0a4d2e] font-semibold text-xs mb-4 uppercase tracking-wide border-t-2 border-[#9ee6b8] pt-4">
                    Type de Professionnel
                </p>

                <!-- Type cards -->
                <div class="grid grid-cols-2 gap-3 mb-5">
                    <label class="type-card selected block bg-white border-2 border-[#2b8a53] rounded-xl p-4 relative">
                        <input type="radio" name="role_id" value="1" checked onchange="selectType(this)">
                        <div class="flex flex-col items-center text-center gap-2">
                            <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center">
                                <svg class="w-6 h-6 text-[#0c5e3d]" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064" />
                                </svg>
                            </div>
                            <div>
                                <p class="font-bold text-[#0a4d2e] text-sm">Agriculteur</p>
                                <p class="text-xs text-gray-500 mt-0.5">Producteur agricole</p>
                            </div>
                        </div>
                        <div
                            class="type-checkmark absolute top-2 right-2 w-5 h-5 bg-green-600 rounded-full flex items-center justify-center">
                            <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                    </label>

                    <label class="type-card block bg-white border-2 border-[#2b8a53] rounded-xl p-4 relative">
                        <input type="radio" name="role_id" value="2" onchange="selectType(this)">
                        <div class="flex flex-col items-center text-center gap-2">
                            <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center">
                                <svg class="w-6 h-6 text-[#0c5e3d]" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                                </svg>
                            </div>
                            <div>
                                <p class="font-bold text-[#0a4d2e] text-sm">Gestionnaire de Stock</p>
                                <p class="text-xs text-gray-500 mt-0.5">Gestion et inventaire</p>
                            </div>
                        </div>
                        <div
                            class="type-checkmark absolute top-2 right-2 w-5 h-5 bg-green-600 rounded-full flex items-center justify-center">
                            <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                    </label>
                </div>

                <p
                    class="text-[#0a4d2e] font-semibold text-xs mb-3 uppercase tracking-wide border-t-2 border-[#9ee6b8] pt-4">
                    Informations Personnelles
                </p>

                <!-- Nom Complet -->
                <div class="flex items-center mb-3">
                    <label class="w-36 text-[#0a4d2e] font-bold text-sm flex-shrink-0">Nom Complet <span
                            class="text-red-500">*</span></label>
                    <input type="text" name="name" 
                        class="flex-1 bg-white border-2 border-[#2b8a53] rounded-xl px-3 py-2 inner-soft-shadow focus:outline-none transition-all"
                        placeholder="Mohamed Alami">
                </div>

                <!-- Email -->
                <div class="flex items-center mb-3">
                    <label class="w-36 text-[#0a4d2e] font-bold text-sm flex-shrink-0">Email <span
                            class="text-red-500">*</span></label>
                    <input type="email" name="email" 
                        class="flex-1 bg-white border-2 border-[#2b8a53] rounded-xl px-3 py-2 inner-soft-shadow focus:outline-none transition-all"
                        placeholder="contact@exemple.ma">
                </div>
                <!-- user_name -->
                <div class="flex items-center mb-3">
                    <label class="w-36 text-[#0a4d2e] font-bold text-sm flex-shrink-0">User Name <span
                            class="text-red-500">*</span></label>
                    <input type="text" name="user_name" 
                        class="flex-1 bg-white border-2 border-[#2b8a53] rounded-xl px-3 py-2 inner-soft-shadow focus:outline-none transition-all">
                </div>

                <!-- Téléphone -->
                <div class="flex items-center mb-3">
                    <label class="w-36 text-[#0a4d2e] font-bold text-sm flex-shrink-0">Téléphone <span
                            class="text-red-500">*</span></label>
                    <input type="tel" name="telephone" 
                        class="flex-1 bg-white border-2 border-[#2b8a53] rounded-xl px-3 py-2 inner-soft-shadow focus:outline-none transition-all"
                        placeholder="06 12 34 56 78">
                </div>

                <!-- Ville -->
                <div class="flex items-center mb-3">
                    <label class="w-36 text-[#0a4d2e] font-bold text-sm flex-shrink-0">Ville <span
                            class="text-red-500">*</span></label>
                    <select name="ville_id" 
                        class="flex-1 bg-white border-2 border-[#2b8a53] rounded-xl px-3 py-2 inner-soft-shadow focus:outline-none transition-all">
                        <option value="">Sélectionner une ville</option>
                        <option value="1">Casablanca</option>
                        <option value="2">Rabat</option>
                        <option value="3">Marrakech</option>
                        <option value="4">Fès</option>
                        <option value="5">Tanger</option>
                        <option value="6">Agadir</option>
                    </select>
                </div>

                <!-- Spécialités -->
                <div class="flex items-center mb-3" id="specialitesField">
                    <label class="w-36 text-[#0a4d2e] font-bold text-sm flex-shrink-0">Spécialités <span
                            class="text-red-500">*</span></label>
                    <input type="text" name="specialites"
                        class="flex-1 bg-white border-2 border-[#2b8a53] rounded-xl px-3 py-2 inner-soft-shadow focus:outline-none transition-all"
                        placeholder="Cultures maraîchères, céréales...">
                </div>

                <!-- Expérience & Tarif in 2 cols -->
                <div class="grid grid-cols-2 gap-3 mb-3">
                    <div class="flex flex-col gap-1">
                        <label class="text-[#0a4d2e] font-bold text-sm">Années d'Expérience <span
                                class="text-red-500">*</span></label>
                        <input type="number" name="annees_experience" min="0" 
                            class="bg-white border-2 border-[#2b8a53] rounded-xl px-3 py-2 inner-soft-shadow focus:outline-none transition-all"
                            placeholder="10">
                    </div>
                    <div class="flex flex-col gap-1">
                        <label class="text-[#0a4d2e] font-bold text-sm">Tarif Horaire (DH) <span
                                class="text-red-500">*</span></label>
                        <input type="number" name="tarif_horaire" min="0" step="50"
                            class="bg-white border-2 border-[#2b8a53] rounded-xl px-3 py-2 inner-soft-shadow focus:outline-none transition-all"
                            placeholder="500">
                    </div>
                </div>

                <p
                    class="text-[#0a4d2e] font-semibold text-xs mb-3 uppercase tracking-wide border-t-2 border-[#9ee6b8] pt-4">
                    Sécurité du Compte
                </p>

                <!-- Password -->
                <div class="flex items-center mb-3">
                    <label class="w-36 text-[#0a4d2e] font-bold text-sm flex-shrink-0">Mot de Passe <span
                            class="text-red-500">*</span></label>
                    <div class="flex-1 relative">
                        <input type="password" name="password" id="password"  minlength="8"
                            class="w-full bg-white border-2 border-[#2b8a53] rounded-xl px-3 py-2 pr-10 inner-soft-shadow focus:outline-none transition-all"
                            placeholder="Minimum 8 caractères">
                        <button type="button" onclick="togglePassword('password')"
                            class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-[#2b8a53]">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Confirm Password -->
                <div class="flex items-center mb-3">
                    <label class="w-36 text-[#0a4d2e] font-bold text-sm flex-shrink-0">Confirmer <span
                            class="text-red-500">*</span></label>
                    <div class="flex-1 relative">
                        <input type="password" name="password_confirmation" id="password_confirmation" 
                            class="w-full bg-white border-2 border-[#2b8a53] rounded-xl px-3 py-2 pr-10 inner-soft-shadow focus:outline-none transition-all"
                            placeholder="Confirmez le mot de passe">
                        <button type="button" onclick="togglePassword('password_confirmation')"
                            class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-[#2b8a53]">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- interventions en ligne -->
                <p
                    class="text-[#0a4d2e] font-semibold text-xs mb-3 uppercase tracking-wide border-t-2 border-[#9ee6b8] pt-4">
                    interventions en Ligne
                </p>
                <div class="bg-white border-2 border-[#2b8a53] rounded-xl p-4 mb-2">
                    <p class="text-[#0a4d2e] font-bold text-sm mb-3">Êtes-vous disponible pour des interventions à
                        distance ou sur site ?</p>
                    <div class="flex gap-6">
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="interventions" value="1" checked class="w-4 h-4 accent-[#10b981]">
                            <span class="text-gray-700 text-sm font-medium">Oui</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="interventions" value="0" class="w-4 h-4 accent-[#10b981]">
                            <span class="text-gray-700 text-sm font-medium">Non</span>
                        </label>
                    </div>
                </div>
            </div>

            <!-- ═══════════════ STEP 2 ═══════════════ -->
            <div class="step-content" id="step2">
                <p
                    class="text-[#0a4d2e] font-semibold text-xs mb-4 uppercase tracking-wide border-t-2 border-[#9ee6b8] pt-4">
                    Documents Justificatifs
                </p>

                <!-- Info banner -->
                <div class="bg-[#ecfdf5] border-2 border-[#9ee6b8] rounded-xl p-4 mb-5 flex items-start gap-3">
                    <svg class="w-5 h-5 text-[#0c5e3d] flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <div>
                        <p class="font-bold text-[#0a4d2e] text-sm">Documents requis</p>
                        <p class="text-xs text-[#065f46] mt-1">
                            Téléchargez vos documents pour vérification. Formats acceptés: PDF, JPG, PNG (max 5MB par
                            fichier).
                        </p>
                    </div>
                </div>
                <!-- Upload: Diplôme -->
                <div class="mb-4">
                    <label class="text-[#0a4d2e] font-bold text-sm block mb-2">
                        Diplôme / Attestation <span class="text-red-500">*</span>
                    </label>
                    <div class="upload-zone" id="uploadZone2">
                        <input type="file" name="diplome" id="diplome" class="hidden" accept=".pdf,.jpg,.jpeg,.png"
                            onchange="handleFileChange(this, 'uploadZone2', 'fileName2')">
                        <label for="diplome"
                            class="cursor-pointer flex items-center justify-center gap-4 p-5 bg-white border-2 border-dashed border-[#2b8a53] rounded-xl hover:border-[#0c5e3d] hover:bg-[#f0fdf4] transition">
                            <div
                                class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5 text-[#0c5e3d]" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-[#0a4d2e] font-semibold text-sm">Cliquez pour télécharger</p>
                                <p class="text-xs text-gray-400 mt-0.5" id="fileName2">PDF, JPG ou PNG — Max 5MB</p>
                            </div>
                        </label>
                    </div>
                </div>

                <!-- Upload: CIN -->
                <div class="mb-4">
                    <label class="text-[#0a4d2e] font-bold text-sm block mb-2">
                        Carte d'Identité Nationale
                        <span class="text-gray-400 font-normal text-xs">(optionnel)</span>
                    </label>
                    <div class="upload-zone" id="uploadZone3">
                        <input type="file" name="cin" id="cin" class="hidden" accept=".pdf,.jpg,.jpeg,.png"
                            onchange="handleFileChange(this, 'uploadZone3', 'fileName3')">
                        <label for="cin"
                            class="cursor-pointer flex items-center justify-center gap-4 p-5 bg-white border-2 border-dashed border-[#2b8a53] rounded-xl hover:border-[#0c5e3d] hover:bg-[#f0fdf4] transition">
                            <div
                                class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5 text-[#0c5e3d]" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-[#0a4d2e] font-semibold text-sm">Cliquez pour télécharger</p>
                                <p class="text-xs text-gray-400 mt-0.5" id="fileName3">PDF, JPG ou PNG — Max 5MB</p>
                            </div>
                        </label>
                    </div>
                </div>
            </div>

            <!-- ═══════════════ STEP 3 ═══════════════ -->
            <div class="step-content" id="step3">
                <p
                    class="text-[#0a4d2e] font-semibold text-xs mb-4 uppercase tracking-wide border-t-2 border-[#9ee6b8] pt-4">
                    Révision et Confirmation
                </p>

                <!-- Summary Card -->
                <div class="bg-white border-2 border-[#2b8a53] rounded-xl overflow-hidden mb-4">
                    <div class="bg-gradient-to-r from-[#0c5e3d] to-[#3ab37b] px-4 py-2">
                        <p class="text-white font-bold text-sm">Résumé de votre inscription</p>
                    </div>
                    <div class="p-4 space-y-2">
                        <div class="flex justify-between items-center py-2 border-b border-[#d1fae5]">
                            <span class="text-gray-500 text-sm">Type</span>
                            <span class="font-bold text-[#0a4d2e] text-sm" id="summary-type">Agriculteur</span>
                        </div>
                        <div class="flex justify-between items-center py-2 border-b border-[#d1fae5]">
                            <span class="text-gray-500 text-sm">Nom</span>
                            <span class="font-bold text-[#0a4d2e] text-sm" id="summary-nom">—</span>
                        </div>
                        <div class="flex justify-between items-center py-2 border-b border-[#d1fae5]">
                            <span class="text-gray-500 text-sm">Email</span>
                            <span class="font-bold text-[#0a4d2e] text-sm" id="summary-email">—</span>
                        </div>
                        <div class="flex justify-between items-center py-2 border-b border-[#d1fae5]">
                            <span class="text-gray-500 text-sm">Ville</span>
                            <span class="font-bold text-[#0a4d2e] text-sm" id="summary-ville">—</span>
                        </div>
                        <div class="flex justify-between items-center py-2 border-b border-[#d1fae5]">
                            <span class="text-gray-500 text-sm">Expérience</span>
                            <span class="font-bold text-[#0a4d2e] text-sm" id="summary-experience">—</span>
                        </div>
                        <div class="flex justify-between items-center py-2">
                            <span class="text-gray-500 text-sm">Tarif Horaire</span>
                            <span class="font-bold text-[#0a4d2e] text-sm" id="summary-tarif">—</span>
                        </div>
                    </div>
                </div>

                <!-- Documents Status -->
                <div class="bg-white border-2 border-[#2b8a53] rounded-xl overflow-hidden mb-4">
                    <div class="bg-gradient-to-r from-[#0c5e3d] to-[#3ab37b] px-4 py-2">
                        <p class="text-white font-bold text-sm">Documents téléchargés</p>
                    </div>
                    <div class="p-4 space-y-3">
                        <div class="flex items-center justify-between">
                            <span class="text-gray-600 text-sm">Diplôme</span>
                            <span id="doc-diplome" class="text-gray-400 text-sm flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg> Non téléchargé
                            </span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-gray-600 text-sm">CIN</span>
                            <span id="doc-cin" class="text-gray-400 text-sm flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg> Non téléchargé
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Validation info -->
                <div class="bg-[#ecfdf5] border-2 border-[#9ee6b8] rounded-xl p-4 mb-4 flex items-start gap-3">
                    <svg class="w-5 h-5 text-[#0c5e3d] flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <p class="text-xs text-[#065f46]">
                        Votre compte sera activé après vérification de vos documents par notre équipe.
                        Ce processus prend généralement <strong>24 à 48 heures</strong>.
                    </p>
                </div>

                <!-- Terms -->
                <label class="flex items-start gap-3 cursor-pointer bg-white border-2 border-[#2b8a53] rounded-xl p-4">
                    <input type="checkbox" id="terms" name="terms" 
                        class="w-4 h-4 mt-0.5 accent-[#10b981] rounded">
                    <span class="text-sm text-gray-600">
                        J'atteste sur l'honneur que les informations fournies sont exactes et j'accepte les
                        <a href="/terms" class="text-[#0c5e3d] font-semibold hover:underline">conditions
                            d'utilisation</a>
                        de la plateforme AgriNova.
                    </span>
                </label>
            </div>

            <!-- ═══════════════ NAV BUTTONS ═══════════════ -->
            <div class="pt-5 border-t-2 border-[#9ee6b8] mt-5 flex items-center justify-between gap-3">
                <button type="button" id="prevBtn" onclick="changeStep(-1)"
                    class="hidden px-5 py-2.5 border-2 border-[#2b8a53] text-[#0a4d2e] font-bold rounded-xl hover:bg-[#ecfdf5] transition flex items-center gap-2 text-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    Précédent
                </button>

                <div class="flex gap-3 ml-auto">
                    <a href="/login"
                        class="px-5 py-2.5 border-2 border-gray-300 text-gray-600 font-bold rounded-xl hover:bg-gray-50 transition text-sm">
                        Annuler
                    </a>
                    <button type="button" id="nextBtn" onclick="changeStep(1)"
                        class="bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 text-white font-bold px-6 py-2.5 rounded-xl shadow-lg transition transform hover:scale-[1.02] flex items-center gap-2 text-sm">
                        Suivant
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                    <button type="submit" id="submitBtn"
                        class="hidden bg-gradient-to-r
                               from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 text-white font-bold px-6 py-2.5 rounded-xl shadow-lg transition transform hover:scale-[1.02] flex items-center gap-2 text-sm">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                        </svg>
                        Soumettre ma demande
                    </button>
                </div>
            </div>

            <!-- Login link -->
            <div class="text-center pt-3">
                <p class="text-sm text-gray-600">
                    Vous avez déjà un compte ?
                    <a href="/login" class="text-green-600 font-semibold hover:text-green-700 hover:underline">
                        Se Connecter
                    </a>
                </p>
            </div>
        </form>
    </div>

    <!-- Decorative star -->
    <div class="fixed bottom-6 right-6 opacity-30 pointer-events-none">
        <svg width="50" height="50" viewBox="0 0 24 24" fill="none" class="text-emerald-700">
            <path d="M12 0L14.5 9.5L24 12L14.5 14.5L12 24L9.5 14.5L0 12L9.5 9.5L12 0Z" fill="currentColor" />
        </svg>
    </div>

    <script>
        let currentStep = 1;
        const totalSteps = 3;

        function changeStep(direction) {
            const newStep = currentStep + direction;
            if (newStep < 1 || newStep > totalSteps) return;
            // casher les pas actuelle
            document.getElementById('step' + currentStep).classList.remove('active');

            // changer le style des steps accomplis
            if (direction > 0) {
                const circle = document.getElementById('step' + currentStep + '-circle');
                circle.classList.remove('active');
                circle.classList.add('completed');
                circle.innerHTML = `<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                </svg>`;
                let fillStep = document.getElementById('fill' + currentStep)
                fillStep.style.width = '100%'
                document.getElementById('step' + currentStep + '-label').classList.add('text-[#10b981]');
                document.getElementById('step' + currentStep + '-label').classList.remove('text-[#0c5e3d]', 'text-gray-400');
            } else {
                const oldCircle = document.getElementById('step' + newStep + '-circle');
                oldCircle.classList.add('active');
                oldCircle.classList.remove('completed');
                oldCircle.textContent = newStep;
                let emptyStep = document.getElementById('fill' + newStep)
                emptyStep.style.width = '0%'
            }

            currentStep = newStep;

            document.getElementById('step' + currentStep).classList.add('active');
            const newCircle = document.getElementById('step' + currentStep + '-circle');
            newCircle.classList.add('active');
            newCircle.classList.remove('completed');
            newCircle.textContent = currentStep;
            document.getElementById('step' + currentStep + '-label').classList.remove('text-gray-400');
            document.getElementById('step' + currentStep + '-label').classList.add('text-[#0c5e3d]');

            // Show/hide buttons
            document.getElementById('prevBtn').classList.toggle('hidden', currentStep === 1);
            document.getElementById('nextBtn').classList.toggle('hidden', currentStep === totalSteps);
            document.getElementById('submitBtn').classList.toggle('hidden', currentStep !== totalSteps);

            // Populate summary on step 3
            if (currentStep === 3) populateSummary();
        }

        function populateSummary() {
            const type = document.querySelector('input[name="role_id"]:checked')?.value || '—';
            document.getElementById('summary-type').textContent = type.charAt(0).toUpperCase() + type.slice(1);
            document.getElementById('summary-nom').textContent = document.querySelector('input[name="nom"]')?.value || '—';
            document.getElementById('summary-email').textContent = document.querySelector('input[name="email"]')?.value || '—';
            document.getElementById('summary-ville').textContent = document.querySelector('select[name="ville_id"]')?.value || '—';
            const exp = document.querySelector('input[name="annees_experience"]')?.value;
            document.getElementById('summary-experience').textContent = exp ? exp + ' ans' : '—';
            const tarif = document.querySelector('input[name="tarif_horaire"]')?.value;
            document.getElementById('summary-tarif').textContent = tarif ? tarif + ' DH/h' : '—';

            updateDocStatus('diplome', 'doc-diplome', 'Diplôme');
            updateDocStatus('cin', 'doc-cin', 'CIN');
        }

        function updateDocStatus(inputId, spanId, label) {
            const input = document.getElementById(inputId);
            const span = document.getElementById(spanId);
            if (input?.files?.length > 0) {
                span.className = 'text-[#10b981] text-sm flex items-center gap-1 font-semibold';
                span.innerHTML = `<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg> Téléchargé`;
            } else {
                span.className = 'text-gray-400 text-sm flex items-center gap-1';
                span.innerHTML = `<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg> Non téléchargé`;
            }
        }

        function selectType(radio) {
            document.querySelectorAll('.type-card').forEach(c => c.classList.remove('selected'));
            radio.closest('.type-card').classList.add('selected');
        }

        function handleFileChange(input, zoneId, labelId) {
            const zone = document.getElementById(zoneId);
            const label = document.getElementById(labelId);
            if (input.files?.length > 0) {
                zone.classList.add('has-file');
                label.textContent = '✓ ' + input.files[0].name;
                label.classList.add('text-[#10b981]', 'font-semibold');
            } else {
                zone.classList.remove('has-file');
                label.textContent = 'PDF, JPG ou PNG — Max 5MB';
                label.classList.remove('text-[#10b981]', 'font-semibold');
            }
        }

        function togglePassword(inputId) {
            const input = document.getElementById(inputId);
            input.type = input.type === 'password' ? 'text' : 'password';
        }
    </script>
</body>

</html>