jQuery(document).ready(function($) {
    $(".ddfb-component").draggable({
        helper: "clone"
    });

    $("#ddfb-drop-area").droppable({
        accept: ".ddfb-component",
        drop: function(event, ui) {
            var componentType = ui.helper.data("type");
            var newComponent = $('<div class="ddfb-component-item"></div>');

            switch (componentType) {
                case 'button':
                    newComponent.html('<button type="button">Button</button>');
                    break;
                case 'text':
                    newComponent.html('<input type="text" placeholder="Text Field" />');
                    break;
                // Add more case blocks for different components
            }

            $(this).append(newComponent);
        }
    });
});
