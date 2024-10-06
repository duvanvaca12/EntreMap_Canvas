jQuery(document).ready(function($) {
    var currentStep = 1;
    const totalSteps = 12; // Update the number of total steps based on actual form structure
    var stepData = {};  // Object to store data across steps

    // Show the appropriate step
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

    // Collect data from the current step's input fields
    function collectStepData(step) {
        $('#step-' + step).find('input, textarea').each(function() {
            var input = $(this);
            var id = input.attr('id');
            if (id) {
                stepData[id] = input.val();
            }
        });
    }
    

    // Move to the next step
    function firstStep() {
        currentStep++;
        showStep(currentStep);
    }

    function nextStep() {
        console.log('Testing current step');
        collectStepData(currentStep); // Collect data before moving to the next step
        if (currentStep < totalSteps) {
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

    // Submit the form via AJAX without hidden fields
    function submitForm() {
        collectStepData(currentStep); // Collect data from the current step
        console.log(stepData); // Debugging step data
    
        $.ajax({
            type: "POST",
            url: ajax_data.rest_url, // Use localized REST API URL
            data: stepData,  // Directly use stepData object
            success: function(res) {
                $("#enquiry_form").hide();
                $("#form_success").html(res).fadeIn();
            },
            error: function() {
                $("#form_error").html("There was an error submitting").fadeIn();
            }
        });
    }
    

    // Bind the final submit button to the submitForm function
    $('#submit-button').click(function(event) {
        event.preventDefault();
        submitForm();
    });

    // Initialize the first step
    showStep(currentStep);

    // Bind event handler for 'Get Started' button
    $('#get-started').click(function() {
        firstStep();
    });

    // Use event delegation for dynamically added buttons
    $(document).on('click', '.next-step', function(event) {
        event.preventDefault();
        nextStep();
    });

    $(document).on('click', '.prev-step', function(event) {
        event.preventDefault();
        prevStep();
    });

});
