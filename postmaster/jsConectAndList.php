<script src="https://apis.google.com/js/api.js"></script>
<script>
    /**
     * Sample JavaScript code for gmailpostmastertools.domains.list
     * See instructions for running APIs Explorer code samples locally:
     * https://developers.google.com/explorer-help/code-samples#javascript
     */

    function authenticate() {
        return gapi.auth2.getAuthInstance()
            .signIn({
                scope: "https://www.googleapis.com/auth/postmaster.readonly"
            })
            .then(function() {
                    console.log("Sign-in successful");
                },
                function(err) {
                    console.error("Error signing in", err);
                });
    }

    function loadClient() {
        gapi.client.setApiKey("API");
        return gapi.client.load("https://gmailpostmastertools.googleapis.com/$discovery/rest?version=v1")
            .then(function() {
                    console.log("GAPI client loaded for API");
                },
                function(err) {
                    console.error("Error loading GAPI client for API", err);
                });
    }

    // Make sure the client is loaded and sign-in is complete before calling this method.
    function execute() {
        return gapi.client.gmailpostmastertools.domains.list({})
            .then(function(response) {
                    // Handle the results here (response.result has the parsed body).
                    console.log("Response", response);
                },
                function(err) {
                    console.error("Execute error", err);
                });
    }

    function executeTrafficStats() {
        return gapi.client.gmailpostmastertools.domains.trafficStats.list({
                "parent": "domains/jobassistnow.com",
                "startDate.day": 1,
                "startDate.month": 1,
                "startDate.year": 2022
            })
            .then(function(response) {
                    // Handle the results here (response.result has the parsed body).
                    console.log("Response", response);
                },
                function(err) {
                    console.error("Execute error", err);
                });
    }

    gapi.load("client:auth2", function() {
        gapi.auth2.init({
            client_id: "ID",
            plugin_name: "chat"
        });
    });

    function initClient() {
        gapi.client.init({
            apiKey: 'KEY',
            clientId: 'ID',
            discoveryDocs: DISCOVERY_DOCS,
            scope: SCOPES,
            ux_mode: 'redirect',
            //redirect_uri: custom url to redirect'
        }).then(function() {
            // Listen for sign-in state changes.
            gapi.auth2.getAuthInstance().isSignedIn.listen(updateSigninStatus);

            // Handle the initial sign-in state.
            updateSigninStatus(gapi.auth2.getAuthInstance().isSignedIn.get());
            authorizeButton.onclick = handleAuthClick;
            signoutButton.onclick = handleSignoutClick;
        });
    }
</script>
<button onclick="authenticate().then(loadClient)">Authorize and load</button>
<button onclick="execute()">Execute Domains</button>
<button onclick="executeTrafficStats()">Execute TrafficStats</button>