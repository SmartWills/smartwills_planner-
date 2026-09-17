document.addEventListener('DOMContentLoaded', function () {
    const q3Radios = document.querySelectorAll('.q3-radio');
    const q3YesSub = document.getElementById('q3_yes_sub');
    const q3NoSub = document.getElementById('q3_no_sub');
    const q5Radios = document.querySelectorAll('.q5-radio');
    const q5Group = document.getElementById('q5_1_group');
    const q5Label = document.getElementById('q5_1_label');
    const q6Radios = document.querySelectorAll('.q6-radio');
    const q6Sub = document.getElementById('q6_sub');
    const backButton = document.querySelector('[data-back-url]');

    function setVisibility(element, isVisible) {
        if (!element) {
            return;
        }

        element.hidden = !isVisible;
    }

    function updateQ3(value) {
        setVisibility(q3YesSub, value === 'Yes');
        setVisibility(q3NoSub, value === 'No');
    }

    function updateQ5(value) {
        setVisibility(q5Group, true);

        if (!q5Label) {
            return;
        }

        q5Label.textContent = value === 'Yes'
            ? 'Could you please specify the amount of funds you have set aside to cover the administration fees and related expenses for the executor / administrator?'
            : 'Could you please specify the amount of funds you will reserve to cover the administration fees and related expenses for the executor / administrator?';
    }

    function updateQ6(value) {
        setVisibility(q6Sub, value === 'Yes');
    }

    q3Radios.forEach(function (radio) {
        radio.addEventListener('change', function () {
            updateQ3(this.value);
        });
    });

    q5Radios.forEach(function (radio) {
        radio.addEventListener('change', function () {
            updateQ5(this.value);
        });
    });

    q6Radios.forEach(function (radio) {
        radio.addEventListener('change', function () {
            updateQ6(this.value);
        });
    });

    if (backButton) {
        backButton.addEventListener('click', function () {
            window.location.href = backButton.dataset.backUrl;
        });
    }

    const q3Checked = document.querySelector('input[name="q3"]:checked');
    const q5Checked = document.querySelector('input[name="q5_funds"]:checked');
    const q6Checked = document.querySelector('input[name="q6"]:checked');

    if (q3Checked) {
        updateQ3(q3Checked.value);
    }

    if (q5Checked) {
        updateQ5(q5Checked.value);
    }

    if (q6Checked) {
        updateQ6(q6Checked.value);
    }
});
