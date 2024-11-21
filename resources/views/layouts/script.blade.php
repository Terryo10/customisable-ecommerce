<script>
document.addEventListener('DOMContentLoaded', function () {
    const addFieldButton = document.getElementById('add_field_button');
    const customFieldsData = document.getElementById('custom_fields_data');
    const fieldContainer = document.createElement('div');

    // Add field button event listener
    addFieldButton.addEventListener('click', function () {
        const fieldName = document.querySelector('input[name="new_field_name"]').value;
        const fieldValue = document.querySelector('input[name="new_field_value"]').value;

        if (fieldName && fieldValue) {
            // Add to the container
            const fieldElement = document.createElement('div');
            fieldElement.innerHTML = `
                <input type="text" name="custom_fields[${fieldName}]" value="${fieldValue}" readonly />
                <button type="button" class="remove_field_button">Remove</button>
            `;
            fieldContainer.appendChild(fieldElement);

            // Update hidden input value
            const currentData = JSON.parse(customFieldsData.value || '[]');
            currentData.push({ name: fieldName, value: fieldValue });
            customFieldsData.value = JSON.stringify(currentData);
        } else {
            alert('Please provide both field name and value!');
        }
    });

    // Attach the field container to the DOM
    addFieldButton.parentElement.appendChild(fieldContainer);
});
</script>
