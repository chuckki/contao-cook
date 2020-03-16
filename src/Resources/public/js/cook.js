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
    console.log(cookieName);

    var bodyCssClass = 'cook-active';
    var cookCssClass = 'cook--active';

    // Add the active CSS class
    cook.classList.add(cookCssClass);

    // Add the body CSS class
    document.body.classList.add(bodyCssClass);

    var acceptButton = cook.querySelector('[data-cook-accept]');
    var analyticsBox = cook.querySelector('[data-cook-no-accept]');

    var analyticsKey = 'cook_ANALYTICS';

    // Power up the accept button if exists
    if (acceptButton) {
        acceptButton.addEventListener('click', function (e) {
            e.preventDefault();

            var date = new Date();
            var ttl = cook.dataset.cookTtl ? parseInt(cook.dataset.cookTtl, 10) : 365;

            // Store in local storage
            date.setDate(date.getDate() + ttl);
            window.localStorage.setItem(cookieName, Math.round(date.getTime() / 1000));

            localStorage.removeItem(analyticsKey);

            // Remove the active CSS class
            cook.classList.remove(cookCssClass);
            document.body.classList.remove(bodyCssClass);
        });
    }


    // Power up the analytics box if exists
    if (analyticsBox) {
        analyticsBox.addEventListener('click', function (e) {
            e.preventDefault();

            localStorage.setItem(analyticsKey, 1);


            var date = new Date();
            var ttl = cook.dataset.cookTtl ? parseInt(cook.dataset.cookTtl, 10) : 365;

            // Store in local storage
            date.setDate(date.getDate() + ttl);
            window.localStorage.setItem(cookieName, Math.round(date.getTime() / 1000));

            // Remove the active CSS class
            cook.classList.remove(cookCssClass);
            document.body.classList.remove(bodyCssClass);

        });

    }

});
