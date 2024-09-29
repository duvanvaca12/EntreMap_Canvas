
<div id="form_success" style="background-color:green; color:#fff;"></div>
<div id="form_error" style="background-color:red; color:#fff;"></div>

<div class="form-style">
      <form id="enquiry_form" style="display:none;">
            <?php wp_nonce_field('wp_rest');?>



      <div class="flex justify-center items-center h-screen">
            <div class="w-full max-w-3xl mx-6  bg-white p-8 shadow-md rounded-lg transition-all duration-500 ease-in-out transform">
                  
                  <!-- Form Step 1 -->
                  <div id="step-1" class="space-y-8 step active transition-opacity duration-500 ease-in-out">
                        <div class="text-center mb-6 space-y-4">
                              <h1 class="text-3xl font-semibold">Welcome to the Entremap Canvas</h1>
                              <p class="text-gray-500">let's start with the <strong>10 Steps</strong> of the Entreprenurial model</p>
                        </div>
                        <div class="flex justify-center">
                              <button class="bg-emerald-800 text-white px-6 py-3 rounded-lg focus:outline-none transition-transform hover:scale-105" onclick="nextStep()">Get Started</button>
                        </div>
                        <div class="flex justify-center mt-4 space-x-1">
                              <div class="w-3 h-3 bg-emerald-900 rounded-full"></div>
                              <div class="w-3 h-3 bg-gray-300 rounded-full"></div>
                              <div class="w-3 h-3 bg-gray-300 rounded-full"></div>
                              <div class="w-3 h-3 bg-gray-300 rounded-full"></div>
                        </div>
                        </div>


                  <!-- Problem Opportunity - PT2 -->
                  <div id="step-2" class="max-w-3xl step hidden opacity-0 transition-opacity duration-500 ease-in-out">
                        <div class="text-center mb-6">
                              <h1 class="text-2xl font-semibold mb-4">Problem / Opportunity</h1>
                              <p class="text-gray-500">When/where does the problem/opportunity occur and what causes it?</p>
                        </div>
                        <div class="mb-4">
                              <label for="name-input" class="block text-gray-700 mb-2">What do customers do to fix the problem?</label>
                              <input id="name-input" type="text" class="w-full p-3 border rounded-md" />
                        </div>

                        <div class="mb-4">
                              <label for="phone-input" class="block text-gray-700 mb-2">What is the emotional and measurable impact of the problem (with units)?</label>
                              <input id="phone-input" type="text" class="w-full p-3 border rounded-md" />
                        </div>

                        <div class="mb-4">
                              <label for="email-input" class="block text-gray-700 mb-2">What are the disadvantages of the alternatives?</label>
                              <input id="email-input" type="text" class="w-full p-3 border rounded-md" />
                        </div>

                        <div class="mb-4">
                              <label for="message-input" class="block text-gray-700 mb-2">Will customers pay for it? If not, who will?</label>
                              <input id="message-input" type="text" class="w-full p-3 border rounded-md" />
                        </div>
                        <div class="flex justify-between">
                              <button class="bg-gray-300 text-gray-700 px-6 py-3 rounded-lg focus:outline-none transition-transform hover:scale-105" onclick="prevStep()">Back</button>
                              <button class="bg-emerald-900 text-white px-6 py-3 rounded-lg focus:outline-none transition-transform hover:scale-105" onclick="nextStep()">Next</button>
                        </div>
                        <div class="flex justify-center mt-4 space-x-1">
                              <div class="w-3 h-3 bg-gray-300 rounded-full"></div>
                              <div class="w-3 h-3 bg-emerald-900 rounded-full"></div>
                              <div class="w-3 h-3 bg-gray-300 rounded-full"></div>
                              <div class="w-3 h-3 bg-gray-300 rounded-full"></div>
                        </div>
                  </div>

                  <!-- Step #3 -->
                  <div id="step-3" class="max-w-3xl step hidden opacity-0 transition-opacity duration-500 ease-in-out">
                        <div class="text-center mb-6">
                              <h1 class="text-2xl font-semibold mb-4">Customer Segments</h1>
                              <p class="text-gray-500"> Segment your beachhead market - customers/users who have the problem/use similar services/buy similar products, in similar sales cycles expecting similar value <br> (new canvas for each customer segment): </br> </p>
                        </div>
                        <div class="mb-4">
                              <label for="email" class="block text-gray-700 mb-2">List the characteristics of your ideal customers</label>
                              <textarea id="email" type="email" class="w-full p-3 border rounded-md"></textarea>
                        </div>

                        <div class="mb-4">
                              <label for="email" class="block text-gray-700 mb-2">Demographic/Geographic/Psychographic/Behavioural characteristics?</label>
                              <textarea id="email" type="email" class="w-full p-3 border rounded-md"></textarea>
                        </div>

                        <div class="mb-4">
                              <label for="email" class="block text-gray-700 mb-2">Who are your Customer and End-User Personas?</label>
                              <textarea id="email" type="email" class="w-full p-3 border rounded-md"></textarea>
                        </div>

                        <div class="mb-4">
                              <label for="email" class="block text-gray-700 mb-2">Calculate TAM/SAM/SOM</label>
                              <input id="email" type="number" class="w-full p-3 border rounded-md" />
                        </div>

                        <div class="mb-4">
                              <label for="email" class="block text-gray-700 mb-2">List your first 10 customers</label>
                              <textarea id="email" type="email" class="w-full p-3 border rounded-md"></textarea>
                        </div>
                        <div class="flex justify-between">
                              <button class="bg-gray-300 text-gray-700 px-6 py-3 rounded-lg focus:outline-none transition-transform hover:scale-105" onclick="prevStep()">Back</button>
                              <button class="bg-emerald-900 text-white px-6 py-3 rounded-lg focus:outline-none transition-transform hover:scale-105" onclick="nextStep()">Next</button>
                        </div>
                        <div class="flex justify-center mt-4 space-x-1">
                              <div class="w-3 h-3 bg-gray-300 rounded-full"></div>
                              <div class="w-3 h-3 bg-emerald-900 rounded-full"></div>
                              <div class="w-3 h-3 bg-gray-300 rounded-full"></div>
                              <div class="w-3 h-3 bg-gray-300 rounded-full"></div>
                        </div>
                  </div>

                  <!-- Part #4 -->
                  <div id="step-4" class="max-w-3xl step hidden opacity-0 transition-opacity duration-500 ease-in-out">
                  <div class="text-center mb-6">
                        <h1 class="text-2xl font-semibold mb-4">Unique Value</h1>
                        <p class="text-gray-500">SSingle, clear, compelling message to convert prospects. </p>
                  </div>
                  <div class="mb-4">
                        <label for="email" class="block text-gray-700 mb-2">Full Life Cycle Use Case</label>
                        <textarea id="email" type="email" class="w-full p-3 border rounded-md"></textarea>
                  </div>

                  <div class="mb-4">
                        <label for="email" class="block text-gray-700 mb-2">Customer’s Decision-Making Unit/s</label>
                        <textarea id="email" type="email" class="w-full p-3 border rounded-md"></textarea>
                  </div>

                  <div class="mb-4">
                        <label for="email" class="block text-gray-700 mb-2">QUANTIFIED VALUE PROPOSITION (for each DMU/Stakeholder)</label>
                        <textarea id="email" type="email" placeholder="e.g., installing your widget in the production line will reduce the number of sick leave days from 12 to 6 per year per person, saving $42,840." class="w-full p-3 border rounded-md"></textarea>
                  </div>

                  <div class="flex justify-between">
                        <button class="bg-gray-300 text-gray-700 px-6 py-3 rounded-lg focus:outline-none transition-transform hover:scale-105" onclick="prevStep()">Back</button>
                        <button class="bg-emerald-900 text-white px-6 py-3 rounded-lg focus:outline-none transition-transform hover:scale-105" onclick="nextStep()">Next</button>
                  </div>
                  <div class="flex justify-center mt-4 space-x-1">
                        <div class="w-3 h-3 bg-gray-300 rounded-full"></div>
                        <div class="w-3 h-3 bg-emerald-900 rounded-full"></div>
                        <div class="w-3 h-3 bg-gray-300 rounded-full"></div>
                        <div class="w-3 h-3 bg-gray-300 rounded-full"></div>
                  </div>
                  </div>


                  <!-- Step #5 -->
                  <div id="step-5" class="max-w-3xl step hidden opacity-0 transition-opacity duration-500 ease-in-out">
                  <div class="text-center mb-6">
                        <h1 class="text-2xl font-semibold mb-4">Solution</h1>
                        <p class="text-gray-500">Mission: what is your Why? </p>
                  </div>
                  <div class="mb-4">
                        <label for="email" class="block text-gray-700 mb-2">Product/Service description: </label>
                        <textarea id="email" type="email" class="w-full p-3 border rounded-md"></textarea>
                  </div>

                  <div class="mb-4">
                        <label for="email" class="block text-gray-700 mb-2">Specifications, features, functions, and benefits that lead to product/service success?</label>
                        <textarea id="email" type="email" class="w-full p-3 border rounded-md"></textarea>
                  </div>

                  <div class="mb-4">
                        <label for="email" class="block text-gray-700 mb-2">Future MVP looks like:</label>
                        <textarea id="email" type="email" class="w-full p-3 border rounded-md"></textarea>
                  </div>

                  <div class="flex justify-between">
                        <button class="bg-gray-300 text-gray-700 px-6 py-3 rounded-lg focus:outline-none transition-transform hover:scale-105" onclick="prevStep()">Back</button>
                        <button class="bg-emerald-900 text-white px-6 py-3 rounded-lg focus:outline-none transition-transform hover:scale-105" onclick="nextStep()">Next</button>
                  </div>
                  <div class="flex justify-center mt-4 space-x-1">
                        <div class="w-3 h-3 bg-gray-300 rounded-full"></div>
                        <div class="w-3 h-3 bg-emerald-900 rounded-full"></div>
                        <div class="w-3 h-3 bg-gray-300 rounded-full"></div>
                        <div class="w-3 h-3 bg-gray-300 rounded-full"></div>
                  </div>
                  </div>

                  <!-- Step 6  -->
                  <div id="step-6" class="max-w-3xl step hidden opacity-0 transition-opacity duration-500 ease-in-out">
                  <div class="text-center mb-6">
                        <h1 class="text-2xl font-semibold mb-4">Advantage</h1>
                        <p class="text-gray-500">VRIO resource elements (source of competitive advantage (CA)) </p>
                  </div>
                  <div class="mb-4">
                        <label for="email" class="block text-gray-700 mb-2">Competitor Analysis (what do they do well, what can be improved) </label>
                        <textarea id="email" type="email" class="w-full p-3 border rounded-md"></textarea>
                  </div>

                  <div class="mb-4">
                        <label for="email" class="block text-gray-700 mb-2">Strategies to create CA</label>
                        <textarea id="email" type="email" class="w-full p-3 border rounded-md"></textarea>
                  </div>

                  <div class="mb-4">
                        <label for="email" class="block text-gray-700 mb-2">Strategies to protect CA </label>
                        <textarea id="email" type="email" class="w-full p-3 border rounded-md"></textarea>
                  </div>

                  <div class="flex justify-between">
                        <button class="bg-gray-300 text-gray-700 px-6 py-3 rounded-lg focus:outline-none transition-transform hover:scale-105" onclick="prevStep()">Back</button>
                        <button class="bg-emerald-900 text-white px-6 py-3 rounded-lg focus:outline-none transition-transform hover:scale-105" onclick="nextStep()">Next</button>
                  </div>
                  <div class="flex justify-center mt-4 space-x-1">
                        <div class="w-3 h-3 bg-gray-300 rounded-full"></div>
                        <div class="w-3 h-3 bg-emerald-900 rounded-full"></div>
                        <div class="w-3 h-3 bg-gray-300 rounded-full"></div>
                        <div class="w-3 h-3 bg-gray-300 rounded-full"></div>
                  </div>
                  </div>

                  <!-- Step 7 -->

                  <div id="step-7" class="max-w-3xl step hidden opacity-0 transition-opacity duration-500 ease-in-out">
                  <div class="text-center mb-6">
                        <h1 class="text-2xl font-semibold mb-4">Partnerships</h1>
                        <p class="text-gray-500">Internal & External Stakeholders </p>
                  </div>
                  <div class="mb-4">
                        <label for="email" class="block text-gray-700 mb-2">What partnerships or collaborations would be critical or useful?</label>
                        <textarea id="email" type="email" class="w-full p-3 border rounded-md"></textarea>
                  </div>

                  <div class="mb-4">
                        <label for="email" class="block text-gray-700 mb-2">Distribution Partners</label>
                        <textarea id="email" type="email" class="w-full p-3 border rounded-md"></textarea>
                  </div>

                  <div class="mb-4">
                        <label for="email" class="block text-gray-700 mb-2">With whom and how have you tested your solution/key assumptions?</label>
                        <textarea id="email" type="email" class="w-full p-3 border rounded-md"></textarea>
                  </div>

                  <div class="flex justify-between">
                        <button class="bg-gray-300 text-gray-700 px-6 py-3 rounded-lg focus:outline-none transition-transform hover:scale-105" onclick="prevStep()">Back</button>
                        <button class="bg-emerald-900 text-white px-6 py-3 rounded-lg focus:outline-none transition-transform hover:scale-105" onclick="nextStep()">Next</button>
                  </div>
                  <div class="flex justify-center mt-4 space-x-1">
                        <div class="w-3 h-3 bg-gray-300 rounded-full"></div>
                        <div class="w-3 h-3 bg-emerald-900 rounded-full"></div>
                        <div class="w-3 h-3 bg-gray-300 rounded-full"></div>
                        <div class="w-3 h-3 bg-gray-300 rounded-full"></div>
                  </div>
                  </div>


                  <div id="step-8" class="max-w-3xl step hidden opacity-0 transition-opacity duration-500 ease-in-out">
                  <div class="text-center mb-6">
                        <h1 class="text-2xl font-semibold mb-4">Unit Economics</h1>
                        <p class="text-gray-500">(see over – COCA + LTV + Pirate Metrics)</p>
                  </div>
                  <div class="mb-4">
                        <label for="email" class="block text-gray-700 mb-2">Revenue – Business Model - Price - LTV</label>
                        <textarea id="email" type="email" class="w-full p-3 border rounded-md"></textarea>
                  </div>

                  <div class="mb-4">
                        <label for="email" class="block text-gray-700 mb-2">Costs – Estimated Operating/G&A Expenses, COCA</label>
                        <textarea id="email" type="email" class="w-full p-3 border rounded-md"></textarea>
                  </div>

                  <div class="mb-4">
                        <label for="email" class="block text-gray-700 mb-2">LTV/COCA Ratio High Enough (LTV > 3xCOCA)?</label>
                        <textarea id="email" type="email" class="w-full p-3 border rounded-md"></textarea>
                  </div>

                  <div class="mb-4">
                        <label for="email" class="block text-gray-700 mb-2">Pirate Metrics Met?</label>
                        <textarea id="email" type="email" class="w-full p-3 border rounded-md"></textarea>
                  </div>

                  <div class="flex justify-between">
                        <button class="bg-gray-300 text-gray-700 px-6 py-3 rounded-lg focus:outline-none transition-transform hover:scale-105" onclick="prevStep()">Back</button>
                        <button class="bg-emerald-900 text-white px-6 py-3 rounded-lg focus:outline-none transition-transform hover:scale-105" onclick="nextStep()">Next</button>
                  </div>
                  <div class="flex justify-center mt-4 space-x-1">
                        <div class="w-3 h-3 bg-gray-300 rounded-full"></div>
                        <div class="w-3 h-3 bg-emerald-900 rounded-full"></div>
                        <div class="w-3 h-3 bg-gray-300 rounded-full"></div>
                        <div class="w-3 h-3 bg-gray-300 rounded-full"></div>
                  </div>
                  </div>


                  <div id="step-9" class="max-w-3xl step hidden opacity-0 transition-opacity duration-500 ease-in-out">
                  <div class="text-center mb-6">
                        <h1 class="text-2xl font-semibold mb-4">Sales Channels</h1>
                        <p class="text-gray-500">Preferred Sales Channel: </p>
                  </div>
                  <div class="mb-4">
                        <label for="email" class="block text-gray-700 mb-2">Map the process to acquiring customers</label>
                        <textarea id="email" type="email" class="w-full p-3 border rounded-md"></textarea>
                  </div>

                  <div class="mb-4">
                        <label for="email" class="block text-gray-700 mb-2">Windows of Opportunity: Possible Triggers: </label>
                        <textarea id="email" type="email" class="w-full p-3 border rounded-md"></textarea>
                  </div>

                  <div class="mb-4">
                        <label for="email" class="block text-gray-700 mb-2">Customer delivery sequence </label>
                        <textarea id="email" type="email" class="w-full p-3 border rounded-md"></textarea>
                  </div>

                  <div class="mb-4">
                        <label for="email" class="block text-gray-700 mb-2">Media (social, platforms, print, etc.)</label>
                        <textarea id="email" type="email" class="w-full p-3 border rounded-md"></textarea>
                  </div>

                  <div class="flex justify-between">
                        <button class="bg-gray-300 text-gray-700 px-6 py-3 rounded-lg focus:outline-none transition-transform hover:scale-105" onclick="prevStep()">Back</button>
                        <button class="bg-emerald-900 text-white px-6 py-3 rounded-lg focus:outline-none transition-transform hover:scale-105" onclick="nextStep()">Next</button>
                  </div>
                  <div class="flex justify-center mt-4 space-x-1">
                        <div class="w-3 h-3 bg-gray-300 rounded-full"></div>
                        <div class="w-3 h-3 bg-emerald-900 rounded-full"></div>
                        <div class="w-3 h-3 bg-gray-300 rounded-full"></div>
                        <div class="w-3 h-3 bg-gray-300 rounded-full"></div>
                  </div>
                  </div>

                  <!-- Part - 9 LeaderShip -->
                  <div id="step-10" class="max-w-3xl step hidden opacity-0 transition-opacity duration-500 ease-in-out">
                  <div class="text-center mb-6">
                        <h1 class="text-2xl font-semibold mb-4">Leadership: Team & Board</h1>
                        <p class="text-gray-500">Personal connection to mission/role responsibilities </p>
                  </div>
                  <div class="mb-4">
                        <label for="email" class="block text-gray-700 mb-2">Background, experience, expertise</label>
                        <textarea id="email" type="email" class="w-full p-3 border rounded-md"></textarea>
                  </div>

                  <div class="mb-4">
                        <label for="email" class="block text-gray-700 mb-2">Networks/Assets/Access to Resources </label>
                        <textarea id="email" type="email" class="w-full p-3 border rounded-md"></textarea>
                  </div>

                  <div class="mb-4">
                        <label for="email" class="block text-gray-700 mb-2">What expertise don’t you have and how will you get it? </label>
                        <textarea id="email" type="email" class="w-full p-3 border rounded-md"></textarea>
                  </div>

                  <div class="flex justify-between">
                        <button class="bg-gray-300 text-gray-700 px-6 py-3 rounded-lg focus:outline-none transition-transform hover:scale-105" onclick="prevStep()">Back</button>
                        <button class="bg-emerald-900 text-white px-6 py-3 rounded-lg focus:outline-none transition-transform hover:scale-105" onclick="nextStep()">Next</button>
                  </div>
                  <div class="flex justify-center mt-4 space-x-1">
                        <div class="w-3 h-3 bg-gray-300 rounded-full"></div>
                        <div class="w-3 h-3 bg-gray-300 rounded-full"></div>
                        <div class="w-3 h-3 bg-emerald-900 rounded-full"></div>
                        <div class="w-3 h-3 bg-gray-300 rounded-full"></div>
                  </div>
                  </div>

                  <div id="step-11" class="max-w-3xl step hidden opacity-0 transition-opacity duration-500 ease-in-out">
                  <div class="text-center mb-6">
                        <h1 class="text-2xl font-semibold mb-4">Scale</h1>
                        <p class="text-gray-500">Market Product Plan </p>
                  </div>
                  <div class="mb-4">
                        <label for="email" class="block text-gray-700 mb-2">Next Market</label>
                        <textarea id="email" type="email" class="w-full p-3 border rounded-md"></textarea>
                  </div>

                  <div class="mb-4">
                        <label for="email" class="block text-gray-700 mb-2">Future Market Product Plan </label>
                        <textarea id="email" type="email" class="w-full p-3 border rounded-md"></textarea>
                  </div>

                  <div class="mb-4">
                        <label for="email" class="block text-gray-700 mb-2">Future Market TAM: </label>
                        <textarea id="email" type="email" class="w-full p-3 border rounded-md"></textarea>
                  </div>

                  <div class="flex justify-between">
                        <button class="bg-gray-300 text-gray-700 px-6 py-3 rounded-lg focus:outline-none transition-transform hover:scale-105" onclick="prevStep()">Back</button>
                        <button class="bg-emerald-900 text-white px-6 py-3 rounded-lg focus:outline-none transition-transform hover:scale-105" onclick="nextStep()">Next</button>
                  </div>
                  <div class="flex justify-center mt-4 space-x-1">
                        <div class="w-3 h-3 bg-gray-300 rounded-full"></div>
                        <div class="w-3 h-3 bg-gray-300 rounded-full"></div>
                        <div class="w-3 h-3 bg-gray-300 rounded-full"></div>
                        <div class="w-3 h-3 bg-emerald-900 rounded-full"></div>
                  </div>
                  </div>


                  <div id="step-12" class="max-w-3xl step hidden opacity-0 transition-opacity duration-500 ease-in-out">
                  <div class="text-center mb-6 space-y-4">
                        <h1 class="text-3xl font-semibold">Thank you</h1>
                        <p class="text-gray-500">We will keep in touch with you</p>
                  </div>
                  <div class="flex justify-center">
                        <button class="bg-emerald-900 text-white px-6 py-3 rounded-lg focus:outline-none transition-transform hover:scale-105" onclick="nextStep()">Submit</button>
                  </div>

                  </div>
            </div>
      </div>
</div>
<script>
      var currentStep = 1;
      const totalSteps = 12;
      var stepData = {};  // Store step data

      function showStep(step) {
            for (let i = 1; i <= totalSteps; i++) {
                  const stepDiv = document.getElementById(`step-${i}`);
                  if (i === step) {
                        stepDiv.classList.remove('hidden');
                        stepDiv.classList.remove('opacity-0');
                        stepDiv.classList.add('opacity-100');
                  } else {
                        stepDiv.classList.add('hidden');
                        stepDiv.classList.add('opacity-0');
                        stepDiv.classList.remove('opacity-100');
                  }
            }
      }

      function nextStep() {
            // Initial screen
            if (currentStep === 1) {
                  currentStep++;      
                  showStep(currentStep);
            }
            if ((currentStep < totalSteps) && (currentStep !== 1)) {
                  collectStepData(currentStep);  // Collect data on this step
                  currentStep++;
                  showStep(currentStep);
            }
      }

      function prevStep() {
            if (currentStep > 1) {
                  currentStep--;
                  showStep(currentStep);
            }
      }

      // Collect data from the current step inputs
      function collectStepData(step) {
            if (step === 1) {
                  stepData.name = $('#name-input').val(); // Assuming you have an input field with id `name-input`
            } else if (step === 2) {
                  stepData.phone = $('#phone-input').val(); // Assuming step 2 collects phone
            } else if (step === 3) {
                  stepData.email = $('#email-input').val(); // Assuming step 3 collects email
            } else if (step === 4) {
                  stepData.message = $('#message-input').val(); // Assuming step 4 collects message
            }
            // Continue adding for other steps based on what data each step collects
      }

      // Submit the form via AJAX
      function submitForm() {
            // Assign step data to hidden fields in the form
            $('#name').val(stepData.name);
            $('#phone').val(stepData.phone);
            $('#email').val(stepData.email);
            $('#message').val(stepData.message);

            // Submit the form via AJAX
            $("#form_error").hide();

            var form = $("#enquiry_form");

            $.ajax({
                  type: "POST",
                  url: "<?php echo get_rest_url(null, 'v1/contact-form/submit'); ?>",
                  data: form.serialize(), // Serialize hidden form fields
                  success: function(res) {
                        form.hide();
                        $("#form_success").html(res).fadeIn();
                  },
                  error: function() {
                        $("#form_error").html("There was an error submitting").fadeIn();
                  }
            });
      }
      
      // jQuery Document Ready
      jQuery(document).ready(function($) {
            // Bind the submitForm function to the last step's "Submit" button
            $('#submit-button').click(function(event) {
                  event.preventDefault();
                  submitForm();
            });

            // Initialize the first step
            showStep(currentStep);
      });


</script>

