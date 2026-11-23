const form = document.getElementById('callbackForm');
const submitButton = form.querySelector('button[type="submit"]');
const formError = document.getElementById('callbackError');
const fields = ['name', 'phone', 'comment'];

form.addEventListener('submit', async function(event) {
    event.preventDefault();
    submitButton.disabled = true;
    formError.textContent = '';

    for (const field of fields) {
        document.getElementById(field + 'Error').textContent = '';
        form.elements.namedItem(field).removeAttribute('aria-invalid');
    }

    try {
        const response = await fetch(form.action, {
            method: 'POST',
            headers: { Accept: 'application/json' },
            body: new FormData(form),
        });

        if (response.status === 422) {
            const { errors } = await response.json();
            let firstInvalidField;

            for (const field of fields) {
                if (errors[field]?.length) {
                    const input = form.elements.namedItem(field);
                    document.getElementById(field + 'Error').textContent = errors[field][0];
                    input.setAttribute('aria-invalid', 'true');
                    firstInvalidField ??= input;
                }
            }

            firstInvalidField?.focus();
            return;
        }

        if (response.status === 429) {
            formError.textContent = 'Слишком много попыток. Попробуйте через минуту.';
            return;
        }

        if (!response.ok || !(await response.json()).success) {
            throw new Error('Callback submission failed');
        }

        document.getElementById('popupOverlay').style.display = 'block';
        document.getElementById('successPopup').style.display = 'block';
        form.reset();
    } catch {
        formError.textContent = 'Не удалось отправить заявку. Попробуйте ещё раз.';
    } finally {
        submitButton.disabled = false;
    }
});

function closePopup() {
    document.getElementById('popupOverlay').style.display = 'none';
    document.getElementById('successPopup').style.display = 'none';
}

document.getElementById('closeCallbackPopup').addEventListener('click', closePopup);
document.getElementById('popupOverlay').addEventListener('click', closePopup);
document.addEventListener('keydown', function(event) {
    if(event.key === 'Escape') closePopup();
});
