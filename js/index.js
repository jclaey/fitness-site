document.getElementById('bmi-form').addEventListener('submit', calculateBMI);
document.getElementById('height-form').addEventListener('submit', calculateHeight);

function calculateBMI(e) {
    const height = document.getElementById('height').value;
    const weight = document.getElementById('weight').value;
    const outputBMI = document.getElementById('bmi-output');

    const kilograms = weight * 0.453592;
    const centimeters = height * .0254;

    outputBMI.value = (kilograms / Math.pow(centimeters, 2)).toFixed(2);

    e.preventDefault();
}

function calculateHeight(e) {
    const feet = document.getElementById('feet').value;
    const inches = document.getElementById('inches').value;
    const outputHeight = document.getElementById('height-output');

    outputHeight.value = feet * 12 + parseInt(inches);

    e.preventDefault();
}