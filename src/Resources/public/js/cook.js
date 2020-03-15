document.addEventListener('DOMContentLoaded', function () {
    var cook = document.querySelector('[data-cook]');

    // Return if the cook element does not exist
    if (!cook) {
        return;
    }

    var cookieName = cook.dataset.cook;

    if (window.localStorage.getItem(cookieName) && window.localStorage.getItem(cookieName) > Math.round(Date.now() / 1000)) {
        return;
    }

    var cookies = document.cookie ? document.cookie.split('; ') : [];

    // Return if the cookie is still valid (backwards compatibility)
    for (var i = 0; i < cookies.length; i++) {
        if (cookies[i] === cookieName + '=1') {
            return;
        }
    }

    var bodyCssClass = 'cook-active';
    var cookCssClass = 'cook--active';

    // Add the active CSS class
    cook.classList.add(cookCssClass);

    // Add the body CSS class
    document.body.classList.add(bodyCssClass);

    var acceptButton = cook.querySelector('[data-cook-accept]');

    // Power up the accept button if exists
    if (acceptButton) {
        acceptButton.addEventListener('click', function (e) {
            e.preventDefault();

            var date = new Date();
            var ttl = cook.dataset.cookTtl ? parseInt(cook.dataset.cookTtl, 10) : 365;

            // Store in local storage
            date.setDate(date.getDate() + ttl);
            window.localStorage.setItem(cookieName, Math.round(date.getTime() / 1000));

            // Remove the active CSS class
            cook.classList.remove(cookCssClass);

            // Remove the body CSS class
            document.body.classList.remove(bodyCssClass);
        });
    }

    var analyticsBox = cook.querySelector('[data-cook-analytics]');

    // Power up the analytics box if exists
    if (analyticsBox) {
        var analyticsKey = 'cook_ANALYTICS';

        // Check the box if the box was checked
        if (localStorage.getItem(analyticsKey)) {
            analyticsBox.checked = true;
        }

        analyticsBox.addEventListener('change', function (e) {
            e.preventDefault();

            if (this.checked) {
                localStorage.setItem(analyticsKey, 1);
            } else {
                localStorage.removeItem(analyticsKey);
            }
        });
    }
});
