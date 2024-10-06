<div id="form_success" style="display:none; background-color:green; color:#fff;"></div>
<div id="form_error" style="display:none; background-color:red; color:#fff;"></div>

<div class="form-style">

<?php wp_nonce_field('wp_rest'); ?>

<div class="flex justify-center items-center h-screen">
<div class="w-full max-w-3xl mx-6 bg-white p-8 shadow-md rounded-lg transition-all duration-500 ease-in-out transform">

      <!-- Form Step 1 -->
      <div id="step-1" class="space-y-8 step active transition-opacity duration-500 ease-in-out">
            <div class="text-center mb-6 space-y-4">
            <h1 class="text-3xl font-semibold">Welcome to the Entremap Canvas</h1>
            <p class="text-gray-500">Let's start with the <strong>10 Steps</strong> of the Entrepreneurial model</p>
            </div>
            <div class="flex justify-center">
            <button type="button" id="get-started" class="bg-emerald-800 text-white px-6 py-3 rounded-lg focus:outline-none transition-transform hover:scale-105">Get Started</button>
            </div>
      </div>

      <!-- Problem Opportunity - Step 2 -->
      <div id="step-2" class="max-w-3xl step hidden opacity-0 transition-opacity duration-500 ease-in-out">
            <div class="text-center mb-6">
            <h1 class="text-2xl font-semibold mb-4">Problem / Opportunity</h1>
            <p class="text-gray-500">When/where does the problem/opportunity occur and what causes it?</p>
            </div>
            <div class="mb-4">
            <label for="problem-1" class="block text-gray-700 mb-2">What do customers do to fix the problem?</label>
            <input id="problem-1" type="text" class="w-full p-3 border rounded-md" />
            </div>

            <div class="mb-4">
            <label for="problem-2" class="block text-gray-700 mb-2">What is the emotional and measurable impact of the problem (with units)?</label>
            <input id="problem-2" type="text" class="w-full p-3 border rounded-md" />
            </div>

            <div class="mb-4">
            <label for="problem-3" class="block text-gray-700 mb-2">What are the disadvantages of the alternatives?</label>
            <input id="problem-3" type="text" class="w-full p-3 border rounded-md" />
            </div>

            <div class="mb-4">
            <label for="problem-4" class="block text-gray-700 mb-2">Will customers pay for it? If not, who will?</label>
            <input id="problem-4" type="text" class="w-full p-3 border rounded-md" />
            </div>

            <div class="flex justify-between">
            <button type="button" class="prev-step bg-gray-300 text-gray-700 px-6 py-3 rounded-lg focus:outline-none transition-transform hover:scale-105">Back</button>
            <button type="button" class="next-step bg-emerald-900 text-white px-6 py-3 rounded-lg focus:outline-none transition-transform hover:scale-105">Next</button>
            </div>
      </div>


      <!-- Step #3 -->
      <div id="step-3" class="max-w-3xl step hidden opacity-0 transition-opacity duration-500 ease-in-out">
            <div class="text-center mb-6">
                  <h1 class="text-2xl font-semibold mb-4">Customer Segments</h1>
                  <p class="text-gray-500"> Segment your beachhead market - customers/users who have the problem/use similar services/buy similar products, in similar sales cycles expecting similar value <br> (new canvas for each customer segment): </br> </p>
            </div>
            <div class="mb-4">
                  <label for="segments-1" class="block text-gray-700 mb-2">List the characteristics of your ideal customers</label>
                  <textarea id="segments-1" type="text" class="w-full p-3 border rounded-md"></textarea>
            </div>

            <div class="mb-4">
                  <label for="segments-2" class="block text-gray-700 mb-2">Demographic/Geographic/Psychographic/Behavioural characteristics?</label>
                  <textarea id="segments-2" type="text" class="w-full p-3 border rounded-md"></textarea>
            </div>

            <div class="mb-4">
                  <label for="segments-3" class="block text-gray-700 mb-2">Who are your Customer and End-User Personas?</label>
                  <textarea id="segments-3" type="text" class="w-full p-3 border rounded-md"></textarea>
            </div>

            <div class="mb-4">
                  <label for="segments-4" class="block text-gray-700 mb-2">Calculate TAM/SAM/SOM</label>
                  <input id="segments-4" type="number" class="w-full p-3 border rounded-md" />
            </div>

            <div class="mb-4">
                  <label for="segments-5" class="block text-gray-700 mb-2">List your first 10 customers</label>
                  <textarea id="segments-5" type="text" class="w-full p-3 border rounded-md"></textarea>
            </div>
            <div class="flex justify-between">
                  <button type="button" class="prev-step bg-gray-300 text-gray-700 px-6 py-3 rounded-lg focus:outline-none transition-transform hover:scale-105">Back</button>
                  <button type="button" class="next-step bg-emerald-900 text-white px-6 py-3 rounded-lg focus:outline-none transition-transform hover:scale-105">Next</button>
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
            <label for="value-1" class="block text-gray-700 mb-2">Full Life Cycle Use Case</label>
            <textarea id="value-1" type="text" class="w-full p-3 border rounded-md"></textarea>
      </div>

      <div class="mb-4">
            <label for="value-2" class="block text-gray-700 mb-2">Customer’s Decision-Making Unit/s</label>
            <textarea id="value-2" type="text" class="w-full p-3 border rounded-md"></textarea>
      </div>

      <div class="mb-4">
            <label for="value-3" class="block text-gray-700 mb-2">QUANTIFIED VALUE PROPOSITION (for each DMU/Stakeholder)</label>
            <textarea id="value-3" type="text" placeholder="e.g., installing your widget in the production line will reduce the number of sick leave days from 12 to 6 per year per person, saving $42,840." class="w-full p-3 border rounded-md"></textarea>
      </div>

      <div class="flex justify-between">
                  <button type="button" class="prev-step bg-gray-300 text-gray-700 px-6 py-3 rounded-lg focus:outline-none transition-transform hover:scale-105">Back</button>
                  <button type="button" class="next-step bg-emerald-900 text-white px-6 py-3 rounded-lg focus:outline-none transition-transform hover:scale-105">Next</button>
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
            <label for="solution-1" class="block text-gray-700 mb-2">Product/Service description: </label>
            <textarea id="solution-1" type="text" class="w-full p-3 border rounded-md"></textarea>
      </div>

      <div class="mb-4">
            <label for="solution-2" class="block text-gray-700 mb-2">Specifications, features, functions, and benefits that lead to product/service success?</label>
            <textarea id="solution-2" type="text" class="w-full p-3 border rounded-md"></textarea>
      </div>

      <div class="mb-4">
            <label for="solution-3" class="block text-gray-700 mb-2">Future MVP looks like:</label>
            <textarea id="solution-3" type="text" class="w-full p-3 border rounded-md"></textarea>
      </div>

      <div class="flex justify-between">
            <button type="button" class="prev-step bg-gray-300 text-gray-700 px-6 py-3 rounded-lg focus:outline-none transition-transform hover:scale-105">Back</button>
            <button type="button" class="next-step bg-emerald-900 text-white px-6 py-3 rounded-lg focus:outline-none transition-transform hover:scale-105">Next</button>
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
            <label for="advantage-1" class="block text-gray-700 mb-2">Competitor Analysis (what do they do well, what can be improved) </label>
            <textarea id="advantage-1" type="text" class="w-full p-3 border rounded-md"></textarea>
      </div>

      <div class="mb-4">
            <label for="advantage-2" class="block text-gray-700 mb-2">Strategies to create CA</label>
            <textarea id="advantage-2" type="text" class="w-full p-3 border rounded-md"></textarea>
      </div>

      <div class="mb-4">
            <label for="advantage-3" class="block text-gray-700 mb-2">Strategies to protect CA </label>
            <textarea id="advantage-3" type="text" class="w-full p-3 border rounded-md"></textarea>
      </div>

      <div class="flex justify-between">
            <button type="button" class="prev-step bg-gray-300 text-gray-700 px-6 py-3 rounded-lg focus:outline-none transition-transform hover:scale-105">Back</button>
            <button type="button" class="next-step bg-emerald-900 text-white px-6 py-3 rounded-lg focus:outline-none transition-transform hover:scale-105">Next</button>
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
            <label for="partnerships-1" class="block text-gray-700 mb-2">What partnerships or collaborations would be critical or useful?</label>
            <textarea id="partnerships-1" type="text" class="w-full p-3 border rounded-md"></textarea>
      </div>

      <div class="mb-4">
            <label for="partnerships-2" class="block text-gray-700 mb-2">Distribution Partners</label>
            <textarea id="partnerships-2" type="text" class="w-full p-3 border rounded-md"></textarea>
      </div>

      <div class="mb-4">
            <label for="partnerships-3" class="block text-gray-700 mb-2">With whom and how have you tested your solution/key assumptions?</label>
            <textarea id="partnerships-3" type="text" class="w-full p-3 border rounded-md"></textarea>
      </div>

      <div class="flex justify-between">
            <button type="button" class="prev-step bg-gray-300 text-gray-700 px-6 py-3 rounded-lg focus:outline-none transition-transform hover:scale-105">Back</button>
            <button type="button" class="next-step bg-emerald-900 text-white px-6 py-3 rounded-lg focus:outline-none transition-transform hover:scale-105">Next</button>
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
            <label for="economics-1" class="block text-gray-700 mb-2">Revenue – Business Model - Price - LTV</label>
            <textarea id="economics-1" type="text" class="w-full p-3 border rounded-md"></textarea>
      </div>

      <div class="mb-4">
            <label for="economics-2" class="block text-gray-700 mb-2">Costs – Estimated Operating/G&A Expenses, COCA</label>
            <textarea id="economics-2" type="text" class="w-full p-3 border rounded-md"></textarea>
      </div>

      <div class="mb-4">
            <label for="economics-3" class="block text-gray-700 mb-2">LTV/COCA Ratio High Enough (LTV > 3xCOCA)?</label>
            <textarea id="economics-3" type="text" class="w-full p-3 border rounded-md"></textarea>
      </div>

      <div class="mb-4">
            <label for="economics-4" class="block text-gray-700 mb-2">Pirate Metrics Met?</label>
            <textarea id="economics-4" type="text" class="w-full p-3 border rounded-md"></textarea>
      </div>

      <div class="flex justify-between">
            <button type="button" class="prev-step bg-gray-300 text-gray-700 px-6 py-3 rounded-lg focus:outline-none transition-transform hover:scale-105">Back</button>
            <button type="button" class="next-step bg-emerald-900 text-white px-6 py-3 rounded-lg focus:outline-none transition-transform hover:scale-105">Next</button>
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
            <label for="sales-c-1" class="block text-gray-700 mb-2">Map the process to acquiring customers</label>
            <textarea id="sales-c-1" type="text" class="w-full p-3 border rounded-md"></textarea>
      </div>

      <div class="mb-4">
            <label for="sales-c-2" class="block text-gray-700 mb-2">Windows of Opportunity: Possible Triggers: </label>
            <textarea id="sales-c-2" type="text" class="w-full p-3 border rounded-md"></textarea>
      </div>

      <div class="mb-4">
            <label for="sales-c-3" class="block text-gray-700 mb-2">Customer delivery sequence </label>
            <textarea id="sales-c-3" type="text" class="w-full p-3 border rounded-md"></textarea>
      </div>

      <div class="mb-4">
            <label for="sales-c-4" class="block text-gray-700 mb-2">Media (social, platforms, print, etc.)</label>
            <textarea id="sales-c-4" type="text" class="w-full p-3 border rounded-md"></textarea>
      </div>

      <div class="flex justify-between">
            <button type="button" class="prev-step bg-gray-300 text-gray-700 px-6 py-3 rounded-lg focus:outline-none transition-transform hover:scale-105">Back</button>
            <button type="button" class="next-step bg-emerald-900 text-white px-6 py-3 rounded-lg focus:outline-none transition-transform hover:scale-105">Next</button>
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
            <label for="team-1" class="block text-gray-700 mb-2">Background, experience, expertise</label>
            <textarea id="team-1" type="text" class="w-full p-3 border rounded-md"></textarea>
      </div>

      <div class="mb-4">
            <label for="team-2" class="block text-gray-700 mb-2">Networks/Assets/Access to Resources </label>
            <textarea id="team-2" type="text" class="w-full p-3 border rounded-md"></textarea>
      </div>

      <div class="mb-4">
            <label for="team-3" class="block text-gray-700 mb-2">What expertise don’t you have and how will you get it? </label>
            <textarea id="team-3" type="text" class="w-full p-3 border rounded-md"></textarea>
      </div>

      <div class="flex justify-between">
            <button type="button" class="prev-step bg-gray-300 text-gray-700 px-6 py-3 rounded-lg focus:outline-none transition-transform hover:scale-105">Back</button>
            <button type="button" class="next-step bg-emerald-900 text-white px-6 py-3 rounded-lg focus:outline-none transition-transform hover:scale-105">Next</button>
      </div>
      <div class="flex justify-center mt-4 space-x-1">
            <div class="w-3 h-3 bg-gray-300 rounded-full"></div>
            <div class="w-3 h-3 bg-gray-300 rounded-full"></div>
            <div class="w-3 h-3 bg-emerald-900 rounded-full"></div>
            <div class="w-3 h-3 bg-gray-300 rounded-full"></div>
      </div>
      </div>

      <!-- Step 10 -->
      <div id="step-11" class="max-w-3xl step hidden opacity-0 transition-opacity duration-500 ease-in-out">
      <div class="text-center mb-6">
            <h1 class="text-2xl font-semibold mb-4">Scale</h1>
            <p class="text-gray-500">Market Product Plan </p>
      </div>
      <div class="mb-4">
            <label for="scale-1" class="block text-gray-700 mb-2">Next Market</label>
            <textarea id="scale-1" type="text" class="w-full p-3 border rounded-md"></textarea>
      </div>

      <div class="mb-4">
            <label for="scale-2" class="block text-gray-700 mb-2">Future Market Product Plan </label>
            <textarea id="scale-2" type="text" class="w-full p-3 border rounded-md"></textarea>
      </div>

      <div class="mb-4">
            <label for="scale-3" class="block text-gray-700 mb-2">Future Market TAM: </label>
            <textarea id="scale-3" type="text" class="w-full p-3 border rounded-md"></textarea>
      </div>

      <div class="flex justify-between">
            <button type="button" class="prev-step bg-gray-300 text-gray-700 px-6 py-3 rounded-lg focus:outline-none transition-transform hover:scale-105">Back</button>
            <button type="button" class="next-step bg-emerald-900 text-white px-6 py-3 rounded-lg focus:outline-none transition-transform hover:scale-105">Next</button>
      </div>
      <div class="flex justify-center mt-4 space-x-1">
            <div class="w-3 h-3 bg-gray-300 rounded-full"></div>
            <div class="w-3 h-3 bg-gray-300 rounded-full"></div>
            <div class="w-3 h-3 bg-gray-300 rounded-full"></div>
            <div class="w-3 h-3 bg-emerald-900 rounded-full"></div>
      </div>
      </div>

      <!-- Final Step (Submit) -->
      <div id="step-12" class="max-w-3xl step hidden opacity-0 transition-opacity duration-500 ease-in-out">
            <div class="text-center mb-6 space-y-4">
            <h1 class="text-3xl font-semibold">Thank you</h1>
            <p class="text-gray-500">We will keep in touch with you</p>
            </div>
            <div class="flex justify-center">
            <button type="button" id="submit-button" class="bg-emerald-900 text-white px-6 py-3 rounded-lg focus:outline-none transition-transform hover:scale-105">Submit</button>
            </div>
      </div>
</div>
</div>
</div>

