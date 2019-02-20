new Vue({
    el: '#em-form',
    data: {
        purchaseCode: '',
        authToken: envato_token.authToken,
        responseData: '',
        responseDataEnabler: false,
        responseMessage: '',
        responseMessageEnabler: false,
        responseMessageSuccess: false,
        responseMessageError: false,
        validMessage: '',
        validClass: false,
        invalidClass: false,
    },
    methods: {
        getValidity : function ( supportDate ) {
            if ( moment().format('MMMM Do YYYY') < supportDate ) {
                this.validClass = true;
                return 'Valid for support';
            } else {
                this.invalidClass = true;
                return 'Invalid for support';
            }
        },
        getHumanDate : function ( date ) {
            humanData = moment(date).format('MMMM Do YYYY');
            return humanData;
        },
        emFormHandler: function() {
            if( this.authToken != null ) {
                const emInstance = axios.create({
                    baseURL: "https://api.envato.com/v1/market/private/user/verify-purchase:" + this.purchaseCode + ".json",
                    headers: {
                        'common': {
                            'Access-Control-Allow-Origin': "*",
                            "Authorization": 'Bearer ' + this.authToken,
                        }
                    }
                });
                
                const regex = /^(\w{8})-((\w{4})-){3}(\w{12})$/;
                if ( regex.test( this.purchaseCode) ){
                    emInstance.get().then( envatoResponse =>{
                        this.responseData = JSON.parse(envatoResponse.request.response);
                        if ( envatoResponse.request.response.length > 22 ) {
                            this.responseDataEnabler = true;
                            this.responseMessageEnabler = true;
                            this.responseMessageSuccess = true;
                            this.responseMessageError = false;
                            this.responseMessage = 'Your purchase code is valid & result is listed above!';
                        } else {
                            this.responseDataEnabler = false;
                            this.responseMessageEnabler = true;
                            this.responseMessageError = true;
                            this.responseMessageSuccess = false;
                            this.responseMessage = 'Your purchase code is not valid or having problem with connecting with the market api. Please check again!';
                        } 
                    })
                    
                                        
                } else {
                    this.responseMessageEnabler = true;
                    this.responseMessageError = true;
                    this.responseMessageSuccess = false;
                    this.responseMessage = 'Invalid Code!';
                }
            } else {
                this.responseMessageEnabler = true;
                this.responseMessageError = true;
                this.responseMessageSuccess = false;
                this.responseMessage = 'Please go to the settings page & set your token to see validator working!';
            }
        },
    }
});