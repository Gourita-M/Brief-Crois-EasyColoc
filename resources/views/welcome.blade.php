<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer une Colocation - ColocManager</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/@heroicons/vue@2.0.13/24/outline/index.js" type="module"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .glass-effect {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
        }
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .slide-in {
            animation: slideIn 0.3s ease-out;
        }
        @keyframes slideIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .shake {
            animation: shake 0.5s cubic-bezier(.36,.07,.19,.97) both;
        }
        @keyframes shake {
            10%, 90% { transform: translate3d(-1px, 0, 0); }
            20%, 80% { transform: translate3d(2px, 0, 0); }
            30%, 50%, 70% { transform: translate3d(-4px, 0, 0); }
            40%, 60% { transform: translate3d(4px, 0, 0); }
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-900">

    <!-- Sidebar Navigation -->
   
    <!-- Main Content -->
    <div class="lg:ml-64 min-h-screen flex flex-col">
        <!-- Top Header -->
        <header class="bg-white border-b border-gray-200 sticky top-0 z-40">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
                <h1 class="text-2xl font-bold text-gray-900">Créer une Colocation</h1>
                <div class="flex items-center space-x-4">
                    <span class="text-sm text-gray-500">Étape <span id="currentStep">1</span> sur 3</span>
                    <div class="w-32 h-2 bg-gray-200 rounded-full overflow-hidden">
                        <div id="progressBar" class="h-full gradient-bg transition-all duration-500" style="width: 33%"></div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Form Content -->
        <main class="flex-1 max-w-4xl mx-auto w-full px-4 sm:px-6 lg:px-8 py-8">
            
            <!-- Alert Messages -->
            <div id="alertContainer" class="mb-6 hidden">
                <div class="rounded-md p-4 flex items-start space-x-3" id="alertBox">
                    <svg class="w-5 h-5 mt-0.5" fill="currentColor" viewBox="0 0 20 20" id="alertIcon"></svg>
                    <div class="flex-1">
                        <h3 class="text-sm font-medium" id="alertTitle"></h3>
                        <p class="text-sm mt-1" id="alertMessage"></p>
                    </div>
                    <button onclick="document.getElementById('alertContainer').classList.add('hidden')" class="text-gray-400 hover:text-gray-500">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                        </svg>
                    </button>
                </div>
            </div>

            <form id="createColocForm" class="space-y-8">
                
                <!-- Step 1: Basic Information -->
                <div id="step1" class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 slide-in">
                    <div class="flex items-center mb-6">
                        <div class="w-10 h-10 rounded-full gradient-bg flex items-center justify-center text-white font-bold text-lg mr-4">1</div>
                        <div>
                            <h2 class="text-lg font-semibold text-gray-900">Informations de base</h2>
                            <p class="text-sm text-gray-500">Définissez le nom et les détails principaux</p>
                        </div>
                    </div>

                    <div class="space-y-6">
                        <!-- Colocation Name -->
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                                Nom de la colocation <span class="text-red-500">*</span>
                            </label>
                            <input type="text" id="name" name="name" required
                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all"
                                placeholder="Ex: La Casa del Sol, Appartement Paris 11..."
                                onblur="validateField(this)">
                            <p class="mt-1 text-sm text-red-600 hidden" id="nameError">Le nom est requis (min. 3 caractères)</p>
                        </div>

                        <!-- Description -->
                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                                Description
                            </label>
                            <textarea id="description" name="description" rows="3"
                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all resize-none"
                                placeholder="Décrivez votre colocation, les règles de vie, etc."></textarea>
                            <p class="text-sm text-gray-500 mt-1 text-right"><span id="charCount">0</span>/500</p>
                        </div>

                        <!-- Address -->
                        <div>
                            <label for="address" class="block text-sm font-medium text-gray-700 mb-2">
                                Adresse <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <input type="text" id="address" name="address" required
                                    class="w-full px-4 py-3 pl-11 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all"
                                    placeholder="123 Rue de la Paix, 75000 Paris">
                                <svg class="w-5 h-5 text-gray-400 absolute left-3 top-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8 flex justify-end">
                        <button type="button" onclick="nextStep(2)" class="px-6 py-3 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all flex items-center">
                            Continuer
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Step 2: Settings -->
                <div id="step2" class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 hidden slide-in">
                    <div class="flex items-center mb-6">
                        <div class="w-10 h-10 rounded-full gradient-bg flex items-center justify-center text-white font-bold text-lg mr-4">2</div>
                        <div>
                            <h2 class="text-lg font-semibold text-gray-900">Paramètres financiers</h2>
                            <p class="text-sm text-gray-500">Configurez les options de partage</p>
                        </div>
                    </div>

                    <div class="space-y-6">
                        <!-- Currency Selection -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-3">Devise par défaut</label>
                            <div class="grid grid-cols-3 gap-3">
                                <label class="cursor-pointer relative">
                                    <input type="radio" name="currency" value="EUR" class="peer sr-only" checked>
                                    <div class="rounded-lg border-2 border-gray-200 p-4 hover:border-indigo-300 peer-checked:border-indigo-600 peer-checked:bg-indigo-50 transition-all text-center">
                                        <span class="text-2xl">€</span>
                                        <p class="text-sm font-medium mt-1">EUR</p>
                                    </div>
                                </label>
                                <label class="cursor-pointer relative">
                                    <input type="radio" name="currency" value="USD" class="peer sr-only">
                                    <div class="rounded-lg border-2 border-gray-200 p-4 hover:border-indigo-300 peer-checked:border-indigo-600 peer-checked:bg-indigo-50 transition-all text-center">
                                        <span class="text-2xl">$</span>
                                        <p class="text-sm font-medium mt-1">USD</p>
                                    </div>
                                </label>
                                <label class="cursor-pointer relative">
                                    <input type="radio" name="currency" value="GBP" class="peer sr-only">
                                    <div class="rounded-lg border-2 border-gray-200 p-4 hover:border-indigo-300 peer-checked:border-indigo-600 peer-checked:bg-indigo-50 transition-all text-center">
                                        <span class="text-2xl">£</span>
                                        <p class="text-sm font-medium mt-1">GBP</p>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <!-- Default Split Method -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-3">Méthode de partage par défaut</label>
                            <select name="split_method" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all">
                                <option value="equal">Part égale entre tous les membres</option>
                                <option value="percentage">Par pourcentage personnalisé</option>
                                <option value="amount">Par montant fixe</option>
                            </select>
                        </div>

                        <!-- Monthly Budget -->
                        <div>
                            <label for="budget" class="block text-sm font-medium text-gray-700 mb-2">
                                Budget mensuel estimé (optionnel)
                            </label>
                            <div class="relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <span class="text-gray-500 sm:text-sm">€</span>
                                </div>
                                <input type="number" name="budget" id="budget" 
                                    class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 py-3 sm:text-sm border-gray-300 rounded-lg" 
                                    placeholder="0.00">
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <span class="text-gray-500 sm:text-sm">EUR</span>
                                </div>
                            </div>
                        </div>

                        <!-- Categories -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-3">Catégories de dépenses</label>
                            <div class="space-y-2" id="categoriesList">
                                <div class="flex items-center space-x-2">
                                    <span class="w-3 h-3 rounded-full bg-red-500"></span>
                                    <input type="text" value="Loyer" class="flex-1 px-3 py-2 border border-gray-300 rounded-md text-sm" readonly>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <span class="w-3 h-3 rounded-full bg-blue-500"></span>
                                    <input type="text" value="Courses" class="flex-1 px-3 py-2 border border-gray-300 rounded-md text-sm" readonly>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <span class="w-3 h-3 rounded-full bg-green-500"></span>
                                    <input type="text" value="Factures" class="flex-1 px-3 py-2 border border-gray-300 rounded-md text-sm" readonly>
                                </div>
                            </div>
                            <button type="button" onclick="addCategory()" class="mt-3 text-sm text-indigo-600 hover:text-indigo-700 font-medium flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                </svg>
                                Ajouter une catégorie
                            </button>
                        </div>
                    </div>

                    <div class="mt-8 flex justify-between">
                        <button type="button" onclick="prevStep(1)" class="px-6 py-3 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all">
                            Retour
                        </button>
                        <button type="button" onclick="nextStep(3)" class="px-6 py-3 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all flex items-center">
                            Continuer
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Step 3: Invitations -->
                <div id="step3" class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 hidden slide-in">
                    <div class="flex items-center mb-6">
                        <div class="w-10 h-10 rounded-full gradient-bg flex items-center justify-center text-white font-bold text-lg mr-4">3</div>
                        <div>
                            <h2 class="text-lg font-semibold text-gray-900">Inviter des membres</h2>
                            <p class="text-sm text-gray-500">Ajoutez vos colocataires (optionnel)</p>
                        </div>
                    </div>

                    <div class="space-y-6">
                        <!-- Email Invites -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Inviter par email
                            </label>
                            <div class="flex space-x-2">
                                <input type="email" id="inviteEmail" 
                                    class="flex-1 px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all"
                                    placeholder="colocataire@exemple.com">
                                <button type="button" onclick="addInvite()" class="px-4 py-3 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                    </svg>
                                </button>
                            </div>
                            <p class="mt-1 text-sm text-gray-500">Les invitations seront envoyées après la création</p>
                        </div>

                        <!-- Invited List -->
                        <div id="invitedList" class="space-y-2">
                            <!-- Dynamic content -->
                        </div>

                        <!-- Info Box -->
                        <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 flex items-start space-x-3">
                            <svg class="w-5 h-5 text-blue-600 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                            </svg>
                            <div class="text-sm text-blue-800">
                                <p class="font-medium">Note importante</p>
                                <p class="mt-1">Chaque membre ne peut appartenir qu'à une seule colocation active à la fois. Les invitations expirent après 7 jours.</p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8 flex justify-between">
                        <button type="button" onclick="prevStep(2)" class="px-6 py-3 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all">
                            Retour
                        </button>
                        <button type="submit" onclick="submitForm(event)" class="px-8 py-3 gradient-bg text-white rounded-lg hover:opacity-90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all flex items-center shadow-lg transform hover:scale-105">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Créer la colocation
                        </button>
                    </div>
                </div>

            </form>
        </main>
    </div>

    <script>
        let currentStep = 1;
        const invitedEmails = [];

        // Character counter for description
        document.getElementById('description').addEventListener('input', function() {
            const count = this.value.length;
            document.getElementById('charCount').textContent = count;
            if (count > 500) {
                this.value = this.value.substring(0, 500);
                document.getElementById('charCount').textContent = 500;
            }
        });

        function validateField(field) {
            const errorEl = document.getElementById(field.id + 'Error');
            if (field.id === 'name' && field.value.length < 3) {
                errorEl.classList.remove('hidden');
                field.classList.add('border-red-500');
                return false;
            } else {
                errorEl.classList.add('hidden');
                field.classList.remove('border-red-500');
                return true;
            }
        }

        function nextStep(step) {
            // Validate current step
            if (currentStep === 1) {
                const nameField = document.getElementById('name');
                if (!validateField(nameField)) {
                    nameField.classList.add('shake');
                    setTimeout(() => nameField.classList.remove('shake'), 500);
                    return;
                }
            }

            // Hide current step
            document.getElementById('step' + currentStep).classList.add('hidden');
            
            // Show new step
            currentStep = step;
            document.getElementById('step' + currentStep).classList.remove('hidden');
            
            // Update progress
            updateProgress();
        }

        function prevStep(step) {
            document.getElementById('step' + currentStep).classList.add('hidden');
            currentStep = step;
            document.getElementById('step' + currentStep).classList.remove('hidden');
            updateProgress();
        }

        function updateProgress() {
            document.getElementById('currentStep').textContent = currentStep;
            const percentage = (currentStep / 3) * 100;
            document.getElementById('progressBar').style.width = percentage + '%';
        }

        function addCategory() {
            const colors = ['yellow', 'purple', 'pink', 'indigo', 'gray'];
            const randomColor = colors[Math.floor(Math.random() * colors.length)];
            const div = document.createElement('div');
            div.className = 'flex items-center space-x-2 slide-in';
            div.innerHTML = `
                <span class="w-3 h-3 rounded-full bg-${randomColor}-500"></span>
                <input type="text" placeholder="Nouvelle catégorie" class="flex-1 px-3 py-2 border border-gray-300 rounded-md text-sm focus:ring-2 focus:ring-indigo-500">
                <button type="button" onclick="this.parentElement.remove()" class="text-red-500 hover:text-red-700">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            `;
            document.getElementById('categoriesList').appendChild(div);
        }

        function addInvite() {
            const emailInput = document.getElementById('inviteEmail');
            const email = emailInput.value.trim();
            
            if (email && !invitedEmails.includes(email)) {
                invitedEmails.push(email);
                renderInvitedList();
                emailInput.value = '';
            }
        }

        function removeInvite(email) {
            const index = invitedEmails.indexOf(email);
            if (index > -1) {
                invitedEmails.splice(index, 1);
                renderInvitedList();
            }
        }

        function renderInvitedList() {
            const container = document.getElementById('invitedList');
            container.innerHTML = invitedEmails.map(email => `
                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg border border-gray-200 slide-in">
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 rounded-full bg-indigo-100 flex items-center justify-center">
                            <span class="text-indigo-600 font-medium text-sm">${email.charAt(0).toUpperCase()}</span>
                        </div>
                        <span class="text-sm font-medium text-gray-900">${email}</span>
                    </div>
                    <button type="button" onclick="removeInvite('${email}')" class="text-gray-400 hover:text-red-500 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            `).join('');
        }

        function showAlert(type, title, message) {
            const container = document.getElementById('alertContainer');
            const box = document.getElementById('alertBox');
            const icon = document.getElementById('alertIcon');
            
            container.classList.remove('hidden');
            
            if (type === 'success') {
                box.className = 'rounded-md p-4 flex items-start space-x-3 bg-green-50 border border-green-200';
                icon.className = 'w-5 h-5 mt-0.5 text-green-600';
                icon.innerHTML = '<path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>';
            } else {
                box.className = 'rounded-md p-4 flex items-start space-x-3 bg-red-50 border border-red-200';
                icon.className = 'w-5 h-5 mt-0.5 text-red-600';
                icon.innerHTML = '<path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>';
            }
            
            document.getElementById('alertTitle').textContent = title;
            document.getElementById('alertMessage').textContent = message;
            
            // Auto-hide after 5 seconds
            setTimeout(() => {
                container.classList.add('hidden');
            }, 5000);
        }

        function submitForm(e) {
            e.preventDefault();
            
            // Simulate form submission
            const submitBtn = document.querySelector('button[type="submit"]');
            const originalContent = submitBtn.innerHTML;
            submitBtn.disabled = true;
            submitBtn.innerHTML = `
                <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                Création en cours...
            `;
            
            // Simulate API call
            setTimeout(() => {
                showAlert('success', 'Colocation créée avec succès !', 'Vous allez être redirigé vers votre tableau de bord.');
                submitBtn.innerHTML = originalContent;
                submitBtn.disabled = false;
                
                // Redirect simulation
                setTimeout(() => {
                    window.scrollTo({ top: 0, behavior: 'smooth' });
                }, 2000);
            }, 1500);
        }

        // Handle Enter key in email input
        document.getElementById('inviteEmail').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                addInvite();
            }
        });
    </script>
</body>
</html>