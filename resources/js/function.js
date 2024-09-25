// function.js
const roles = {
    product: ['Product Manager', 'Product Designer/Creator'],
    marketing: ['Marketing Specialist', 'Sales Associate', 'E-commerce Manager'],
    customer: ['Customer Service Representative'],
    logistics: ['Warehouse Manager', 'Shipping and Fulfillment Specialist'],
    finance: ['Accountant/Bookkeeper', 'Administrative Assistant'],
    it: ['Web Developer', 'IT Support Specialist'],
    visual: ['Visual Merchandiser'],
    hr: ['HR Manager']
};

function updateRoles() {
    const departmentSelect = document.getElementById('department');
    const roleSelect = document.getElementById('role');
    const selectedDepartment = departmentSelect ? departmentSelect.value : '';

    // Clear existing options
    roleSelect.innerHTML = '<option value="">--Select Role--</option>';

    if (selectedDepartment) {
        const departmentRoles = roles[selectedDepartment];
        departmentRoles.forEach(role => {
            const option = document.createElement('option');
            option.value = role;
            option.textContent = role;
            roleSelect.appendChild(option);
        });
    }
}

window.updateRoles = updateRoles; // Expose the function globally
