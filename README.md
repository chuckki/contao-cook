# Contao Cook Bundle

This bundle is just for no getting stress.
Cookie name is based on pageroot-id: ```cook_[id]```

```
// analytics_google.html5
<script>

    function cookieAllowed(){
        // put Google-Code here
    }

    let ana = window.localStorage.getItem('cook_ANALYTICS');
    if (window.localStorage.getItem('cook_1') && !ana) {
        cookieAllowed();
    }
</script>
```
