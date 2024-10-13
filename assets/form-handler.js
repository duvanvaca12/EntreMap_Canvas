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
    // ChatBOT 

    document.addEventListener("DOMContentLoaded", () => {
        const chatbotToggler = document.querySelector(".chatbot-toggler");
        const chatbot = document.querySelector(".chatbot");
        const sendBtn = document.querySelector("#send-btn");
        const textarea = document.querySelector("#chatbot-input");
        const chatbox = document.querySelector(".chatbox");

        // Toggle the visibility of the chatbot
        chatbotToggler.addEventListener("click", () => {
            chatbot.style.display = chatbot.style.display === "block" ? "none" : "block";
        });

        sendBtn.addEventListener("click", () => {
            sendMessage();
        });

        textarea.addEventListener("keypress", (e) => {
            if (e.key === "Enter") {
                e.preventDefault();
                sendMessage();
            }
        });

        function sendMessage() {
            const message = textarea.value.trim();
            if (message) {
                appendMessage("outgoing", message);
                textarea.value = "";
                fetchResponse(message);
            }
        }

        function appendMessage(type, message) {
            // Create a container for the message and optional copy button
            const messageContainer = document.createElement("div");
            messageContainer.classList.add(type);
            messageContainer.style.display = "flex";
            messageContainer.style.alignItems = "center";
            messageContainer.style.gap = "10px";
            messageContainer.style.marginBottom = "10px";

            // Create the message element
            const chatMessage = document.createElement("div");
            chatMessage.classList.add(type === "incoming" ? "bot-message" : "user-message");
            chatMessage.textContent = message;
            chatMessage.style.padding = "8px";
            chatMessage.style.borderRadius = "10px";


            // Append the chat message to the container
            messageContainer.appendChild(chatMessage);

            // If the message is from the bot, add a "Copy" button
            if (type === "incoming") {
                const copyButton = document.createElement("button");
                copyButton.style.backgroundColor = "transparent"; // Make background transparent
                copyButton.style.border = "none";
                copyButton.style.cursor = "pointer";
                copyButton.style.padding = "5px";
                copyButton.style.marginLeft = "5px";
            
                // Create the icon element
                const icon = document.createElement("span");
                icon.classList.add("material-symbols-outlined");
                icon.textContent = "content_copy";
                icon.style.fontSize = "24px";
                icon.style.color = "#fff"; 
            
                // Append the icon to the button
                copyButton.appendChild(icon);
            
                // Add click event listener to the copy button
                copyButton.addEventListener("click", () => {
                    if (navigator.clipboard && navigator.clipboard.writeText) {
                        // Use the Clipboard API
                        navigator.clipboard.writeText(message).then(() => {
                            alert("Response copied to clipboard!");
                        }).catch(err => {
                            console.error("Could not copy text: ", err);
                            alert("Failed to copy the text.");
                        });
                    } else {
                        // Fallback method using execCommand
                        const textarea = document.createElement('textarea');
                        textarea.value = message;
                        // Avoid scrolling to bottom
                        textarea.style.position = 'fixed';
                        textarea.style.top = 0;
                        textarea.style.left = 0;
                        textarea.style.opacity = 0;
                        document.body.appendChild(textarea);
                        textarea.focus();
                        textarea.select();
                        try {
                            const successful = document.execCommand('copy');
                        } catch (err) {
                            console.error("Fallback: Oops, unable to copy", err);
                            console.error("Failed to copy the text.");
                        }
                        document.body.removeChild(textarea);
                    }
                });
                
            
                // Append the copy button to the message container
                messageContainer.appendChild(copyButton);
            }
            

            // Append the entire message container to the chatbox
            chatbox.appendChild(messageContainer);
            chatbox.scrollTop = chatbox.scrollHeight;
        }

        async function fetchResponse(message) {
            try {
                const response = await fetch(ajax_data.rest_url_chat, {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                    },
                    body: JSON.stringify({
                        message: message,
                    })
                });

                if (!response.ok) {
                    const errorData = await response.json();
                    console.error("Error: Failed to fetch response from server", response.status, response.statusText, errorData);
                    appendMessage("incoming", "Sorry, there was an issue connecting to the AI service.");
                    return;
                }

                const data = await response.json();
                if (data.message) {
                    const botMessage = data.message.trim();
                    appendMessage("incoming", botMessage);
                } else {
                    console.error("Server returned an unexpected data format:", data);
                    appendMessage("incoming", "Sorry, I didn't understand that.");
                }
            } catch (error) {
                console.error("Error fetching response:", error);
                appendMessage("incoming", "Sorry, there was an error processing your request.");
            }
        }
    });
